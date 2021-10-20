<?php

namespace App\Http\Controllers;

use JWTAuth;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminAuthLoginController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.auth.login');
    }

    public function login(Request $request) 
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                Session::flash('error', 'Email atau password salah');
                return redirect()->route('login');
                // return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            Session::flash('error', 'Internal Server Error');
            return redirect()->route('login');
            // return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // return $token;
        // $token = JWTAuth::setAuthenticationHeader($token);
        // Session::flash('token', $token);
        // $response = Http::withToken($token)->get('127.0.0.1:8000/user-request');

        Session::flash('token', $token);
        return redirect()->route('user');
        // return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'status' => $request->get('status'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'), 201);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }


}
