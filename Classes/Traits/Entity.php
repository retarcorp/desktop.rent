<?php

namespace Classes\Traits;

use Classes\Exceptions\TraitException;
use Classes\Sql\Sql;

trait Entity {
    
    # Requires:
    # 1) public const TABLE_NAME
    # 2) public const PROPS_COLUMNS_INFO = []
    /*
        [
            'uid' => ['type' => 'int', 'get'],
            'payment_way' => ['alias' => 'payment', 'type' => 'int', 'get', 'set']
        ]
    # 3) Method getValidatedData(array $data) : array to prevalidate result of converting object in array
    */
    
    public static function getSqlInstance(){
        return Sql::getInstance();
    }
    
    private $columnsToSelect = [];
    
    public static function getInfo(): array{
        return self::PROPS_COLUMNS_INFO;
    }
    
    public function __construct(int $id, $setProps = true){
        if( $id <= 0 ){
            throw new TraitException(__METHOD__ . ": Wrong id $id, it must be positive");
        }
        
        $this->id = $id;
        
        if($setProps){
            $this->setPropsFromDB();
        }
    }
    
    public function getId(): int{
        return $this->id;
    }
    
    public function update(): self{
        $subqs = [];
        $values = [];
        
        foreach(self::PROPS_COLUMNS_INFO as $column => $propInfo){            
            $prop = isset($propInfo['alias']) ? $propInfo['alias'] : $column;
            
            if( !($this->hasSetter($prop, 'set')) ){
                continue;
            }
            
            $value = $this->$prop;
            $data[$column] = $value;
        }
        
        if( empty($data) ){
            return $this;
        }
        
        $sql = self::getSqlInstance();
        $where = ['id' => $this->id];
        $sql->update(self::TABLE_NAME, $data, $where);
        return $this;
    }
    
    public function toArray(): array{
        $arr = [];
        foreach($this as $prop => $value){
            if( $prop != 'sql' && $prop != 'columnsToSelect' ){
                $arr [$prop] = $value;
            }
        }
        
        $method = "getValidatedData";
        if( method_exists($this, $method) ){
            $arr = $this->$method($arr);
        }
        
        return $arr;
    }
    
    public static function toInstance(array $data){
        $id = intval($data['id']);
        unset($data['id']);
        $class = self::class;
        $object = new $class($id, 0);
        
        if( !empty($data) ){
            $object->setProps($data);
        }
        
        return $object;
    }
    
    public static function toInstances(array $data): array{
        return array_map(function($e){
            return self::toInstance($e);
        }, $data);
    }
    
    public function select(array $columns): self{
        $this->columnsToSelect = $columns;
        return $this;
    }
    
    public function setPropsFromDB(): self{
        if( empty($this->columnsToSelect) ){
            $columns = array_keys(self::PROPS_COLUMNS_INFO);
        }else{
            $columns = $this->columnsToSelect;
            $this->columnsToSelect = [];
        }
        
        $columns = implode(', ', $columns);
        
        $sql = self::getSqlInstance();
        
        $q = "SELECT $columns FROM "
            . self::TABLE_NAME . " WHERE id = {$this->id}";
        
        $data = $sql->getAssoc($q);
        
        if( empty($data) ){
            throw new TraitException(__METHOD__ . ": There is no such item {$this->id} in DB");
        }
        
        $this->setProps($data[0]);
        return $this;
    }
    
    public function setProps(array $data): self{
        foreach(self::PROPS_COLUMNS_INFO as $column => $propInfo){
            $prop = isset($propInfo['alias']) ? $propInfo['alias'] : $column;
            
            if( isset($propInfo['type']) ){
                $func = $propInfo['type'] . 'val';
                $this->$prop = $func($data[$column]);
            }else{
                $this->$prop = $data[$column];
            }
            
        }
        return $this;
    }
    
    private function isPropertyExists(string $prop): bool{
        foreach(self::PROPS_COLUMNS_INFO as $column => $info){
            if( $column == $prop || isset($info['alias']) && $info['alias'] == $prop){
                return true;
            }
        }
        return false;
    }
    
    public function hasGetter(string $prop): bool{
        return $this->hasKey($prop, 'get');
    }
    
    public function hasSetter(string $prop): bool{
        return $this->hasKey($prop, 'set');
    }
    
    private function hasKey(string $prop, string $key): bool{
        foreach(self::PROPS_COLUMNS_INFO as $column => $info){
            if( $column == $prop || isset($info['alias']) && $info['alias'] == $prop){
                if( in_array($key, $info) ){
                    return true;
                }
            }
        }
        return false;
    }
    
    public function __get(string $prop){
        if( $prop == 'id'){
            return $this->$prop;
        }
        
        if( $this->hasGetter($prop) ){
            return $this->$prop;
        }
        
        throw new TraitException(__METHOD__ . ": Trying to get value of unavailable property $prop");
    }
    
    public function __set(string $prop, $value){
        if( $this->hasSetter($prop) ){
            $this->$prop = $value;
        }else{
            throw new TraitException(__METHOD__ . ": Trying to set value $value of unavailable property $prop");
        }
    }
    
    public function __call(string $method, array $args){
        if( strpos($method, 'set') === 0 ){
            $prop = lcfirst(substr($method, strlen('set')));
            $this->$prop = $args[0];
            
        }elseif( strpos($method, 'get') === 0 ){
            
            $prop = lcfirst(substr($method, strlen('set')));
            return $this->$prop;
            
        }else{
            throw new TraitException(__METHOD__ . ": Undefined method $method");
        }
    }
    
    public function __toString(): string{
        return array_reduce($this->toArray(), function($carry, $curr){
            $carry .= serialize($curr);
        }, '');
    }
    
}