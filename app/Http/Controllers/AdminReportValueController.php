<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Mapel;
use App\Models\SchoolYear;
use App\Models\ReportValue;
use App\Models\ReportPrint;

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
        $this->authorize('report-value');

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
        try {
            //
            $nisns = $request['inNISN'];
            $mapel = $request['inMapel'];
            $kkm = $request['inKKM'];
            $p1 = $request['inP1'];
            $p2 = $request['inP2'];
            $p3 = $request['inP3'];
            $p4 = $request['inP4'];
            $p5 = $request['inP5'];
            $p6 = $request['inP6'];
            $p7 = $request['inP7'];
            $p8 = $request['inP8'];
            $p9 = $request['inP9'];
            $p10 = $request['inP10'];
            $rph = $request['inRPH'];
            $pts = $request['inPTS'];
            $pas = $request['inPAS'];
            $hpe = $request['inHPE'];
            $ppre = $request['inPPRE'];
            $dailyDesc = $request['taDailyDesc'];
            
            $k1 = $request['inK1'];
            $k2 = $request['inK2'];
            $k3 = $request['inK3'];
            $k4 = $request['inK4'];
            $k5 = $request['inK5'];
            $k6 = $request['inK6'];
            $k7 = $request['inK7'];
            $k8 = $request['inK8'];
            $k9 = $request['inK9'];
            $k10 = $request['inK10'];
            $hpa = $request['inHPA'];
            $kpre = $request['inKPRE'];
            $skillsDesc = $request['taSkillsDesc'];

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            foreach ($nisns as $index => $nisn) {
                $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                    ->where('santri.santri_nisn', '=', $nisn)
                    ->first();

                $reportValueCheck = ReportValue::where('santri_nisn', '=', $santri->santri_nisn)
                ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                ->first();

                if (!$reportValueCheck) {
                    $reportValue = new ReportValue;
                } else {
                    $reportValue = $reportValueCheck;
                }

                $reportValue->santri_nisn = $santri->santri_nisn;
                $reportValue->mapel_id = $mapel;
                $reportValue->class_id = $santri->santri_class;
                $reportValue->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $reportValue->report_kkm = $kkm[$index];
                $reportValue->p1 = $p1[$index];
                $reportValue->p2 = $p2[$index];
                $reportValue->p3 = $p3[$index];
                $reportValue->p4 = $p4[$index];
                $reportValue->p5 = $p5[$index];
                $reportValue->p6 = $p6[$index];
                $reportValue->p7 = $p7[$index];
                $reportValue->p8 = $p8[$index];
                $reportValue->p9 = $p9[$index];
                $reportValue->p10 = $p10[$index];
                $reportValue->rph = $rph[$index];
                $reportValue->pts = $pts[$index];
                $reportValue->pas = $pas[$index];
                $reportValue->knowledge_pre = $ppre[$index];
                $reportValue->knowledge_desc = $dailyDesc[$index];
                $reportValue->k1 = $k1[$index];
                $reportValue->k2 = $k2[$index];
                $reportValue->k3 = $k3[$index];
                $reportValue->k4 = $k4[$index];
                $reportValue->k5 = $k5[$index];
                $reportValue->k6 = $k6[$index];
                $reportValue->k7 = $k7[$index];
                $reportValue->k8 = $k8[$index];
                $reportValue->k9 = $k9[$index];
                $reportValue->k10 = $k10[$index];
                $reportValue->hpa = $hpa[$index];
                $reportValue->skills_pre = $kpre[$index];
                $reportValue->skills_desc = $skillsDesc[$index];
                
                if (!$reportValueCheck) {
                    $save = $reportValue->save();
                } else {
                    $save = $reportValue->update();
                }

                $reportPrintCheck = ReportPrint::where('santri_nisn', '=', $santri->santri_nisn)
                ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                ->first();

                if (!$reportPrintCheck) {
                    $reportPrint = new ReportPrint;
                    $reportPrint->santri_nisn = $santri->santri_nisn;
                    $reportPrint->report_print_date_download = tanggal('now');
                    $reportPrint->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $reportPrint->save();
                }
            }
        
            if ($save) {
                return redirect()->route('report-value.index')
                ->with('message_success', 'Nilai Rapor berhasil disimpan.');
            } else {
                return redirect()->route('report-value.index')
                ->with('message_error', 'Nilai Rapor gagal disimpan.' . $save);
            }
        } catch(\Illuminate\Database\QueryException $e) { 
            return redirect()->route('report-value.index')
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
            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            $reportValueCheck = ReportValue::where('santri_nisn', '=', $santri->santri_nisn)
                ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                ->where('mapel_id', '=', $mapel)
                ->first();

                // return $reportValueCheck;
            if ($reportValueCheck) {
                $kkm = $reportValueCheck->report_kkm;
                $p1 = $reportValueCheck->p1;
                $p2 = $reportValueCheck->p2;
                $p3 = $reportValueCheck->p3;
                $p4 = $reportValueCheck->p4;
                $p5 = $reportValueCheck->p5;
                $p6 = $reportValueCheck->p6;
                $p7 =  $reportValueCheck->p7;
                $p8 = $reportValueCheck->p8;
                $p9 = $reportValueCheck->p9;
                $p10 = $reportValueCheck->p10;
                $reportValueCheck->rph;
                $reportValueCheck->pts;
                $reportValueCheck->pas;
                $reportValueCheck->knowledge_pre;
                $reportValueCheck->knowledge_desc;
                $reportValueCheck->k1;
                $reportValueCheck->k2;
                $reportValueCheck->k3;
                $reportValueCheck->k4;
                $reportValueCheck->k5;
                $reportValueCheck->k6;
                $reportValueCheck->k7;
                $reportValueCheck->k8;
                $reportValueCheck->k9;
                $reportValueCheck->k10;
                $reportValueCheck->hpa;
                $reportValueCheck->skills_pre;
                $reportValueCheck->skills_desc;
            } else {
                $kkm = "";
                $p1 = "";
                $p2 = "";
                $p3 = "";
                $p4 = "";
                $p5 = "";
                $p6 = "";
                $p7 = "";
                $p8 = "";
                $p9 = "";
                $p10 = "";
            }

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $santri->santri_nisn . " / " . $santri->santri_nisn . '<input name="inNISN[]" type="hidden" class="form-control" value="'. $santri->santri_nisn .'" />';
            $row[] = $santri->santri_name;  
            $row[] = $santri->santri_gender;
            $row[] = '<input name="inKKM[]" type="number" style="width:80px;" class="form-control" value="'. $kkm . '" onchange="calculate('. $no-1 . ')" required />';
            $row[] = '<input name="inP1[]" type="number" style="width:80px;" class="form-control" value="'. $p1 . '" onchange="calculate('. $no-1 . ')" />';
            $row[] = '<input name="inP2[]" type="number" style="width:80px;" class="form-control" value="'. $p2 . '" onchange="calculate('. $no-1 . ')"/>';
            $row[] = '<input name="inP3[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inP4[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inP5[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inP6[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inP7[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inP8[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inP9[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inP10[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inRPH[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inPTS[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inPAS[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inHPE[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inPPRE[]" type="text" class="form-control" value="" readonly />';
            $row[] = '<textarea name="taDailyDesc[]" style="width:300px; height:100px" class="form-control" id="inputDescription" placeholder="" rows="3"></textarea>';
            $row[] = '<input name="inK1[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK2[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK3[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK4[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK5[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK6[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK7[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK8[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK9[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inK10[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inHPA[]" type="number" style="width:80px;" class="form-control" value="" />';
            $row[] = '<input name="inKPRE[]" type="text" style="width:80px;" class="form-control" value="" />';
            $row[] = '<textarea name="taSkillsDesc[]" style="width:300px; height:100px" class="form-control" id="inputDescription" placeholder="" rows="3"></textarea>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function reportValueSettings()
    {
        //
        return view('admin.page.report.reportvalue.report-value-settings');
    }


    public function reportAttendance()
    {
        //
        return view('admin.page.report.reportvalue.attendance');
    }

}
