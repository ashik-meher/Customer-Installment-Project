<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Validator;

use Laravel\Passport\Passport\HasApiTokens;



class ApiUserController extends Controller
{
    //

    public $successStatus = 200;


    public function register(Request $request)
    {




        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };



        $input = $request->all();

        $input['password'] = bcrypt($input['password']);


        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->accessToken;

        $success['name'] = $user->name;


        return response()->json(['success' => $success], $this->successStatus);
    }


    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            /** @var \App\Models\User $user **/
            $user = Auth::user();

            $success['token'] = $user->createToken('LoginToken')->accessToken;


            return response()->json(['user' => $user, 'success' => $success], 200);
        }

        return response()->json(['msg' => 'May be you are a hacker, hmm....'], 401);
    }


    // Details

    public function details()
    {

        $user = Auth::user();

        if ($user == null) {
            return [
                'Warning' => 'No User'
            ];
        };



        return response()->json(['success' => $user], $this->successStatus);
    }
}
