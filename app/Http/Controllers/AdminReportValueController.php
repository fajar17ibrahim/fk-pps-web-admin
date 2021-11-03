<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Mapel;

class AdminReportValueController extends Controller
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
        $santris = Santri::orderBy('santri_name', 'asc')->get();
        $kelass = Kelas::orderBy('class_name', 'asc')->get();
        $mapels = Mapel::orderBy('mapel_name', 'asc')->get();
        return view('admin.page.report.reportvalue.report-value', compact('santris'), compact('schools'))
        ->with(array('kelass' => $kelass))
        ->with(array('mapels' => $mapels));
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

    public function listData($level, $school, $kelas, $mapel) {
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
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea>';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<input type="text" class="form-control" value="" />';
            $row[] = '<textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function reportValue()
    {
        //
        
    }

    public function reportValueSettings()
    {
        //
        return view('admin.page.report.reportvalue.report-value-settings');
    }

    public function reportAttitude()
    {
        //
        
    }

    public function reportAttendance()
    {
        //
        return view('admin.page.report.reportvalue.attendance');
    }

    public function reportExtrakurikuler()
    {
        //
        return view('admin.page.report.reportvalue.extrakurikuler');
    }

    public function reportAchievement()
    {
        //
        return view('admin.page.report.reportvalue.achievement');
    }

    public function reportHomeRoomNotes()
    {
        //
        return view('admin.page.report.reportvalue.homeroomnotes');
    }
}
