<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use Illuminate\Http\Request;
use App\Models\MasterBook;
use App\Models\Santri;
use App\Models\School;
use App\Models\Kelas;
use App\Models\ReportPrint;
use App\Models\ReportValue;
use App\Models\ReportExtrakurikuler;
use App\Models\ReportAttendance;

class AdminMasterBookController extends Controller
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
        $user = Session::get('user');
        $kelass = array();
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
        return view('admin.page.masterbook.index', compact('schools'), compact('kelass'));
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
        $masterBook = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('master_book.masterbook_id', $id)
            ->get();

            return json_encode($masterBook);
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

    public function masterbookCover($id)
    {
        //
        $masterBook = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('master_book.santri_nisn', $id)
            ->get();

            // return $masterBook;

        $pdf = PDF::loadView('admin.page.masterbook.masterbook-cover', compact('masterBook'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function masterbookSantri($id)
    {
        //
        $masterBook = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('master_book.santri_nisn', $id)
            ->first();

            // return $masterBook;

            $biodata = array(
                'pps_nama' => $masterBook->school_name,
                'pps_tingkat' => $masterBook->class_level,
                'santri_nama' => $masterBook->santri_name,
                'santri_nism' => $masterBook->santri_nism,
                'santri_nisn' => $masterBook->santri_nisn,
                'santri_jk' => $masterBook->santri_gender,
                'santri_tl' => $masterBook->santri_born_place,
                'santri_tgll' => tanggal($masterBook->santri_born_date),
                'santri_anak_ke' => $masterBook->santri_child_of,
                'santri_jml_sdr_kandung' =>  '',
                'santri_jml_sdr_tiri' =>  '',
                'santri_yatim_piatu' =>  '',
                'santri_golongan_darah' =>  '',
                'santri_riwayat_penyakit' =>  '',
                'santri_tinggi' =>  '',
                'santri_berat' =>  '',
                'santri_pend_sebelum' =>  '',
                'santri_sekolah_asal' =>  $masterBook->santri_last_school,
                'santri_ijazah_no_asal' =>  '',
                'santri_ijazah_tgl_asal' =>  '',
                'santri_pindahan' =>  '',
                'santri_alasan_pindah' => '',
                'santri_diterima_di_kelas' => $masterBook->santri_class_start,
                'santri_diterima_tanggal' => tanggal($masterBook->santri_class_start_date),
                'ayah_nama' => $masterBook->father_name,
                'ayah_nik' => $masterBook->father_nik,
                'ayah_pendidikan' => $masterBook->father_education,
                'ayah_kerja' => $masterBook->father_profession,
                'ayah_penghasilan' => $masterBook->father_salary,
                'ayah_alamat' => $masterBook->santri_address,
                'ibu_nama' => $masterBook->mother_name,
                'ibu_nik' => $masterBook->mother_nik,
                'ibu_pendidikan' => $masterBook->mother_education,
                'ibu_kerja' => $masterBook->mother_profession,
                'ibu_penghasilan' => $masterBook->mother_salary,
                'ibu_alamat' => $masterBook->santri_address,
                'wali_nama' => $masterBook->wali_name,
                'wali_nik' => $masterBook->wali_nik,
                'wali_pendidikan' => $masterBook->wali_education,
                'wali_kerja' => $masterBook->wali_profession,
                'wali_penghasilan' => $masterBook->wali_salary,
                'wali_alamat' => '',
                'santri_lulus' => '',
                'santri_lulus_tgl' => '',
                'santri_pindah' => '',
                'santri_ijazah_no' => '',
                'santri_malanjutkan_ke' => '',
            );

            // return $biodata;

        $pdf = PDF::loadView('admin.page.masterbook.masterbook-santri-information', compact('biodata'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function masterbookReport($id)
    {
        //
        $reportPrints = ReportPrint::leftJoin('santri', 'report_print.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('ustadz','ustadz.ustadz_nik','=','kelas.homeroom_teacher')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','report_print.tahun_pelajaran_id')
            ->leftJoin('semester','semester.semester_id','=','tahun_pelajaran.tahun_pelajaran_semester')
            ->where('report_print.santri_nisn','=', $id)
            ->get();

        $datas = array();
        foreach ($reportPrints as $reportPrint) {
            $biodata = array(
                'pps_nama' => $reportPrint->school_name,
                'pps_alamat' => $reportPrint->school_address,
                'pps_tingkat' => $reportPrint->class_level,
                'santri_nama' => $reportPrint->santri_name,
                'nism' => $reportPrint->santri_nism,
                'nisn' => $reportPrint->santri_nisn,
                'kelas_nama' => $reportPrint->class_name,
                'semester' => $reportPrint->semester_name,
                'tahun_pelajaran' => $reportPrint->tahun_pelajaran_name
            );

            $reportValues = ReportValue::leftJoin('mapel','mapel.mapel_id','=','report_value.mapel_id')
            ->leftJoin('kelompok_mapel','kelompok_mapel.kelompok_id','=','mapel.mapel_kelompok')
            ->where('report_value.class_id', '=', $reportPrint->santri_class)
            ->where('report_value.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
            ->where('report_value.santri_nisn', '=', $id)
            ->get();

            // return $reportValues;

            if (count($reportValues) > 0) {
            $values = array();
            $no = 1;
                foreach ($reportValues as $reportValue) {
                    $value = array(
                        'no' => $no++,
                        'mapel_nama' => $reportValue->mapel_name,
                        'mapel_kkm' => $reportValue->report_kkm,
                        'pas' => $reportValue->pas,
                        'pre_pengetahuan' => $reportValue->knowledge_pre,
                        'hpa' => $reportValue->hpa,
                        'pre_keterampilan' => $reportValue->skills_pre,
                    );

                    $values[] = $value;
                }
            } else {
                $errorMessage = "Nilai Rapor belum diisi";
                return redirect()->route('masterbook.index')
                        ->with('message_error', $errorMessage);
            }
 
            $reportExtras = ReportExtrakurikuler::where('report_extrakurikuler.class_id', '=', $reportPrint->santri_class)
                ->where('report_extrakurikuler.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
                ->where('report_extrakurikuler.santri_nisn', '=', $id)
                ->get();

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
                $errorMessage = "Nilai Extrakurkuler belum diisi";
                return redirect()->route('masterbook.index')
                        ->with('message_error', $errorMessage);
            }

            
            $reportAttendance = ReportAttendance::where('report_attendance.class_id', '=', $reportPrint->santri_class)
                ->where('report_attendance.tahun_pelajaran_id', '=', $reportPrint->tahun_pelajaran_id)
                ->where('report_attendance.santri_nisn', '=', $id)
                ->first();

            if (count($reportAttendance) > 0) {
                $attendance = array(
                    'sakit' => $reportAttendance->s,
                    'izin' => $reportAttendance->i,
                    'alfa' => $reportAttendance->a
                );
            } else {
                $errorMessage = "Nilai Kehadiran belum diisi";
                return redirect()->route('masterbook.index')
                        ->with('message_error', $errorMessage);
            }

            $data = array(
                'biodata' => $biodata,
                'nilai' => $values,
                'extra' => $dataExtra,
                'kehadiran' => $attendance,
            );

            $datas[] = $data;
        }

        // return $datas;
        $pdf = PDF::loadView('admin.page.masterbook.masterbook-report', compact('datas'));
        // $pdf = PDF::loadView('admin.page.masterbook.masterbook-report', compact('reportPrints'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function listData($level, $school, $kelas) {
        if ($level != 0 && $school != 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school != 0 && $kelas == 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas == 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas == 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level == 0 && $school == 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        }else {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->get();
        }

        $no = 0;
        $data = array();
        foreach ($masterBooks as $masterBook) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "NIS : " . $masterBook->santri_nism . "<br>NISN : " . $masterBook->santri_nisn;
            $row[] = $masterBook->santri_name;
            $row[] = $masterBook->santri_gender;
            $row[] = $masterBook->master_book_date_download;
            $row[] = '<button type="button" class="btn btn-outline-success radius-30" data-bs-toggle="modal" onclick="listForm(' . $masterBook->masterbook_id . ')">Buku Induk</button>';
            $row[] = '<input type="button" class="btn btn-danger" value="Blok" />';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
