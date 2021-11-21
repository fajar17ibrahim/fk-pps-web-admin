<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Ustadz;
use App\Models\MapelTeacher;
use App\Models\Mapel;

class AdminMasterRelationMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schools = School::orderBy('school_name', 'asc')->get();
        $mapels = Mapel::orderBy('mapel_name', 'asc')->get();
        $kelass = Kelas::orderBy('class_name', 'asc')->get();
        $ustadzs = Ustadz::orderBy('ustadz_name', 'asc')->get();
        return view('admin.page.masterrelation.mapel.index', compact('mapels'), compact('kelass'))
        ->with('schools', $schools)
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
        try {
            //
            $mapelTeacher = new MapelTeacher;
            $mapelTeacher->mapel_id = $request['soMapel'];
            $mapelTeacher->class_id = $request['soKelas'];
            $mapelTeacher->ustadz_nik = $request['soUstadz'];
            $saved = $mapelTeacher->save();
    
            if ($saved) {
                return redirect()->route('master-relation-mapel.index')
                ->with('message_success', 'Guru Mapel berhasil disimpan.');
            } else {
                return redirect()->route('master-relation-mapel.index')
                ->with('message_error', 'Guru Mapel gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-relation-mapel.index')
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

        $mapelTeacher = MapelTeacher::find($id);
        $data = array(
            'id' => $mapelTeacher->class_id, 
            'mapel' => $mapelTeacher->mapel_id,
            'kelas' => $mapelTeacher->class_id,
            'teacher' => $mapelTeacher->ustadz_nik);
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
            $mapelTeacher = MapelTeacher::find($id);
            $mapelTeacher->mapel_id = $request['soMapelEdit'];
            $mapelTeacher->class_id = $request['soKelasEdit'];
            $mapelTeacher->ustadz_nik = $request['soUstadzEdit'];
            $updated = $mapelTeacher->update();
    
            if ($updated) {
                return redirect()->route('master-relation-mapel.index')
                ->with('message_success', 'Guru Mapel berhasil diperbarui.');
            } else {
                return redirect()->route('master-relation-mapel.index')
                ->with('message_error', 'Guru Mapel gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-relation-mapel.index')
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

    public function listData($level, $school, $kelas) {
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            if ($level != 0 && $school != 0 && $kelas != 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_school', '=', $school)
                ->where('kelas.class_id', '=', $class)
                ->get();
            } else if ($level != 0 && $school != 0 && $kelas == 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas != 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_id', '=', $class)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas != 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_school', '=', $school)
                ->where('kelas.class_id', '=', $class)
                ->get();
            } else if ($level == 0 && $school == 0 && $kelas != 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_id', '=', $class)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas == 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas == 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->get();
            } else {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->get();
            }
        } else {
            $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $user[0]->class_level)
                ->where('kelas.class_school', '=', $user[0]->ustadz_school)
                ->get();
        }
        
        $no = 0;
        $data = array();
        foreach ($mapelTeachers as $mapelTeacher) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $mapelTeacher->mapel_teacher_id;
            $row[] = $mapelTeacher->mapel_name;
            $row[] = $mapelTeacher->class_name;
            $row[] = $mapelTeacher->school_name;
            $row[] = $mapelTeacher->ustadz_name;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $mapelTeacher->mapel_teacher_id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
