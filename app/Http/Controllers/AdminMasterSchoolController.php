<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Address;
use App\Models\Ustadz;

class AdminMasterSchoolController extends Controller
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
        return view('admin.page.master.school.index', compact('schools'));
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
            $rtLength =  strlen($request['inRT']);
            $angkaNol = "0";
            if ($rtLength < 3) {
                for ($i = 1; $i < 3 - $rtLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rt = $angkaNol . $request['inRT'];
            }
            
            $rwLength =  strlen($request['inRW']);
            $angkaNol = "0";
            if ($rwLength < 3) {
                for ($i = 1; $i < 3 - $rwLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rw = $angkaNol . $request['inRW'];
            }

            $school = new School;
            $school->school_statistic_number = $request['inSchoolNSP'];
            $school->school_npsn = $request['inSchoolNPSN'];
            $school->school_name = $request['inSchoolName'];
            $school->school_email = $request['inSchoolEmail'];
            $school->school_phone = $request['inSchoolPhone'];
            $school->school_address = $request['inAddress'];
            $school->school_rt_rw = $rt . "/" . $rw;
            $school->school_village = $request['soVillage'];
            $school->school_districts = $request['inDistrict'];
            $school->school_city = $request['inKabOrCity'];
            $school->school_province = $request['inProvince'];
            $school->school_pos_code = $request['inPosCode'];
            $school->school_country = $request['inCountry'];
            $school->school_status = 'Aktif';
            $school->school_headship = $request['soKepsek'];
            $saveschool = $school->save();
    
            if ($saveschool) {
                return redirect()->route('master-school.index')
                ->with('message_success', 'PKPPS berhasil disimpan.');
            } else {
                return redirect()->route('master-school.index')
                ->with('message_error', 'PKPPS gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-school.index')
            ->with('message_error', 'PKPPS gagal disimpan.');
            // ->with('message_error', $e->getMessage());
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
            $rtLength =  strlen($request['inRT']);
            $angkaNol = "0";
            if ($rtLength < 3) {
                for ($i = 1; $i < 3 - $rtLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rt = $angkaNol . $request['inRT'];
            }
            
            $rwLength =  strlen($request['inRW']);
            $angkaNol = "0";
            if ($rwLength < 3) {
                for ($i = 1; $i < 3 - $rwLength; $i++) {
                    $angkaNol .= $angkaNol;
                }
                $rw = $angkaNol . $request['inRW'];
            }

            $school = School::find($id);
            $school->school_statistic_number = $request['inSchoolNSP'];
            $school->school_npsn = $request['inSchoolNPSN'];
            $school->school_name = $request['inSchoolName'];
            $school->school_email = $request['inSchoolEmail'];
            $school->school_phone = $request['inSchoolPhone'];
            $school->school_address = $request['inAddress'];
            $school->school_rt_rw = $rt . "/" . $rw;
            $school->school_village = $request['soVillage'];
            $school->school_districts = $request['inDistrict'];
            $school->school_city = $request['inKabOrCity'];
            $school->school_province = $request['inProvince'];
            $school->school_pos_code = $request['inPosCode'];
            $school->school_country = $request['inCountry'];
            $school->school_status = 'Aktif';
            $school->school_headship = $request['soKepsek'];;
            $saveschool = $school->update();
    
            if ($saveschool) {
                return redirect()->route('master-school.index')
                ->with('message_success', 'PKPPS berhasil diperbarui.');
            } else {
                return redirect()->route('master-school.index')
                ->with('message_error', 'PKPPS gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-school.index')
            ->with('message_error', 'PKPPS gagal diperbarui.');
            // ->with('message_error', $e->getMessage());
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

    public function addSchool()
    {
        //
        $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')->get();
        $address = Address::get();
        return view('admin.page.master.school.school-add', compact('ustadzs'), compact('address'));
    }

    public function editSchool($id)
    {
        //
        $school = School::leftJoin('ustadz','ustadz.ustadz_nik','=','school.school_headship')->find($id);
        $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')->get();
        $address = Address::get();
        return view('admin.page.master.school.school-edit', compact('ustadzs'), compact('address'))
        ->with('school', $school);
    }

    public function search($id) { 
        $village = explode(", ", $id);
        $address = Address::where('address_village', '=', $village[0])
        ->where('address_districts', '=', $village[1])
        ->get();
        return response()->json($address);
    }

    public function searchKepsek($nik) { 
        $ustadz = Ustadz::where('ustadz_nik', '=', $nik)
        ->get();
        return response()->json($ustadz);
    }

    public function listData($school) {
        if ($school != 0) {
            $schools = School::where('school.school_npsn', '=', $school)
            ->get();
        } else {
            $schools = School::get();
        }
        
        $no = 0;
        $data = array();
        foreach ($schools as $school) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $school->school_npsn;
            $row[] = $school->school_name;
            $row[] = $school->school_address .'<br>'. 
                    $school->school_village .', '.
                    $school->school_districts .'<br>'. 
                    $school->school_city .', '. 
                    $school->school_province .' '.
                    $school->school_pos_code;
            $row[] = '<div class="d-flex align-items-center text-success">	
                        <i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                        <span>' . $school->school_status .'</span>
                    </div>';
            $row[] = '<div class="d-flex align-items-center">
                            <img src="assets/images/logo_fk_pkpps.jpg" alt="" class="p-1 border bg-white"  width="90" height="90">
                        </div>';
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Aksi</button>
                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="master-school-edit/'. $school->school_id .'">Edit</a>
                                </li>
                                <li><a class="dropdown-item" href="master-school-details">Details</a>
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
