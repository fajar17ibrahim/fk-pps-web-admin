<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;
use App\Models\SchoolYear;
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

        $schools = School::orderBy('school_name', 'asc')->get();
        $kelass = Kelas::orderBy('class_name', 'asc')->get();
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

                if ($extra1Name[$index] != "") {
                    $extrakurikuler = new ReportExtrakurikuler;
                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra1Name[$index];
                    $extrakurikuler->extra_value = $extra1Value[$index];
                    $extrakurikuler->extra_description = $extra1Desc[$index];
                    $save = $extrakurikuler->save();
                }

                if ($extra2Name[$index] != "") {
                    $extrakurikuler = new ReportExtrakurikuler;
                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra2Name[$index];
                    $extrakurikuler->extra_value = $extra2Value[$index];
                    $extrakurikuler->extra_description = $extra2Desc[$index];
                    $save = $extrakurikuler->save();
                }

                if ($extra3Name[$index] != "") {
                    $extrakurikuler = new ReportExtrakurikuler;
                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra3Name[$index];
                    $extrakurikuler->extra_value = $extra3Value[$index];
                    $extrakurikuler->extra_description = $extra3Desc[$index];
                    $save = $extrakurikuler->save();
                }

                if ($extra4Name[$index] != "") {
                    $extrakurikuler = new ReportExtrakurikuler;
                    $extrakurikuler->santri_nisn = $santri->santri_nisn;
                    $extrakurikuler->class_id = $santri->santri_class;
                    $extrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                    $extrakurikuler->extra_name = $extra4Name[$index];
                    $extrakurikuler->extra_value = $extra4Value[$index];
                    $extrakurikuler->extra_description = $extra4Desc[$index];
                    $save = $extrakurikuler->save();
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
        if ($level != 0 && $school != 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('kelas.class_level', '=', $level)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school != 0 && $kelas == 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas == 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas == 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level == 0 && $school == 0 && $kelas != 0) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        }else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
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
            $row[] = '<select name="soExtra1Name[]" class="single-select form-select" style="width:250px">
                        <option value="">Tidak Ada</option>
                        <option value="Pendidikan Kepramukaan">Pendidikan Kepramukaan</option>
                        <option value="Drumband">Drumband</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Palang Merah Remaja">Palang Merah Remaja</option>
                        <option value="Catur">Catur</option>
                    </select>';
            $row[] = '<select name="soExtra1Value[]" class="single-select form-select" style="width:80px">
                        <option value="B">B</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra1Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $row[] = '<select name="soExtra2Name[]" class="single-select form-select" style="width:250px">
                        <option value="">Tidak Ada</option>
                        <option value="Pendidikan Kepramukaan">Pendidikan Kepramukaan</option>
                        <option value="Drumband">Drumband</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Palang Merah Remaja">Palang Merah Remaja</option>
                        <option value="Catur">Catur</option>
                    </select>';
            $row[] = '<select name="soExtra2Value[]" class="single-select form-select" style="width:80px">
                        <option value="B">B</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra2Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $row[] = '<select name="soExtra3Name[]" class="single-select form-select" style="width:250px">
                        <option value="">Tidak Ada</option>
                        <option value="Pendidikan Kepramukaan">Pendidikan Kepramukaan</option>
                        <option value="Drumband">Drumband</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Palang Merah Remaja">Palang Merah Remaja</option>
                        <option value="Catur">Catur</option>
                    </select>';
            $row[] = '<select name="soExtra3Value[]" class="single-select form-select" style="width:80px">
                        <option value="B">B</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra3Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $row[] = '<select name="soExtra4Name[]" class="single-select form-select" style="width:250px">
                        <option value="">Tidak Ada</option>
                        <option value="Pendidikan Kepramukaan">Pendidikan Kepramukaan</option>
                        <option value="Drumband">Drumband</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Palang Merah Remaja">Palang Merah Remaja</option>
                        <option value="Catur">Catur</option>
                    </select>';
            $row[] = '<select name="soExtra4Value[]" class="single-select form-select" style="width:80px">
                        <option value="B">B</option>
                        <option value="SB">SB</option>
                        <option value="C">C</option>
                    </select>';
            $row[] = '<textarea name="taExtra4Desc[]" class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
