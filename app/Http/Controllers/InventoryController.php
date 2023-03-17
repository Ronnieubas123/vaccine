<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Http\Resources\InventoryResource;
use App\Models\Logistic;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InventoryResource::collection(Inventory::orderBy('created_at', 'DESC')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryRequest $request)
    {
        $inventory = Inventory::create($request->validated());
        return new InventoryResource($inventory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return new InventoryResource($inventory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryRequest  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->validated());
        return new InventoryResource($inventory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
    public function vaccineUsed() {
        $inventory = DB::table('inventory')
                ->select(
                    'inventory.logistic_id as logistic_id', 
                    'logistics.vaccine_name as vaccinename',
                    DB::raw('SUM(used) as used')
                )
                ->groupBy('logistic_id','vaccinename')
                ->join("logistics", "inventory.logistic_id", "=", "logistics.id")
                ->get();
        return $inventory;
    }
    public function vaccineLeft() {
        $logistic = DB::table('logistics')->get();
         $logistic;

        $inventory = DB::table('inventory')
            ->select(
                'inventory.logistic_id as logistic_id', 
                'logistics.vaccine_name as vaccinename',
                DB::raw('SUM(used) as used')
            )
            ->groupBy('logistic_id','vaccinename')
            ->join("logistics", "inventory.logistic_id", "=", "logistics.id")->get();
             $inventory;

            return response([
                'logistic' => $logistic,
                'inventory' => $inventory
            ]);
        
    }
    public function history() {
        $inventory = DB::table('inventory')
                ->select(
                    'inventory.logistic_id as logistic_id', 
                    'logistics.vaccine_name as vaccine_name',
                    'inventory.created_at as created_at',
                    'inventory.used as used',
                    'inventory.id as id'
                )
                ->join("logistics", "inventory.logistic_id", "=", "logistics.id")
                ->orderBy('created_at', 'DESC')
                ->get();
        return $inventory;
    }
}
