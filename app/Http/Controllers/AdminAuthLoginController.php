<?php

namespace App\Http\Controllers;

use JWTAuth;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Ustadz;
use App\Models\MapelTeacher;
use App\Models\Kelas;
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
            $aksess = array();

            $ustadz = Ustadz::leftJoin('users', 'users.email', '=', 'ustadz.ustadz_email')
                ->leftJoin('role', 'role.id', '=', 'users.role_id')
                ->where('ustadz_email' , '=', $user->email)
                ->first();

            $schoolUstadzs = explode(" ", $ustadz->user_school);
            foreach ($schoolUstadzs as $schoolUstadzId) {
                $schoolUstadz = School::where('school_id' , '=', $schoolUstadzId)
                    ->first();

                if ($schoolUstadz != null) {
                    $akses = "2";
                    $aksesNama = "Admin";
                    if ($ustadz->role_id == 1 && count($aksess) == 0) {
                        $akses = "1";
                        $aksesNama = "CEO";
                    }

                    $data = array(
                        'id' => $ustadz->ustadz_id,
                        'sekolah' => $schoolUstadz->school_id,
                        'kelas' => '0',
                        'nama' => $schoolUstadz->school_level,
                        'akses' => $akses,
                        'akses_nama' => $aksesNama
                    );

                    $aksess[] = $data;
                }
            }

            // return $aksess;
            
            $mapelTeachers = MapelTeacher::leftJoin('kelas', 'mapel_teacher.class_id', '=', 'kelas.class_id')
                ->groupBy('kelas.class_id')
                ->where('ustadz_nik', '=', $ustadz->ustadz_nik)
                ->get();

            foreach ($mapelTeachers as $mapelTeacher) {
                $data = array(
                    'id' => $ustadz->ustadz_id,
                    'sekolah' => $mapelTeacher->class_school,
                    'kelas' => $mapelTeacher->class_id,
                    'nama' => $mapelTeacher->class_name,
                    'akses' => '4',
                    'akses_nama' => 'Guru'
                );

                $aksess[] = $data; 
            }

            $kelass = Kelas::where('homeroom_teacher', '=', $ustadz->ustadz_nik)
                ->get();

            foreach ($kelass as $kelas) {
                $data = array(
                    'id' => $ustadz->ustadz_id,
                    'sekolah' => $kelas->class_school,
                    'kelas' => $kelas->class_id,
                    'nama' => $kelas->class_name,
                    'akses' => '3',
                    'akses_nama' => 'Wali Kelas'
                );

                $aksess[] = $data;
            }

            // return $aksess;


            if ($ustadz->status == "Nonactive") {
                Session::flash('error', 'Akun anda tidak Aktif');
                return redirect('login');
            }
            
            if (count($aksess) == 0 ) {
                Session::flash('error', 'Akun tidak terdafar');
                return redirect('login');
            } else if (count($aksess) == 1 ) {
                
                $id = $aksess[0]['id'];
                $sekolah = $aksess[0]['sekolah'];
                $kelas = $aksess[0]['kelas'];
                $akses = $aksess[0]['akses'];
                return $this->akses($id, $sekolah, $kelas, $akses);
            } else {
                Session::flash('success', $aksess);
                return redirect('login');
            }
        }

        Session::flash('error', 'Email atau password salah');
        return redirect('login');
    }

    public function akses($id, $school, $kelas, $akses) 
    {
        $ustadz = Ustadz::find($id);
        $schoolData = School::find($school);

        $data = array(
            'id' => $ustadz->ustadz_id,
            'nik' => $ustadz->ustadz_nik,
            'nama' => $ustadz->ustadz_name,
            'photo' => $ustadz->ustadz_photo,
            'akses' => $akses,
            'sekolah' => $school,
            'sekolah_nama' => $schoolData->school_name,
            'level' => $schoolData->school_level,
            'kelas' => $kelas
        );

        // return $data;

        Session::put('user', $data);
        $user = User::where('email', '=', $ustadz->ustadz_email)->first();
        $user->login_date = tanggal('now');
        $user->update();

        return redirect('/');

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
