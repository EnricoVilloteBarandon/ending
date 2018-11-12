<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class GameSchedule extends Model
{
    protected $table = "game_schedule";
    public function getAvailableGames(){
        return DB::table($this->table)
            ->select("game_schedule.id","game_schedule.title","game_schedule.date","prices.firstquarter","game_schedule.bet_amount","game_schedule.result",
                    "prices.secondquarter","prices.thirdquarter","prices.fourthquarter",
                    "prices.grandprice")
            ->where("game_schedule.status",0)
            ->join('prices','prices.gameid','=','game_schedule.id')
            ->get();
    }
    public function getBetAmount($gameId){
        return DB::table($this->table)
            ->where('id',$gameId)
            ->first();
    }
    public function insert($dataArray){
        return DB::table($this->table)
            ->insert($dataArray);
    }
    public function getAvailableGamesAdmin(){
        return DB::table($this->table)
            // ->where("game_schedule.status",0)
            ->orderBy("date","desc")
            ->get();
    }
    public function getGameInfoById($id){
        return DB::table($this->table)
            ->where("id",$id)
            ->first();
    }
    public function updateGame($id, $dataArray){
        return DB::table($this->table)
            ->where("id",$id)
            ->update($dataArray);
    }
}
