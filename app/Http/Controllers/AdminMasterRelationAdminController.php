<?php

namespace App\Http\Controllers;

use Session;  
use App\Models\Ustadz;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

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
        if ($user[0]->role_id == 1) {
            $ustadzs = Ustadz::get();
        } else {
            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->where('school.school_id', '=', $user[0]->ustadz_school)
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
        
        $ustadz = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->leftJoin('users','ustadz.ustadz_email','=','users.email')
                ->where('users.role_id', '=', 2)
                ->where('users.id', '=', $id)
                ->first();
        $data = array(
            'email' => $ustadz->ustadz_email, 
            'name' => $ustadz->ustadz_name);
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

            $user = User::find($id);
            $user->email = $request['inEmailEdit'];
            $updated = $user->update();
            
        
            if ($updated) {
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
        if ($user[0]->role_id == 1) {
            $schools = School::leftJoin('ustadz','ustadz.ustadz_school','=','school.school_id')
                ->leftJoin('users','ustadz.ustadz_email','=','users.email')
                ->where('users.role_id', '=', 2)
                ->get();
        } else {
            $schools = School::leftJoin('ustadz','ustadz.ustadz_school','=','school.school_id')
                ->leftJoin('users','ustadz.ustadz_email','=','users.email')
                ->where('users.role_id', '=', 2)
                ->where('school.school_level', '=', $user[0]->class_level)
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->get();
        }
        
        $no = 0;
        $data = array();
        foreach ($schools as $school) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $school->school_npsn;
            $row[] = $school->school_name;
            $row[] = $school->school_level;
            $row[] = $school->ustadz_name;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $school->id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
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
        if ($user[0]->role_id == 1) {
            $ustadz = Ustadz::where('ustadz_email', '=', $email)->first();
        } else {
            $ustadz = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->where('ustadz_email', '=', $email)
                ->first();
        }

        $data = array(
            'name' => $ustadz->ustadz_name);

        return response()->json($data);
    }

}
