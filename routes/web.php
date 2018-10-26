<?php
Route::match(array('GET','POST'),'/',function(){
    if (!isset($_SESSION)) session_start();
    if(isset($_POST["username"])){
        $_SESSION["username"] = $_POST["username"];
        return redirect()->action("HomeController@dashboard");
    }else{
        return redirect()->action("HomeController@dashboard");
    }
})->name('/');
Route::get('/logout','HomeController@doLogout');
Route::get('dashboard',[
    'uses' => 'HomeController@dashboard'
]
)->name('dashboard');
Route::get('/card/{id}','HomeController@getCardInfo');
Route::post('/checkBalance','HomeController@checkBalance');
Route::post('/submitBet','HomeController@submitBet');
Route::get('/bets','HomeController@getPlayerBets');
Route::get('/admin',function(){
    return view('home/login');
});
Route::post('login','HomeController@doLogin');
Route::get('/prize/{id}','HomeController@getPrizeInfo');





Route::group(['middleware' => ['auth']], function(){
    // Users
    // Route::get('/logout','HomeController@doLogout');
    // Route::get('/dashboard','HomeController@displayDashboard');
    // Route::get('/card/{id}','HomeController@getCardInfo');
    Route::post('/getBetsById','HomeController@getBetsById');
    // Route::post('/submitBet','HomeController@submitBet');
    // Users

    // Agent Routes
    Route::group(['prefix' => 'agent'], function(){
        Route::get('/dashboard','AgentController@displayDashboard');
        Route::get('/logout','AgentController@doLogout');
    });
    // Agent Routes

    // Admin Routes
    Route::group(['prefix' => 'admin'], function(){
        Route::get('/dashboard','AdminController@displayDashboard');
        Route::get('/logout',function(){
            return redirect()->to('admin');
        });
        Route::get('/users','AdminController@displayUsers');
        Route::post('/getAllUsers','AdminController@getAllUsers');
        Route::post('/getUserInfoById','AdminController@getUserInfoById');
        Route::post('/submitUser','AdminController@submitUser');
        Route::post('/submitGame','AdminController@submitGame');
        Route::post('/getGameInfo','AdminController@getGameInfo');
        Route::post('/getPrizesInfo','AdminController@getPrizesInfo');
        Route::post('/submitPrizes','AdminController@submitPrizes');
    });
    // Admin Routes
});