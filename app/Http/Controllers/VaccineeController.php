<?php

namespace App\Http\Controllers;

use App\Models\Vaccinee;
use App\Http\Requests\StoreVaccineeRequest;
use App\Http\Requests\UpdateVaccineeRequest;

class VaccineeController extends Controller
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
     * @param  \App\Http\Requests\StoreVaccineeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVaccineeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccinee  $vaccinee
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccinee $vaccinee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVaccineeRequest  $request
     * @param  \App\Models\Vaccinee  $vaccinee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVaccineeRequest $request, Vaccinee $vaccinee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccinee  $vaccinee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccinee $vaccinee)
    {
        //
    }
}
