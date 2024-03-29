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
    Route::get('/get-all-vaccinee-registerd', [\App\Http\Controllers\RegisterformController::class, 'getAllVaccineeRegisterd']);
    Route::resource('/announcement', \App\Http\Controllers\AnnouncementController::class);
    Route::get('/vaccine-type', [\App\Http\Controllers\VaccineController::class, 'getVaccineType']);
    Route::get('/vaccine-type-name', [\App\Http\Controllers\VaccineController::class, 'getVaccineTypeName']);
    Route::resource('/logistic', \App\Http\Controllers\LogisticController::class);
    Route::resource('/schedule', \App\Http\Controllers\ScheduleController::class);
    Route::get('/complete-status/{registerform:id}', [\App\Http\Controllers\RegisterformController::class, 'completeStatus']);
    Route::get('/get-all-barangays-reports', [\App\Http\Controllers\BarangayController::class, 'allBarangaysReport']);
    Route::get('/get-all-schedule-reports', [\App\Http\Controllers\ScheduleController::class, 'allScheduleReport']);
    Route::get('/get-all-vaccine-reports', [\App\Http\Controllers\VaccineController::class, 'allVaccineReport']);
    Route::get('/get-logistic-vaccine-used', [\App\Http\Controllers\LogisticController::class, 'vaccineUsedGetLogistic']);
    Route::get('/get-logistic-inventory', [\App\Http\Controllers\LogisticController::class, 'logisticInventory']);
   
    Route::resource('/inventory', \App\Http\Controllers\InventoryController::class);
    Route::get('/get-all-vaccine-left', [\App\Http\Controllers\InventoryController::class, 'vaccineLeft']);
    Route::get('/get-all-vaccine-used', [\App\Http\Controllers\InventoryController::class, 'vaccineUsed']);
    Route::get('/get-all-history', [\App\Http\Controllers\InventoryController::class, 'history']);
    Route::get('/get-all-schedule', [\App\Http\Controllers\InventoryController::class, 'getSchedule']);
    Route::get('/get-all-schedule', [\App\Http\Controllers\InventoryController::class, 'getSchedule']);
    Route::get('/get-all-barangay-reports', [\App\Http\Controllers\BarangayController::class, 'getAllBarangayForReports']);
    Route::get('/get-all-vaccine-reports', [\App\Http\Controllers\VaccineController::class, 'getAllVaccineForReports']);
    // Route::get('/get-citizine-info', [\App\Http\Controllers\UserController::class, 'citizineInfo']);
    Route::get('/update-citizen-info/{user:id}', [\App\Http\Controllers\UserController::class, 'updateCitizenInfo']);
    Route::post('/update-citizen', [\App\Http\Controllers\UserController::class, 'updateCitizen']);
    Route::get('/citizen-vaccine-registed', [\App\Http\Controllers\RegisterformController::class, 'citizenVaccineRegisted']);
    Route::get('/get-barangay-option-add-users', [\App\Http\Controllers\BarangayController::class, 'getBarangayOptionAddUser']);
    Route::get('/get-all-barangays-schedule', [\App\Http\Controllers\BarangayController::class, 'getAllBarangaySchedule']);
    Route::get('/citizen-vaccinee-list', [\App\Http\Controllers\RegisterformController::class, 'citizenVaccineeList']);
    
    
});
Route::get('/get-citizine-info', [\App\Http\Controllers\UserController::class, 'citizineInfo']);

Route::get('/get-all-barangays', [\App\Http\Controllers\BarangayController::class, 'allBarangysRegisterform']);
Route::get('/citizine-get-sched', [\App\Http\Controllers\ScheduleController::class, 'citizineGetSched']);
Route::resource('/users', \App\Http\Controllers\UserController::class);

Route::resource('/announcement', \App\Http\Controllers\AnnouncementController::class);

Route::resource('/vaccine-registration', \App\Http\Controllers\RegisterformController::class);

Route::get('/getVaccineForRegistration', [\App\Http\Controllers\RegisterformController::class, 'getvaccine']);
Route::get('/track-request/{registerform:reference_id}', [\App\Http\Controllers\RegisterformController::class, 'trackerRequest']);
Route::get('/filter-registerform', [\App\Http\Controllers\RegisterformController::class, 'filterRegisterform']);
Route::get('/filter-date/{registerform:vaccine_date}', [\App\Http\Controllers\RegisterformController::class, 'filterDate']);
Route::get('/filter-vaccine/{vaccine:name}', [\App\Http\Controllers\RegisterformController::class, 'filterVaccine']);
Route::get('/message/{registerform:vaccine_date}', [\App\Http\Controllers\RegisterformController::class, 'message']);
Route::get('/filter-reports', [\App\Http\Controllers\RegisterformController::class, 'filterReports']);
Route::get('/vaccine-record', [\App\Http\Controllers\RegisterformController::class, 'vaccineRecord']);
Route::get('/vaccine-description', [\App\Http\Controllers\VaccineController::class, 'vaccineRecord']);
Route::get('/check-citizen-status', [\App\Http\Controllers\UserController::class, 'checkCitizenStatus']);
Route::get('/get-barangay-location-list', [\App\Http\Controllers\ScheduleController::class, 'getBarangayLocationList']);









Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);    
