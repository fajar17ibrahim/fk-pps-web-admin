<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ustadz;
use App\Models\Role;
use App\Mail\EMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ustadzs = Ustadz::get();
        $rolesCheck = Role::get();
        $roles = array();
        foreach ($rolesCheck as $role) {
            if ($role->id > 1) {
                $data = array(
                    'role_id' => $role->id,
                    'name' => roleName($role->role_name)
                );
                
                $roles[] = $data;
            }
        }

        // return $roles;
        return view('admin.page.user.index', compact('ustadzs'), compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            //
            $user = Session::get('user');   
            if ($user[0]->role_id != 1) {
                $emailCheck = Ustadz::where('ustadz_email', '=', $request['inEmail'])
                        ->where('ustadz_school', '=', $user[0]->ustadz_school)
                        ->first();
            } else {
                $emailCheck = Ustadz::where('ustadz_email', '=', $request['inEmail'])
                        ->first();
            }

            if ($emailCheck != null) {
                $user = new User;
                $user->name = $emailCheck->ustadz_name;
                $user->email = $request['inEmail'];
                $user->role_id = $request['soRole'];
                $user->status = $request['soStatus'];
                $random_password = Str::random(8);
                $user->password = Hash::make($random_password);
                $save = $user->save();
                
                if ($save) {
                    $details = [
                        'title' => 'Password Login',
                        'body' => 'Password Anda : ' . $random_password
                    ];

                    Mail::to($request['inEmail'])->send(new EMail($details));

                    return redirect()->route('user.index')
                    ->with('message_success', 'User berhasil disimpan.');
                } else {
                    return redirect()->route('user.index')
                    ->with('message_error', 'User gagal disimpan.');
                }
            } else {
                return redirect()->route('user.index')
                    ->with('message_error', 'Email tidak ditemukan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('user.index')
            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $data = array(
            'id' => $user->id, 
            'name' => $user->name,
            'level' => $user->role_id,
            'email' => $user->email,
            'status' => $user->status);
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            //
            $user = User::find($id);
            $user->role_id = $request['soRoleEdit'];
            $user->status = $request['soStatusEdit'];
            $updated = $user->update();
            
            if ($updated) {
                return redirect()->route('user.index')
                ->with('message_success', 'User berhasil diperbarui.');
            } else {
                return redirect()->route('user.index')
                ->with('message_error', 'User gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('user.index')
            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search($email) {
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $ustadz = Ustadz::where('ustadz.ustadz_email', '=', $email)->get();
        } else {
            $ustadz = Ustadz::where('ustadz.ustadz_email', '=', $email)
                ->where('ustadz.ustadz_school', '=', $user[0]->ustadz_school)
                ->get();
        }
        return response()->json($ustadz);
    }

    public function listData() {
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $users = User::leftJoin('role', 'users.role_id', '=', 'role.id')
            ->leftJoin('ustadz', 'ustadz.ustadz_email', '=', 'users.email')
            ->select('role_name', 'name', 'email', 'users.id', 'users.status')
            ->get();
        } else {
            $users = User::leftJoin('role', 'users.role_id', '=', 'role.id')
            ->leftJoin('ustadz', 'ustadz.ustadz_email', '=', 'users.email')
            ->where('ustadz.ustadz_school', '=', $user[0]->ustadz_school)
            ->select('role_name', 'name', 'email', 'users.id', 'users.status')
            ->get();
        }
        
        $no = 0;
        $data = array();
        foreach ($users as $userData) {
            $label = "text-danger";
            if ($userData->status == "Aktif") {
                $label = "text-success";
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $userData->id;
            $row[] = $userData->name;
            $row[] = $userData->email;
            $row[] = roleName($userData->role_name);
            $row[] = '<div class="d-flex align-items-center ' . $label . '">	
                        <i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                        <span>' . $userData->status . '</span>
                    </div>';
            if ($user[0]->role_id == 1 || $user[0]->role_id == 2) {
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $userData->id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            }
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
