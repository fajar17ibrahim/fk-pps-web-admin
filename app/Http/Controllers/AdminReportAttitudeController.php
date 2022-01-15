<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Mapel;
use App\Models\ReportAttitude;
use App\Models\SchoolYear;

class AdminReportAttitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('report-attitude');

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
            
            $schoolsData = School::orderBy('school_name', 'asc')->get();
            $schools = array();
            foreach($schoolsData as $school) {
                $data = array(
                    'id' => $school->school_id,
                    'pps_nama' => $school->school_name . ' (' . $school->school_level . ')'
                );

                $schools[] = $data;
            }

            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->get();
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

            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','santri.santri_school','=','school.school_id')
            ->where('santri_school', '=', $user[0]->ustadz_school)
            ->get();
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
                
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->where('santri.santri_class', '=', $user[0]->ustadz_class)
                ->get();
                
        }

        return view('admin.page.report.reportvalue.attitude', compact('schools'))
        ->with(array('kelass' => $kelass))
        ->with(array('santris' => $santris));
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
            $nisn = $request['soSantriNISN'];
            $pred = $request['soPred'];
            $attitudeAlwaysDos = $request['cbAttitudeAlwaysDo'];
            $attitudeEvolves = $request['cbAttitudeEvolve'];
            $attitudeNotStandOuts = $request['cbAttitudeNotStandOut'];
            $predSocialAttitude = $request['soPredSocialAttitude'];
            $attitudeVeryGoods = $request['cbAttitudeVeryGood'];
            $attitudeGoods = $request['cbAttitudeGood'];
            $attitudeNotGoods = $request['cbAttitudeNotGood'];
            $attitudeEvolveSocials = $request['cbAttitudeEvolveSocial'];
            $notes = $request['taNotes'];

            $goodSpiritualAttitude = "";
            if ($attitudeAlwaysDos) {
                foreach ($attitudeAlwaysDos as $attitudeAlwaysDo) {
                    $goodSpiritualAttitude .= $attitudeAlwaysDo . ". ";
                }
            }

            if ($attitudeEvolves) {
                foreach ($attitudeEvolves as $attitudeEvolve) {
                    $goodSpiritualAttitude .= $attitudeEvolve . ". ";
                }
            }

            $lackSpiritualAttitude = "";
            if ($attitudeNotStandOuts) {
                foreach ($attitudeNotStandOuts as $attitudeNotStandOut) {
                    $lackSpiritualAttitude .= $attitudeNotStandOut . ". ";
                }
            }

            $goodSocialAttitude = "";
            if ($attitudeVeryGoods) {
                foreach ($attitudeVeryGoods as $attitudeVeryGood) {
                    $goodSocialAttitude .= $attitudeVeryGood . ". ";
                }
            }

            if ($attitudeGoods) {
                foreach ($attitudeGoods as $attitudeGood) {
                    $goodSocialAttitude .= $attitudeVeryGood . ". ";
                }
            }

            if ($attitudeEvolveSocials) {
                foreach ($attitudeEvolveSocials as $attitudeEvolveSocial) {
                    $goodSocialAttitude .= $attitudeEvolveSocial . ". ";
                }
            }

            $lackSocialAttitude = "";
            if ($attitudeNotGoods) {
                foreach ($attitudeNotGoods as $attitudeNotGood) {
                    $lackSocialAttitude .= $attitudeNotGood . ". ";
                }
            }

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();

            $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','kelas.class_school','=','school.school_id')
                    ->where('santri.santri_nisn', '=', $nisn)
                    ->first();

            $attitudeCheck = ReportAttitude::where('santri_nisn', '=', $santri->santri_nisn)
                    ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                    ->where('class_id', '=', $santri->santri_class)
                    ->first();

            if ($attitudeCheck) {
                $attitude = $attitudeCheck;
            } else {
                $attitude = new ReportAttitude;
            }

            $attitude->santri_nisn = $nisn;
            $attitude->class_id = $santri->santri_class;
            $attitude->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $attitude->spiritual_attitude_pred = $pred;
            $attitude->good_spiritual_attitude = $goodSpiritualAttitude;
            $attitude->lack_of_spiritual_attitude = $lackSpiritualAttitude;
            $attitude->sosial_attitude_pred = $predSocialAttitude;
            $attitude->good_sosial_attitude = $goodSocialAttitude;
            $attitude->lack_of_sosial_attitude = $lackSocialAttitude;

            if ($attitudeCheck) {
                $saved = $attitude->update();
            } else {
                $saved = $attitude->save();
            }

            if ($saved) {
                return redirect()->route('report-attitude.index')
                ->with('message_success', 'Nilai Sikap berhasil disimpan.');
            } else {
                return redirect()->route('report-attitude.index')
                ->with('message_error', 'Nilai Sikap gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e) { 
            return redirect()->route('report-attitude.index')
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

        return $santris;
        
    }
}
