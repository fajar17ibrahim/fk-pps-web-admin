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
        $user = Session::get('user');
        $ustadzsCheck = Ustadz::orderBy('ustadz_name', 'asc')->get();

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
                ->where('class_level', '=', $user[0]->school_level)
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
        $mapels = Mapel::orderBy('mapel_name', 'asc')->get();
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

            $mapel = $request['soMapel'];
            $kelas = $request['soKelas'];
            $ustadz = $request['soUstadz'];
            $mapelTeacherCheck = MapelTeacher::where('mapel_id', '=', $mapel)
                ->where('class_id', '=', $kelas)
                ->where('ustadz_nik', '=', $ustadz)
                ->first();

            $ustadzCheck = Ustadz::where('ustadz_nik', '=', $ustadz)
                ->first();

            $ustadzCheck->ustadz_class = $kelas;
            $update = $ustadzCheck->update();

            if ($mapelTeacherCheck && $update) {
                $mapelTeacher = $mapelTeacherCheck;
            } else {
                $mapelTeacher = new MapelTeacher;
            }

            $mapelTeacher->mapel_id = $mapel;
            $mapelTeacher->class_id = $kelas;
            $mapelTeacher->ustadz_nik = $ustadz;

            if ($mapelTeacherCheck) {
                $saved = $mapelTeacher->update();
            } else {
                $saved = $mapelTeacher->save();
            }
    
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

            $ustadzCheck = Ustadz::where('ustadz_nik', '=', $request['soUstadzEdit'])
                ->first();

            $ustadzCheck->ustadz_class = $request['soKelasEdit'];
            $updateUstadz = $ustadzCheck->update();
    
            if ($updated && $updateUstadz) {
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
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_school', '=', $school)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level != 0 && $school != 0 && $kelas == 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas != 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas != 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_school', '=', $school)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level == 0 && $school == 0 && $kelas != 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas == 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas == 0) {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->where('kelas.class_level', '=', $level)
                ->get();
            } else {
                $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
                ->get();
            }
        } else {
            $mapelTeachers = MapelTeacher::leftJoin('mapel','mapel.mapel_id','=','mapel_teacher.mapel_id')
                ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')    
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('ustadz','ustadz.ustadz_nik','=','mapel_teacher.ustadz_nik')
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
