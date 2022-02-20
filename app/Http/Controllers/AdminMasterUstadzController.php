<?php

namespace App\Http\Controllers;

use Session;    
use URL;  
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Ustadz;
use App\Models\User;
use App\Models\Address;
use App\Models\Kelas;

class AdminMasterUstadzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $this->authorize('master-teacher');
        $user = Session::get('user');

        if ($user == null) {
            return redirect('login');
        }
        
        if ($user['akses'] == 1) {
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

            $ustadzDatas = Ustadz::get();
            $ustadzs = array();

            foreach ($ustadzDatas as $ustadzData) {
                $ustadzs[] = array(
                            'nik' => $ustadzData->ustadz_nik,
                            'name' => $ustadzData->ustadz_name
                        );
            }

        } else {
            $kelassCheck = Kelas::orderBy('class_id', 'asc')
                ->where('class_level', '=', $user['level'])
                ->where('class_school', '=', $user['sekolah'])
                ->get();

            foreach($kelassCheck as $kelas) {
                $data = array(
                    'id' => $kelas->class_id,
                    'name' => $kelas->class_name,
                );

                $kelass[] = $data;
            }
            
            $schoolsData = School::where('school_level', '=', $user['level'])
                ->where('school_id', '=', $user['sekolah'])
                ->first();

            $schools = array();
            $data = array(
                'id' => $schoolsData->school_id,
                'pps_nama' => $schoolsData->school_name
            );

            $schools[] = $data;

            $schoolByNpsn = School::where('school_npsn', '=', $schoolsData->school_npsn)->get();
            $ustadzs = array();
            foreach ($schoolByNpsn as $school) {
                $ustadzDatas = Ustadz::where('ustadz_school', 'like', '% ' . $school->school_id . ' %')
                        ->where('ustadz_school', 'not like', '% ' . $user['sekolah'] . ' %')
                        ->get();

                foreach ($ustadzDatas as $ustadzData) {
                    $ustadzs[] = array(
                                'nik' => $ustadzData->ustadz_nik,
                                'name' => $ustadzData->ustadz_name
                            );
                }
            }

        }

        return view('admin.page.master.ustadz.index', compact('schools'), compact('kelass'))
                ->with('ustadzs', $ustadzs);
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
            $this->authorize('master-teacher');

            $email = $request['inUstadzEmail'];
            $checkData = Ustadz::where('ustadz_email', '=', $email)->first();
            if ($checkData) {
                return redirect()->route('master-ustadz.index')
                ->with('message_error', 'Email sudah terdaftar.');
            }

            $ustadzPhoto = $request['inUstadzPhoto'];
            if ($ustadzPhoto) {
                $photoName = $request['inUstadzNIK'] . "_" . time().'.' . $request->inUstadzPhoto->extension();
                $request->inUstadzPhoto->move(public_path('images'), $photoName);
            } else {
                $photoName = "avatar.png";
            }

            $rtLength =  strlen($request['inRT']);
            $angkaNol = "0";
            $rt = $request['inRT'];
            if ($rtLength < 3) {
                for ($i = 1; $i < 3 - $rtLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rt = $angkaNol . $request['inRT'];
            }
            
            $rwLength =  strlen($request['inRW']);
            $angkaNol = "0";
            $rw = $request['inRW'];
            if ($rwLength < 3) {
                for ($i = 1; $i < 3 - $rwLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rw = $angkaNol . $request['inRW'];
            }

            $nik = $request['inUstadzNIK'];;
            $ustadzCheck = Ustadz::where('ustadz_nik', '=', $nik)->first();
            
            if ($ustadzCheck) {
                $ustadz = $ustadzCheck;
            } else {
                $ustadz = new Ustadz;
            }
            
            $ustadz->ustadz_nik = $nik;
            $ustadz->ustadz_name = $request['inUstadzName'];
            $ustadz->ustadz_born_place = $request['inUstadzPlaceBorn'];
            $ustadz->ustadz_born_date = $request['inUstadzDateBorn'];
            $ustadz->ustadz_gender = $request['soUstadzGender'];
            $ustadz->ustadz_religion = $request['inUstadzReligion'];
            $ustadz->ustadz_mother_name = $request['inUstadzMotherName'];
            $ustadz->ustadz_profesion = $request['soUstadzProfesi'];
            $ustadz->ustadz_employee_status = $request['soUstadzEmployeeStatus'];
            $ustadz->ustadz_assigment_status = $request['soUstadzTetap'];
            $ustadz->ustadz_education = $request['soUstadzEducation'];
            $ustadz->ustadz_education_pesantren = $request['soUstadzEducationIslamic'];
            $ustadz->ustadz_education_abroad = $request['soUstadzEducationAbroad'];
            $ustadz->ustadz_competence = $request['soUstadzCompetence'];
            $ustadz->ustadz_address = $request['inAddress'];
            $ustadz->ustadz_rt_rw = $rt . "/" . $rw;
            $ustadz->ustadz_village = $request['soVillage']; 
            $ustadz->ustadz_districts = $request['inDistricts'];
            $ustadz->ustadz_city = $request['inKabOrCity'];
            $ustadz->ustadz_province = $request['inProvince'];
            $ustadz->ustadz_pos_code = $request['inPosCode'];
            $ustadz->ustadz_country = $request['inCountry'];
            $ustadz->ustadz_email = $email;
            $ustadz->ustadz_phone = $request['inUstadzPhone'];
            $ustadz->ustadz_school = ' ' . $request['soPKPPS'] . ' ';
            $ustadz->status = 'Aktif';
            $ustadz->ustadz_photo = $photoName;

            if ($ustadzCheck) {
                $saveUstadz = $ustadz->update();
            } else {
                $saveUstadz = $ustadz->save();
            }
            
            if ($saveUstadz) {
                return redirect()->route('master-ustadz.index')
                ->with('message_success', 'Ustadz berhasil disimpan.');
            } else {
                return redirect()->route('master-ustadz.index')
                ->with('message_error', 'Ustadz gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-ustadz.index')
            // ->with('message_error', 'Ustadz gagal disimpan.');
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
            //
            $this->authorize('master-teacher');
            $ustadz = Ustadz::find($id);
            $lastEmail = $ustadz->ustadz_email;

            $ustadzPhoto = $request['inUstadzPhoto'];
            if ($ustadzPhoto) {
                $photoName = $request['inUstadzNIK'] . "_" . time().'.' . $request->inUstadzPhoto->extension();
                $request->inUstadzPhoto->move(public_path('images'), $photoName);
            } else {
                if ($ustadz->ustadz_photo) {
                    $photoName = $ustadz->ustadz_photo;
                } else {
                    $photoName = "avatar.png";
                }
            }

            $rtLength =  strlen($request['inRT']);
            $angkaNol = "0";
            $rt = $request['inRT'];
            if ($rtLength < 3) {
                for ($i = 1; $i < 3 - $rtLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rt = $angkaNol . $request['inRT'];
            }
            
            $rwLength =  strlen($request['inRW']);
            $angkaNol = "0";
            $rw = $request['inRW'];
            if ($rwLength < 3) {
                for ($i = 1; $i < 3 - $rwLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rw = $angkaNol . $request['inRW'];
            }

            
            $email = $request['inUstadzEmail'];

            $checkData = Ustadz::where('ustadz_email', '=', $email)->first();
            if ($checkData && $lastEmail != $email) {
                return redirect()->route('master-ustadz.index')
                ->with('message_error', 'Email sudah terdaftar.');
            }
            $ustadz->ustadz_nik = $request['inUstadzNIK'];
            $ustadz->ustadz_name = $request['inUstadzName'];
            $ustadz->ustadz_born_place = $request['inUstadzPlaceBorn'];
            $ustadz->ustadz_born_date = $request['inUstadzDateBorn'];
            $ustadz->ustadz_gender = $request['soUstadzGender'];
            $ustadz->ustadz_religion = $request['inUstadzReligion'];
            $ustadz->ustadz_mother_name = $request['inUstadzMotherName'];
            $ustadz->ustadz_profesion = $request['soUstadzProfesi'];
            $ustadz->ustadz_employee_status = $request['soUstadzEmployeeStatus'];
            $ustadz->ustadz_assigment_status = $request['soUstadzTetap'];
            $ustadz->ustadz_education = $request['soUstadzEducation'];
            $ustadz->ustadz_education_pesantren = $request['soUstadzEducationIslamic'];
            $ustadz->ustadz_education_abroad = $request['soUstadzEducationAbroad'];
            $ustadz->ustadz_competence = $request['soUstadzCompetence'];
            $ustadz->ustadz_address = $request['inAddress'];
            $ustadz->ustadz_rt_rw = $rt . "/" . $rw;
            $ustadz->ustadz_village = $request['soVillage'];
            $ustadz->ustadz_districts = $request['inDistricts'];
            $ustadz->ustadz_city = $request['inKabOrCity'];
            $ustadz->ustadz_province = $request['inProvince'];
            $ustadz->ustadz_country = $request['inCountry'];
            $ustadz->ustadz_pos_code = $request['inPosCode'];
            $ustadz->ustadz_email = $request['inUstadzEmail'];
            $ustadz->ustadz_phone = $request['inUstadzPhone'];
            $ustadz->status = 'Aktif';
            $ustadz->ustadz_photo = $photoName;
            $saveUstadz = $ustadz->update();
    
            if ($saveUstadz) {
                $userData = User::where('email', '=', $lastEmail)
                    ->first();

                if ($userData) {
                    $userData->name = $request['inUstadzName'];
                    $userData->email = $email;
                    $userData->update();
                }
                
                return redirect()->route('master-ustadz.index')
                ->with('message_success', 'Ustadz berhasil diperbarui.');
            } else {
                return redirect()->route('master-ustadz.index')
                ->with('message_error', 'Ustadz gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-ustadz.index')
            // ->with('message_error', 'Ustadz gagal diperbarui.');
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

    public function editUstadz($id)
    {
        //
        $this->authorize('master-teacher');
        $user = Session::get('user');
        
        $kelass = array();
        if ($user['akses'] == 1) {
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
                ->where('class_level', '=', $user['level'])
                ->where('class_school', '=', $user['sekolah'])
                ->get();

                foreach($kelassCheck as $kelas) {
                    $data = array(
                        'id' => $kelas->class_id,
                        'name' => $kelas->class_name,
                    );

                    $kelass[] = $data;
                }

                $schoolsData = School::orderBy('school_name', 'asc')
                ->where('school_level', '=', $user['level'])
                ->where('school_id', '=', $user['sekolah'])
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

        $ustadz = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->leftJoin('kelas','kelas.class_id','=','ustadz.ustadz_class')
                ->find($id);

                $data = array(
                    'id' => $ustadz->ustadz_id,
                    'photo' => $ustadz->ustadz_photo,
                    'nik' => $ustadz->ustadz_nik,  
                    'name' => $ustadz->ustadz_name, 
                    'gender' => $ustadz->ustadz_gender, 
                    'tempat_lahir' => $ustadz->ustadz_born_place, 
                    'tanggal_lahir' => $ustadz->ustadz_born_date, 
                    'agama' => $ustadz->ustadz_religion, 
                    'ibu_name' => $ustadz->ustadz_mother_name, 
                    'profesi' => $ustadz->ustadz_profesion, 
                    'status_karyawan' => $ustadz->ustadz_employee_status, 
                    'status_tugas' => $ustadz->ustadz_assigment_status, 
                    'pendidikan' => $ustadz->ustadz_education, 
                    'pendidikan_pesantren' => $ustadz->ustadz_education_pesantren, 
                    'pendidikan_luar' => $ustadz->ustadz_education_abroad, 
                    'kompetensi' => $ustadz->ustadz_competence,
                    'email' => $ustadz->ustadz_email,  
                    'phone' => $ustadz->ustadz_phone, 
                    'alamat' => $ustadz->ustadz_address, 
                    'desa' => $ustadz->ustadz_village, 
                    'rt' => substr($ustadz->ustadz_rt_rw, 0, 3),
                    'rw' => substr($ustadz->ustadz_rt_rw, 4, 3), 
                    'kecamatan' => $ustadz->ustadz_districts, 
                    'kab_kota' => $ustadz->ustadz_city, 
                    'provinsi' => $ustadz->ustadz_province, 
                    'kode_pos' => $ustadz->ustadz_pos_code, 
                    'negara' => $ustadz->ustadz_country);
        
        $address = Address::get();

        // return $ustadz;

        return view('admin.page.master.ustadz.ustadz-edit', compact('address'), compact('schools'))
        ->with('ustadz', $data)
        ->with('kelass', $kelass);
    }

    public function editAddUstadz(Request $request)
    {
        //
        try {
            $this->authorize('master-teacher');
            $user = Session::get('user');

            $nik = $request['inUstadz'];

            $ustadz = Ustadz::where('ustadz_nik', '=', $nik)->first();

            $ustadz->ustadz_school .= $user['sekolah'] . ' ';
            $saveUstadz = $ustadz->update();

            if ($saveUstadz) {
                return redirect()->route('master-ustadz.index')
                ->with('message_success', 'Ustadz berhasil disimpan.');
            } else {
                return redirect()->route('master-ustadz.index')
                ->with('message_error', 'Ustadz gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-ustadz.index')
            // ->with('message_error', 'Ustadz gagal disimpan.');
            ->with('message_error', $e->getMessage());
        }
        
    }

    public function addUstadz()
    {
        //
        $this->authorize('master-teacher');
        $user = Session::get('user');

        $kelass = array();
        if ($user['akses'] == 1) {
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
                ->where('class_school', '=', $user['sekolah'])
                ->get();

            foreach($kelassCheck as $kelas) {
                $data = array(
                    'id' => $kelas->class_id,
                    'name' => $kelas->class_name,
                );

                $kelass[] = $data;
            }

            $schoolsData = School::orderBy('school_name', 'asc')
                ->where('school_id', '=', $user['sekolah'])
                ->first();

            $schools = array();
            $data = array(
                'id' => $schoolsData->school_id,
                'pps_nama' => $schoolsData->school_name
            );

            $schools[] = $data;

        }
        
        $address = Address::get();
        // return $kelass;
        return view('admin.page.master.ustadz.ustadz-add')
        ->with('schools', $schools)
        ->with('address', $address)
        ->with('kelass', $kelass);
    }

    public function search($id) { 
        $village = explode(", ", $id);
        $address = Address::where('address_village', '=', $village[0])
        ->where('address_districts', '=', $village[1])
        ->get();
        return response()->json($address);
    }

    public function listData($school) {
        $user = Session::get('user');
        if ($user['akses'] == 1) {
            if ($school != 0) {
                $ustadzs = Ustadz::where('ustadz_school', 'like', '% ' . $school . ' %')->get();
            } else {
                $ustadzs = Ustadz::get();
            }
        } else {
            $ustadzs = Ustadz::where('ustadz_school', 'like', '% ' . $user['sekolah'] . ' %')
                ->get();
        }

        $no = 0;
        $data = array();
        foreach ($ustadzs as $ustadz) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<div class="d-flex align-items-center">
                            <img src="images/'. $ustadz->ustadz_photo .'" alt="" class="p-1 border bg-white"  width="90" height="100">
                        </div>';
            $row[] = '<b>' . $ustadz->ustadz_name .'</b><br>NIK : '. $ustadz->ustadz_nik .'<br>Email : '. $ustadz->ustadz_email;
            $row[] = $ustadz->ustadz_gender;
            $row[] = $ustadz->ustadz_born_place . ",<br>" . tanggal($ustadz->ustadz_born_date);
            $row[] = '<div class="d-flex align-items-center text-success">	
                        <i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                        <span>' . $ustadz->status . '</span>
                    </div>';
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Aksi</button>
                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="'. URL::to("/"). '/master-ustadz-edit/'. $ustadz->ustadz_id.'">Edit</a>
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
