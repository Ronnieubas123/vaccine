<?php

namespace App\Http\Controllers;

use App\Models\Registerform;
use App\Models\Vaccine;
use App\Http\Resources\VaccineResource;
use App\Http\Resources\RegisterformResource;
use App\Http\Requests\StoreRegisterformRequest;
use App\Http\Requests\UpdateRegisterformRequest;
use App\Http\Requests\StoreRegisterformSearhRequest;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;


class RegisterformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // query all citizine that already vacinated
       $vaccinated = DB::table("registerform")
            ->select(
                "registerform.firstname as firstname",
                "registerform.middlename as middlename",
                "registerform.lastname as lastname",
                "vaccines.name as vaccine_type",
                "vaccines.dosage as dosage",
                "registerform.age as age",
                "registerform.sex as sex",
                "registerform.email as email",
                "registerform.phone as phone",
                "registerform.address_line_1 as address_line_1",
                "registerform.state as state",
                "registerform.city as city",
                "registerform.zipcode as zipcode",
                "registerform.vaccine_date as vaccine_date",
                "registerform.vaccine_location as vaccine_location",
                "registerform.pregnant as pregnant",
                "registerform.month as month",
                "registerform.days as days",
                "registerform.status as status",
                // "registerform.reference_id as reference_id"
                )
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")->get();
        return $vaccinated;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterformRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisterformRequest $request)
    {
        $registrationForm = Registerform::create($request->validated());
        return new RegisterformResource($registrationForm);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registerform  $registerform
     * @return \Illuminate\Http\Response
     */
    public function show(Registerform $registerform)
    {
        // return new RegisterformResource($registerform);
        // return "test";
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
        return VaccineResource::collection(Vaccine::orderBy('created_at', 'DESC')->paginate(10));
    }
   
    public function trackerRequest(Registerform $registerform)
    {

       if (!$registerform->reference_id) {
            return response("Reference ID not matched");
       }
       return new RegisterformResource($registerform);
        
    }
   
}