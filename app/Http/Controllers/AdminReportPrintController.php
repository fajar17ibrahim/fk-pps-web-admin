<?php

namespace App\Http\Controllers;

use URL;
use PDF;
use Session;
use Illuminate\Http\Request;
use App\Models\ReportPrint;
use App\Models\ReportValue;
use App\Models\Santri;
use App\Models\Ustadz;
use App\Models\School;
use App\Models\Kelas;
use App\Models\ReportAttitude;
use App\Models\ReportExtrakurikuler;
use App\Models\ReportAchievement;
use App\Models\ReportAttendance;
use App\Models\ReportHomeRoomTeacher;

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
        $this->authorize('report-value');
            
        $user = Session::get('user');
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
        $schools = School::orderBy('school_name', 'asc')->get();
        // $kelass = Kelas::orderBy('class_name', 'asc')->get();
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
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            if ($level != 0 && $school != 0 && $kelas != 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->where('kelas.class_level', '=', $level)
                ->where('santri.santri_school', '=', $school)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas != 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->where('kelas.class_level', '=', $level)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas != 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->where('santri.santri_school', '=', $school)
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            } else if ($level != 0 && $school != 0 && $kelas == 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->where('kelas.class_level', '=', $level)
                ->where('santri.santri_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas == 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->where('kelas.class_level', '=', $level)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas == 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->where('santri.santri_school', '=', $school)
                ->get();
            } else if ($level == 0 && $school == 0 && $kelas != 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->where('kelas.class_id', '=', $kelas)
                ->get();
            }else {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                ->get();
            }
        } else if ($user[0]->role_id == 2) {
            if ($kelas != 0) {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                    ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                    ->where('school.school_id', '=', $user[0]->ustadz_school)
                    ->where('kelas.class_id', '=', $kelas)
                    ->get();
            } else {
                $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                    ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                    ->where('santri.santri_school', '=', $user[0]->ustadz_school)
                    ->get();
            }
        } else {
            $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
                    ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
                    ->where('school.school_id', '=', $user[0]->ustadz_school)
                    ->where('kelas.class_id', '=', $user[0]->ustadz_class)
                    ->get();
        }

        // return $reportPrints;

        $no = 0;
        $data = array();
        foreach ($reportPrints as $report_print) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "NIS : " . $report_print->santri_nism . "<br>NISN :  " . $report_print->santri_nisn;
            $row[] = $report_print->santri_name;
            $row[] = $report_print->tahun_pelajaran_name . " - " . $report_print->tahun_pelajaran_semester;
            $row[] = '<a href="' . URL::to('/') .'/report-uts-print-pdf/' . $report_print->report_id . '">rapor-uts.pdf</a>';
            $row[] = '<a href="' . URL::to('/') .'/report-uas-print-pdf/' . $report_print->report_id . '">rapor-uas.pdf</a>';
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
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
            ->leftJoin('semester','semester.semester_id','=','tahun_pelajaran.tahun_pelajaran_semester')
            ->where('report_print.report_id','=', $id)
            ->first();

        $reportValues = ReportValue::leftJoin('mapel','mapel.mapel_id','=','report_value.mapel_id')
        ->where('report_value.class_id', '=', $reportPrint->santri_class)
        ->where('report_value.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
            ->where('report_value.santri_nisn', '=', $reportPrint->santri_nisn)
            ->get();

            // return $reportValues;

        $pdf = PDF::loadView('admin.page.report.reportprint.uts-export-pdf', compact('reportPrint'), compact('reportValues'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function uasExportPdf($id) {
        $errorMessage = "";
        $reportPrint = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
            ->leftJoin('school','kelas.class_school','=','school.school_id')
            ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
            ->leftJoin('semester','semester.semester_id','=','tahun_pelajaran.tahun_pelajaran_semester')
            ->where('report_print.report_id','=', $id)
            ->first();

            // return $reportPrint;

        $user = Session::get('user');

        $schoolHeadship = Ustadz::where('ustadz.ustadz_nik', '=', $user[0]->school_headship)
        ->first();

        // return $schoolHeadship;

        if ($schoolHeadship == null) {
            $errorMessage = "Kepala Sekolah tidak lengkap";
            return redirect()->route('report-print.index')
                    ->with('message_error', $errorMessage);
        }

        if ($reportPrint) {
            $biodata = array(
                'pps_nama' => $reportPrint->school_name,
                'pps_alamat' => $reportPrint->school_address,
                'pps_tingkat' => $reportPrint->class_level,
                'santri_nama' => $reportPrint->santri_name,
                'santri_no_induk' => $reportPrint->santri_nism,
                'kelas_nama' => $reportPrint->class_name,
                'wali_kelas' => $reportPrint->ustadz_name,
                'semester' => $reportPrint->semester_name,
                'tahun_pelajaran' => $reportPrint->tahun_pelajaran_name,
                'ayah_nama' => $reportPrint->father_name,
                'sekolah_kota' => $reportPrint->school_city,
                'kepala_sekolah' => $schoolHeadship->ustadz_name
            );
        } else {
            $errorMessage = "Biodata tidak lengkap";
            return redirect()->route('report-print.index')
                    ->with('message_error', $errorMessage);
        }

        $reportReportAttitude = ReportAttitude::where('report_attitude.class_id', '=', $reportPrint->santri_class)
        ->where('report_attitude.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
        ->where('report_attitude.santri_nisn', '=', $reportPrint->santri_nisn)
        ->first();

        // return $reportReportAttitude;

        if ($reportReportAttitude) {
            $attitude = array(
                'spiritual_pred' => $reportReportAttitude->spiritual_attitude_pred,
                'spiritual_baik_desc' => $reportReportAttitude->good_spiritual_attitude,
                'spiritual_kurang_desc' => $reportReportAttitude->lack_of_spiritual_attitude,
                'sosial_pred' => $reportReportAttitude->sosial_attitude_pred,
                'sosial_baik_desc' => $reportReportAttitude->good_sosial_attitude,
                'sosial_kurang_desc' => $reportReportAttitude->lack_of_sosial_attitude,
            );
        } else {
            $errorMessage = "Nilai Sikap tidak lengkap";
            return redirect()->route('report-print.index')
                    ->with('message_error', $errorMessage);
        }

        $reportValues = ReportValue::leftJoin('mapel','mapel.mapel_id','=','report_value.mapel_id')
        ->leftJoin('kelompok_mapel','kelompok_mapel.kelompok_id','=','mapel.mapel_kelompok')
        ->where('report_value.class_id', '=', $reportPrint->santri_class)
        ->where('report_value.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
        ->where('report_value.santri_nisn', '=', $reportPrint->santri_nisn)
        ->get();

        if ($reportValues) {
            $kelompokMapels = array();
            $kelompokMapel = '';
            foreach ($reportValues as $reportValue) {
                if ($kelompokMapel != $reportValue->kelompok_name) {
                    $kelompokMapels[] = $reportValue->kelompok_name;
                }
                $kelompokMapel = $reportValue->kelompok_name;
            }

            $valuesByKelompok = array();
            $kkms = array();
            $kkmPreve = "";
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
                            'pas' => round($reportValue->pas),
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
                            'average' => round(((float) $reportValue->pas + (float) $reportValue->hpa) / 2)
                        );
                        $values[] = $row;
                        $sumKnowledgeValue += (float) $reportValue->pas;
                        $sumSkillsValue += (float) $reportValue->hpa;
                        $sumAverage += ((float) $reportValue->pas + (float) $reportValue->hpa) / 2;
                    
                        if ($kkmPreve != $reportValue->report_kkm) {
                            $intevalPred = (100 - (float) $reportValue->report_kkm) / 3;
                            $predD = $reportValue->report_kkm;
                            $predC = (float) $reportValue->report_kkm + $intevalPred;
                            $predB = (float) $reportValue->report_kkm + ($intevalPred * 2);
                            $predA = (float) $reportValue->report_kkm + ($intevalPred * 3);
                            $kkms[] = array(
                                'kkm' => $reportValue->report_kkm,
                                'D' => "< " . round($predD),
                                'C' => round($predD + 1) . " - " . round($predC),
                                'B' => round($predC + 1) . " - " . round($predB),
                                'A' => round($predB + 1) . " - " . round($predA));
                        }

                        $kkmPreve = $reportValue->report_kkm;
                    }
                }
                
                $valuesByKelompok[] = array(
                    'kelompok' => $kelompokMapel,  
                    'mapel' => $values);
            }
        } else {
            $errorMessage = "Nilai Mapel tidak lengkap";
            return redirect()->route('report-print.index')
                    ->with('message_error', $errorMessage);
        }

        $reportExtras = ReportExtrakurikuler::where('report_extrakurikuler.class_id', '=', $reportPrint->santri_class)
        ->where('report_extrakurikuler.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
        ->where('report_extrakurikuler.santri_nisn', '=', $reportPrint->santri_nisn)
        ->get();

        // return $reportExtras;

        if (count($reportExtras) > 0) {
            $dataExtra = array();
            $no = 1;
            foreach ($reportExtras as $reportExtra) {
                $extra = array(
                    'no' => $no++,
                    'extra_nama' => $reportExtra->extra_name,
                    'extra_nilai' => $reportExtra->extra_value,
                    'extra_deskripsi' => $reportExtra->extra_description
                );

                $dataExtra[] = $extra;
            }
        } else {
            $extra = array(
                'no' => '-',
                'extra_nama' => '-',
                'extra_nilai' => '-',
                'extra_deskripsi' => '-'
            );

            $dataExtra[] = $extra;
        }

        $reportAchievements = ReportAchievement::where('report_achievement.class_id', '=', $reportPrint->santri_class)
        ->where('report_achievement.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
        ->where('report_achievement.santri_nisn', '=', $id)
        ->get();

        if (count($reportAchievements) > 0) {
            $dataAchievement = array();
            $no = 1;
            foreach ($reportAchievements as $reportAchievement) {
                $achievement = array(
                    'no' => $no++,
                    'prestasi_nama' => $reportAchievement->achievement_name,
                    'prestasi_deskripsi' => $reportAchievement->achievement_description
                );

                $dataAchievement[] = $achievement;
            }
        } else {
            $achievement = array(
                'no' => '-',
                'prestasi_nama' => '-',
                'prestasi_deskripsi' => '-'
            );

            $dataAchievement[] = $achievement;
        }

        $reportAttendance = ReportAttendance::where('report_attendance.class_id', '=', $reportPrint->santri_class)
        ->where('report_attendance.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
        ->where('report_attendance.santri_nisn', '=', $reportPrint->santri_nisn)
        ->first();

        // return $reportPrint->santri_nisn;

        if ($reportAttendance) {
            $attendance = array(
                'sakit' => $reportAttendance->s,
                'izin' => $reportAttendance->i,
                'alfa' => $reportAttendance->a
            );
        } else {
            $errorMessage = "Nilai Absensi tidak lengkap";
            return redirect()->route('report-print.index')
                    ->with('message_error', $errorMessage);
        }

        $reportHomeRoomTeacherNote = ReportHomeRoomTeacher::where('report_home_room_teacher.class_id', '=', $reportPrint->santri_class)
        ->where('report_home_room_teacher.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
        ->where('report_home_room_teacher.santri_nisn', '=', $reportPrint->santri_nisn)
        ->first();

        if ($reportHomeRoomTeacherNote) {
            $homeroomteachernotes = array(
                'ranking' => $reportHomeRoomTeacherNote->ranking,
                'catatan_ranking' => $reportHomeRoomTeacherNote->notes_by_ranking,
                'catatan_pilihan' => $reportHomeRoomTeacherNote->notes_by_option
            );
        } else {
            $errorMessage = "Catatan Wali Kelas tidak lengkap";
            return redirect()->route('report-print.index')
                    ->with('message_error', $errorMessage);
        }

        // return $dataAchievement;

        $data = array(
            'biodata' => $biodata,
            'sikap' => $attitude,
            'nilai' => $valuesByKelompok,
            'kkm' => $kkms,
            'total_pengetahuan' => round($sumKnowledgeValue),
            'total_keterampilan' => round($sumSkillsValue),  
            'total_average' => round($sumAverage),
            'extra' => $dataExtra,
            'prestasi' => $dataAchievement,
            'kehadiran' => $attendance,
            'catatan_wali_kelas' => $homeroomteachernotes
        );

        // return $data;
            // $dataRaport = json_encode($data);
            
            $pdf = PDF::loadView('admin.page.report.reportprint.uas-export-pdf', compact('data'));
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream();
            
    }
}
