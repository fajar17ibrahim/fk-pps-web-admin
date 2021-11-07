<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Santri;
use App\Models\Ustadz;
use App\Models\Graduation;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $this->authorize('dashboard');
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->count();

            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_npsn','=','graduation.graduation_school')
            ->count();

            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')
            ->count();
        } else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $user[0]->ustadz_school)
            ->count();

            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_npsn','=','graduation.graduation_school')
            ->where('graduation.graduation_school', '=', $user[0]->ustadz_school)
            ->count();

            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')
            ->where('ustadz.ustadz_school', '=', $user[0]->ustadz_school)
            ->count();
        }

        $newss = News::leftJoin('ustadz','ustadz.ustadz_nik','=','news.news_poster')
        ->get();

        $logins = User::leftJoin('ustadz','ustadz.ustadz_email','=','users.email')
        ->leftJoin('role','role.id','=','users.role_id')
        ->orderBy('users.login_date','desc')
        ->limit(5)
        ->get();

        return view('admin.index', compact('santris'), compact('ustadzs'))
        ->with('graduations', $graduations)
        ->with('newss', $newss)
        ->with('logins', $logins);
    }

}
