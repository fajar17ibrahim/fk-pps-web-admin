<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;
use App\Models\SchoolYear;
use App\Models\ReportAttendance;

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
        $kelass = array();
        $user = Session::get('user');
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
        }
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
        try {
            //
            $nisns = $request['inNISN'];
            $s = $request['inS'];
            $i = $request['inI'];
            $a = $request['inA'];

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            foreach ($nisns as $index => $nisn) {
                $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','kelas.class_school','=','school.school_id')
                    ->where('santri.santri_nisn', '=', $nisn)
                    ->first();

                $reportAttendanceCheck = ReportAttendance::where('santri_nisn', '=', $santri->santri_nisn)
                    ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                    ->where('class_id', '=', $santri->santri_class)
                    ->first();

                if ($reportAttendanceCheck) {
                    $attendance = $reportAttendanceCheck;
                } else {
                    $attendance = new ReportAttendance;
                }

                $attendance->santri_nisn = $santri->santri_nisn;
                $attendance->class_id = $santri->santri_class;
                $attendance->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $attendance->s = $s[$index];
                $attendance->i = $i[$index];
                $attendance->a = $a[$index];

                if ($reportAttendanceCheck) {
                    $save = $attendance->update();
                } else {
                    $save = $attendance->save();
                } 
            }

            if ($save) {
                return redirect()->route('report-attendance.index')
                ->with('message_success', 'Absensi berhasil disimpan.');
            } else {
                return redirect()->route('report-attendance.index')
                ->with('message_error', 'Absensi gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('report-attendance.index')
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
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            if ($level != 0 && $school != 0 && $kelas != 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->where('santri.santri_school', '=', $school)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas != 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas != 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','ksantri.santri_school','=','school.school_id')
                ->where('santri.santri_school', '=', $school)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level != 0 && $school != 0 && $kelas == 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->where('santri.santri_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas == 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas == 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('santri.santri_school', '=', $school)
                ->get();
            } else if ($level == 0 && $school == 0 && $kelas != 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            }else {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->get();
            }
        } else if ($user[0]->role_id == 2) {
            if ($kelas != 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->where('school.school_id', '=', $user[0]->ustadz_school)
                    ->where('kelas.class_id', '=', $kelas)
                    ->get();
            } else {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->get();
            }
        } else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->where('school.school_id', '=', $user[0]->ustadz_school)
                    ->where('kelas.class_id', '=', $user[0]->ustadz_class)
                    ->get();
        } 
        
        $no = 0;
        $data = array();
        foreach ($santris as $santri) {
            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            $reportAttendanceCheck = ReportAttendance::where('santri_nisn', '=', $santri->santri_nisn)
                ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                ->first();

            if ($reportAttendanceCheck) {
                $s = $reportAttendanceCheck->s;
                $i = $reportAttendanceCheck->i;
                $a = $reportAttendanceCheck->a;
            } else {
                $s = "0";
                $i = "0";
                $a = "0";
            }

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $santri->santri_nism . " / " . $santri->santri_nisn . '<input name="inNISN[]" type="hidden" class="form-control" value="'. $santri->santri_nisn .'" />';
            $row[] = $santri->santri_name;  
            $row[] = $santri->santri_gender;
            $row[] = '<input name="inS[]" type="number" class="form-control" value="' . $s . '" />';
            $row[] = '<input name="inI[]" type="number" class="form-control" value="' . $i . '" />';
            $row[] = '<input name="inA[]" type="number" class="form-control" value="' . $a . '" />';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
