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
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\FrontMatter\Data\FrontMatterDataParserInterface;

class RegisterformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $citizenRegistered = DB::table('registerform')
            ->select
            (
                "users.name as name",
                "citizen.age as age",
                "citizen.sex as sex",
                "citizen.region as region",
                "citizen.province as province",
                "citizen.city_municipality as city_municipality",
                "citizen.barangay as barangay",
                "citizen.photo as photo",
                "registerform.citizen_id as citizen_id",
                "registerform.status as status",
                "citizen.pregnant as pregnant",
                "citizen.months as months"

            )
            ->groupBy('registerform.citizen_id','users.name','citizen.age','citizen.sex','citizen.region','citizen.province','citizen.city_municipality','citizen.barangay','citizen.photo','registerform.status','citizen.pregnant','citizen.months')
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
            ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
            ->join("users", "registerform.citizen_id","=","users.id")
            ->join("citizen", "registerform.citizen_id","=","citizen.user_id")
            ->where("registerform.status","=","1")
            ->get();
        return $citizenRegistered;
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
        $citizenId = $data['citizen_id'];
        $first_vaccine_type = $data['first_vaccine_type'];

        $registration = Registerform::where(
            [
                ['citizen_id', '=', $citizenId],
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
                "registerform.dose as dose",
                "registerform.age as age",
                "registerform.sex as sex",
                "registerform.email as email",
                "registerform.phone as phone",
                "registerform.address_line_1 as address_line_1",
                "registerform.state as state",
                "registerform.city as city",
                "registerform.zipcode as zipcode",
                DB::raw("DATE_FORMAT(schedule.date, '%b %d, %Y') as vaccine_date"),
                "registerform.vaccine_location as vaccine_location",
                "registerform.pregnant as pregnant",
                "registerform.month as month",
                "registerform.days as days",
                "registerform.status as status",
                "registerform.dof as dof",
                "registerform.reference_id as reference_id"
                )
                ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
                ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
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
                "registerform.dose as dose",
                "registerform.age as age",
                "registerform.sex as sex",
                "registerform.email as email",
                "registerform.phone as phone",
                "registerform.address_line_1 as address_line_1",
                "registerform.state as state",
                "registerform.city as city",
                "registerform.zipcode as zipcode",
                DB::raw("DATE_FORMAT(schedule.date, '%b %d, %Y') as vaccine_date"),
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
        $userId = Auth::user()->id;
        $id = $registerform->id;
        DB::table('registerform')
                ->where('id', $id)
                ->update([
                    'status' => 1,
                    'user_id' => $userId
                ]);

    }
    public function filterReports(Request $request) {
        $fromdate = $request->input('fromdate');
        $todate = $request->input('todate');
        $barangay = $request->input('barangay');
        $vaccine = $request->input('vaccine');

        if($fromdate == '' || $todate == '') {
            return response([
                'error' => 'Please make sure that the From date or To date filter has value'
            ], 422);
        } else if($fromdate != '' && $todate != '' && $barangay == '' && $vaccine == ''  ) {
            $filterReport = DB::table("registerform")
                ->select(
                    "users.name as name",
                    "vaccines.name as vaccine_type",
                    "registerform.first_vaccine_type as vaccine_id",
                    "registerform.dose as dose",
                    "citizen.age as age",
                    "citizen.sex as sex",
                    "users.email as email",
                    "citizen.region as region",
                    "citizen.province as province",
                    "citizen.city_municipality as city_municipality",
                    DB::raw("DATE_FORMAT(schedule.date, '%b %d, %Y') as vaccine_date"),
                    "registerform.vaccine_date as date_id",
                    "registerform.vaccine_location as vaccine_location",
                    "registerform.pregnant as pregnant",
                    "registerform.month as month",
                    "registerform.days as days",
                    "registerform.status as status",
                    "registerform.id as id"
                    )
                ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
                ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
                ->join("users","registerform.citizen_id","=","users.id")
                ->join("citizen","registerform.citizen_id","=","citizen.user_id")
                ->whereBetween('schedule.date', [$fromdate, $todate])
                ->where('registerform.status','=','1')
                ->get();
            return $filterReport;

        } else if($fromdate != '' && $todate != '' && $barangay != '' && $vaccine == '' ) {

            $filterReport = DB::table("registerform")
                ->select(
                    "users.name as name",
                    "vaccines.name as vaccine_type",
                    "registerform.first_vaccine_type as vaccine_id",
                    "registerform.dose as dose",
                    "citizen.age as age",
                    "citizen.sex as sex",
                    "users.email as email",
                    "citizen.region as region",
                    "citizen.province as province",
                    "citizen.city_municipality as city_municipality",
                    DB::raw("DATE_FORMAT(schedule.date, '%b %d, %Y') as vaccine_date"),
                    "registerform.vaccine_date as date_id",
                    "registerform.vaccine_location as vaccine_location",
                    "registerform.pregnant as pregnant",
                    "registerform.month as month",
                    "registerform.days as days",
                    "registerform.status as status",
                    "registerform.id as id"
                    )
                ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
                ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
                ->join("users","registerform.citizen_id","=","users.id")
                ->join("citizen","registerform.citizen_id","=","citizen.user_id")
                ->whereBetween('schedule.date', [$fromdate, $todate])
                ->where([
                    ['vaccine_location','=', $barangay],
                    ['registerform.status','=','1']
                ])
                ->get();
            return $filterReport;

        } else if($fromdate != '' && $todate != '' && $vaccine != '' && $barangay == '' ) {
            $filterReport = DB::table("registerform")
            ->select(
                "users.name as name",
                "vaccines.name as vaccine_type",
                "registerform.first_vaccine_type as vaccine_id",
                "registerform.dose as dose",
                "citizen.age as age",
                "citizen.sex as sex",
                "users.email as email",
                "citizen.region as region",
                "citizen.province as province",
                "citizen.city_municipality as city_municipality",
                DB::raw("DATE_FORMAT(schedule.date, '%b %d, %Y') as vaccine_date"),
                "registerform.vaccine_date as date_id",
                "registerform.vaccine_location as vaccine_location",
                "registerform.pregnant as pregnant",
                "registerform.month as month",
                "registerform.days as days",
                "registerform.status as status",
                "registerform.id as id"
                )
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
            ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
            ->join("users","registerform.citizen_id","=","users.id")
            ->join("citizen","registerform.citizen_id","=","citizen.user_id")
            ->whereBetween('schedule.date', [$fromdate, $todate])
            ->where([
                ['vaccines.name','=', $vaccine],
                ['registerform.status','=','1']
            ])
            ->get();
        return $filterReport;
        } else if($fromdate != '' && $todate != '' && $barangay != '' && $vaccine != '' ) {
            $filterReport = DB::table("registerform")
            ->select(
                "users.name as name",
                "vaccines.name as vaccine_type",
                "registerform.first_vaccine_type as vaccine_id",
                "registerform.dose as dose",
                "citizen.age as age",
                "citizen.sex as sex",
                "users.email as email",
                "citizen.region as region",
                "citizen.province as province",
                "citizen.city_municipality as city_municipality",
                DB::raw("DATE_FORMAT(schedule.date, '%b %d, %Y') as vaccine_date"),
                "registerform.vaccine_date as date_id",
                "registerform.vaccine_location as vaccine_location",
                "registerform.pregnant as pregnant",
                "registerform.month as month",
                "registerform.days as days",
                "registerform.status as status",
                "registerform.id as id"
                )
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
            ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
            ->join("users","registerform.citizen_id","=","users.id")
            ->join("citizen","registerform.citizen_id","=","citizen.user_id")
            ->whereBetween('schedule.date', [$fromdate, $todate])
            ->where([
                    ['vaccines.name','=', $vaccine],
                    ['vaccine_location','=', $barangay],
                    ['registerform.status','=','1']
                ])
            ->get();
        return $filterReport;
        }
    }
    public function vaccineRecord (Request $request) {
        $citizenId = $request->citizenId;

        $citizen = DB::table('registerform')
            ->select(
                'vaccines.name as vaccine',
                'schedule.date as date',
                'registerform.status as status',
                'registerform.id as id'
            )
            ->join('vaccines', 'registerform.first_vaccine_type', '=', 'vaccines.id')
            ->join('schedule', 'registerform.vaccine_date', '=', 'schedule.id')
            ->where('registerform.citizen_id','=', $citizenId)
            ->get();
        
        $modal = DB::table('registerform')
            ->select(
                'users.name as name',
                'vaccines.name as vaccine',
                'citizen.DOF as dof',
                'schedule.date as date',
                'registerform.id as id'

            )
            ->join('users','registerform.citizen_id','=','users.id')
            ->join('citizen','registerform.citizen_id','=','citizen.user_id')
            ->join('vaccines','registerform.first_vaccine_type','=','vaccines.id')
            ->join('schedule','registerform.vaccine_date','=','schedule.id')
            ->where('registerform.citizen_id','=',$citizenId)
            ->get();
        

        return response([
            'data' => $citizen ,
            'citizenRecordModal' => $modal
        ]); 
    }
    public function citizenVaccineRegisted(Request $request) {
        $citizenId = $request->citizenId;

        $citizen = DB::table('registerform')
            ->select(
                'users.name as name',
                'vaccines.name as vaccine',
                'schedule.date as date',
                'registerform.status as status',
                'registerform.id as id',
                'registerform.vaccine_location as vaccine_location'
            )
            ->join('users','registerform.citizen_id','=','users.id')
            ->join('citizen','registerform.citizen_id','=','citizen.user_id')
            ->join('vaccines','registerform.first_vaccine_type','=','vaccines.id')
            ->join('schedule','registerform.vaccine_date','=','schedule.id')
            ->where([
                ['registerform.citizen_id','=',$citizenId],
                ['registerform.status','=',0]
            ])
            ->get();
            return response([
                'data' => $citizen
            ]);
                
    }
    public function getAllVaccineeRegisterd(Request $request) {
        $userId = $request->userId;
        $user = DB::table('users')->where('id', $userId)->first();
        $userType = $user->type;
        $barangayId = $user->barangay_id;
       
        if ($userType == 'Bhw') {
            $barangay = DB::table('barangays')->where('id', $barangayId)->first();
            $barangayName = $barangay->barangay_name;
           
            $citizenRegistered = DB::table('registerform')
            ->select
            (
                "users.name as name",
                "citizen.age as age",
                "citizen.sex as sex",
                "citizen.region as region",
                "citizen.province as province",
                "citizen.city_municipality as city_municipality",
                "citizen.barangay as barangay",
                "citizen.photo as photo",
                "registerform.citizen_id as citizen_id",
                "registerform.status as status",
                "citizen.pregnant as pregnant",
                "citizen.months as months"

            )
            ->groupBy('registerform.citizen_id','users.name','citizen.age','citizen.sex','citizen.region','citizen.province','citizen.city_municipality','citizen.barangay','citizen.photo','registerform.status','citizen.pregnant','citizen.months')
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
            ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
            ->join("users", "registerform.citizen_id","=","users.id")
            ->join("citizen", "registerform.citizen_id","=","citizen.user_id")
            ->where([
                ["registerform.status","=","0"],
                ["registerform.vaccine_location","=",$barangayName]
            ])
            ->get();
        return $citizenRegistered;

        } else if ($userType == 'Admin') {
            $citizenRegistered = DB::table('registerform')
            ->select
            (
                "users.name as name",
                "citizen.age as age",
                "citizen.sex as sex",
                "citizen.region as region",
                "citizen.province as province",
                "citizen.city_municipality as city_municipality",
                "citizen.barangay as barangay",
                "citizen.photo as photo",
                "registerform.citizen_id as citizen_id",
                "registerform.status as status",
                "citizen.pregnant as pregnant",
                "citizen.months as months"

            )
            ->groupBy('registerform.citizen_id','users.name','citizen.age','citizen.sex','citizen.region','citizen.province','citizen.city_municipality','citizen.barangay','citizen.photo','registerform.status','citizen.pregnant','citizen.months')
            ->join("vaccines", "registerform.first_vaccine_type", "=", "vaccines.id")
            ->join("schedule", "registerform.vaccine_date", "=", "schedule.id")
            ->join("users", "registerform.citizen_id","=","users.id")
            ->join("citizen", "registerform.citizen_id","=","citizen.user_id")
            ->where("registerform.status","=","0")
            ->get();
        return $citizenRegistered;
        }
    }
    public function citizenVaccineeList(Request $request) {
        $citizenId = $request->citizenId;

        $citizen = DB::table('registerform')
            ->select(
                'users.name as name',
                'vaccines.name as vaccine',
                'schedule.date as date',
                'registerform.status as status',
                'registerform.id as id'
            )
            ->join('users','registerform.citizen_id','=','users.id')
            ->join('citizen','registerform.citizen_id','=','citizen.user_id')
            ->join('vaccines','registerform.first_vaccine_type','=','vaccines.id')
            ->join('schedule','registerform.vaccine_date','=','schedule.id')
            ->where([
                ['registerform.citizen_id','=',$citizenId],
                ['registerform.status','=',1]
            ])
            ->get();
            return response([
                'data' => $citizen
            ]);
    }
    
}