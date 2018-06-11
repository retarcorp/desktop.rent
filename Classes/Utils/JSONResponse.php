<?php

namespace Classes\Utils;

class JSONResponse{

    public static function ok($data){
        header("Content-Type: application/json");
        die(json_encode(["status"=>"OK","data"=>$data]));
    }

    public static function error($error){
        header("Content-Type: application/json");
        die(json_encode(["status"=>"ERROR","message"=>$error]));
    }
}