<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Votec1Controller;
use App\Http\Controllers\Votec2Controller;
use App\Http\Controllers\Bulletin_nullController;
use App\Http\Controllers\DefaultController;


    Route::get('/', function () {
    return view('welcome');
});


    Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
});


    Route::middleware(['checkUserId:5'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
});


    Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/results', function () {
      return view('results');
    });
    Route::get('/home', function () {
        return view('home');
      });

      Route::get('/voter', function () {
          return view('voter');
        });

    Route::get('/votec1', [Votec1Controller::class, 'votec1'])->name('votec1');
    Route::post('/votec1', [Votec1Controller::class, 'votePost'])->name('votec1');


    Route::get('/votec2', [Votec2Controller::class, 'votec2'])->name('votec2');
    Route::post('/votec2', [Votec2Controller::class, 'votePost'])->name('votec2');

    Route::get('/bulletin_null', [Bulletin_nullController::class, 'bulletin_null'])->name('bulettin_null');
    Route::post('/bulletin_null', [Bulletin_nullController::class, 'null_votePost'])->name('null_vote');


    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});


//Route::get('/listes', [Votec1Controller::class, 'show'])
//->middleware('checkUserId:5');

//Route::get('/listc2', [Votec2Controller::class, 'show'])
//->middleware('checkUserId:5');

//Route::get('/listes', [Bulletin_nullController::class, 'show'])
//->middleware('checkUserId:5');


Route::get('/listes', [DefaultController::class, 'showResults'])
->middleware('checkUserId:5');


