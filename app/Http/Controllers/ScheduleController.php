<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\BarangayResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = DB::table('schedule')
            ->select(
                'schedule.date as date',
                'barangays.barangay_name as barangay',
                'schedule.id as schedule_id'
            )
            ->join('barangays','schedule.barangay_id','=','barangays.id')
            ->orderBy('date', 'DESC')
            ->get();
        
            return response([
                'data' => $schedule
            ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {
        $date = $request->date;
        $barangayId = $request->barangay_id;
        if (DB::table('schedule')
            ->where([
                ['date','=',$date],
                ['barangay_id','=',$barangayId]
            ])
            ->exists()) {
            return response([
                'error' => 'Schedule is already added'
            ]);
        } else {
            $sched = Schedule::create($request->validated());
             return new ScheduleResource($sched);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return new ScheduleResource($schedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduleRequest  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {

        $date = $schedule->name;
        $schedule->update($request->validated());
        return new ScheduleResource($schedule);

            $basic  = new \Vonage\Client\Credentials\Basic("a1acc7b1", "elyw3KZkKD8R0Nre");
            $client = new \Vonage\Client($basic);
            $response = $client->sms()->send(
             new \Vonage\SMS\Message\SMS("639302040221", "Vaccination Reminder", 'Your vaccine schedule will be on'.''.$date)
            );
        
            $message = $response->current();
                
            if ($message->getStatus() == 0) {
                return "The message was sent successfully\n";   
            } else {
                return "The message failed with status: " . $message->getStatus() . "\n";
            }

        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
    public function citizineGetSched() {
        return ScheduleResource::collection(Schedule::orderBy('created_at', 'DESC')->paginate(10));
    }
    public function allScheduleReport() {
        return ScheduleResource::collection(Schedule::orderBy('created_at', 'DESC')->paginate(10));
    }
    public function getBarangayLocationList(Request $request) {
        $barangayName = $request->barangayName;

        $barangay = DB::table('barangays')->where('barangay_name', $barangayName)->first();

        $barangayId = $barangay->id;
        
        
        $schedule = DB::table('schedule')
            ->select(
                'schedule.date as date',
                'schedule.id as id'
            )
            ->orderBy('date','DESC')
            ->where('schedule.barangay_id','=', $barangayId)
            ->get();
        
        return response([
            'data' => $schedule
        ]);
    }
    
}
