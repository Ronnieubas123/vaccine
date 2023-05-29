<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::orderBy('id', 'DESC')
            ->where([
                ['type','!=','Admin'],
                ['type','!=', 'Citizen']
            ])->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
            'type' => 'required|string',
            'barangay_id' => 'required|int'
        ]);

        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
            'barangay_id' => $data['barangay_id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response('', 204);
    }
    public function citizineInfo (User $user, Request $request) {
        // $id = auth()->user()->id;
        $id = $request->citizenId;
        $citizen = DB::table('users')
            ->select(
                'users.name as name',
                'users.email as email',
                'users.id as id',
                "citizen.DOF as dof",
                "citizen.sex as sex",
                "citizen.age as age",
                "citizen.indigenous as indigenous",
                "citizen.region as region",
                "citizen.province as province",
                "citizen.city_municipality as city_municipality",
                "citizen.barangay as barangay",
                "citizen.photo as photo",
                "citizen.pregnant as pregnant",
                "citizen.months as months"
            )
            ->where('users.id','=',$id) 
            ->join('citizen','users.id','=','citizen.user_id')  
            ->get();  
        
        $citizenPhoto = DB::table('citizen')->where('user_id', $id)->first();
        $photo = $citizenPhoto->photo;
        
           
        return response ([
            'data' => $citizen,
            'photo' => URL::to($photo)
        ]);
    }
    public function updateCitizenInfo(User $user) {
        $id = $user->id;
        $url = URL::current();
        $citizen = DB::table('users')
            ->select(
                'users.name as name',
                'users.email as email',
                'users.id as id',
                "citizen.DOF as dof",
                "citizen.sex as sex",
                "citizen.age as age",
                "citizen.indigenous as indigenous",
                "citizen.region as region",
                "citizen.province as province",
                "citizen.city_municipality as city_municipality",
                "citizen.barangay as barangay", 
                "citizen.photo as image_url",
                "citizen.pregnant as pregnant",
                "citizen.months as months"
            )
            ->where('users.id','=',$id) 
            ->join('citizen','users.id','=','citizen.user_id')  
            ->get();    
            return response ([
                'data' => $citizen
            ]);
    }
    public function updateCitizen(Request $request) {
        $citezenId = $request->id;
        $name = $request->name;
        $email = $request->email;

        $dof = $request->dof;
        $sex = $request->sex;
        $age = $request->age;
        $indigenous = $request->indigenous;
        $region = $request->region;
        $province = $request->province;
        $city_municipality = $request->city_municipality;
        $barangay = $request->barangay;
        $photo = $request->image;
        $pregnant = $request->pregnant;
        $months = $request->months;

        if ($photo) {
            $relativePath = $this->saveImage($photo);
            $photo = $relativePath;

                // if ($photo) {
                //     $absolutePath = public_path($photo);
                //     File::delete($absolutePath);
                // }
        }

        
        $usersTable= DB::table('users')
                ->where('id', $citezenId)
                ->update([
                    'name' => $name,
                    'email' => $email
                ]);
        
        if ($photo == '') {
            $citicenTable = DB::table('citizen')
            ->where('user_id', $citezenId)
            ->update([
                'DOF' => $dof,
                'sex' => $sex,
                'age' => $age,
                'indigenous' => $indigenous,
                'region' => $region,
                'province' => $province,
                'city_municipality' => $city_municipality,
                'barangay' => $barangay,
                'pregnant' => $pregnant,
                'months' => $months
            ]);
        }
        else {
            $citicenTable = DB::table('citizen')
            ->where('user_id', $citezenId)
            ->update([
                'DOF' => $dof,
                'sex' => $sex,
                'age' => $age,
                'indigenous' => $indigenous,
                'region' => $region,
                'province' => $province,
                'city_municipality' => $city_municipality,
                'barangay' => $barangay,
                'photo' => $photo,
                'pregnant' => $pregnant,
                'months' => $months
            ]);
        }
       
          
    }
    private function saveImage($image) {
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
    public function checkCitizenStatus(Request $request) {
        $citizenId = $request->citizenId;

        $citizen = DB::table('citizen')
            ->where([
                ['user_id','=', $citizenId],
                ['DOF','!=','None'],
                ['sex','!=','None'],
                ['indigenous','!=','None'],
                ['region','!=','None'],
                ['province','!=','None'],
                ['city_municipality','!=','None'],
                ['barangay','!=','None'],
                ['photo','!=','None'],
            ])
            ->count();

        return response([
            'data' => $citizen
        ]);
    }
}
