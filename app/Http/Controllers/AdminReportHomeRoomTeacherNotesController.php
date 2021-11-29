<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;
use App\Models\SchoolYear;
use App\Models\ReportHomeRoomTeacher;

class AdminReportHomeRoomTeacherNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('report-homeroom-teacher');

        $schools = School::orderBy('school_name', 'asc')->get();
        $kelass = array();
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $kelassCheck = Kelas::leftJoin('school', 'school.school_npsn', '=', 'kelas.class_school')
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
        return view('admin.page.report.reportvalue.homeroometeachernotes', compact('schools'))
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
            $ranking = $request['soRanking'];
            $taNotes = $request['taNotes'];
            $soNotes = $request['soNotes'];

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            foreach ($nisns as $index => $nisn) {
                $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                    ->where('santri.santri_nisn', '=', $nisn)
                    ->first();

                $homeroomTeacherNotes = new ReportHomeRoomTeacher;
                $homeroomTeacherNotes->santri_nisn = $santri->santri_nisn;
                $homeroomTeacherNotes->class_id = $santri->santri_class;
                $homeroomTeacherNotes->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $homeroomTeacherNotes->ranking = $ranking[$index];
                $homeroomTeacherNotes->notes_by_ranking = $taNotes[$index];
                $homeroomTeacherNotes->notes_by_option = $soNotes[$index];
                $save = $homeroomTeacherNotes->save();
            }
        
            if ($save) {
                return redirect()->route('report-homeroom-teacher-notes.index')
                ->with('message_success', 'Catatan Wali Kelas berhasil disimpan.');
            } else {
                return redirect()->route('report-homeroom-teacher-notes.index')
                ->with('message_error', 'Catatan Wali Kelas gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e) { 
            return redirect()->route('report-homeroom-teacher-notes.index')
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
        } else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->where('kelas.class_level', '=', $user[0]->class_level)
                ->where('school.school_npsn', '=', $user[0]->ustadz_school)
                ->get();
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
            $row[] = '<select name="soRanking[]" class="single-select form-select" style="width:80px">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>';
            $row[] = '<textarea name="taNotes[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3">Prestasinya sangat baik, perlu dipertahankan</textarea>';
            $row[] = '<select name="soNotes[]" class="single-select form-select" style="width:550px">
                        <option>Selalu berusaha untuk mematuhi tata tertib sekolah dan patuh terhadap Guru.</option>
                        <option>Selalu berusaha untuk mandiri dan tepat waktu dalam mengerjakan tugas.</option>
                        <option>Mempunyai kemampuan dan motivasi yang tinggi untuk menggunakan waktu secara efisien.</option>
                        <option>Diharapkan merubah penampilannya menjadi lebih rapi. Seperti tentang potong rambut dan cara berpakaian.</option>
                        <option>Masih perlu memperbanyak teman bergaul dan teman diskusi, kurangi aktifitas menyendiri.</option>
                        <option>Diharapkan dapat meningkatkan komitmennya untuk lebih serius saat mengerjakan tugas dan tidak mudah menyerah.</option>
                    </select>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
