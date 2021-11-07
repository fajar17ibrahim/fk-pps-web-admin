<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;

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
            $row[] = '<select class="single-select form-select" style="width:250px">
                        <option value="United States">Pendidikan Kepramukaan</option>
                        <option value="United States">Drumband</option>
                        <option value="United States">Sepak Bola</option>
                        <option value="United States">Palang Merah Remaja</option>
                        <option value="United States">Catur</option>
                        <option value="United States">Sepak Bola</option>
                    </select>';
            $row[] = '<select class="single-select form-select" style="width:80px">
                        <option value="United States">B</option>
                        <option value="United States">SB</option>
                        <option value="United States">C</option>
                    </select>';
            $row[] = '<textarea class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $row[] = '<select class="single-select form-select" style="width:250px">
                        <option value="United States">Pendidikan Kepramukaan</option>
                        <option value="United States">Drumband</option>
                        <option value="United States">Sepak Bola</option>
                        <option value="United States">Palang Merah Remaja</option>
                        <option value="United States">Catur</option>
                        <option value="United States">Sepak Bola</option>
                    </select>';
            $row[] = '<select class="single-select form-select" style="width:80px">
                        <option value="United States">B</option>
                        <option value="United States">SB</option>
                        <option value="United States">C</option>
                    </select>';
            $row[] = '<textarea class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $row[] = '<select class="single-select form-select" style="width:250px">
                        <option value="United States">Pendidikan Kepramukaan</option>
                        <option value="United States">Drumband</option>
                        <option value="United States">Sepak Bola</option>
                        <option value="United States">Palang Merah Remaja</option>
                        <option value="United States">Catur</option>
                        <option value="United States">Sepak Bola</option>
                    </select>';
            $row[] = '<select class="single-select form-select" style="width:80px">
                        <option value="United States">B</option>
                        <option value="United States">SB</option>
                        <option value="United States">C</option>
                    </select>';
            $row[] = '<textarea class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $row[] = '<select class="single-select form-select" style="width:250px">
                        <option value="United States">Pendidikan Kepramukaan</option>
                        <option value="United States">Drumband</option>
                        <option value="United States">Sepak Bola</option>
                        <option value="United States">Palang Merah Remaja</option>
                        <option value="United States">Catur</option>
                        <option value="United States">Sepak Bola</option>
                    </select>';
            $row[] = '<select class="single-select form-select" style="width:80px">
                        <option value="United States">B</option>
                        <option value="United States">SB</option>
                        <option value="United States">C</option>
                    </select>';
            $row[] = '<textarea class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $row[] = '<textarea class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
