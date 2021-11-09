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
            ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
            ->leftJoin('semester','semester.semester_id','=','tahun_pelajaran.tahun_pelajaran_semester')
            ->where('report_print.santri_nisn','=', $id)
            ->first();

        $reportValues = ReportValue::leftJoin('mapel','mapel.mapel_id','=','report_value.mapel_id')
        ->leftJoin('kelompok_mapel','kelompok_mapel.kelompok_id','=','mapel.mapel_kelompok')
        ->where('report_value.class_id', '=', $reportPrint->santri_class)
        ->where('report_value.santri_nisn', '=', $id)
        ->get();

        $biodata = array(
            'pps_nama' => $reportPrint->school_name,
            'pps_alamat' => $reportPrint->school_address,
            'santri_nama' => $reportPrint->santri_name,
            'santri_no_induk' => $reportPrint->santri_nism,
            'kelas_nama' => $reportPrint->class_name,
            'semester' => $reportPrint->semester_name,
            'tahun_pelajaran' => $reportPrint->tahun_pelajaran_name,
            'ayah_nama' => $reportPrint->father_name,
            'sekolah_kota' => $reportPrint->school_city
        );


        $kelompokMapels = array();
        $kelompokMapel = '';
        foreach ($reportValues as $reportValue) {
            if ($kelompokMapel != $reportValue->kelompok_name) {
                $kelompokMapels[] = $reportValue->kelompok_name;
            }
            $kelompokMapel = $reportValue->kelompok_name;
        }

        // return $kelompokMapels;

        $valuesByKelompok = array();
        $no = 0;
        $sumJp = 0;
        $sumKnowledgeValue = 0;
        $sumSkillsValue = 0;
        $sumAverage = 0;
        $sumNxB = 0;
        foreach ($kelompokMapels as $kelompokMapel) {
            $values = array();
            foreach ($reportValues as $reportValue) {
                if ($reportValue->kelompok_name == $kelompokMapel) {
                    $no++;
                    $row = array(
                        'no' => $no,
                        'mapel_nama' => $reportValue->mapel_name,
                        'kkm' => $reportValue->report_kkm,
                        'jp' => $reportValue->jp,
                        'p1' => $reportValue->p1,
                        'p2' => $reportValue->p2,
                        'p3' => $reportValue->p3,
                        'p4' => $reportValue->p4,
                        'p5' => $reportValue->p5,
                        'p6' => $reportValue->p6,
                        'p7' => $reportValue->p7,
                        'p8' => $reportValue->p8,
                        'p9' => $reportValue->p9,
                        'p10' => $reportValue->p10,
                        'rph' => $reportValue->rph,
                        'pts' => $reportValue->pts,  
                        'pas' => $reportValue->pas,
                        'pre_pengetahuan' => $reportValue->knowledge_pre,
                        'deskripsi_pengetahuan' => $reportValue->knowledge_desc,
                        'k1' => $reportValue->k1,
                        'k2' => $reportValue->k2,
                        'k3' => $reportValue->k3,
                        'k4' => $reportValue->k4,
                        'k5' => $reportValue->k5,
                        'k6' => $reportValue->k6,
                        'k7' => $reportValue->k7,
                        'k8' => $reportValue->k8,
                        'k9' => $reportValue->k9,
                        'k10' => $reportValue->k10,
                        'hpa' => $reportValue->hpa,
                        'pre_keterampilan' => $reportValue->skills_pre,  
                        'deskripsi_keterampilan' => $reportValue->skills_desc,
                        'average' => ((float) $reportValue->pas + (float) $reportValue->hpa) / 2,
                        'nxb' => ((((float) $reportValue->pas + (float) $reportValue->hpa) / 2) + (float) $reportValue->jp) / 2,
                    );
                    $values[] = $row;
                    $sumJp += (float) $reportValue->jp;
                    $sumKnowledgeValue += (float) $reportValue->pas;
                    $sumSkillsValue += (float) $reportValue->hpa;
                    $sumAverage += ((float) $reportValue->pas + (float) $reportValue->hpa) / 2;
                    $sumNxB += ((((float) $reportValue->pas + (float) $reportValue->hpa) / 2) + (float) $reportValue->jp) / 2; 
                }
            }
            $valuesByKelompok[] = array(
                'kelompok' => $kelompokMapel,  
                'mapel' => $values);
        }

        // return $valuesByKelompok;

        $knowledge = array(
            'pps_nama' => $reportPrint->school_name,
            'pps_alamat' => $reportPrint->school_address 
            . " RT/RW " . $reportPrint->school_rt_rw
            . ", " . $reportPrint->school_districts
            . ", " . $reportPrint->school_city
            . " " . $reportPrint->school_province,
            'santri_nama' => $reportPrint->santri_name,
            'santri_no_induk' => $reportPrint->santri_nism,
            'kelas_nama' => $reportPrint->class_name,
            'semester' => $reportPrint->semester_name,
            'tahun_pelajaran' => $reportPrint->tahun_pelajaran_name,
            'ayah_nama' => $reportPrint->father_name,
            'sekolah_kota' => $reportPrint->school_city
        );

        $data = array(
            'biodata' => $biodata,
            'nilai' => $valuesByKelompok,
            'totol_jp' => $sumJp,
            'totol_pengetahuan' => $sumKnowledgeValue,
            'totol_keterampilan' => $sumSkillsValue,  
            'totol_average' => $sumAverage,  
            'totol_nxb' => $sumNxB,  
        );

        // return $data;
            // $dataRaport = json_encode($data);
            
        $pdf = PDF::loadView('admin.page.report.reportprint.uas-export-pdf', compact('data'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
