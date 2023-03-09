<?php
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/current-user', function() {
        return auth()->user();
    });
    Route::resource('/vaccine', \App\Http\Controllers\VaccineController::class);
    Route::resource('/barangay', \App\Http\Controllers\BarangayController::class);
    Route::resource('/getvaccine-registration', \App\Http\Controllers\RegisterformController::class);
    Route::resource('/announcement', \App\Http\Controllers\AnnouncementController::class);
    Route::get('/vaccine-type', [\App\Http\Controllers\VaccineController::class, 'getVaccineType']);
    Route::get('/vaccine-type-name', [\App\Http\Controllers\VaccineController::class, 'getVaccineTypeName']);
    Route::resource('/logistic', \App\Http\Controllers\LogisticController::class);
    Route::resource('/schedule', \App\Http\Controllers\ScheduleController::class);
    Route::get('/complete-status/{registerform:id}', [\App\Http\Controllers\RegisterformController::class, 'completeStatus']);
    
   
    
    
    
    
});
Route::get('/citizine-get-sched', [\App\Http\Controllers\ScheduleController::class, 'citizineGetSched']);
Route::resource('/users', \App\Http\Controllers\UserController::class);

Route::resource('/announcement', \App\Http\Controllers\AnnouncementController::class);

Route::resource('/vaccine-registration', \App\Http\Controllers\RegisterformController::class);

Route::get('/getVaccineForRegistration', [\App\Http\Controllers\RegisterformController::class, 'getvaccine']);
Route::get('/track-request/{registerform:reference_id}', [\App\Http\Controllers\RegisterformController::class, 'trackerRequest']);
Route::get('/filter-barangay/{registerform:vaccine_location}', [\App\Http\Controllers\RegisterformController::class, 'filterByBarangay']);
Route::get('/filter-date/{registerform:vaccine_date}', [\App\Http\Controllers\RegisterformController::class, 'filterDate']);
Route::get('/filter-vaccine/{vaccine:name}', [\App\Http\Controllers\RegisterformController::class, 'filterVaccine']);
Route::get('/message/{registerform:vaccine_date}', [\App\Http\Controllers\RegisterformController::class, 'message']);






Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);    
