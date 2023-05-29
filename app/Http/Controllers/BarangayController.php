<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Http\Requests\StoreBarangayRequest;
use App\Http\Requests\UpdateBarangayRequest;
use App\Http\Resources\BarangayResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return BarangayResource::collection(Barangay::orderBy('created_at', 'DESC')->where('status', '1')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangayRequest $request)
    {
        $barangay = Barangay::create($request->validated());
        return new BarangayResource($barangay);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function show(Barangay $barangay)
    {
        return new BarangayResource($barangay);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangayRequest  $request
     * @param  \App\Models\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangayRequest $request, Barangay $barangay)
    {
        $barangay->update($request->validated());
        return new BarangayResource($barangay);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barangay $barangay)
    {

        $barangay = Barangay::find($barangay['id']);
        $barangay->status = '0';
        $barangay->update();
        
    }
    public function allBarangysRegisterform() {
        return BarangayResource::collection(Barangay::orderBy('created_at', 'ASC')->get());
    }
    public function allBarangaysReport() {
        return BarangayResource::collection(Barangay::orderBy('created_at', 'ASC')->get());
    }
    public function getAllBarangayForReports() {
        return BarangayResource::collection(Barangay::orderBy('created_at', 'ASC')->get());
    }
    public function getBarangayOptionAddUser() {
        return BarangayResource::collection(Barangay::orderBy('created_at', 'ASC')->get());
    }
    public function getAllBarangaySchedule(Request $request) {
        $userId = $request->userId;
        $user = DB::table('users')->where('id', $userId)->first();
        $barangayId = $user->barangay_id;
        $userType = $user->type;

        if ($userType == 'Bhw') {
            return BarangayResource::collection(Barangay::orderBy('created_at', 'ASC')->where('id', $barangayId)->get());
        } else if($userType == 'Admin') {
            return BarangayResource::collection(Barangay::orderBy('created_at', 'ASC')->get());
        }


    }
    
}
