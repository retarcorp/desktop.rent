<?php

namespace Classes\Models\Finance;

use Classes\Utils\Sql;
use Classes\Utils\Log;
use Classes\Utils\DateUtil;
use Classes\Utils\Common;
use Classes\Exceptions\DesktopRentException;

class Transaction{
    
    public const TABLE_NAME = 'users_transactions';
    /*
        # id INT
        # sum DECIMAL
        # uid INT
        # payment_way INT
        # status INT
        # added DATETIME
    */
    
    protected const PROPS_COLUMNS_INFO = [
        'sum' => ['type' => 'float', 'get', 'set'],
        'uid' => ['type' => 'int', 'get'],
        'payment_way' => ['alias' => 'payment', 'type' => 'int', 'get', 'set'],
        'status' => ['type' => 'int', 'get', 'set'],
        'added' => ['type' => 'str','get']
    ];
    
    use \Classes\Traits\Entity;
    
    private $id;
    private $sum;
    private $uid;
    private $payment;
    private $status;
    private $added;
    
    public function getValidatedData(array $data): array{
        $data['added'] = DateUtil::toRussianFormat($data['added']);
        return $data;
    }
}