<?php

namespace App\Http\Controllers;

use PDF;
use Session;
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
                ->where('class_level', '=', $user[0]->school_level)
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
        }
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
        $equipmentData = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
            ->leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
            ->leftJoin('school', 'santri.santri_school', '=', 'school.school_id')
            ->where('equipment.equipment_id', $id)
            ->first();

            $kelasStart = Kelas::where('class_id', '=', $equipmentData->santri_class_start)->first();

            $equipment = array(
                'nama' => $equipmentData->santri_name,
                'nism' => $equipmentData->santri_nism,
                'nisn' => $equipmentData->santri_nisn,
                'ttl' => $equipmentData->santri_born_place . ", ". tanggal($equipmentData->santri_born_date),
                'gender' => $equipmentData->santri_gender,
                'agama' => $equipmentData->santri_religion,
                'anak_ke' => $equipmentData->santri_child_of,
                'alamat_santri' => $equipmentData->santri_address . " RT/RW " . $equipmentData->santri_rt_rw . ", " . $equipmentData->santri_village . "" . $equipmentData->santri_district . ", " . $equipmentData->santri_city . ", " . $equipmentData->santri_province . " " . $equipmentData->santri_pos_code . ", " . $equipmentData->santri_country,
                'pendidikan_terakhir' => $equipmentData->santri_last_school,
                'kelas_mulai' => $kelasStart->class_name,
                'kelas_mulai_tanggal' => tanggal($equipmentData->santri_class_start_date),
                'ayah' => $equipmentData->father_name,
                'ibu' => $equipmentData->mother_name,
                'alamat_ortu' => $equipmentData->santri_address . " RT/RW " . $equipmentData->santri_rt_rw . ", " . $equipmentData->santri_village . "" . $equipmentData->santri_district . ", " . $equipmentData->santri_city . ", " . $equipmentData->santri_province . " " . $equipmentData->santri_pos_code . ", " . $equipmentData->santri_country,
                'ayah_phone' => $equipmentData->father_phone,
                'ayah_profesi' => $equipmentData->father_profession,
                'ibu_profesi' => $equipmentData->mother_profession,
                'wali_nama' => $equipmentData->wali_name,
                'wali_phone' => $equipmentData->wali_phone,
                'wali_profesi' => $equipmentData->wali_profession,
                'sekolah_kota' => $equipmentData->school_city,
                'sekolah_level' => $equipmentData->school_level,
                'kepsek' => $equipmentData->ustadz_name
            );
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
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            if ($level != 0 && $school != 0 && $kelas != 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->where('santri.santri_school', '=', $school)
                ->where('santri.santri_class', '=', $kelas)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas != 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->where('santri.santri_class', '=', $kelas)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas != 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_school', '=', $school)
                ->where('santri.santri_class', '=', $kelas)
                ->get();
            } else if ($level != 0 && $school != 0 && $kelas == 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->where('santri.santri_school', '=', $school)
                ->get();
            } else if ($level != 0 && $school == 0 && $kelas == 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('school.school_level', '=', $level)
                ->get();
            } else if ($level == 0 && $school != 0 && $kelas == 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_school', '=', $school)
                ->get();
            } else if ($level == 0 && $school == 0 && $kelas != 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_class', '=', $kelas)
                ->get();
            }else {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->get();
            }
        } else if ($user[0]->role_id == 2) {
            if ($kelas != 0) {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_class', '=', $kelas)
                ->get();
            } else {
                $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->where('santri.santri_school', '=', $user[0]->ustadz_school)
                    ->get();
            }
        } else {
            $equipments = ReportEquipment::leftJoin('santri', 'equipment.santri_id', '=', 'santri.santri_nisn')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('santri.santri_school', '=', $user[0]->ustadz_school)
                ->where('santri.santri_class', '=', $user[0]->ustadz_class)
                ->get();
        }

        $no = 0;
        $data = array();
        foreach ($equipments as $equipment) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "NIS : " . $equipment->santri_nism . "<br>NISN :  " . $equipment->santri_nisn;
            $row[] = $equipment->santri_name;
            $row[] = $equipment->equipment_date_download;
            $row[] = '<button type="button" class="btn btn-outline-success radius-30" data-bs-toggle="modal" onclick="listForm(' . $equipment->equipment_id . ')">Pelengkap Rapor</button>';
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
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_id')
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
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_id')
        ->where('santri_nisn', '=', $id)->get();

        $pdf = PDF::loadView('admin.page.report.reportequipment.report-pkpps-information', compact('santri'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    
    //
    public function reportSantri($id)
    {
        //
        $santriData = Santri::leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_id')
        ->leftJoin('ustadz', 'ustadz.ustadz_nik', '=', 'school.school_headship')
        ->where('santri_nisn', '=', $id)
        ->first();

        $kelasStart = Kelas::where('class_id', '=', $santriData->santri_class_start)->first();

        $santri = array(
            'photo' => $santriData->santri_photo,
            'nama' => $santriData->santri_name,
            'nism' => $santriData->santri_nism,
            'nisn' => $santriData->santri_nisn,
            'ttl' => $santriData->santri_born_place . ", ". tanggal($santriData->santri_born_date),
            'gender' => $santriData->santri_gender,
            'agama' => $santriData->santri_religion,
            'anak_ke' => $santriData->santri_child_of,
            'alamat_santri' => $santriData->santri_address . " RT/RW " . $santriData->santri_rt_rw . ", " . $santriData->santri_village . "" . $santriData->santri_district . ", " . $santriData->santri_city . ", " . $santriData->santri_province . " " . $santriData->santri_pos_code . ", " . $santriData->santri_country,
            'pendidikan_terakhir' => $santriData->santri_last_school,
            'kelas_mulai' => $kelasStart->class_name,
            'kelas_mulai_tanggal' => tanggal($santriData->santri_class_start_date),
            'ayah' => $santriData->father_name,
            'ibu' => $santriData->mother_name,
            'alamat_ortu' => $santriData->santri_address . " RT/RW " . $santriData->santri_rt_rw . ", " . $santriData->santri_village . "" . $santriData->santri_district . ", " . $santriData->santri_city . ", " . $santriData->santri_province . " " . $santriData->santri_pos_code . ", " . $santriData->santri_country,
            'ayah_phone' => $santriData->father_phone,
            'ayah_profesi' => $santriData->father_profession,
            'ibu_profesi' => $santriData->mother_profession,
            'wali_nama' => $santriData->wali_name,
            'wali_phone' => $santriData->wali_phone,
            'wali_profesi' => $santriData->wali_profession,
            'sekolah_kota' => $santriData->school_city,
            'sekolah_level' => $santriData->school_level,
            'kepsek' => $santriData->ustadz_name
        );

        // return $santri;
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-santri-information', compact('santri'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    //
    public function reportMutation($id)
    {
        //
        $santri = Santri::leftJoin('kelas', 'santri.santri_class', '=', 'kelas.class_id')
        ->leftJoin('school', 'santri.santri_school', '=', 'school.school_id')
        ->where('santri_nisn', '=', $id)->get();
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-mutation', compact('santri'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
