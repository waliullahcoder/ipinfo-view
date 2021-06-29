<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\dashboardAcceptedBidsResource;
use App\Http\Resources\dashboardPassengerRequestResource;
use App\Http\Resources\PassengerRequest;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Response;

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
Route::post('user-login',[ApiController::class, 'apiLogin']);

Route::get('user-register',[ApiController::class, 'apiRegister']);

Route::get('user-list',[ApiController::class, 'apiRegisterGet']);
Route::post('user-signup',[ApiController::class, 'apiRegisterPost']);

//Permission
Route::get('permission',[ApiController::class, 'permissionGet']);
Route::post('permission-post',[ApiController::class, 'permissionPost']);
Route::post('permission-update',[ApiController::class, 'permissionUpdate']);
//Permission

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});
