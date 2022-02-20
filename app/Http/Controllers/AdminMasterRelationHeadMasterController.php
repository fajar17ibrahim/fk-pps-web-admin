<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;  
use App\Models\Ustadz;
use App\Models\School;
use App\Models\User;

class AdminMasterRelationHeadMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //

        $this->authorize('master-relation-headmaster');

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
        return view('admin.page.masterrelation.headmaster.index', compact('ustadzs'), compact('schools'));
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

        $this->authorize('master-relation-headmaster');

        $ustadz = Ustadz::leftJoin('school','ustadz.ustadz_nik','=','school.school_headship')
                ->where('school.school_id', '=', $id)
                ->first();

                // return $ustadz;

        if ($ustadz != null) {
            $data = array(
                'nik' => $ustadz->ustadz_nik, 
                'name' => $ustadz->ustadz_name);
        } else {
            $data = array(
                'nik' => '', 
                'name' => '');
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

            $this->authorize('master-relation-headmaster');

            $school = School::find($id);
            $school->school_headship = $request['inNIKEdit'];
            $updated = $school->update();
            
        
            if ($updated) {
                return redirect()->route('master-relation-headmaster.index')
                ->with('message_success', 'Kepsek berhasil diperbarui.');
            } else {
                return redirect()->route('master-relation-headmaster.index')
                ->with('message_error', 'Kepsek gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-relation-headmaster.index')
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

        $this->authorize('master-relation-headmaster');

        $user = Session::get('user');
        if ($user['akses'] == 1) {
            $schools = School::leftJoin('ustadz','ustadz.ustadz_nik','=','school.school_headship')
                ->get();
        } else {
            $schools = School::leftJoin('ustadz','ustadz.ustadz_nik','=','school.school_headship')
                ->where('school.school_level', '=', $user['level'])
                ->where('school.school_id', '=', $user['sekolah'])
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
                            <a href="#" onclick="editForm(' . $school->school_id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function search($nik) { 
        $this->authorize('master-relation-headmaster');

        $user = Session::get('user');
        if ($user['akses'] == 1) {
            $ustadz = Ustadz::where('ustadz_nik', '=', $nik)->first();
        } else {
            $ustadz = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->where('school.school_id', '=', $user['sekolah'])
                ->where('ustadz_nik', '=', $nik)
                ->first();
        }

        $data = array(
            'name' => $ustadz->ustadz_name);

        return response()->json($data);
    }
}
