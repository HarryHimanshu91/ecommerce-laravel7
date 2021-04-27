<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;



class UserController extends Controller
{

    public $successStatus = 200;

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */

    public function register(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                // dd($validator->errors());
                // $errors = $validator->errors()->all();
                // dd($errors);
                $error = $validator->errors()->all()[0];
                // dd($error);
                return response()->json(['status' => 'false', 'message' => $error, 'data' => []], 422);
            } else {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                return response()->json(['status' => 'true', 'message' => 'User created successfully', 'data' => []]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'data' => []], 500);
        }
    }



    /** 
     * User Profile Details
     * 
     * @return \Illuminate\Http\Response 
     */
   

    public function getUserProfile(Request $request)
    {
        try {
            $user_id = $request->user()->id;
            $user = User::find($user_id);
            return response()->json(['status'=>'true','message'=>'User Profile','data'=>$user ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'data' => []], 500);
        }
    }

    /** 
     * User Login Api 
     * 
     * @return \Illuminate\Http\Response 
     */


    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'data' => []], 422);
            } else {
                $user = User::where('email', $request->email)->first();
                if ($user) {
                    if (Hash::check($request->password, $user->password)) {
                        $success['token'] =  $user->createToken('MyApp')->accessToken;
                        return response()->json(['status' => 'true', 'message' => 'Logged In Successfully', 'success' => $success]);
                    } else {
                        return response()->json(['status' => 'false', 'message' => 'Invalid Password', 'data' => []]);
                    }
                } else {
                    return response()->json(['status' => 'false', 'message' => 'Email does not exist', 'data' => []]);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'data' => []], 500);
        }
    }



    /**
     * Logout user api
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
