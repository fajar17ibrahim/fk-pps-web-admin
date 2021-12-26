<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Address;
use App\Models\Ustadz;
use Illuminate\Support\Facades\Auth;

class AdminSchoolProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $ustadz = Ustadz::where('ustadz_email' , '=', $user->email)
        ->get();
        $school = School::leftJoin('ustadz','ustadz.ustadz_nik','=','school.school_headship')
        ->where('school.school_id' , '=' , $ustadz[0]->ustadz_school)
        ->get();
        // return $ustadz;
        $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')->get();
        $address = Address::get();
        return view('admin.page.schoolprofile.index', compact('ustadzs'), compact('address'))
        ->with('school', $school);

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
        try {
            //
            $school = School::find($id);
            $school->school_statistic_number = $request['inSchoolNSP'];
            $school->school_npsn = $request['inSchoolNPSN'];
            $school->school_name = $request['inSchoolName'];
            $school->school_email = $request['inSchoolEmail'];
            $school->school_phone = $request['inSchoolPhone'];
            $school->school_address = $request['inAddress'];
            $school->school_rt_rw = $request['inRT'] . "/" . $request['inRW'];
            $school->school_village = $request['soVillage'];
            $school->school_districts = $request['inDistrict'];
            $school->school_city = $request['inKabOrCity'];
            $school->school_province = $request['inProvince'];
            $school->school_pos_code = $request['inPosCode'];
            $school->school_country = $request['inCountry'];
            $school->school_status = 'Aktif';
            $school->school_headship = $request['soKepsek'];;
            $saveSchool = $school->update();
    
            if ($saveSchool) {
                return redirect()->route('school-profile.index')
                ->with('message_success', 'Profil PKPPS berhasil diperbarui.');
            } else {
                return redirect()->route('school-profile.index')
                ->with('message_error', 'Profil PKPPS gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('school-profile.index')
            ->with('message_error', 'Profil PKPPS gagal diperbarui.');
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
}
