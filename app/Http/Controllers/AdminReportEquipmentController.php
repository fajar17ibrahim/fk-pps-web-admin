<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\ReportEquipment;
use App\Models\Santri;
use App\Models\School;
use App\Models\Kelas;

class AdminReportEquipmentController extends Controller
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
        $kelass = Kelas::orderBy('class_name', 'asc')->get();
        return view('admin.page.report.reportequipment.index', compact('schools'), compact('kelass'));
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
        $equipment = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
        ->leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_npsn')
        ->where('equipment.santri_id', $id)
        ->get();
        return json_encode($equipment);
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
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas != 0) {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas != 0) {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school != 0 && $kelas == 0) {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas == 0) {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas == 0) {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level == 0 && $school == 0 && $kelas != 0) {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        }else {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->get();
        }

        $no = 0;
        $data = array();
        foreach ($equipments as $equipment) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $equipment->santri_nism . " / " . $equipment->santri_nisn;
            $row[] = $equipment->santri_name;
            $row[] = $equipment->santri_gender;
            $row[] = $equipment->equipment_date_download;
            $row[] = '<button type="button" class="btn btn-outline-success radius-30" data-bs-toggle="modal" onclick="listForm(' . $equipment->santri_nisn . ')">Pelengkap Rapor</button>';
            $row[] = '<input type="button" class="btn btn-danger" value="Blok" />';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function reportCover($id)
    {
        //
        $santri = Santri::leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_npsn')
        ->where('santri_nisn', '=', $id)->get();
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-cover', compact('santri'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    //
    public function reportLembaga($id)
    {
        //
        $santri = Santri::leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_npsn')
        ->where('santri_nisn', '=', $id)->get();

        $pdf = PDF::loadView('admin.page.report.reportequipment.report-pkpps-information', compact('santri'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    
    //
    public function reportSantri($id)
    {
        //
        $santri = Santri::leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_npsn')
        ->where('santri_nisn', '=', $id)->get();
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-santri-information', compact('santri'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    //
    public function reportMutation($id)
    {
        //
        $santri = Santri::leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_npsn')
        ->where('santri_nisn', '=', $id)->get();
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-mutation', compact('santri'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
