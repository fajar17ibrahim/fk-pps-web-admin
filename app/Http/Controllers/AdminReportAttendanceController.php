<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;

class AdminReportAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('report-attendance');

        $schools = School::orderBy('school_name', 'asc')->get();
        $kelass = Kelas::orderBy('class_name', 'asc')->get();
        return view('admin.page.report.reportvalue.attendance', compact('schools'))
        ->with(array('kelass' => $kelass));
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
        if ($level != 0 && $school != 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school != 0 && $kelas == 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas == 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas == 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level == 0 && $school == 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        }else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->get();
        }
        
        $no = 0;
        $data = array();
        foreach ($santris as $santri) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $santri->santri_nisn;
            $row[] = $santri->santri_name;  
            $row[] = $santri->santri_gender;
            $row[] = '<input type="text" class="form-control" value="0" />';
            $row[] = '<input type="text" class="form-control" value="0" />';
            $row[] = '<input type="text" class="form-control" value="0" />';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
