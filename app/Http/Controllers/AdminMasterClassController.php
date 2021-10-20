<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;

class AdminMasterClassController extends Controller
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
        $kelass = Kelas::orderBy('class_name', 'asc')->get();
        return view('admin.page.master.class.index', compact('schools'), compact('kelass'));
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
            $kelas = new Kelas;
            $kelas->class_name = $request['inName'];
            $kelas->class_level = $request['soLevel'];
            $kelas->class_school = $request['soSchool'];
            $save = $kelas->save();
    
            if ($save) {
                return redirect()->route('master-class.index')
                ->with('message_success', 'Kelas berhasil disimpan.');
            } else {
                return redirect()->route('master-class.index')
                ->with('message_error', 'Kelas gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-class.index')
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
        $kelas = Kelas::leftJoin('school','kelas.class_school','=','school.school_npsn')
        ->find($id);
        $data = array(
            'id' => $kelas->class_id, 
            'name' => $kelas->class_name,
            'level' => $kelas->class_level);
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
        $kelas = Kelas::leftJoin('school','kelas.class_school','=','school.school_npsn')
        ->find($id);
        $data = array(
            'id' => $kelas->class_id, 
            'name' => $kelas->class_name,
            'level' => $kelas->class_level,
            'school' => $kelas->class_school);
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
            $kelas->class_name = $request['inNameEdit'];
            $kelas->class_level = $request['soLevelEdit'];
            $kelas->class_school = $request['soSchoolEdit'];
            $updated = $kelas->update();
    
            if ($updated) {
                return redirect()->route('master-class.index')
                ->with('message_success', 'Kelas berhasil diperbarui.');
            } else {
                return redirect()->route('master-class.index')
                ->with('message_error', 'Kelas gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-kelas.index')
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
        if ($level != 0 && $school != 0) {
            $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('kelas.class_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0) {
            $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0) {
            $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_school', '=', $school)
            ->get();
        } else {
            $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_npsn')
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
