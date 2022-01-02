<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Mapel;
use App\Models\SchoolYear;
use App\Models\ReportValue;
use App\Models\ReportPrint;
use App\Models\KDKnowledge;
use App\Models\KDSkills;
use App\Models\MapelTeacher;

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
        $user = Session::get('user');
        $mapel = Session::get('mapel');

        $kdKnowledges = KDKnowledge::where('mapel_teacher', '=', $mapel)
        ->orderBy('p_id', 'asc')->get();

        $kdSkills = KDSkills::where('mapel_teacher', '=', $mapel)
        ->orderBy('k_id', 'asc')->get();

        $schools = School::orderBy('school_name', 'asc')->get();
        $santris = Santri::orderBy('santri_name', 'asc')->get();
        $kelass = array();
        $mapels = array();
        $mapelOld = "";
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

            $schoolsData = School::orderBy('school_name', 'asc')->get();
            $schools = array();
            foreach($schoolsData as $school) {
                $data = array(
                    'id' => $school->school_id,
                    'pps_nama' => $school->school_name . ' (' . $school->school_level . ')'
                );

                $schools[] = $data;
            }

            $mapelsData = MapelTeacher::leftJoin('mapel', 'mapel_teacher.mapel_id', '=', 'mapel.mapel_id')       
                    ->orderBy('mapel_name', 'asc')->get();
            
        } else if ($user[0]->role_id == 2) {
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

            $schoolsData = School::orderBy('school_name', 'asc')
                ->where('school_level', '=', $user[0]->school_level)
                ->where('school_id', '=', $user[0]->ustadz_school)
                ->get();

            $schools = array();
            foreach($schoolsData as $school) {
                $data = array(
                    'id' => $school->school_id,
                    'pps_nama' => $school->school_name
                );

                $schools[] = $data;
            }

            $mapelsData = MapelTeacher::leftJoin('mapel', 'mapel_teacher.mapel_id', '=', 'mapel.mapel_id')
                    ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')   
                    ->where('kelas.class_school', '=', $user[0]->ustadz_school)       
                    ->orderBy('mapel_name', 'asc')->get();
        } else {

            $mapelsData = MapelTeacher::leftJoin('mapel', 'mapel_teacher.mapel_id', '=', 'mapel.mapel_id')
                    ->leftJoin('kelas','kelas.class_id','=','mapel_teacher.class_id')          
                    ->where('kelas.class_school', '=', $user[0]->ustadz_school)    
                    ->where('mapel_teacher.class_id', '=', $user[0]->ustadz_class)       
                    ->orderBy('mapel_name', 'asc')->get();

        }

        foreach ($mapelsData as $mapel) {
            if ($mapelOld != $mapel->mapel_id) {
                $mapels[] = $mapel;
            }
            $mapelOld = $mapel->mapel_id;
        }

        return view('admin.page.report.reportvalue.report-value', compact('santris'), compact('schools'))
        ->with(array('kdSkills' => $kdSkills))
        ->with(array('kdKnowledges' => $kdKnowledges))
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
            $rpk = $request['inRPK'];
            $kpre = $request['inKPRE'];
            $skillsDesc = $request['taSkillsDesc'];

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            foreach ($nisns as $index => $nisn) {
                $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','kelas.class_school','=','school.school_id')
                    ->where('santri.santri_nisn', '=', $nisn)
                    ->first();

                $reportValueCheck = ReportValue::where('santri_nisn', '=', $santri->santri_nisn)
                ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                ->where('mapel_id', '=', $mapel)
                ->where('class_id', '=', $santri->santri_class)
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
                $reportValue->rpk = $rpk[$index];
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
                ->with('message_error', 'Nilai Rapor gagal disimpan.');
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

    public function listKDK() {
        $mapel = Session::get('mapel');
        $kdSkills = KDSkills::where('mapel_teacher', '=', $mapel)
                ->orderBy('k_id', 'asc')
                ->get();

        // return $kdSkills;

        $no = 0;
        $data = array();
        foreach ($kdSkills as $kdSkill) {
            $desc = $kdSkill->desc;
            if ($desc == null) {
                $desc = "";
            }
            $row = array(
                'id' => $kdSkill->k_id,
                'deskripsi' => $desc
            );
            $data[] = $row;
        }

        return $data;
    }

    public function listKDP() {
        $mapel = Session::get('mapel');
        $kdKnowledges = KDKnowledge::where('mapel_teacher', '=', $mapel)
        ->orderBy('p_id', 'asc')->get();

        // return $kdKnowledges;

        $no = 0;
        $data = array();
        foreach ($kdKnowledges as $kdKnowledge) {
            $desc = $kdKnowledge->desc;
            if ($desc == null) {
                $desc = "";
            }
            $row = array(
                'id' => $kdKnowledge->p_id,
                'deskripsi' => $desc
            );
            $data[] = $row;
        }

        return $data;
    }

    public function listData($level, $school, $kelas, $mapel) {
        $user = Session::get('user');

        $mapelData = MapelTeacher::where('mapel_id', '=', $mapel)
                ->where('class_id', $kelas)
                ->first();

        $santris = array();
        if ($mapelData != null) {
            Session::put('mapel', $mapelData->mapel_teacher_id);
        } else {
            if ($level != 0 || $school != 0 || $kelas != 0) {
                return "error_mapel";
            }
        }
        
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
                    ->where('santri.santri_class', '=', $user[0]->ustadz_class)
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
                $rph = $reportValueCheck->rph;
                $pts = $reportValueCheck->pts;
                $pas = $reportValueCheck->pas;
                $ppre = $reportValueCheck->knowledge_pre;
                $pdesc = $reportValueCheck->knowledge_desc;
                $k1 = $reportValueCheck->k1;
                $k2 = $reportValueCheck->k2;
                $k3 = $reportValueCheck->k3;
                $k4 = $reportValueCheck->k4;
                $k5 = $reportValueCheck->k5;
                $k6 = $reportValueCheck->k6;
                $k7 = $reportValueCheck->k7;
                $k8 = $reportValueCheck->k8;
                $k9 = $reportValueCheck->k9;
                $k10 = $reportValueCheck->k10;
                $rpk = $reportValueCheck->rpk;
                $hpa = $reportValueCheck->hpa;
                $kpre = $reportValueCheck->skills_pre;
                $kdesc = $reportValueCheck->skills_desc;
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
                $rph = "";
                $pts = "";
                $pas = "";
                $ppre = "";
                $pdesc = "";
                $k1 = "";
                $k2 = "";
                $k3 = "";
                $k4 = "";
                $k5 = "";
                $k6 = "";
                $k7 = "";
                $k8 = "";
                $k9 = "";
                $k10 = "";
                $hpa = "";
                $rpk = "";
                $kpre = "";
                $kdesc = "";
            }

            $no++;
            $index = (int) $no -1;
            $row = array();
            $row[] = $no;
            $row[] = $santri->santri_nisn . " / " . $santri->santri_nisn . '<input name="inNISN[]" type="hidden" class="form-control" value="'. $santri->santri_nisn .'" />';
            $row[] = $santri->santri_name;  
            $row[] = $santri->santri_gender;
            $row[] = '<input name="inKKM[]" type="number" style="width:80px;" class="form-control" value="'. $kkm . '" onchange="calculate('. $index . ')" required />';
            $row[] = '<input name="inP1[]" type="number" style="width:80px;" class="form-control" value="'. $p1 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP2[]" type="number" style="width:80px;" class="form-control" value="'. $p2 . '" onchange="calculate('. $index . ')"/>';
            $row[] = '<input name="inP3[]" type="number" style="width:80px;" class="form-control" value="'. $p3 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP4[]" type="number" style="width:80px;" class="form-control" value="'. $p4 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP5[]" type="number" style="width:80px;" class="form-control" value="'. $p5 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP6[]" type="number" style="width:80px;" class="form-control" value="'. $p6 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP7[]" type="number" style="width:80px;" class="form-control" value="'. $p7 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP8[]" type="number" style="width:80px;" class="form-control" value="'. $p8 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP9[]" type="number" style="width:80px;" class="form-control" value="'. $p9 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inP10[]" type="number" style="width:80px;" class="form-control" value="'. $p10 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inRPH[]" type="number" style="width:80px;" class="form-control" value="'. $rph . '" onchange="calculate('. $index . ')" readonly  />';
            $row[] = '<input name="inPTS[]" type="number" style="width:80px;" class="form-control" value="'. $pts . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inPAS[]" type="number" style="width:80px;" class="form-control" value="'. $pas . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inHPA[]" type="number" style="width:80px;" class="form-control" value="'. $hpa . '" readonly />';
            $row[] = '<input name="inPPRE[]" type="text" class="form-control" value="'. $ppre . '" readonly />';
            $row[] = '<textarea name="taDailyDesc[]" style="width:300px; height:100px" class="form-control" id="inputDescription" placeholder="" rows="3" readonly>'. $pdesc . '</textarea>';
            $row[] = '<input name="inK1[]" type="number" style="width:80px;" class="form-control" value="'. $k1 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK2[]" type="number" style="width:80px;" class="form-control" value="'. $k2 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK3[]" type="number" style="width:80px;" class="form-control" value="'. $k3 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK4[]" type="number" style="width:80px;" class="form-control" value="'. $k4 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK5[]" type="number" style="width:80px;" class="form-control" value="'. $k5 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK6[]" type="number" style="width:80px;" class="form-control" value="'. $k6 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK7[]" type="number" style="width:80px;" class="form-control" value="'. $k7 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK8[]" type="number" style="width:80px;" class="form-control" value="'. $k8 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK9[]" type="number" style="width:80px;" class="form-control" value="'. $k9 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inK10[]" type="number" style="width:80px;" class="form-control" value="'. $k10 . '" onchange="calculate('. $index . ')" />';
            $row[] = '<input name="inRPK[]" type="number" style="width:80px;" class="form-control" value="'. $rpk . '" onchange="calculate('. $index . ')" readonly  />';
            $row[] = '<input name="inKPRE[]" type="text" style="width:80px;" class="form-control" value="'. $kpre . '" onchange="calculate('. $index . ')" readonly />';
            $row[] = '<textarea name="taSkillsDesc[]" style="width:300px; height:100px" class="form-control" id="inputDescription" placeholder="" rows="3" readonly>'. $kdesc . '</textarea>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function reportValueSettings()
    {
        //
        $user = Session::get('user');
        $mapel = Session::get('mapel');

        // return $mapel;

        $kdKnowledgesCheck = KDKnowledge::where('mapel_teacher', '=', $mapel)
        ->orderBy('p_id', 'asc')->get();

        $kdKnowledges = array();
        if (count($kdKnowledgesCheck) > 0) {
            foreach ($kdKnowledgesCheck as $kdKnowledge) {
                $data = array(
                    'kd_id' => $kdKnowledge->p_id,
                    'kd_desc' => $kdKnowledge->desc
                );

                $kdKnowledges[] = $data; 
            }
        } else {
            for ($i = 1; $i <= 10; $i++) {
                $data = array(
                    'kd_id' => $i,
                    'kd_desc' => ''
                );

                $kdKnowledges[] = $data; 
            }
        }

        // return $kdKnowledges;   

        $kdSkillsCheck = KDSkills::where('mapel_teacher', '=', $mapel)
        ->orderBy('k_id', 'asc')->get();

        $kdSkills = array();
        if (count($kdKnowledgesCheck) > 0) {
            foreach ($kdSkillsCheck as $kdSkill) {
                $data = array(
                    'kd_id' => $kdSkill->k_id,
                    'kd_desc' => $kdSkill->desc
                );

                $kdSkills[] = $data; 
            }
        } else {
            for ($i = 1; $i <= 10; $i++) {
                $data = array(
                    'kd_id' => $i,
                    'kd_desc' => ''
                );

                $kdSkills[] = $data; 
            }
        }

        // return $kdSkills; 

        return view('admin.page.report.reportvalue.report-value-settings')
            ->with('kdKnowledges', $kdKnowledges)
            ->with('kdSkills', $kdSkills);
    }

    public function reportValueSettingsSave(Request $request) 
    {
        try {
            $user = Session::get('user');
            $mapel = Session::get('mapel');

            $kdp = array(
                    $request['inKDP1'],
                    $request['inKDP2'],
                    $request['inKDP3'],
                    $request['inKDP4'],
                    $request['inKDP5'],
                    $request['inKDP6'],
                    $request['inKDP7'],
                    $request['inKDP8'],
                    $request['inKDP9'],
                    $request['inKDP10']
                );

                $kdk = array(
                    $request['inKDK1'],
                    $request['inKDK2'],
                    $request['inKDK3'],
                    $request['inKDK4'],
                    $request['inKDK5'],
                    $request['inKDK6'],
                    $request['inKDK7'],
                    $request['inKDK8'],
                    $request['inKDK9'],
                    $request['inKDK10']
                );

                for ($i = 1 ; $i <=10; $i++) {
                    $kdKnowledgeCheck = KDKnowledge::where('mapel_teacher', '=', $mapel)
                        ->where('p_id', '=', $i)
                        ->first();

                        if ($kdKnowledgeCheck) {
                            $kdKnowledgeCheck->mapel_teacher = $mapel;
                            $kdKnowledgeCheck->desc = $kdp[$i-1];
                            $kdKnowledgeCheck->update();
                        } else {
                            $kdKnowledge = new KDKnowledge;
                            $kdKnowledge->p_id = $i;
                            $kdKnowledge->mapel_teacher = $mapel;
                            $kdKnowledge->desc = $kdp[$i-1];
                            $kdKnowledge->save();                    
                        }
                }

                for ($i = 1 ; $i <=10; $i++) {
                    $kdSkillCheck = KDSkills::where('mapel_teacher', '=', $mapel)
                        ->where('k_id', '=', $i)
                        ->first();

                        if ($kdSkillCheck) {
                            $kdSkillCheck->mapel_teacher = $mapel;
                            $kdSkillCheck->desc = $kdk[$i-1];
                            $kdSkillCheck->update();
                        } else {
                            $kdSkill = new KDSkills;
                            $kdSkill->k_id = $i;
                            $kdSkill->mapel_teacher = $mapel;
                            $kdSkill->desc = $kdk[$i-1];
                            $kdSkill->save();                    
                        }
                
                }

            return redirect()->route('report-value.index')
            ->with('message_success', 'Pengaturan berhasil disimpan.');

        } catch(\Illuminate\Database\QueryException $e) { 
            return redirect()->route('report-value.index')
            ->with('message_error', $e->getMessage());
        }
    }

}
