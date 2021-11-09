<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\ReportPrint;
use App\Models\ReportValue;
use App\Models\Santri;
use App\Models\School;
use App\Models\Kelas;

class AdminReportPrintController extends Controller
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
        return view('admin.page.report.reportprint.index', compact('schools'), compact('kelass'));
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
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas != 0) {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas != 0) {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school != 0 && $kelas == 0) {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas == 0) {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas == 0) {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level == 0 && $school == 0 && $kelas != 0) {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        }else {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->get();
        }

        $no = 0;
        $data = array();
        foreach ($reportPrints as $report_print) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $report_print->santri_nism . " / " . $report_print->santri_nisn;
            $row[] = $report_print->santri_name;
            $row[] = $report_print->santri_gender;
            $row[] = $report_print->report_print_date_download;
            $row[] = '<a href="report-uts-print-pdf/' . $report_print->santri_nisn. '">rapor-uts.pdf</a>';
            $row[] = '<a href="/report-uas-print-pdf/' . $report_print->santri_nisn. '">rapor-uas.pdf</a>';
            $row[] = '<input type="button" class="btn btn-danger" value="Blok Rapor" />';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function utsExportPdf($id) {
        
        $reportPrint = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
            ->leftJoin('semester','semester.semester_id','=','tahun_pelajaran.tahun_pelajaran_semester')
            ->where('report_print.santri_nisn','=', $id)
            ->first();


        $reportValues = ReportValue::leftJoin('mapel','mapel.mapel_id','=','report_value.mapel_id')
            ->where('report_value.class_id', '=', $reportPrint->santri_class)
            ->where('report_value.santri_nisn', '=', $id)
            ->get();

        $pdf = PDF::loadView('admin.page.report.reportprint.uts-export-pdf', compact('reportPrint'), compact('reportValues'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function uasExportPdf($id) {
        $reportPrint = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('report_print.santri_nisn','=', $id)
            ->get();
            
        $pdf = PDF::loadView('admin.page.report.reportprint.uas-export-pdf', compact('reportPrint'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
