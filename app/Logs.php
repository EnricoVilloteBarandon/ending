<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Logs extends Model
{
    protected $table = "logs";
    public static function insertLog($dataArray){
        DB::table("logs")
            ->insert($dataArray);
    }
}
