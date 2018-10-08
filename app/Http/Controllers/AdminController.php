<?php

namespace App\Http\Controllers;

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
                    'agent' => Auth::id()
                ];
                $res = $usersModel->insert($dataArray);
                if($res){
                    $logs->dataArray = [
                        "userid" => Auth::id(),
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
            ];
            $res = $gameModel->insert($dataArray);
        }else{
            // update
            $dataArray = [
                'title' => $request->input("title"),
                'date' => $request->input("date"),
                'bet_amount' => $request->input("amount"),
                'result' => $request->input("result"),
                'status' => $request->input("status")
            ];
            $res = $gameModel->updateGame($request->input("id"),$dataArray);
            if($request->input("result") != ""){
                $betsModel = new Bets();
                $prizesModel = new Prices();
                $dataArray = [
                    "gameid" => $request->input("id"),
                    "result" => $request->input("result")
                ];
                $winner = $betsModel->findWinner($dataArray);
                $updateWinner = $betsModel->updateBets($winner->id,["status" => 2]);
                $updateLosers = $betsModel->updateBets("",["status" => 1,"gameid" =>  $request->input("id")]);
                $updatePrize = $prizesModel->updatePrize( $request->input("id"),["winner" => $winner->id]);
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
                "firstquarter" => $request->input("firstq"),
                "secondquarter" => $request->input("secondq"),
                "thirdquarter" => $request->input("thirdq"),
                "fourthquarter" => $request->input("fourthq"),
                "grandprice" => $request->input("grandprize"),
                "addedby" => Auth::id()
            ];
            $res = $prizesModel->insert($dataArray);
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
}