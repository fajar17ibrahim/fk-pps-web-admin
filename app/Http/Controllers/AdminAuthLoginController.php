<?php

namespace App\Http\Controllers;

use JWTAuth;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Ustadz;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $ustadz = Ustadz::leftJoin('users', 'users.email', '=', 'ustadz.ustadz_email')
            ->leftJoin('role', 'role.id', '=', 'users.role_id')
            ->leftJoin('school', 'school.school_npsn', '=', 'ustadz.ustadz_school')
            ->leftJoin('kelas', 'kelas.class_id', '=', 'ustadz.ustadz_class')
            ->where('ustadz_email' , '=', $user->email)
                ->get();
            Session::put('user', $ustadz);
            Session::put('pkpps', $ustadz[0]->school_name);
            $user->login_date = tanggal('now');
            $user->update();
            if ($user->role == '1') {
                
                return redirect('/');
                // return redirect()->intended('admin');
            } else if ($user->level == '2') {
                return redirect()->intended('guru');
            }
            return redirect('/');
        }
        Session::flash('error', 'Email atau password salah');
        return redirect('login');
    }

    public function updateUser(Request $request, User $user) 
    {
        
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
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

    
}
