<?php

namespace App\Http\Controllers;

use App\Models\Registerform;
use App\Models\Vaccine;
use App\Http\Resources\VaccineResource;
use App\Http\Requests\StoreRegisterformRequest;
use App\Http\Requests\UpdateRegisterformRequest;

class RegisterformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterformRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisterformRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registerform  $registerform
     * @return \Illuminate\Http\Response
     */
    public function show(Registerform $registerform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegisterformRequest  $request
     * @param  \App\Models\Registerform  $registerform
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisterformRequest $request, Registerform $registerform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registerform  $registerform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registerform $registerform)
    {
        //
    }

    public function getvaccine(Vaccine $vaccine) {
        var_dump("test");
        return VaccineResource::collection(Vaccine::orderBy('created_at', 'DESC')->paginate(10));
    }
}
