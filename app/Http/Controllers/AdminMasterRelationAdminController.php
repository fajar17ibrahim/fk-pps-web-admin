<?php

namespace App\Http\Controllers;

use Session;  
use App\Models\Ustadz;
use App\Models\School;
use App\Models\User;
use App\Mail\EMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AdminMasterRelationAdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $this->authorize('master-relation-admin');

        $user = Session::get('user');

        if ($user == null) {
            return redirect('login');
        }

        if ($user['akses'] == 1) {
            $ustadzs = Ustadz::get();
        } else {
            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->where('school.school_id', '=', $user['sekolah'])
                ->get();
        }
        $schools = School::orderBy('school_name', 'asc')->get();
        return view('admin.page.masterrelation.admin.index', compact('ustadzs'), compact('schools'));
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
        $this->authorize('master-relation-admin');
        
        $ustadz = Ustadz::leftJoin('users','ustadz.ustadz_email','=','users.email')
                ->where('users.role_id', '=', 2)
                ->where('users.user_school', '=', $id)
                ->first();

        if ($ustadz != null) {
            $data = array(
                'id' => $ustadz->ustadz_id,
                'email' => $ustadz->ustadz_email, 
                'name' => $ustadz->ustadz_name,
                'sekolah' => $id
            );
        } else {
            $data = array(
                'id' => '', 
                'email' => '', 
                'name' => '',
                'sekolah' => $id
            );
        }
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
            $this->authorize('master-relation-admin');
            $user = Session::get('user');

            $new = false;
            $userOld = User::where('user_school', '=', $id)->first();
            
            if ($userOld != null) {
                $userOld->role_id = '2';
                $userNew->user_school = ' ' . $request['inSchoolEdit'] . ' ';
                $updated = $userOld->update();
            } else {
                $new = true;
                $userNew = new User;
                $userNew->name = $request['inNameEdit'];
                $userNew->email = $request['inEmailEdit'];
                $userNew->status = 'Aktif';
                $userNew->user_school = ' ' . $request['inSchoolEdit'] . ' ';
                $userNew->role_id = '2';

                $random_password = Str::random(8);
                $userNew->password = Hash::make($random_password);
                $updated = $userNew->save();
            }

            $adminOld = $request['inEmailOldEdit'];
            $userOld = User::where('email', '=', $adminOld)->first();
            if ($userOld != null) {
                $ususerOlder->role_id = '0';
                $ususerOlder->update();
            }

            
            if ($updated) {
                if ($new) {
                    $details = [
                        'title' => 'Password Login',
                        'body' => 'Password Anda : ' . $random_password
                    ];

                    Mail::to($request['inEmailEdit'])->send(new EMail($details));
                }

                return redirect()->route('master-relation-admin.index')
                ->with('message_success', 'Admin berhasil diperbarui.');
            } else {
                return redirect()->route('master-relation-admin.index')
                ->with('message_error', 'Admin gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-relation-admin.index')
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

    public function listData() {

        $this->authorize('master-relation-admin');

        $user = Session::get('user');
        $admins = array();
        if ($user['akses'] == 1) {
            $schools = School::get();
            foreach ($schools as $school) {
                $ustadz = Ustadz::leftJoin('users','ustadz.ustadz_email','=','users.email')
                    ->where('users.role_id', '=', 2)
                    ->where('users.user_school', '=', $school->school_id)
                    ->where('ustadz_school', 'like', '% ' . $school->school_id . ' %')
                    ->first();

                $name = '';
                $id = '';
                if ($ustadz != null) {
                    $name = $ustadz->ustadz_name;
                    $id = $ustadz->id;
                }

                // return $ustadz;

                $admins[] = array(
                    'id' => $school->school_id,
                    'npsn' => $school->school_npsn,
                    'sekolah' => $school->school_name,
                    'level' => $school->school_level,
                    'admin_id' => $id,
                    'admin' => $name
                );
            }
        } else {            
            $schools = School::where('school_id', '=', $user['sekolah'])->get();
            foreach ($schools as $school) {
                $ustadz = Ustadz::leftJoin('users','ustadz.ustadz_email','=','users.email')
                    ->where('users.role_id', '=', 2)
                    ->where('ustadz_school', 'like', '% ' . $school->school_id . ' %')
                    ->first();  

                $name = '';
                if ($ustadz != null) {
                    $name = $ustadz->ustadz_name;
                }

                $admins[] = array(
                    'id' => $school->school_id,
                    'npsn' => $school->school_npsn,
                    'sekolah' => $school->school_name,
                    'level' => $school->school_level,
                    'admin_id' => $ustadz->id,
                    'admin' => $name
                );
            }
        }

        // return $admins;
        
        $no = 0;
        $data = array();
        foreach ($admins as $admin) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $admin['npsn'];
            $row[] = $admin['sekolah'];
            $row[] = $admin['level'];
            $row[] = $admin['admin'];
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $admin['id'] . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function search($email) { 

        $this->authorize('master-relation-admin');
        
        $user = Session::get('user');
        if ($user['akses'] == 1) {
            $ustadz = Ustadz::where('ustadz_email', '=', $email)->first();
        } else {
            $ustadz = Ustadz::where('ustadz.ustadz_school', 'like', '%' . $user['sekolah'] . ' %')
                ->where('ustadz_email', '=', $email)
                ->first();
        }

        $data = array(
            'name' => $ustadz->ustadz_name
        );

        return response()->json($data);
    }

}
