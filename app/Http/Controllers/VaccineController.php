<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Http\Requests\StoreVaccineRequest;
use App\Http\Requests\UpdateVaccineRequest;
use App\Http\Resources\VaccineResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return VaccineResource::collection(Vaccine::orderBy('created_at', 'DESC')->paginate(10));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVaccineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVaccineRequest $request)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $relativePath = $this->saveImage($data['image']);
            $data['image'] = $relativePath;
        }

        $vaccine = Vaccine::create($data);
        return new VaccineResource($vaccine);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine, Request $request)
    {
        return new VaccineResource($vaccine);
        // $vaccine = $request->vaccine();
        // return new VaccineResource($vaccine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVaccineRequest  $request
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVaccineRequest $request, Vaccine $vaccine)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $relativePath = $this->saveImage($data['image']);
            $data['image'] = $relativePath;

            //If there is an image exist delete it

            if ($vaccine->image) {
                $absolutePath = public_path($vaccine->image);
                File::delete($absolutePath);
            }
        }

        $vaccine->update($data);
        return new VaccineResource($vaccine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();

        // If there is an old image, delete it
        if ($vaccine->image) {
            $absolutePath = public_path($vaccine->image);
            File::delete($absolutePath);
        }

        return response('', 204);
    }

    private function saveImage($image) 
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
            $image = substr($image, strpos($image, ',') + 1);

            $type = strtolower($type[1]);

            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('invalid image type');
            }

            $image = str_replace(' ', '+', $image);
            $image = base64_decode($image);

            if($image === false) {
                throw new \Exception('base64_decode failed');
            }

        } else {
            throw new \Exception('did not match data URI with image data');
        }

        $dir = 'images/';
        $file = Str::random(). '.' .$type;
        $absolutePath = public_path($dir);
        $relativePath = $dir . $file;

        if (!File::exists($absolutePath)) {
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
    }
    function getVaccineType() {
        $vaccineType = DB::table('vaccines')
            ->select('type')
            ->groupBy('type')
            ->get();
            return $vaccineType;
    }
    function getVaccineTypeName() {
        return VaccineResource::collection(Vaccine::orderBy('created_at', 'DESC')->paginate(10));
    }
    function allVaccineReport() {
        return VaccineResource::collection(Vaccine::orderBy('created_at', 'DESC')->paginate(10));
    }
    function getAllVaccineForReports () {
        return VaccineResource::collection(Vaccine::orderBy('created_at', 'DESC')->paginate(10));
    }
    function vaccineRecord(Request $request) {
        $vaccineId = $request->vaccineId;
        
        $vaccineDescription = DB::table('vaccines')
            ->select(
                "vaccines.description as description"
            )
            ->where("vaccines.id","=",$vaccineId)
            ->get();
        return  response([
            'data' => $vaccineDescription
        ]);
    }
   

}
