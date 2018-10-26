<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Theme;
use Validator;
use Input;
use Redirect;
use Auth;
use App\GameSchedule;
use App\Bets;
use App\Prices;
use App\Users;
use View;
use App\Images;
class HomeController extends Controller
{
    public function dashboard(){
        if (!isset($_SESSION)) session_start();
        if(isset($_SESSION["username"])){
            $username = $_SESSION["username"];
            $odbc = odbc_connect('cima','','');
            $query = "select * from cust.dbf where ucase(NAME) = '". strtoupper($username) ."'";
            $res = odbc_exec($odbc,$query);
            $balance = 0;
            while($row = odbc_fetch_array($res)){
                $balance = $row["BALANCE"];
                $_SESSION["balance"] = $balance;
            }
            $gamesModel = new GameSchedule();
            $dataArray = [
                'balance' => $balance,
                'games' => $gamesModel->getAvailableGames()
            ];
            Theme::uses('home')->setTitle('Dashboard');
            return Theme::view('home/index',$dataArray);
        }else{
            return view('home/nosession');
        }
    }
    public function showLogin(){
        Theme::uses('home')->setTitle('Login');
        return Theme::view('home/login');
    }
    public function doLogin(){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ];
        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );
            if (Auth::attempt($userdata)){
                // return Redirect::to('');
                if(Auth::user()->usertype == 1){
                    return Redirect::to('/dashboard');
                }elseif(Auth::user()->usertype == 2){
                    return Redirect::to('/agent/dashboard');
                }elseif(Auth::user()->usertype == 3){
                    return Redirect::to('/admin/dashboard');
                }
            } else{
                return Redirect::to('login')
                    ->withErrors([
                        'password' => 'Wrong password or this account not approved yet.',
                    ]);
        
            } 
        }
    }
    public function doLogout(){
        Auth::logout();
        if (!isset($_SESSION)) session_start();
        session_destroy();
        $url = "http://noypiclub.com/";
        // return redirect()->to('/');
        return Redirect::to($url);
    }
    public function getCardInfo(Request $request){
        if (!isset($_SESSION)) session_start();
        $odbc = odbc_connect('cima','','');
        $query = "select * from cust.dbf where ucase(NAME) = '". strtoupper($_SESSION["username"]) ."'";
        $res = odbc_exec($odbc,$query);
        $balance = 0;
        while($row = odbc_fetch_array($res)){
            $balance = $row["BALANCE"];
            $_SESSION["balance"] = $balance;
        }
        $iGameId = $request->segment(2);
        $betsModel = new Bets();
        $gameSchedModel = new GameSchedule();
        $pricesModel = new Prices();
        $bets = $betsModel->getBetsById($iGameId);
        $content = "";
        $count = 0;
        for($index = 0; $index < 10; $index++){
            for($i = 0; $i < 10; $i++){
                switch(true){
                    case $count <= 24:
                        if($count == 0){
                            $content .= "<div class='col-md-3'>";
                        }
                        $content .=  "<div class='col-md-12 bet ". $this::searchValueinArr($bets,'playerid',$index . "-" . $i ,$_SESSION["username"]) ."' data-combination='". $index . "-" . $i ."'><span class='num'>" . $index . "-" . $i . "</span> " . $this::searchValueinArr($bets,'bet', $index . "-" . $i,'null') . "</div>";
                        break;
                    case $count <= 49:
                        if($count == 25){
                            $content .=  "</div>";
                            $content .=  "<div class='col-md-3'>";
                        }
                        $content .=  "<div class='col-md-12 bet ". $this::searchValueinArr($bets,'playerid',$index . "-" . $i ,$_SESSION["username"]) ."' data-combination='". $index . "-" . $i ."'><span class='num'>" . $index . "-" . $i . "</span> " . $this::searchValueinArr($bets,'bet', $index . "-" . $i,'null') . "</div>";
                        break;
                    case $count <= 74:
                        if($count == 50){
                            $content .=  "</div>";
                            $content .=  "<div class='col-md-3'>";
                        }
                        $content .=  "<div class='col-md-12 bet ". $this::searchValueinArr($bets,'playerid',$index . "-" . $i ,$_SESSION["username"]) ."' data-combination='". $index . "-" . $i ."'><span class='num'>" . $index . "-" . $i . "</span> " . $this::searchValueinArr($bets,'bet', $index . "-" . $i,'null') . "</div>";
                        break;
                    case $count <= 99:
                        if($count == 75){
                            $content .=  "</div>";
                            $content .=  "<div class='col-md-3'>";
                        }
                        $content .=  "<div class='col-md-12 bet ". $this::searchValueinArr($bets,'playerid',$index . "-" . $i ,$_SESSION["username"]) ."' data-combination='". $index . "-" . $i ."'><span class='num'>" . $index . "-" . $i . "</span> " . $this::searchValueinArr($bets,'bet', $index . "-" . $i,'null') . "</div>";
                        break;
                }
                $count++;
            }
        }
        $dataArray = [
            'content' => $content,
            'bet_amount' => $gameSchedModel->getBetAmount($iGameId),
            'price' => $pricesModel->getPrice($iGameId),
            'balance' => $_SESSION["balance"]
        ];
        Theme::uses('home')->setTitle('Card');
        return Theme::view('home/card',$dataArray);
    }
    public function getBetsById(Request $request){
        $betsModel = new Bets();
        $gameId = $request->input('id');
        return $betsModel->getBetsById($gameId);
    }
    public static function searchValueinArr($dataArray, $field, $value, $id){
        // returns key
        if($field == 'bet'){
            foreach($dataArray as $k => $v){
                if($dataArray[$k]->$field === $value){
                    return ucfirst($dataArray[$k]->playerid);
                }
            }
        }elseif($field == 'playerid'){
            foreach($dataArray as $k => $v){
                if($dataArray[$k]->$field == $id && $dataArray[$k]->bet == $value){
                    return 'myBet';
                }elseif($dataArray[$k]->bet === $value && $dataArray[$k]->playerid != $id){
                    return 'else';
                }
            }
        }
    }
    public function submitBet(Request $request){
        if (!isset($_SESSION)) session_start();
        $dataArray = [
            "playerid" => $request->input("playerid"),
            "gameid" => $request->input("gameid"),
            "bet" => $request->input("bet"),
            "amount" => $request->input("amount"),
            "created_at" => date('Y-m-d H:i:s',time())
        ];
        $betsModel = new Bets();
        // $usersModel = new Users();
        // $oldBalance = $usersModel->getUserInfoWithId($dataArray["playerid"])->balance;
        $oldBalance = $_SESSION["balance"];
        $dataArray["balance"] = $oldBalance - $request->input('amount');
        $this::updateOdbcBalance($dataArray);
        // $newBalance = $usersModel->updateBalance($dataArray);
        unset($dataArray["balance"]);
        unset($dataArray["amount"]);
        $query = $betsModel->insert($dataArray);
    }
    public function checkBalance(Request $request){
        $amount = $request->input('amount');
        session_start();
        $username = $_SESSION["username"];
        $odbc = odbc_connect('cima','','');
        $query = "select * from cust.dbf where ucase(NAME) = '". strtoupper($username) ."'";
        $res = odbc_exec($odbc,$query);
        $balance = 0;
        while($row = odbc_fetch_array($res)){
            $balance = $row["BALANCE"] + $row["CAP"] + $row["CURRENTBET"] + $row["MON_RSLT"] + $row["TUE_RSLT"] + $row["WED_RSLT"] + $row["THU_RSLT"] + $row["FRI_RSLT"] + $row["SAT_RSLT"] + $row["SUN_RSLT"];
        }
        if($balance < (int)$amount){
            return "1";
        }else{
            return "0";
        }
    }
    public function odbcLogin(Request $request){
        $username = $request->input("name");
        $password = $request->input("password");
        $odbc =  odbc_connect('cima','','');
        $query = "select * from cust.dbf where ucase(NAME) = '". strtoupper($username) ."' and ucase(PASSWORD) = '". strtoupper($password) ."'";
        $res = odbc_exec($odbc, $query);
        if(odbc_fetch_row($res) > 0){
            echo "qweqe";
        }
    }
    public static function updateOdbcBalance($dataArray){
        $odbc = odbc_connect('cima','','');
        $query = "select * from cust.dbf where ucase(NAME) = '". strtoupper($dataArray["playerid"]) ."'";
        $res = odbc_exec($odbc,$query);
        $oldBalance = 0;
        while($row = odbc_fetch_array($res)){
            $oldBalance = $row["BALANCE"];
        }
        $newBalance = $oldBalance - $dataArray["amount"];
        $updateQuery = "update cust.dbf set balance = ". $newBalance ." where ucase(NAME) = '". strtoupper($dataArray["playerid"]) ."'";
        $update =  odbc_exec($odbc,$updateQuery);
        odbc_close($odbc);
    }
    public function getPlayerBets(Request $request){
        if (!isset($_SESSION)) session_start();
        $betsModel = new Bets();
        $bets = $betsModel->getPlayersBets($_SESSION["username"]);
        $dataArray = [
            'bets' => $bets
        ];
        Theme::uses('home')->setTitle('Bets');
        return Theme::view('home/bets',$dataArray);
    }
    public function getPrizeInfo(Request $request){
        $iGameId = $request->segment(2);
        $prizeModel = new Prices();
        $imagesModel = new Images();
        $prizeInfo = $prizeModel->getPrizesInfoById($iGameId);
        $imagesInfo = $imagesModel->getImageById($iGameId);
        $dataArray = [
            "prize" => $prizeInfo,
            "images" => $imagesInfo
        ];
        Theme::uses('home')->setTitle('Prize');
        return Theme::view('home/prize',$dataArray);
    }
    public static function getGameTitle($iGameId){
        $gameSchedModel = new GameSchedule();
        $gameTitle = $gameSchedModel->getGameInfoById($iGameId);
        return $gameTitle;
    }
}
