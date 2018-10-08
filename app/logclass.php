<?php
namespace App;
class LogClass{
    public $dataArray = [
        "userid" => "",
        "description" => ""
    ];
    public function saveLog($arr){
        return Logs::insertLog($arr);
    }
}