<?php

use App\Http\Controllers\FixtureController;
use App\Http\Controllers\FixtureStatusController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberShipTypeController;
use App\Http\Controllers\OpponentController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(FixtureController::class)->group(function(){
    Route::get('/fixture','index');
    Route::get('/fixture/{id}','show');
    Route::post('/fixture','store');
    Route::post('/fixture/{id}','update');
    Route::delete('/fixture/{id}','destroy');
});

Route::controller(FixtureStatusController::class)->group(function(){
    Route::get('/fix/status','index');
    Route::get('/fix/status/{id}','show');
    Route::post('/fix/status','store');
    Route::post('/fix/status/{id}','update');
    Route::delete('/fix/status/{id}','destroy');
});

Route::controller(LeagueController::class)->group(function(){
    Route::get('/league','index');
    Route::get('/league/{id}','show');
    Route::post('/league','store');
    Route::post('/league/{id}','update');
    Route::delete('/league/{id}','destroy');
});

Route::controller(MemberController::class)->group(function(){
    Route::get('/members','index');
    Route::get('/members/{id}','show');
    Route::post('/members','store');
    Route::post('/members/{id}','update');
    Route::delete('/members/{id}','destroy');
});

Route::controller(MemberShipTypeController::class)->group(function(){
    Route::get('/member/types','index');
    Route::get('/member/types/{id}','show');
    Route::post('/member/types','store');
    Route::post('/member/types/{id}','update');
    Route::delete('/member/types/{id}','destroy');
});

Route::controller(OpponentController::class)->group(function(){
    Route::get('/opponent','index');
    Route::get('/opponent/{id}','show');
    Route::post('/opponent','store');
    Route::post('/opponent/{id}','update');
    Route::delete('/opponent/{id}','destroy');
});

Route::controller(SportController::class)->group(function(){
    Route::get('/sports','index');
    Route::get('/sports/{id}','show');
    Route::post('/sports','store');
    Route::post('/sports/{id}','update');
    Route::delete('/sports/{id}','destroy');
});

Route::controller(TeamController::class)->group(function(){
    Route::get('/team','index');
    Route::get('/team/{id}','show');
    Route::post('/team','store');
    Route::post('/team/{id}','update');
    Route::delete('/team/{id}','destroy');
});
