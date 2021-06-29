<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
class ApiController extends Controller
{
 
    public function apiRegister()
    {
     
        return view('welcome');
    }

    

    public function apiLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" =>  "required",
            "password" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user = User::where([['email', $request->email]])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
       // $token = $user->createToken('my-app-token')->plainTextToken;
        //$user->device_token = $request->device_token;
        $user->save();

        $response = [
            'user' => $user,
            //'token' => $token
        ];

        return response($response, 201);
    }


    public function apiRegisterPost(Request $request) 
    {
        

        $inputs = $request->all();
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['roleStatus'] = $request->roleStatus;
        $inputs['latitude'] = $request->latitude;
        $inputs['longitude'] = $request->longitude;
        $inputs['current_location_addressline'] = $request->current_location_addressline;
        $inputs["password"] = Hash::make($request->password);

        $users  =  User::create($inputs);
        $status = "OK"; 

        if(!is_null($users) && $status == "OK") {
            return response()->json(['status' => $status, "message" => "Registration Success!"], Response::HTTP_ACCEPTED);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Registration failed!"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function apiRegisterGet(Request $request)
    {
        $location_text = "The IP address {$request->ipinfo->ip}.";
        $allinfo=$request->ipinfo->all;
        $users = User::all();
        return response()->json([
            'users' => $users,
            'location_text' => $location_text,
            'allinfo' => $allinfo,

        ], Response::HTTP_ACCEPTED);
    }


    
}
