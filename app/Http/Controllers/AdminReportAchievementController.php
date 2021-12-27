<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;
use App\Models\SchoolYear;
use App\Models\ReportAchievement;

class AdminReportAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('report-achievement');
        $user = Session::get('user');

        $schools = School::orderBy('school_name', 'asc')->get();
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
        } else {
            $kelassCheck = Kelas::orderBy('class_id', 'asc')
                ->where('class_level', '=', $user[0]->class_level)
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
        return view('admin.page.report.reportvalue.achievement', compact('schools'))
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
            $achievement1Name = $request['soAchievement1Name'];
            $achievement1Desc = $request['taAchievement1Desc'];
            $achievement2Name = $request['soAchievement2Name'];
            $achievement2Desc = $request['taAchievement2Desc'];
            $achievement3Name = $request['soAchievement3Name'];
            $achievement3Desc = $request['taAchievement3Desc'];

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            foreach ($nisns as $index => $nisn) {
                $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','kelas.class_school','=','school.school_id')
                    ->where('santri.santri_nisn', '=', $nisn)
                    ->first();

                $achievement = new ReportAchievement;
                $achievement->santri_nisn = $santri->santri_nisn;
                $achievement->class_id = $santri->santri_class;
                $achievement->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $achievement->achievement_name = $achievement1Name[$index];
                $achievement->achievement_description = $achievement1Desc[$index];
                $save = $achievement->save();

                $achievement = new ReportAchievement;
                $achievement->santri_nisn = $santri->santri_nisn;
                $achievement->class_id = $santri->santri_class;
                $achievement->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $achievement->achievement_name = $achievement2Name[$index];
                $achievement->achievement_description = $achievement2Desc[$index];
                $save = $achievement->save();

                $achievement = new ReportAchievement;
                $achievement->santri_nisn = $santri->santri_nisn;
                $achievement->class_id = $santri->santri_class;
                $achievement->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $achievement->achievement_name = $achievement3Name[$index];
                $achievement->achievement_description = $achievement3Desc[$index];
                $save = $achievement->save();

            }
        
            if ($save) {
                return redirect()->route('report-achievement.index')
                ->with('message_success', 'Data Prestasi berhasil disimpan.');
            } else {
                return redirect()->route('report-achievement.index')
                ->with('message_error', 'Data Prestasi gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('report-achievement.index')
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
        } else {
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
        }       
        
        $no = 0;
        $data = array();
        foreach ($santris as $santri) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $santri->santri_nisn . " / " . $santri->santri_nisn . '<input name="inNISN[]" type="hidden" class="form-control" value="'. $santri->santri_nisn .'" />';
            $row[] = $santri->santri_name;  
            $row[] = $santri->santri_gender;
            $row[] = '<select name="soAchievement1Name[]" class="single-select form-select">
                        <option value="Kesenian">Kesenian</option>
                        <option value="Keagamaan">Keagamaan</option>
                    </select>';
            $row[] = '<textarea name="taAchievement1Desc[]" class="form-control" style="width:300px" id="inputDescription" placeholder="" rows="3"></textarea>';
            $row[] = '<select name="soAchievement2Name[]" class="single-select form-select">
                        <option value="Kesenian">Kesenian</option>
                        <option value="Keagamaan">Keagamaan</option>
                    </select>';
            $row[] = '<textarea name="taAchievement2Desc[]" class="form-control" style="width:300px" id="inputDescription" placeholder="" rows="3"></textarea>';
            $row[] = '<select name="soAchievement3Name[]" class="single-select form-select">
                        <option value="Kesenian">Kesenian</option>
                        <option value="Keagamaan">Keagamaan</option>
                    </select>';
            $row[] = '<textarea name="taAchievement3Desc[]" class="form-control" style="width:300px" id="inputDescription" placeholder="" rows="3"></textarea>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
