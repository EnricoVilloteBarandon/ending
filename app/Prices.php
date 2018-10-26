<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Prices extends Model
{
    protected $table = 'prices';
    public function getPrice($gameId){
        return DB::table($this->table)
            ->where('gameid',$gameId)
            ->first();
    }
    public function getPrizesInfoById($id){
        return DB::table($this->table)
            ->where("gameid",$id)
            ->first();
    }
    public function insert($dataArray){
        return DB::table($this->table)
        ->insert($dataArray);
    }
    public function updatePrize($id, $dataArray){
        return DB::table($this->table)
            ->where("gameid",$id)
            ->update($dataArray);
    }
}
