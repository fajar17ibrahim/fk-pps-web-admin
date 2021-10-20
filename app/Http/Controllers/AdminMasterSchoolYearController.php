<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\SchoolYear;

class AdminMasterSchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $semesters = Semester::orderBy('semester_name', 'asc')->get();
        return view('admin.page.master.schoolyear.index', compact('semesters'));
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
            $schoolYear = new SchoolYear;
            $schoolYear->tahun_pelajaran_name = $request['inName'];
            $schoolYear->tahun_pelajaran_semester = $request['soSemester'];
            $save = $schoolYear->save();
    
            if ($save) {
                return redirect()->route('master-school-year.index')
                ->with('message_success', 'Tahun Pelajaran berhasil disimpan.');
            } else {
                return redirect()->route('master-school-year.index')
                ->with('message_error', 'Tahun Pelajaran gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-school-year.index')
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
        $schoolYear = SchoolYear::find($id);
        $data = array(
            'id' => $schoolYear->tahun_pelajaran_id, 
            'name' => $schoolYear->tahun_pelajaran_name,
            'semester' => $schoolYear->tahun_pelajaran_semester);
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
        $schoolYear = SchoolYear::find($id);
        $data = array(
            'id' => $schoolYear->tahun_pelajaran_id, 
            'name' => $schoolYear->tahun_pelajaran_name,
            'semester' => $schoolYear->tahun_pelajaran_semester);
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
            $schoolYear = SchoolYear::find($id);
            $schoolYear->tahun_pelajaran_name = $request['inNameEdit'];
            $schoolYear->tahun_pelajaran_semester = $request['soSemesterEdit'];
            $updated = $schoolYear->save();
    
            if ($updated) {
                return redirect()->route('master-school-year.index')
                ->with('message_success', 'Tahun Pelajaran berhasil diperbarui.');
            } else {
                return redirect()->route('master-school-year.index')
                ->with('message_error', 'Tahun Pelajaran gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-school-year.index')
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
        $schoolyears = SchoolYear::leftJoin('semester', 'tahun_pelajaran.tahun_pelajaran_semester', '=', 'semester.semester_id')
        ->get();
        
        $no = 0;
        $data = array();
        foreach ($schoolyears as $schoolYear) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $schoolYear->tahun_pelajaran_id;
            $row[] = $schoolYear->tahun_pelajaran_name;
            $row[] = $schoolYear->semester_name;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $schoolYear->tahun_pelajaran_id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
