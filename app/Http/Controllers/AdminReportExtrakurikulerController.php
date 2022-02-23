<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;
use App\Models\SchoolYear;
use App\Models\Extrakurikuler;
use App\Models\ReportExtrakurikuler;

class AdminReportExtrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('report-extrakurikuler');
        $user = Session::get('user');

        if ($user == null) {
            return redirect('login');
        }

        $kelass = array();
        if ($user['akses'] == 1) {
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
        } else {
            $kelassCheck = Kelas::orderBy('class_id', 'asc')
                ->where('class_school', '=', $user['sekolah'])
                ->get();

            foreach($kelassCheck as $kelas) {
                $data = array(
                    'id' => $kelas->class_id,
                    'name' => $kelas->class_name,
                );

                $kelass[] = $data;
            }

            $schoolsData = School::orderBy('school_name', 'asc')
                ->where('school_level', '=', $user['level'])
                ->where('school_id', '=', $user['sekolah'])
                ->get();

            $schools = array();
            foreach($schoolsData as $school) {
                $data = array(
                    'id' => $school->school_id,
                    'pps_nama' => $school->school_name
                );

                $schools[] = $data;
            }
        }

        return view('admin.page.report.reportvalue.extrakurikuler', compact('schools'))
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
            $extra1Name = $request['soExtra1Name'];
            $extra1Value = $request['soExtra1Value'];
            $extra1Desc = $request['taExtra1Desc'];
            $extra2Name = $request['soExtra2Name'];
            $extra2Value = $request['soExtra2Value'];
            $extra2Desc = $request['taExtra2Desc'];
            $extra3Name = $request['soExtra3Name'];
            $extra3Value = $request['soExtra3Value'];
            $extra3Desc = $request['taExtra3Desc'];
            $extra4Name = $request['soExtra4Name'];
            $extra4Value = $request['soExtra4Value'];
            $extra4Desc = $request['taExtra4Desc'];

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            foreach ($nisns as $index => $nisn) {
                $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','kelas.class_school','=','school.school_id')
                    ->where('santri.santri_nisn', '=', $nisn)
                    ->first();

                $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
                $reportExtraCheck = ReportExtrakurikuler::where('santri_nisn', '=', $santri->santri_nisn)
                    ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                    ->where('class_id', '=', $santri->santri_class)
                    ->orderBy('report_extrakurikuler_id', 'asc')
                    ->get();

                if ($extra1Name[$index] != "Tidak Ada") {
                    if (count($reportExtraCheck) >= 1) {
                        $extrakurikuler = $reportExtraCheck[0];
                    } else {
                        $extrakurikuler = new ReportExtrakurikuler;
                    }
                    
                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra1Name[$index];
                    $extrakurikuler->extra_value = $extra1Value[$index];
                    $extrakurikuler->extra_description = $extra1Desc[$index];

                    if (count($reportExtraCheck) >= 1) {
                        $save = $extrakurikuler->update();
                    } else {
                        $save = $extrakurikuler->save();
                    }
                    
                }

                if ($extra2Name[$index] != "Tidak Ada") {
                    if (count($reportExtraCheck) >= 2) {
                        $extrakurikuler = $reportExtraCheck[1];
                    } else {
                        $extrakurikuler = new ReportExtrakurikuler;
                    }

                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra2Name[$index];
                    $extrakurikuler->extra_value = $extra2Value[$index];
                    $extrakurikuler->extra_description = $extra2Desc[$index];
                    
                    if (count($reportExtraCheck) >= 2) {
                        $save = $extrakurikuler->update();
                    } else {
                        $save = $extrakurikuler->save();
                    }
                }

                if ($extra3Name[$index] != "Tidak Ada") {
                    
                    if (count($reportExtraCheck) >= 3) {
                        $extrakurikuler = $reportExtraCheck[2];
                    } else {
                        $extrakurikuler = new ReportExtrakurikuler;
                    }
                    
                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra3Name[$index];
                    $extrakurikuler->extra_value = $extra3Value[$index];
                    $extrakurikuler->extra_description = $extra3Desc[$index];

                    if (count($reportExtraCheck) >= 3) {
                        $save = $extrakurikuler->update();
                    } else {
                        $save = $extrakurikuler->save();
                    }
                }

                if ($extra4Name[$index] != "Tidak Ada") {
                    if (count($reportExtraCheck) >= 4) {
                        $extrakurikuler = $reportExtraCheck[3];
                    } else {
                        $extrakurikuler = new ReportExtrakurikuler;
                    }
                    
                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra4Name[$index];
                    $extrakurikuler->extra_value = $extra4Value[$index];
                    $extrakurikuler->extra_description = $extra4Desc[$index];

                    if (count($reportExtraCheck) >= 4) {
                        $save = $extrakurikuler->update();
                    } else {
                        $save = $extrakurikuler->save();
                    }
                }
            }
        
            if ($save) {
                return redirect()->route('report-extrakurikuler.index')
                ->with('message_success', 'Nilai Extrakurikuler berhasil disimpan.');
            } else {
                return redirect()->route('report-extrakurikuler.index')
                ->with('message_error', 'Nilai Extrakurikuler gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('report-extrakurikuler.index')
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
        if ($user['akses'] == 1) {
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
        } else if ($user['akses'] == 2) {
            if ($kelas != 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->where('school.school_id', '=', $user['sekolah'])
                    ->where('kelas.class_id', '=', $kelas)
                    ->get();
            } else {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_id', '=', $user['sekolah'])
                ->get();
            }
        } else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->where('school.school_id', '=', $user['sekolah'])
                    ->where('kelas.class_id', '=', $user['kelas'])
                    ->get();
        } 
        
        $no = 0;
        $data = array();
        foreach ($santris as $santri) {
            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
            $reportExtraCheck = ReportExtrakurikuler::where('santri_nisn', '=', $santri->santri_nisn)
                    ->where('tahun_pelajaran_id', '=', $schoolYear->tahun_pelajaran_id)
                    ->where('class_id', '=', $santri->santri_class)
                    ->orderBy('report_extrakurikuler_id', 'asc')
                    ->get();

            $extrakurikulers = Extrakurikuler::select('extra_name as name')
                    ->orderBy('extra_name', 'asc')
                    ->get();

            $extra = "";
            foreach ($extrakurikulers as $extrakurikuler) { 
                $extra .= '<option value="' . $extrakurikuler->name . '">' . $extrakurikuler->name . '</option>';
            };

            $name1 = "Tidak Ada";
            $value1 = "A";
            $desc1 = "";
            $name2 = "Tidak Ada";
            $value2 = "A";
            $desc2 = "";
            $name3 = "Tidak Ada";
            $value3 = "A";
            $desc3 = "";
            $name4 = "Tidak Ada";
            $value4 = "A";
            $desc4 = "";

            if (count($reportExtraCheck) > 0) {
                $count = 0;
                foreach ($reportExtraCheck as $reportExtra) {
                    if ($count == 0) {
                        $name1 = $reportExtraCheck[0]->extra_name;
                        $value1 = $reportExtraCheck[0]->extra_value;
                        $desc1 = $reportExtraCheck[0]->extra_description;
                    }

                    if ($count == 1) {
                        $name2 = $reportExtraCheck[1]->extra_name;
                        $value2 = $reportExtraCheck[1]->extra_value;
                        $desc2 = $reportExtraCheck[1]->extra_description;
                    } 

                    if ($count == 2) {
                        $name3 = $reportExtraCheck[2]->extra_name;
                        $value3 = $reportExtraCheck[2]->extra_value;
                        $desc3 = $reportExtraCheck[2]->extra_description;
                    } 

                    if ($count == 3) {
                        $name4 = $reportExtraCheck[3]->extra_name;
                        $value4 = $reportExtraCheck[3]->extra_value;
                        $desc4 = $reportExtraCheck[3]->extra_description;
                    }

                    $count++;
                }
            }
            

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $santri->santri_nisn . " / " . $santri->santri_nisn . '<input name="inNISN[]" type="hidden" class="form-control" value="'. $santri->santri_nisn .'" />';
            $row[] = $santri->santri_name;  
            $row[] = $santri->santri_gender;
            $row[] = '<select name="soExtra1Name[]" class="single-select form-select" style="width:250px">
                        <option value="' . $name1 . '">' . $name1 . '</option>
                        ' . $extra . '
                    </select>';
            $row[] = '<select name="soExtra1Value[]" class="single-select form-select" style="width:80px">
                        <option value="' . $value1 . '">' . $value1 . '</option>            
                        <option value="B">B</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra1Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3">' . $desc1. '</textarea>';
            $row[] = '<select name="soExtra2Name[]" class="single-select form-select" style="width:250px">
                        <option value="' . $name2 . '">' . $name2 . '</option>            
                        ' . $extra . '
                    </select>';
            $row[] = '<select name="soExtra2Value[]" class="single-select form-select" style="width:80px">
                        <option value="' . $value2 . '">' . $value2. '</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra2Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3">' . $desc2. '</textarea>';
            $row[] = '<select name="soExtra3Name[]" class="single-select form-select" style="width:250px">
                        <option value="' . $name3. '">' . $name3. '</option>            
                        ' . $extra . '
                    </select>';
            $row[] = '<select name="soExtra3Value[]" class="single-select form-select" style="width:80px">
                        <option value="' . $value3 . '">' . $value3. '</option> 
                        <option value="B">B</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra3Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3">' . $desc3. '</textarea>';
            $row[] = '<select name="soExtra4Name[]" class="single-select form-select" style="width:250px">
                        <option value="' . $name4. '">' . $name4. '</option>            
                        ' . $extra . '
                    </select>';
            $row[] = '<select name="soExtra4Value[]" class="single-select form-select" style="width:80px">
                        <option value="' . $value4 . '">' . $value4. '</option>            
                        <option value="B">B</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra4Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3">' . $desc4. '</textarea>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
