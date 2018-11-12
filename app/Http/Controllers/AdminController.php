<?php

namespace App\Http\Controllers;

ini_set('display_errors',1);
error_reporting(E_ALL);
use Illuminate\Http\Request;
use Theme;
use Auth;
use Redirect;
use App\Users;
use Validator;
use Input;
use App\logsclass;
use Illuminate\Support\Facades\Hash;
use App\GameSchedule;
use App\Prices;
use App\Bets;
use App\Images;
use Storage;
class AdminController extends Controller
{
    public function displayDashboard(){
        $gameSchedModel = new GameSchedule();
        $games = $gameSchedModel->getAvailableGamesAdmin();
        $dataArray = [
            'games' => $games
        ];
        Theme::uses('admin')->setTitle('Admin Dashboard');
        return Theme::view('admin/index',$dataArray);
    }
    public function doLogout(){
        Auth::logout();
        return Redirect::to('login'); 
    }
    public function displayUsers(){
        $usersModel = new Users();
        $data = [
            'users' => $usersModel->getAll()
        ];
        Theme::uses('admin')->setTitle('Users');
        return Theme::view('admin/users');
    }
    public function getAllUsers(){
        $usersModel = new Users();
        $users = $usersModel->getAll();
        $tempArr = [];
        $tempObj = [
            'data' => []
        ];
        foreach ($users as $index => $value){
            $tempArr = [
                'id' => $value->id,
                'fullname' => $value->firstname . ' ' . $value->lastname,
                'email' => $value->email,
                'usertype' => $value->usertype,
                'created_at' => $value->created_at,
                'action' => '<input type="button" class="btn btn-default btnEdit" value="EDIT" data-id="'.$value->id.'">'
            ];
            array_push($tempObj["data"],$tempArr);
        }
        return json_encode($tempObj);
    }
    public function getUserInfoById(Request $request){
        $usersModel = new Users();
        $id = $request->input('id');
        $userInfo = $usersModel->getUserInfoWithId($id);
        return response()->json($userInfo);
    }
    public function submitUser(Request $request){
        $usersModel = new Users();
        $logs = new \App\logclass;
        if($request->input("operation") == 0){
            $rules = [
                'firstname' => 'required|min:4',
                'lastname' => 'required|min:4',
                'email' => 'required|email|min:4',
                'password' => 'required|confirmed|alphaNum|min:6',
                'contact' => 'required|min:4',
                'usertype' => 'required',

            ];
            $validator = Validator::make(Input::all(),$rules);
            if($validator->fails()){
                return Redirect::to('/admin/users')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            }else{
                $dataArray = [
                    'firstname' => $request->input('firstname'),
                    'lastname' => $request->input('lastname'),
                    'email' => $request->input('email'),
                    'contact' => $request->input('contact'),
                    'balance' => $request->input('balance'),
                    'usertype' => $request->input('usertype'),
                    'password' =>  Hash::make($request->input('password')),
                    'agent' => 1,
                    'created_at' => date('Y-m-d H:i:s', time())
                ];
                $res = $usersModel->insert($dataArray);
                if($res){
                    $logs->dataArray = [
                        "userid" => 1,
                        "description" => "Insert:" . $request->input('firstname') . " " . $request->input('lastname') . " utype:" . $request->input('usertype')
                    ];
                    $logs->saveLog($logs->dataArray);
                    return 0;
                }
            }
        }elseif($request->input("operation") == 1){
            $dataArray = [
                'id' => $request->input('id'),
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'contact' => $request->input('contact'),
                'balance' => $request->input('balance'),
                'usertype' => $request->input('usertype'),
                'agent' => Auth::id()
            ];
            $res = $usersModel->updateUser($dataArray);
            if($res){
                $logs->dataArray = [
                    "userid" => Auth::id(),
                    "description" => "Update:" . $request->input('id') . " utype:" . $request->input('usertype') . " bal:" . $request->input('balance')
                ];
                $logs->saveLog($logs->dataArray);
                return 1;
            }
        }
    }
    public function submitGame(Request $request){
        $gameModel = new GameSchedule();
        if($request->input("operation") == 0){
            $dataArray = [
                'title' => $request->input("title"),
                'date' => $request->input("date"),
                'bet_amount' => $request->input("amount"),
                'added_by' => Auth::id(),
                'created_at' => date('Y-m-d H:i:s',time())
            ];
            $res = $gameModel->insertGetId($dataArray);
            // if(count($_FILES["images"]["name"]) > 0){
            //     $imgDataArray = [];
            //     $imagesModel = new Images();
            //     for($i = 0; $i < count($_FILES["images"]["name"]); $i++){

            //         $imgDataArray[$i]["name"] = $_FILES["images"]["name"][$i];
            //         $imgDataArray[$i]["type"] = $_FILES["images"]["type"][$i];
            //         $imgDataArray[$i]["path"] = "img/prizesImg/" . $_FILES["images"]["name"][$i];
            //         $imgDataArray[$i]["gameid"] = $res;
            //         $imgDataArray[$i]["created_at"] = date("Y-m-d H:i:s",time());
            //         $imagesModel->insert($imgDataArray[$i]);
            //         if(move_uploaded_file($_FILES["images"]["tmp_name"][$i], $imgDataArray[$i]["path"])){
            //             return 0;
            //         }
            //     }
            // }
        }else{
            // update
            $dataArray = [
                'title' => $request->input("title"),
                'date' => $request->input("date"),
                'bet_amount' => $request->input("amount"),
                'firstqresult' => $request->input("firstqresult"),
                'secondqresult' => $request->input("secondqresult"),
                'thirdqresult' => $request->input("thirdqresult"),
                'result' => $request->input("result"),
                'status' => $request->input("status")
            ];
            $res = $gameModel->updateGame($request->input("id"),$dataArray);
            $betsModel = new Bets();
            $prizesModel = new Prices();
            if($request->input("firstqresult") != ""){
                $dataArray = [
                    "gameid" => $request->input("id"),
                    "result" => $request->input("firstqresult")
                ];
                $firstqwinner = $betsModel->findWinner($dataArray);
                if($firstqwinner != null){
                    $updateWinner = $betsModel->updateBets($firstqwinner->id,["status" => 2]);
                    $firstqprice = $prizesModel->getPrizesInfoById($firstqwinner->gameid);
                    $updateOdbc = $this::updateODBC(["username" => $firstqwinner->playerid, "prize" => $firstqprice->firstquarter]);
                }
            }
            if($request->input("secondqresult") != ""){
                $dataArray = [
                    "gameid" => $request->input("id"),
                    "result" => $request->input("secondqresult")
                ];
                $secondqwinner = $betsModel->findWinner($dataArray);
                if($secondqwinner != null){
                    $updateWinner = $betsModel->updateBets($secondqwinner->id,["status" => 2]);
                    $secondqprice = $prizesModel->getPrizesInfoById($secondqwinner->gameid);
                    $updateOdbc = $this::updateODBC(["username" => $secondqwinner->playerid, "prize" => $secondqprice->secondquarter]);
                }
            }
            if($request->input("thirdqresult") != ""){
                $dataArray = [
                    "gameid" => $request->input("id"),
                    "result" => $request->input("thirdqresult")
                ];
                $thirdqwinner = $betsModel->findWinner($dataArray);
                if($thirdqwinner != null){
                    $updateWinner = $betsModel->updateBets($thirdqwinner->id,["status" => 2]);
                    $thirdqprice = $prizesModel->getPrizesInfoById($thirdqwinner->gameid);
                    $updateOdbc = $this::updateODBC(["username" => $thirdqwinner->playerid, "prize" => $thirdqprice->thirdquarter]);
                }
            }
            if($request->input("result") != ""){
                $dataArray = [
                    "gameid" => $request->input("id"),
                    "result" => $request->input("result")
                ];
                $winner = $betsModel->findWinner($dataArray);
                if($winner != null){
                    $updateWinner = $betsModel->updateBets($winner->id,["status" => 2]);
                    $updatePrize = $prizesModel->updatePrize( $request->input("id"),["winner" => $winner->id]);
                }
                $updateLosers = $betsModel->updateBets("",["status" => 1,"gameid" =>  $request->input("id")]);
            }
        }
        if($res){
            return 0;
        }else{
            return 1;
        }
    }
    public function getGameInfo(Request $request){
        $id = $request->input("id");
        $gameModel = new GameSchedule();
        $info = $gameModel->getGameInfoById($id);
        return response()->json($info);
    }
    public function getPrizesInfo(Request $request){
        $id = $request->input("id");
        $prizesModel = new Prices();
        $info = $prizesModel->getPrizesInfoById($id);
        return response()->json($info);
    }
    public function submitPrizes(Request $request){
        $operation = $request->input("operation");
        $prizesModel = new Prices();
        if($operation == 0){
            $dataArray = [
                "gameid" => $request->input("gameid"),
                "firstquarter" => $request->input("firstQuarter"),
                "secondquarter" => $request->input("secondQuarter"),
                "thirdquarter" => $request->input("thirdQuarter"),
                "fourthquarter" => $request->input("fourthQuarter"),
                "grandprice" => $request->input("grandPrize"),
                "addedby" => Auth::id(),
                "created_at" => date("Y-m-d H:i:s",time())
            ];
            $res = $prizesModel->insertGetId($dataArray);
            if(!empty($_FILES["images"]["name"])){
                $imgDataArray = [];
                $imagesModel = new Images();
                for($i = 0; $i < count($_FILES["images"]["name"]); $i++){

                    $imgDataArray[$i]["name"] = $_FILES["images"]["name"][$i];
                    $imgDataArray[$i]["type"] = $_FILES["images"]["type"][$i];
                    $imgDataArray[$i]["path"] = "img/prizesImg/" . $_FILES["images"]["name"][$i];
                    $imgDataArray[$i]["gameid"] = $request->input("gameid");
                    $imgDataArray[$i]["created_at"] = date("Y-m-d H:i:s",time());
                    $imagesModel->insert($imgDataArray[$i]);
                    if(move_uploaded_file($_FILES["images"]["tmp_name"][$i], $imgDataArray[$i]["path"])){
                        return 0;
                    }
                }
            }
        }else{
            // update
            $dataArray = [
                "gameid" => $request->input("gameid"),
                "firstquarter" => $request->input("firstq"),
                "secondquarter" => $request->input("secondq"),
                "thirdquarter" => $request->input("thirdq"),
                "fourthquarter" => $request->input("fourthq"),
                "grandprice" => $request->input("grandprize"),
            ];
            $res = $prizesModel->updatePrize($request->input("gameid"),$dataArray);
        }
        if($res){
            return 0;
        }else{
            return 1;
        }
    }
    public function updateODBC($dataArray){
        date_default_timezone_set('Asia/Hong_Kong');
        $date = date("N",time());
        switch($date){
            case 1:
                $rslt = "MON_RSLT";
                break;
            case 2:
                $rslt = "TUE_RSLT";
                break;
            case 3:
                $rslt = "WED_RSLT";
                break;
            case 4:
                $rslt = "THU_RSLT";
                break;
            case 5:
                $rslt = "FRI_RSLT";
                break;
            case 6:
                $rslt = "SAT_RSLT";
                break;
            case 7:
                $rslt = "SUN_RSLT";
                break;
        }
        $odbc = odbc_connect('cima','','');
        $query = "select * from cust.dbf where ucase(NAME) = '". strtoupper($dataArray["username"]) ."'";
        $res = odbc_exec($odbc,$query);
        $balance = 0;
        while($row = odbc_fetch_array($res)){
            $rsltValue = $row[$rslt];
            $newRSLT = $rsltValue + $dataArray["prize"];
            var_dump($rsltValue);
            var_dump($newRSLT);
        }
        $updateQuery = "update cust.dbf set " . $rslt . "= ". $newRSLT ." where ucase(NAME) = '". strtoupper($dataArray["username"]) ."'";
        $updateRes = odbc_exec($odbc,$updateQuery);
    }
}
