<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  DB;
class Images extends Model
{
    protected $table = "images";
    public function insert($dataArray){
        DB::table($this->table)
            ->insert($dataArray);
    }
    public function getImageById($id){
        return DB::table($this->table)
            ->where("gameid",$id)
            ->get();
    }
}
