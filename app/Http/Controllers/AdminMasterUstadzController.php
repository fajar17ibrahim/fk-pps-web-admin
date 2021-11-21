<?php

namespace App\Http\Controllers;

use Session;    
use URL;  
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Ustadz;
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
        
        $schools = School::orderBy('school_name', 'asc')->get();
        $kelass = Kelas::orderBy('class_name', 'asc')->get();

        return view('admin.page.master.ustadz.index', compact('schools'), compact('kelass'));
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

            $ustadzPhoto = $request['inUstadzPhoto'];
            if ($ustadzPhoto) {
                $photoName = $request['inUstadzNIK'] . "_" . time().'.' . $request->inUstadzPhoto->extension();
                $request->inUstadzPhoto->move(public_path('images'), $photoName);
            } else {
                $photoName = "avatar.png";
            }
            $ustadz = new Ustadz;
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
            $ustadz->ustadz_rt_rw = $request['inRT'] . "/" . $request['inRW'];
            $ustadz->ustadz_village = $request['soVillage']; 
            $ustadz->ustadz_districts = $request['inDistricts'];
            $ustadz->ustadz_city = $request['inKabOrCity'];
            $ustadz->ustadz_province = $request['inProvince'];
            $ustadz->ustadz_country = $request['inCountry'];
            $ustadz->ustadz_email = $request['inUstadzEmail'];
            $ustadz->ustadz_phone = $request['inUstadzPhone'];
            $ustadz->ustadz_school = $request['soPKPPS'];
            $ustadz->ustadz_class = $request['soLevelClass'];
            $ustadz->status = 'Aktif';
            $ustadz->ustadz_photo = $photoName;
            $saveUstadz = $ustadz->save();
    
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

            $ustadzPhoto = $request['inUstadzPhoto'];
            if ($ustadzPhoto) {
                $photoName = $request['inUstadzNIK'] . "_" . time().'.' . $request->inUstadzPhoto->extension();
                $request->inUstadzPhoto->move(public_path('images'), $photoName);
            } else {
                $photoName = "avatar.png";
            }

            $ustadz = Ustadz::find($id);
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
            $ustadz->ustadz_rt_rw = $request['inRT'] . "/" . $request['inRW'];
            $ustadz->ustadz_village = $request['soVillage'];
            $ustadz->ustadz_districts = $request['inDistricts'];
            $ustadz->ustadz_city = $request['inKabOrCity'];
            $ustadz->ustadz_province = $request['inProvince'];
            $ustadz->ustadz_country = $request['inCountry'];
            $ustadz->ustadz_email = $request['inUstadzEmail'];
            $ustadz->ustadz_phone = $request['inUstadzPhone'];
            $ustadz->ustadz_school = $request['soPKPPS'];
            $ustadz->ustadz_class = $request['soLevelClass'];
            $ustadz->status = 'Aktif';
            $ustadz->ustadz_photo = $photoName;
            $saveUstadz = $ustadz->update();
    
            if ($saveUstadz) {
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
        $ustadz = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')
                ->leftJoin('kelas','kelas.class_id','=','ustadz.ustadz_class')
                ->find($id);
        $schools = School::orderBy('school_name', 'asc')->get();
        $address = Address::get();

        // return $ustadz;

        return view('admin.page.master.ustadz.ustadz-edit', compact('address'), compact('schools'))
        ->with('ustadz', $ustadz)
        ->with('kelass', $kelass);
    }

    public function addUstadz()
    {
        //
        $this->authorize('master-teacher');
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
        $schools = School::orderBy('school_name', 'asc')->get();
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
        if ($user[0]->role_id == 1) {
            if ($school != 0) {
                $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')
                ->where('ustadz.ustadz_school', '=', $school)
                ->get();
            } else {
                $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')
                ->get();
            }
        } else {
            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')
                ->leftJoin('kelas','kelas.class_id','=','ustadz.ustadz_class')    
                ->where('kelas.class_level', '=', $user[0]->class_level)
                ->where('school.school_npsn', '=', $user[0]->ustadz_school)
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
            $row[] = $ustadz->ustadz_nik;
            $row[] = $ustadz->ustadz_name;  
            $row[] = $ustadz->ustadz_gender;
            $row[] = $ustadz->ustadz_born_place;
            $row[] = $ustadz->ustadz_born_date;
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
