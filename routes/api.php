<?php

use App\Http\Controllers\Api\LeagueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('leagues/{league}', [LeagueController::class, 'show'])->name('api.v1.leagues.show');
Route::get('leagues', [LeagueController::class, 'index'])->name('api.v1.leagues.index');
Route::post('leagues', [LeagueController::class, 'create'])->name('api.v1.leagues.create');

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
