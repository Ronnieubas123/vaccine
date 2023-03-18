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
use Illuminate\Http\Request;


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
                "schedule.date as vaccine_date",
                "registerform.vaccine_location as vaccine_location",
                "registerform.pregnant as pregnant",
                "registerform.month as month",
                "registerform.days as days",
                "registerform.status as status",
                "registerform.id as id"
                // "registerform.reference_id as reference_id"
                )
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
            ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
            ->get();
        return $vaccinated;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterformRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisterformRequest $request, Registerform $registerform)
    {

        $data = $request->validated();

        if(isset($data['firstname']) && $data['middlename'] && $data['lastname'] && $data['first_vaccine_type']) {

            $firstname = $data['firstname'];
            $middlename = $data['middlename'];
            $lastname = $data['lastname'];
            $first_vaccine_type = $data['first_vaccine_type'];

            $registration = Registerform::where(
                [
                    ['firstname', '=', $firstname],
                    ['middlename', '=', $middlename],
                    ['lastname', '=', $lastname],
                    ['first_vaccine_type', '=', $first_vaccine_type],
                    ['status', '=', '0']
    
                ])->first();
            if ($registration === null) {
               $registrationForm = Registerform::create($request->validated());
                return response([
                   'data' => new RegisterformResource($registrationForm),
                   'success' => 'Success',
                ]);
            } else {
                return response([
                    'error' => 'You already registered the vaccine',
                ], 422);
            }
            
        }

        // $firstname = $registerform->firstname;
        // $middlename = $registerform->middlename;
        // $lastname = $registerform->lastname;
        // $first_vaccine_type = $registerform->first_vaccine_type;

        
        
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
        $referenceId = $registerform->reference_id;
        
        $vaccineDB = DB::table('registerform')->where('reference_id', $referenceId)->first();
         $firstname = $vaccineDB->firstname;
         $middlename = $vaccineDB->middlename;
         $lastname = $vaccineDB->lastname;

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
                "registerform.dof as dof",
                "registerform.reference_id as reference_id"
                )
                ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
                ->where(
                    [
                        ['firstname','=', $firstname],
                        ['middlename','=',$middlename], 
                        ['lastname','=',$lastname]
                    ])->get();

                    return $vaccinated;
        //  return RegisterformResource::collection(Registerform::orderBy('created_at', 'ASC')
        //  ->where(
        //     [
        //         ['firstname','=',$firstname], 
        //         ['middlename','=',$middlename], 
        //         ['lastname','=',$lastname]
        //         ])->get());
    }
    public function filterRegisterform(Registerform $registerform, Request $request) 
    {
        //  $barangay = $registerform->vaccine_location;
        // return RegisterformResource::collection(Registerform::orderBy('created_at', 'DESC')->paginate(10));
        $vaccinated = DB::table("registerform")
            ->select(
                "registerform.firstname as firstname",
                "registerform.middlename as middlename",
                "registerform.lastname as lastname",
                "vaccines.name as vaccine_type",
                "registerform.first_vaccine_type as vaccine_id",
                "vaccines.dosage as dosage",
                "registerform.age as age",
                "registerform.sex as sex",
                "registerform.email as email",
                "registerform.phone as phone",
                "registerform.address_line_1 as address_line_1",
                "registerform.state as state",
                "registerform.city as city",
                "registerform.zipcode as zipcode",
                "schedule.date as vaccine_date",
                "registerform.vaccine_date as date_id",
                "registerform.vaccine_location as vaccine_location",
                "registerform.pregnant as pregnant",
                "registerform.month as month",
                "registerform.days as days",
                "registerform.status as status",
                "registerform.id as id"
                // "registerform.reference_id as reference_id"
                )
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
            ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
            ->get();
        return $vaccinated;
    }
    // public function filterDate(Registerform $registerform) 
    // {
    //     $date = $registerform->vaccine_date;
    //     return RegisterformResource::collection(Registerform::orderBy('created_at', 'DESC')->where('vaccine_date', $date)->paginate(10));
    // }
    // public function filterVaccine(Vaccine $vaccine) 
    // {
    //     $vaccine = $vaccine->name;
    //     $vaccineDB = DB::table('vaccines')->where('name', $vaccine)->first();
    //     $vaccineId = $vaccineDB->id;

    //     $filterVaccineTb = DB::table('registerform')
    //     ->select(
    //         "registerform.firstname as firstname",
    //         "registerform.middlename as middlename",
    //         "registerform.lastname as lastname",
    //         "vaccines.name as vaccine_type",
    //         "vaccines.dosage as dosage",
    //         "registerform.age as age",
    //         "registerform.sex as sex",
    //         "registerform.email as email",
    //         "registerform.phone as phone",
    //         "registerform.address_line_1 as address_line_1",
    //         "registerform.state as state",
    //         "registerform.city as city",
    //         "registerform.zipcode as zipcode",
    //         "registerform.vaccine_date as vaccine_date",
    //         "registerform.vaccine_location as vaccine_location",
    //         "registerform.pregnant as pregnant",
    //         "registerform.month as month",
    //         "registerform.days as days",
    //         "registerform.status as status",
    //         // "registerform.reference_id as reference_id"
    //         )
    //         ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
    //         ->where('interested_vaccine', $vaccineId)->get();
    //     return $filterVaccineTb;
    // }   

    public function message(Registerform $registerform) 
    {
        $date = $registerform->vaccine_date;
        // RegisterformResource::collection(Registerform::orderBy('created_at', 'DESC')->where('vaccine_date', $date)->paginate(10));

        // $vaccine = DB::table('registerform')->where('vaccine_date', $date)->first();
        // $phone = $message->phone;

       

        $registerTbl = DB::table('registerform')->where('vaccine_date', $date)->get();

      
 
        foreach ($registerTbl as $register) {
            $phone = $register->phone;

            $basic  = new \Vonage\Client\Credentials\Basic("89baf1f0", "xqV8d6ZGrjVEw0OA");
            $client = new \Vonage\Client($basic);
            $response = $client->sms()->send(
             new \Vonage\SMS\Message\SMS($phone, 'Vaccination Reminder', '"Reminder" Please take your vaccination today.')
            );
        
            $message = $response->current();
                
            if ($message->getStatus() == 0) {
                return "The message was sent successfully\n";
            } else {
                return "The message failed with status: " . $message->getStatus() . "\n";
            }

           
        }
        
    }

    public function completeStatus(Registerform $registerform) {
        $id = $registerform->id;
        DB::table('registerform')
                ->where('id', $id)
                ->update(['status' => 1]);

    }
    
}