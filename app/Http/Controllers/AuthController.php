<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{   
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
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
        $id = $user->id;
        DB::table('citizen')->insert([
            'user_id' => $id,
            'DOF' => 'None',
            'sex' => 'None',
            'age' => 'None',
            'indigenous' => 'None',
            'region' => 'None',
            'province' => 'None',
            'city_municipality' => 'None',
            'barangay' => 'None',
            'photo' => 'None',
            'pregnant' => 'None',
            'months' => 'None'
        ]);
        /** @var \App\Models\MyUserModel $user **/
        $token = $user->createToken('main')->plainTextToken;
        $userType = $user->type; 
        $userID = $user->id; 

        return response([
            'user' => $user,
            'token' => $token,
            'type' => $userType,
            'id' => $userID
        ]);
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }
        /** @var \App\Models\MyUserModel $user **/
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        $userType = auth()->user()->type; 
        $userID = auth()->user()->id; 

        return response([
            'user' => $user,
            'token' => $token,
            'type' => $userType,
            'id' => $userID
        ]);
    }
    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();
        // Revoke the token that was used to authenticate the current request...
        $user->currentAccessToken()->delete();

        return response([
            'success' => true
        ]);
    }
}