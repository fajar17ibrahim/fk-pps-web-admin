<?php

namespace App\Http\Controllers;

use Session;  
use URL;  
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\ReportEquipment;
use App\Models\School;

class AdminMasterSantriController extends Controller
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
        $santris = Santri::orderBy('santri_name', 'asc')->get();
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
        }
        return view('admin.page.master.santri.index')
        ->with(array('santris' => $santris))
        ->with(array('schools' => $schools))
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
            $this->authorize('master-santri');

            $santriPhoto = $request['inSantriPhoto'];
            if ($santriPhoto) {
                $photoName = $request['inSantriNISN'] . "_" . time().'.' . $request->inSantriPhoto->extension();
                $request->inSantriPhoto->move(public_path('images'), $photoName);
            } else {
                $photoName = "avatar-santri.jpg";
            }

            $user = Session::get('user');

            $nisn = $request['inSantriNISN'];
            $nism = $request['inSantriNISM'];

            $santriCheck = Santri::where('santri_nism', '=', $nism)
                    ->where('santri_nisn', '=', $nisn)
                    ->first();

            if ($santriCheck) {
                $santri = $santriCheck;
            } else {
                $santri = new Santri;
            } 
            
            $santri->santri_name = $request['inSantriName'];
            $santri->santri_nism = $nism;
            $santri->santri_nisn = $nisn;
            $santri->santri_gender = $request['soSantriGender'];
            $santri->santri_born_place = $request['inSantriPlaceBorn'];
            $santri->santri_born_date = $request['inSantriDateBorn'];
            $santri->santri_religion = $request['inSantriReligion'];
            $santri->santri_hobby = $request['inSantriHobi'];
            $santri->santri_goal = $request['inSantriCita'];
            $santri->santri_home_status = $request['soSantriStatus'];
            $santri->santri_child_of = $request['inSantriAnakKe'];
            $santri->santri_last_school = $request['inSantriSchoolFrom'];
            $santri->santri_class_start = $request['soLevelClassStart'];
            $santri->santri_class_start_date = $request['inSantriJoinDate'];
            $santri->no_kk = $request['inAyahNoKK'];
            $santri->father_nik = $request['inAyahNoNIK'];
            $santri->father_name = $request['inAyahNama'];
            $santri->father_profession = $request['soAyahJob'];
            $santri->father_education = $request['soAyahEducation'];
            $santri->father_phone = $request['inAyahPhone'];
            $santri->father_salary = $request['soAyahSalery'];
            $santri->mother_nik = $request['inIbuNoNIK'];
            $santri->mother_name = $request['inIbuNama'];
            $santri->mother_profession = $request['soIbuJob'];
            $santri->mother_education = $request['soIbuEducation'];
            $santri->mother_phone = $request['inIbuPhone'];
            $santri->mother_salary = $request['soIbuSalery'];
            $santri->wali_no_kk = $request['inWaliNoKK'];
            $santri->wali_nik = $request['inWaliNoNIK'];
            $santri->wali_name = $request['inWaliNama'];
            $santri->wali_profession = $request['soWaliJob'];
            $santri->wali_education = $request['soWaliEducation'];
            $santri->wali_phone = $request['inWaliPhone'];
            $santri->wali_salary = $request['soWaliSalery'];
            $santri->santri_address = $request['inAddress'];
            $santri->santri_village = $request['soVillage'];
            $santri->santri_rt_rw = $request['inRT'] . "/" . $request['inRW'];
            $santri->santri_districts = $request['inDistrict'];
            $santri->santri_city = $request['inKabOrCity'];
            $santri->santri_province = $request['inProvince'];
            $santri->santri_pos_code = $request['inPosCode'];
            $santri->santri_country = $request['inCountry'];
            $santri->santri_class = $request['soLevelClass'];
            $santri->santri_school = $user[0]->school_id;
            $santri->santri_status = 'Aktif';
            $santri->santri_photo = $photoName;

            if ($santriCheck) {
                $saveSantri = $santri->update();
            } else {
                $saveSantri = $santri->save();
            } 

            $reportEquipmentCheck = ReportEquipment::where('santri_id', '=', $nisn)->first();

            if ($reportEquipmentCheck) {
                $reportEquipmentCheck->santri_id = $nisn;
                $saveEquipment = $reportEquipmentCheck->update();
            } else {
                $reportEquipment = new ReportEquipment;
                $reportEquipment->santri_id = $nisn;
                $saveEquipment = $reportEquipment->save();
            }
    
            if ($saveSantri && $saveEquipment) {
                return redirect()->route('master-santri.index')
                ->with('message_success', 'Santri berhasil disimpan.');
            } else {
                return redirect()->route('master-santri.index')
                ->with('message_error', 'Santri gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-santri.index')
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
        $santri = Santri::leftJoin('school', 'santri.santri_school', '=', 'school.school_id')
        ->find($id);
        $data = array(
            'photo' => $santri->santri_photo,
            'school' => $santri->school_name,
            'nism' => $santri->santri_nism, 
            'nisn' => $santri->santri_nisn, 
            'name' => $santri->santri_name, 
            'gender' => $santri->santri_gender, 
            'tempat_lahir' => $santri->santri_born_place, 
            'tanggal_lahir' => tanggal($santri->santri_born_date), 
            'agama' => $santri->santri_religion, 
            'hobi' => $santri->santri_hobby, 
            'cita_cita' => $santri->santri_goal, 
            'status_rumah' => $santri->santri_home_status, 
            'anak_ke' => $santri->santri_child_of, 
            'sekolah_asal' => $santri->santri_last_school, 
            'diterima_di_kelas' => $santri->santri_class_start, 
            'diterima_tangal' => $santri->santri_class_start_date, 
            'no_kk' => $santri->no_kk, 
            'nik_ayah' => $santri->father_nik, 
            'nama_ayah' => $santri->father_name, 
            'pekerjaan_ayah' => $santri->father_profession, 
            'pendidikan_ayah' => $santri->father_education, 
            'telepon_ayah' => $santri->father_phone, 
            'gaji_ayah' => $santri->father_salary, 
            'nik_ibu' => $santri->mother_nik, 
            'nama_ibu' => $santri->mother_name, 
            'pekerjaan_ibu' => $santri->mother_profession, 
            'pendidikan_ibu' => $santri->mother_education, 
            'telepon_ibu' => $santri->mother_phone, 
            'gaji_ibu' => $santri->mother_salary, 
            'no_kk_wali' => $santri->wali_no_kk, 
            'nik_wali' => $santri->wali_nik, 
            'nama_wali' => $santri->wali_name, 
            'pekerjaan_wali' => $santri->wali_profession, 
            'pendidikan_wali' => $santri->wali_education, 
            'telepon_wali' => $santri->wali_phone, 
            'gaji_wali' => $santri->wali_salary, 
            'alamat' => $santri->santri_address, 
            'desa' => $santri->santri_village, 
            'rt_rw' => $santri->santri_rt_rw, 
            'kecamatan' => $santri->santri_districts, 
            'kab_kota' => $santri->santri_city, 
            'provinsi' => $santri->santri_province, 
            'kode_pos' => $santri->santri_pos_code, 
            'negara' => $santri->santri_country);
        return json_encode($data);
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
            //
            $this->authorize('master-santri');

            $user = Session::get('user');
            $santri = Santri::find($id);

            $santriPhoto = $request['inSantriPhoto'];
            $santriNISN = $request['inSantriNISN'];

            if ($santriPhoto) {
                $photoName = $santriNISN . "_" . time().'.' . $request->inSantriPhoto->extension();
                $request->inSantriPhoto->move(public_path('images'), $photoName);
            } else {
                if ($santri->santri_photo) {
                    $photoName = $santri->santri_photo;
                } else {
                    $photoName = "avatar-santri.jpg";
                }
            }

            $santri->santri_name = $request['inSantriName'];
            $santri->santri_nism = $request['inSantriNISM'];
            $santri->santri_nisn = $santriNISN;
            $santri->santri_gender = $request['soSantriGender'];
            $santri->santri_born_place = $request['inSantriPlaceBorn'];
            $santri->santri_born_date = $request['inSantriDateBorn'];
            $santri->santri_religion = $request['inSantriReligion'];
            $santri->santri_hobby = $request['inSantriHobi'];
            $santri->santri_goal = $request['inSantriCita'];
            $santri->santri_home_status = $request['soSantriStatus'];
            $santri->santri_child_of = $request['inSantriAnakKe'];
            $santri->santri_last_school = $request['inSantriSchoolFrom'];
            $santri->santri_class_start = $request['soLevelClassStart'];
            $santri->santri_class_start_date = $request['inSantriJoinDate'];
            $santri->no_kk = $request['inAyahNoKK'];
            $santri->father_nik = $request['inAyahNoNIK'];
            $santri->father_name = $request['inAyahNama'];
            $santri->father_profession = $request['soAyahJob'];
            $santri->father_education = $request['soAyahEducation'];
            $santri->father_phone = $request['inAyahPhone'];
            $santri->father_salary = $request['soAyahSalery'];
            $santri->mother_nik = $request['inIbuNoNIK'];
            $santri->mother_name = $request['inIbuNama'];
            $santri->mother_profession = $request['soIbuJob'];
            $santri->mother_education = $request['soIbuEducation'];
            $santri->mother_phone = $request['inIbuPhone'];
            $santri->mother_salary = $request['soIbuSalery'];
            $santri->wali_no_kk = $request['inWaliNoKK'];
            $santri->wali_nik = $request['inWaliNoNIK'];
            $santri->wali_name = $request['inWaliNama'];
            $santri->wali_profession = $request['soWaliJob'];
            $santri->wali_education = $request['soWaliEducation'];
            $santri->wali_phone = $request['inWaliPhone'];
            $santri->wali_salary = $request['soWaliSalery'];
            $santri->santri_address = $request['inAddress'];
            $santri->santri_village = $request['soVillage'];
            $santri->santri_rt_rw = $request['inRT'] . "/" . $request['inRW'];
            $santri->santri_districts = $request['inDistrict'];
            $santri->santri_city = $request['inKabOrCity'];
            $santri->santri_province = $request['inProvince'];
            $santri->santri_pos_code = $request['inPosCode'];
            $santri->santri_country = $request['inCountry'];
            $santri->santri_class = $request['soLevelClass'];
            $santri->santri_school = $user[0]->school_id;
            $santri->santri_status = 'Aktif';
            $santri->santri_photo = $photoName;
            $saveSantri = $santri->update();

            $reportEquipment = ReportEquipment::where('santri_id', '=', $santriNISN)
                    ->first();

            if ($reportEquipment) {
                $reportEquipment->santri_id = $santriNISN;
                $saveEquipment = $reportEquipment->update();
            } else {
                $reportEquipment = new ReportEquipment;
                $reportEquipment->santri_id = $santriNISN;
                $saveEquipment = $reportEquipment->save();
            }
    
            if ($saveSantri && $saveEquipment) {
                return redirect()->route('master-santri.index')
                ->with('message_success', 'Santri berhasil disimpan.');
            } else {
                return redirect()->route('master-santri.index')
                ->with('message_error', 'Santri gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-santri.index')
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

    public function editSantri($id)
    {
        //
        $this->authorize('master-santri');

        $user = Session::get('user');
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
        $address = Address::get();

        $santri = Santri::leftJoin('school', 'santri.santri_school', '=', 'school.school_id')
                ->leftJoin('kelas', 'kelas.class_id', '=', 'santri.santri_class')
                ->find($id);

        $kelasStart = Kelas::where('kelas.class_id', '=', $santri->santri_class_start)
                ->first();

        $data = array(
            'id' => $santri->santri_id,
            'photo' => $santri->santri_photo,
            'school' => $santri->school_name,
            'nism' => $santri->santri_nism, 
            'nisn' => $santri->santri_nisn, 
            'name' => $santri->santri_name, 
            'gender' => $santri->santri_gender, 
            'tempat_lahir' => $santri->santri_born_place, 
            'tanggal_lahir' => $santri->santri_born_date, 
            'agama' => $santri->santri_religion, 
            'hobi' => $santri->santri_hobby, 
            'cita_cita' => $santri->santri_goal, 
            'status_rumah' => $santri->santri_home_status, 
            'anak_ke' => $santri->santri_child_of, 
            'sekolah_asal' => $santri->santri_last_school, 
            'diterima_di_kelas' => $kelasStart->class_id, 
            'diterima_di_kelas_name' => $kelasStart->class_name, 
            'diterima_tangal' => $santri->santri_class_start_date,
            'kelas_id' => $santri->class_id,  
            'kelas' => $santri->class_name,  
            'no_kk' => $santri->no_kk, 
            'nik_ayah' => $santri->father_nik, 
            'nama_ayah' => $santri->father_name, 
            'pekerjaan_ayah' => $santri->father_profession, 
            'pendidikan_ayah' => $santri->father_education, 
            'telepon_ayah' => $santri->father_phone, 
            'gaji_ayah' => $santri->father_salary, 
            'nik_ibu' => $santri->mother_nik, 
            'nama_ibu' => $santri->mother_name, 
            'pekerjaan_ibu' => $santri->mother_profession, 
            'pendidikan_ibu' => $santri->mother_education, 
            'telepon_ibu' => $santri->mother_phone, 
            'gaji_ibu' => $santri->mother_salary, 
            'no_kk_wali' => $santri->wali_no_kk, 
            'nik_wali' => $santri->wali_nik, 
            'nama_wali' => $santri->wali_name, 
            'pekerjaan_wali' => $santri->wali_profession, 
            'pendidikan_wali' => $santri->wali_education, 
            'telepon_wali' => $santri->wali_phone, 
            'gaji_wali' => $santri->wali_salary, 
            'alamat' => $santri->santri_address, 
            'desa' => $santri->santri_village, 
            'rt_rw' => $santri->santri_rt_rw, 
            'kecamatan' => $santri->santri_districts, 
            'kab_kota' => $santri->santri_city, 
            'provinsi' => $santri->santri_province, 
            'kode_pos' => $santri->santri_pos_code, 
            'negara' => $santri->santri_country);
        
        return view('admin.page.master.santri.santri-edit', compact('address'), compact('kelass'))
            ->with('santri', $data);
    }

    public function addSantri()
    {
        //
        $this->authorize('master-santri');

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
        $address = Address::get();
        return view('admin.page.master.santri.santri-add', compact('address'), compact('kelass'));
    }

    public function detailsSantri()
    {
        //
        return view('admin.page.master.santri.santri-details');
    }

    public function search($id) { 
        $village = explode(", ", $id);
        $address = Address::where('address_village', '=', $village[0])
        ->where('address_districts', '=', $village[1])
        ->get();
        return response()->json($address);
    }

    public function listData($level, $school, $kelas) {
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
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
        } else if ($user[0]->role_id == 2) {
            if ($kelas != 0) {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->where('school.school_id', '=', $user[0]->ustadz_school)
                    ->where('kelas.class_id', '=', $kelas)
                    ->get();
            } else {
                $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','santri.santri_school','=','school.school_id')
                ->where('school.school_id', '=', $user[0]->ustadz_school)
                ->get();
            }
        } else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                    ->leftJoin('school','santri.santri_school','=','school.school_id')
                    ->where('school.school_id', '=', $user[0]->ustadz_school)
                    ->where('kelas.class_id', '=', $user[0]->ustadz_class)
                    ->get();
        } 

        return $user[0]->ustadz_class;
        
        $no = 0;
        $data = array();
        foreach ($santris as $santri) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<div class="d-flex align-items-center">
                            <img src="images/'. $santri->santri_photo .'" alt="" class="p-1 border bg-white"  width="90" height="100">
                        </div>';
            $row[] = "NIS : " . $santri->santri_nism . "<br>NISN : " .$santri->santri_nisn;
            $row[] = $santri->santri_name;  
            $row[] = $santri->santri_gender;
            $row[] = $santri->santri_born_place . ",<br>" . tanggal($santri->santri_born_date);
            $row[] = '<div class="d-flex align-items-center text-success">	
                        <i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                        <span>Aktif</span>
                    </div>';
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Aksi</button>
                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="'. URL::to('/') .'/master-santri-details?id='. $santri->santri_id.'">Details</a>
                                </li>
                                <li><a class="dropdown-item" href="'. URL::to('/') .'/master-santri-edit/'. $santri->santri_id.'">Edit</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Aktif</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                </li>
                            </ul>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
