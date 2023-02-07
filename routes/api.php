<?php
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {    
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request){
        return $request->user();
    });
    Route::resource('/vaccine', \App\Http\Controllers\VaccineController::class);
    Route::resource('/barangay', \App\Http\Controllers\BarangayController::class);
    
    
});
Route::resource('/vaccine-registration', \App\Http\Controllers\RegisterformController::class);
Route::get('/getVaccineForRegistration', [\App\Http\Controllers\RegisterformController::class, 'getvaccine']);




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);    
