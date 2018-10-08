<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Users extends Model
{
    protected $table = 'users';
    public function getAll(){
        return DB::table($this->table)
            ->get();
    }
    public function getUserInfoWithId($id){
        return DB::table($this->table)
            ->where("id",$id)
            ->first();
    }
    public function insert($dataArray){
        return DB::table($this->table)
            ->insert($dataArray);
    }
    public function updateUser($dataArray){
        return DB::table($this->table)
            ->where("id",$dataArray["id"])
            ->update($dataArray);
    }
    public function updateBalance($dataArray){
        return DB::table($this->table)
            ->where("id",$dataArray["playerid"])
            ->update(["balance" => $dataArray["balance"]]);
    }
}
