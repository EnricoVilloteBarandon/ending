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
}
