<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\School;
use App\Models\Ustadz;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('user-profile');

        $user = Auth::user();
        $ustadz = Ustadz::where('ustadz_email' , '=', $user->email)->get();
        $schools = School::orderBy('school_name', 'asc')->get();
        $address = Address::get();
        return view('admin.page.userprofile.index', compact('address'), compact('schools'))
        ->with('ustadz', $ustadz);
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
            $this->authorize('user-profile');
            $ustadz = Ustadz::find($id);

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
            
            $email = $request['inUstadzEmail'];

            $checkData = Ustadz::where('ustadz_email', '=', $email)->first();
            if ($checkData && $ustadz->ustadz_email != $email) {
                return redirect()->route('user-profile.index')
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
            $ustadz->ustadz_rt_rw = $request['inRT'] . "/" . $request['inRW'];
            $ustadz->ustadz_village = $request['soVillage'];
            $ustadz->ustadz_districts = $request['inDistricts'];
            $ustadz->ustadz_city = $request['inKabOrCity'];
            $ustadz->ustadz_province = $request['inProvince'];
            $ustadz->ustadz_country = $request['inCountry'];
            $ustadz->ustadz_email = $email;
            $ustadz->ustadz_phone = $request['inUstadzPhone'];
            $ustadz->status = 'Aktif';
            $ustadz->ustadz_photo = $photoName;
            $saveUstadz = $ustadz->update();
    
            if ($saveUstadz) {
                $userData = User::where('email', '=', $email)
                    ->first();

                if ($userData) {
                    $userData->name = $request['inUstadzName'];
                    $userData->email = $email;
                    $userData->update();
                }

                $ustadz = Ustadz::leftJoin('users', 'users.email', '=', 'ustadz.ustadz_email')
                    ->leftJoin('role', 'role.id', '=', 'users.role_id')
                    ->leftJoin('school', 'school.school_id', '=', 'ustadz.ustadz_school')
                    ->where('ustadz_id' , '=', $id)
                    ->get();
                    Session::put('user', $ustadz);
                    
                return redirect()->route('user-profile.index')
                ->with('message_success', 'Profil berhasil diperbarui.');
            } else {
                return redirect()->route('user-profile.index')
                ->with('message_error', 'Profil gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('user-profile.index')
            // ->with('message_error', 'Profil gagal diperbarui.');
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
}
