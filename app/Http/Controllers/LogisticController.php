<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use App\Http\Requests\StoreLogisticRequest;
use App\Http\Requests\UpdateLogisticRequest;
use App\Http\Resources\LogisticResource;

class LogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LogisticResource::collection(Logistic::orderBy('created_at', 'DESC')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogisticRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLogisticRequest $request)
    {
        $logistic = Logistic::create($request->validated());
        return new LogisticResource($logistic);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function show(Logistic $logistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogisticRequest  $request
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogisticRequest $request, Logistic $logistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logistic $logistic)
    {
        //
    }
    public function vaccineUsedGetLogistic() {
        return LogisticResource::collection(Logistic::orderBy('created_at', 'DESC')->paginate(10));
    }
    public function logisticInventory() {
        return LogisticResource::collection(Logistic::orderBy('created_at', 'DESC')->paginate(10));
    }
}
