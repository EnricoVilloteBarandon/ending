<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Theme;
use Auth;
use Redirect;
class AgentController extends Controller
{
    public function displayDashboard(){
        Theme::uses('agent')->setTitle('Agent Dashboard');
        return Theme::view('agent/index');
    }
    public function doLogout(){
        Auth::logout();
        return Redirect::to('login'); 
    }
}
