<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Santri;
use App\Models\Mapel;
use App\Models\Graduation;
use App\Models\Ustadz;
use App\Models\SchoolYear;
use App\Models\ReportValueLast;

class AdminGraduationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $schools = School::orderBy('school_name', 'asc')->get();
            $kelass = Kelas::orderBy('class_id', 'asc')->get();
            $santris = Santri::orderBy('santri_name', 'asc')->get();
        } else {
            $schools = School::orderBy('school_name', 'asc')
            ->where('school.school_id', '=', $user[0]->ustadz_school)
            ->get();

            $kelass = Kelas::orderBy('class_id', 'asc')
            ->where('kelas.class_level', '=', $user[0]->class_level)
            ->get();

            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('kelas.class_level', '=', $user[0]->class_level)
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->get();
        }
        return view('admin.page.graduation.graduated.index', compact('schools'), compact('kelass'))
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

            $user = Session::get('user');
            $satriNISN = $request['soSantri'];

            $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_nisn', '=', $satriNISN)
                ->first();

                // return $santri;

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();

            $graduationCheck = Graduation::where('graduation_santri', '=', $satriNISN)
                ->where('graduation_class', '=', $santri->santri_class)
                ->where('graduation_school','=', $santri->santri_school)
                ->first();

            if (!$graduationCheck) {
                $graduation = new Graduation;
            } else {
                $graduation = $graduationCheck;
            }
            
            $graduation->test_number = $request['inTaskNumber'];
            $graduation->graduation_santri = $satriNISN;
            $graduation->graduation_class = $santri->santri_class;
            $graduation->graduation_school = $santri->santri_school;
            $graduation->graduated_statement = $request['rbLulusTidak'];
            $graduation->graduated_year = $request['inGraduatedYear'];
            $graduation->tahun_pelajaran = $schoolYear->tahun_pelajaran_id;
            $graduation->continue_statement = $request['rbMelanjutkanTidak'];
            $graduation->reason = $request['inTidakMelanjutkNReason'];
            $graduation->continue_to = $request['soJenjangTujuan'];
            $graduation->continue_to_school_status = $request['soStatusSekolahTujuan'];
            
            if (!$graduationCheck) {
                $graduationSaved = $graduation->save();
            } else {
                $graduationSaved = $graduation->update();
            }
            
            $mapelIds = $request['inMapelId'];
            $nuss = $request['inNUS'];
            foreach ($mapelIds as $index => $mapelId) {

                $reportValueLastCheck = ReportValueLast::where('mapel_id', '=', $mapelId)
                ->where('class_id', '=', $santri->santri_class)
                ->where('santri_nisn','=', $satriNISN)
                ->first();

                if (!$reportValueLastCheck) {
                    $reportValueLast = new ReportValueLast;
                } else {
                    $reportValueLast = $reportValueLastCheck;
                }

                $reportValueLast->mapel_id = $mapelId;
                $reportValueLast->class_id = $santri->santri_class;
                $reportValueLast->santri_nisn = $satriNISN;
                $reportValueLast->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $reportValueLast->graduated_year = $request['inGraduatedYear'];
                $reportValueLast->nus = $nuss[$index];

                if (!$reportValueLastCheck) {
                    $reportValueLastSaved = $reportValueLast->save();
                } else {
                    $reportValueLastSaved = $reportValueLast->update();
                }
                
            }

            if ($graduationSaved && $reportValueLastSaved) {
                return redirect()->route('graduation.index')
                ->with('message_success', 'Data berhasil disimpan.');
            } else {
                return redirect()->route('graduation.index')
                ->with('message_error', 'Data gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('graduation.index')
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
        try {
            $user = Session::get('user');
            $satriNISN = $request['soSantri'];

            $santri = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_nisn', '=', $satriNISN)
                ->first();

            $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();

            $graduation = Graduation::find($id);
            $graduation->test_number = $request['inTaskNumber'];
            $graduation->graduation_santri = $satriNISN;
            $graduation->graduation_class = $request['soKelas'];
            $graduation->graduation_school = $santri->santri_school;
            $graduation->graduated_statement = $request['rbLulusTidak'];
            $graduation->graduated_year = $request['inGraduatedYear'];
            $graduation->tahun_pelajaran = $schoolYear->tahun_pelajaran_id;
            $graduation->continue_statement = $request['rbMelanjutkanTidak'];
            $graduation->reason = $request['inTidakMelanjutkNReason'];
            $graduation->continue_to = $request['soJenjangTujuan'];
            $graduation->continue_to_school_status = $request['soStatusSekolahTujuan'];
            $graduationSaved = $graduation->update();
            
            $mapelIds = $request['inMapelId'];
            $nuss = $request['inNUS'];
            foreach ($mapelIds as $index => $mapelId) {
                $reportValueLastCheck = ReportValueLast::where('mapel_id', '=', $mapelId)
                ->where('class_id', '=', $santri->santri_class)
                ->where('santri_nisn','=', $satriNISN)
                ->first();

                if (!$reportValueLastCheck) {
                    $reportValueLast = new ReportValueLast;
                } else {
                    $reportValueLast = $reportValueLastCheck;
                }

                $reportValueLast->mapel_id = $mapelId;
                $reportValueLast->class_id = $santri->santri_class;
                $reportValueLast->santri_nisn = $satriNISN;
                $reportValueLast->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
                $reportValueLast->graduated_year = $request['inGraduatedYear'];
                $reportValueLast->nus = $nuss[$index];

                if (!$reportValueLastCheck) {
                    $reportValueLastSaved = $reportValueLast->save();
                } else {
                    $reportValueLastSaved = $reportValueLast->update();
                }
                
            }

            if ($graduationSaved && $reportValueLastSaved) {
                return redirect()->route('graduation.index')
                ->with('message_success', 'Data berhasil diperbarui.');
            } else {
                return redirect()->route('graduation.index')
                ->with('message_error', 'Data gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('graduation.index')
            ->with('message_error', $e->getMessage());
        }
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

    public function graduationAdd()
    {
        //
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $santris = Santri::orderBy('santri_name', 'asc')->get();
        } else {

            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('kelas.class_level', '=', $user[0]->class_level)
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->get();
        }

        $mapels = Mapel::orderBy('mapel_name', 'asc')->get();
        return view('admin.page.graduation.graduated.graduation-add', compact('santris'), compact('mapels'));
    }

    public function graduationEdit($id)
    {
        //
        $user = Session::get('user');
        $ustadzsCheck = Ustadz::orderBy('ustadz_name', 'asc')->get();

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

            $santris = Santri::orderBy('santri_name', 'asc')->get();
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

            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('kelas.class_level', '=', $user[0]->class_level)
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->get();
        }

        $graduationCheck = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','graduation.tahun_pelajaran')
            ->leftJoin('school','school.school_id','=','graduation.graduation_school')
            ->where('graduation.graduation_id', '=', $id)
            ->first();

        if (!$graduationCheck) {
            return redirect()->route('graduation.index')
            ->with('message_error', 'Data tidak ditemukan.');
        }

        $reportValuesLasts = ReportValueLast::leftJoin('mapel','mapel.mapel_id','=','report_value_last.mapel_id')
            ->leftJoin('kelompok_mapel','kelompok_mapel.kelompok_id','=','mapel.mapel_kelompok')
            ->where('report_value_last.class_id', '=', $graduationCheck->graduation_class)
            ->where('report_value_last.tahun_pelajaran_id', '=', $graduationCheck->tahun_pelajaran_id)
            ->where('report_value_last.graduated_year', '=', $graduationCheck->graduated_year)
            ->where('report_value_last.santri_nisn', '=', $graduationCheck->santri_nisn)
            ->get();

        if (count($reportValuesLasts) == 0) {
            return redirect()->route('graduation.index')
            ->with('message_error', 'Nilai Akhir belum di input.');
        }

        $lastValue = array();
        foreach($reportValuesLasts as $reportValuesLast) {
            $data = array(
                'mapel_kode' => $reportValuesLast->mapel_id,
                'mapel_nama' => $reportValuesLast->mapel_name,
                'nus' => $reportValuesLast->nus
            );

            $lastValue[] = $data;
        }

        $lulus = '';
        $tidak = '';
        if ($graduationCheck->graduated_statement == 'Lulus') {
            $lulus = 'checked';
        } else {
            $tidak = 'checked';
        }

        $melanjutkan = '';
        $tidak_melanjutkan = '';
        if ($graduationCheck->continue_statement == 'Melanjutkan') {
            $melanjutkan = 'checked';
        } else {
            $tidak_melanjutkan = 'checked';
        }

        $graduation = array(
            'id' => $graduationCheck->graduation_id,
            'nisn' => $graduationCheck->santri_nisn,
            'santri_nama' => $graduationCheck->santri_nisn . " - " . $graduationCheck->santri_name,
            'kelas_jenjang' => $graduationCheck->class_level,
            'kelas_kode' => $graduationCheck->class_id,
            'kelas_nama' => $graduationCheck->class_name,
            'lulus' => $lulus,
            'tidak' => $tidak,
            'lulus_tahun' => $graduationCheck->graduated_year,
            'nomor_ujian' => $graduationCheck->test_number,
            'melanjutkan' => $melanjutkan,
            'melanjutkan_tidak' => $tidak_melanjutkan,
            'alasan' => $graduationCheck->reason,
            'sekolah_dest_level' => $graduationCheck->continue_to,
            'sekolah_dest_status' => $graduationCheck->continue_to_school_status,
            'nilai_akhir' => $lastValue
        );

        // return $graduation;

        return view('admin.page.graduation.graduated.graduation-edit', compact('santris'))
            ->with('graduation', $graduation)
            ->with('kelass', $kelass);
    }

    public function graduationPrintLetter($id) {
        $graduation = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('tahun_pelajaran','tahun_pelajaran.tahun_pelajaran_id','=','graduation.tahun_pelajaran')
            ->leftJoin('school','school.school_id','=','graduation.graduation_school')
            ->where('graduation.graduation_id', '=', $id)
            ->first();

            // return $graduation;

            $kepsek = Ustadz::where('ustadz.ustadz_nik', '=', $graduation->school_headship)
            ->first();

            if ($graduation->class_level == 'Ula') {
                $setara = "SD/MI";
            } else if ($graduation->class_level == 'Wustha') {
                $setara = "SMP/MTS";
            } else {
                $setara = "SMA/MA";
            }

        $reportValuesLast = ReportValueLast::leftJoin('mapel','mapel.mapel_id','=','report_value_last.mapel_id')
            ->leftJoin('kelompok_mapel','kelompok_mapel.kelompok_id','=','mapel.mapel_kelompok')
            ->where('report_value_last.class_id', '=', $graduation->graduation_class)
            ->where('report_value_last.tahun_pelajaran_id', '=', $graduation->tahun_pelajaran_id)
            ->where('report_value_last.graduated_year', '=', $graduation->graduated_year)
            ->where('report_value_last.santri_nisn', '=', $graduation->santri_nisn)
            ->get();

            // return $reportValuesLast;

            if (count($reportValuesLast) == 0) {
                return redirect()->route('graduation.index')
                ->with('message_error', 'Nilai Akhir belum di input.');
            }

            $values = array();
            $no = 1;
            $nilaiTotal = 0;
            foreach ($reportValuesLast as $reportValueLast) {
                $value = array(
                    'no' => $no++,
                    'mapel_nama' => $reportValueLast->mapel_name,
                    'nus' => $reportValueLast->nus,
                );

                $nilaiTotal = (float) $nilaiTotal + (float) $reportValueLast->nus;

                $values[] = $value;
            }

            $average = $nilaiTotal / count($reportValuesLast);

            $data = array(
                'pps_nama' => $graduation->school_name,
                'pps_level' => $graduation->class_level,
                'pps_setara_level' => $setara,
                'pps_npsn' => $graduation->school_npsn,
                'pps_kota_prov' => $graduation->school_city . " Provinsi " . $graduation->school_province,
                'pps_kota' => $graduation->school_city,
                'pps_kepsek' => $kepsek->ustadz_name,
                'ayah_nama' => $graduation->father_name,
                'tahun_pelajaran' => $graduation->tahun_pelajaran_name,
                'nomor_ujian' => $graduation->test_number,
                'santri_nama' => $graduation->santri_name,
                'santri_ttl' => $graduation->santri_born_place . ", " . tanggal($graduation->santri_born_date),
                'santri_nism' => $graduation->santri_nism,
                'santri_nisn' => $graduation->santri_nisn,
                'santri_lulus' => $graduation->graduated_statement,
                'nilai' => $values,
                'nilai_rata_rata' => round($average)
            );

        // return $data;

        $pdf = PDF::loadView('admin.page.graduation.graduated.graduation-print-letter', compact('data'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function listData($level, $school) {
        if ($level != 0 && $school != 0) {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_id','=','graduation.graduation_school')
            ->where('kelas.class_level', '=', $level)
            ->where('graduation.graduation_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0) {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_id','=','graduation.graduation_school')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0) {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_id','=','graduation.graduation_school')
            ->where('graduation.graduation_school', '=', $school)
            ->get();
        } else {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_id','=','graduation.graduation_school')
            ->get();
        } 
        
        $no = 0;
        $data = array();
        foreach ($graduations as $graduation) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $graduation->santri_nisn;
            $row[] = $graduation->santri_name;  
            if ($graduation->graduated_statement == 'Lulus') {
                $label = 'success';
            } else {
                $label = 'danger';
            }
            $row[] = '<span class="badge bg-'. $label .'">'. $graduation->graduated_statement .'</span>';
            $row[] = $graduation->graduated_year;
            $row[] = '<a href="graduation-print-letter/'. $graduation->graduation_id .'">Cetak</a>';
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="graduation-edit/'. $graduation->graduation_id .'" class="btn btn-success px-4 ms-auto"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
