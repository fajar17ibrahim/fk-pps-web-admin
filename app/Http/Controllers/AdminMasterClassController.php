<?php

namespace App\Http\Controllers;

use Session;
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
        $this->authorize('master-class');
        $user = Session::get('user');

        if ($user == null) {
            return redirect('login');
        }
        
        if ($user['akses'] == 1) {
            $schoolsData = School::orderBy('school_name', 'asc')->get();
            $schools = array();
            foreach($schoolsData as $school) {
                $data = array(
                    'id' => $school->school_id,
                    'pps_nama' => $school->school_name . ' (' . $school->school_level . ')'
                );

                $schools[] = $data;
            }
        } else {
            $schoolsData = School::orderBy('school_name', 'asc')
            ->where('school.school_id', '=', $user['sekolah'])
            ->get();

            $schools = array();
            foreach($schoolsData as $school) {
                $data = array(
                    'id' => $school->school_id,
                    'pps_nama' => $school->school_name . ' (' . $school->school_level . ')'
                );

                $schools[] = $data;
            }

        }
        return view('admin.page.master.class.index', compact('schools'));
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
            $this->authorize('master-class');

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
        $this->authorize('master-class');

        $kelas = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
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
        $this->authorize('master-class');

        $kelas = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
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
            $this->authorize('master-class');

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
        $user = Session::get('user');
        if ($user['akses'] == 1) {
            if ($level != 0 && $school != 0) {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0) {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->get();
            } else if ($level == 0 && $school != 0) {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('kelas.class_school', '=', $school)
                ->get();
            } else {
                $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
                ->get();
            }
        } else {
            $kelass = Kelas::leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('school.school_id', '=', $user['sekolah'])
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
            $row[] = $kelas->school_level;
            $row[] = $kelas->school_name;
            if ($user['akses'] == 1 || $user['akses'] == 2) {
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $kelas->class_id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            }
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
