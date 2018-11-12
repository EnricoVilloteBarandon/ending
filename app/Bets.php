<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Bets extends Model
{
    protected $table = "bets";
    public function getBetsById($id){
        return DB::table($this->table)
            ->select("bets.id","bets.bet","bets.playerid","game_schedule.created_at","game_schedule.bet_amount")
            ->join('game_schedule','game_schedule.id','=','bets.gameid')
            // ->join('users','users.id','=','bets.playerid')
            ->where('gameid',$id)
            // ->where('bets.status',0)
            ->where("game_schedule.status",0)
            ->get();
    }
    public function insert($dataArray){
        DB::table($this->table)
            ->insert($dataArray);
    }
    public function getPlayersBets($username){
        return DB::table($this->table)
            ->select("bets.id","bets.bet","bets.status","game_schedule.title","game_schedule.bet_amount")
            ->join("game_schedule","game_schedule.id","=","bets.gameid")
            ->where("playerid",$username)
            ->get();
    }
    public function findWinner($dataArray){
        return DB::table($this->table)
            ->where("gameid",$dataArray["gameid"])
            ->where("bet",$dataArray["result"])
            ->first();
    }
    public function updateBets($id,$dataArray){
        if($id != ""){
            return DB::table($this->table)
                ->where("id",$id)
                ->update($dataArray);
        }else{
            return DB::table($this->table)
                ->where("gameid",$dataArray["gameid"])
                ->where("status",0)
                ->update($dataArray);
        }
    }
    public function findBet($dataArray){
        return DB::table($this->table)
            ->where("gameid",$dataArray["gameid"])
            ->where("bet",$dataArray["bet"])
            ->first();
    }
}
