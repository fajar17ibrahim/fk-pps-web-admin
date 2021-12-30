<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Ustadz;

class AdminMasterRelationClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Session::get('user');

        $kelass = array();
        if ($user[0]->role_id == 1) {
            $kelassCheck = Kelas::leftJoin('school', 'school.school_id', '=', 'kelas.class_school')
                ->orderBy('class_id', 'asc')
                ->get();

            foreach($kelassCheck as $kelas) {
                $data = array(
                    'id' => $kelas->class_id,
                    'name' =>  $kelas->school_name . ' - ' . $kelas->class_name,
                );
    
                $kelass[] = $data;
            }

            $ustadzsCheck = Ustadz::orderBy('ustadz_name', 'asc')->get();
            
        } else {
            $kelassCheck = Kelas::orderBy('class_id', 'asc')
                ->where('class_school', '=', $user[0]->ustadz_school)
                ->get();

            foreach($kelassCheck as $kelas) {
                $data = array(
                    'id' => $kelas->class_id,
                    'name' => $kelas->class_name,
                );

                $kelass[] = $data;
            }

            $ustadzsCheck = Ustadz::orderBy('ustadz_name', 'asc')
                ->where('ustadz_school', '=', $user[0]->ustadz_school)
                ->get();
        }

        $ustadzs = array();
        foreach($ustadzsCheck as $ustadz) {
            $data = array(
                'nik' => $ustadz->ustadz_nik,
                'name' =>  $ustadz->ustadz_name . ' - ' . $ustadz->ustadz_nik,
            );

            $ustadzs[] = $data;
        }
        
        $schools = School::orderBy('school_name', 'asc')->get();
        return view('admin.page.masterrelation.class.index', compact('schools'), compact('kelass'))
            ->with('ustadzs', $ustadzs);
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
        
        $kelas = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
        ->find($id);

        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $name = $kelas->school_name . ' - ' . $kelas->class_name;
        } else {
            $name = $kelas->class_name;
        }

        $data = array(
            'id' => $kelas->class_id, 
            'name' => $name,
            'wali' => $kelas->homeroom_teacher);
        return json_encode($data);
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
        $kelas = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
        ->find($id);
        $data = array(
            'id' => $kelas->class_id, 
            'wali' => $kelas->homeroom_teacher);
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
            $kelas = Kelas::find($id);
            $kelas->homeroom_teacher = $request['soHomeroomTeacher'];
            $updated = $kelas->update();
    
            if ($updated) {
                return redirect()->route('master-relation-class.index')
                ->with('message_success', 'Wali Kelas berhasil diperbarui.');
            } else {
                return redirect()->route('master-relation-class.index')
                ->with('message_error', 'Wali Kelas gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-relation-class.index')
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

    public function listData($level, $school) {
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            if ($level != 0 && $school != 0) {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0) {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
                ->where('kelas.class_level', '=', $level)
                ->get();
            } else if ($level == 0 && $school != 0) {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
                ->get();
            }
        } else {
            $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
            ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
            ->where('kelas.class_level', '=', $user[0]->school_level)
            ->where('school.school_id', '=', $user[0]->ustadz_school)
            ->get();
            
        }

        $no = 0;
        $data = array();
        foreach ($kelass as $kelas) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $kelas->class_id;
            $row[] = $kelas->class_name;
            $row[] = $kelas->class_level;
            $row[] = $kelas->school_name;
            $row[] = $kelas->ustadz_name;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $kelas->class_id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
