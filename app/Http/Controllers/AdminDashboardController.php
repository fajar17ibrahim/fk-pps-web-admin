<?php

namespace App\Http\Controllers;

use Session;
use File;
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
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->count();

            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
                ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
                ->leftJoin('school','school.school_id','=','graduation.graduation_school')
                ->count();

            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->count();

            $logins = User::leftJoin('ustadz','ustadz.ustadz_email','=','users.email')
                ->leftJoin('role','role.id','=','users.role_id')
                ->orderBy('users.login_date','desc')
                ->limit(5)
                ->get();
        } else if ($user[0]->role_id == 2) {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_school', '=', $user[0]->ustadz_school)
                ->count();

            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
                ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
                ->leftJoin('school','school.school_id','=','graduation.graduation_school')
                ->where('graduation.graduation_school', '=', $user[0]->ustadz_school)
                ->count();

            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->where('ustadz.ustadz_school', '=', $user[0]->ustadz_school)
                ->count();

            $logins = User::leftJoin('ustadz','ustadz.ustadz_email','=','users.email')
                ->leftJoin('role','role.id','=','users.role_id')
                ->where('ustadz.ustadz_school', '=', $user[0]->ustadz_school)
                ->orderBy('users.login_date','desc')
                ->limit(5)
                ->get();
        } else {
            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_id')
                ->where('santri.santri_school', '=', $user[0]->ustadz_school)
                ->where('santri_class', '=', $user[0]->ustadz_class)
                ->count();

            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
                ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
                ->leftJoin('school','school.school_id','=','graduation.graduation_school')
                ->where('graduation.graduation_school', '=', $user[0]->ustadz_school)
                ->count();

            $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_id')
                ->where('ustadz.ustadz_school', '=', $user[0]->ustadz_school)
                ->count();

            $logins = User::leftJoin('ustadz','ustadz.ustadz_email','=','users.email')
                ->leftJoin('role','role.id','=','users.role_id')
                ->where('ustadz.ustadz_school', '=', $user[0]->ustadz_school)
                ->orderBy('users.login_date','desc')
                ->limit(5)
                ->get();
        }

        $newss = News::leftJoin('ustadz','ustadz.ustadz_nik','=','news.news_poster')
        ->get();

        return view('admin.index', compact('santris'), compact('ustadzs'))
        ->with('graduations', $graduations)
        ->with('newss', $newss)
        ->with('logins', $logins);
    }

    public function download($desc)
    {
        try {
        //
            $filePath = public_path("files/manual_book.pdf");
            // return $filePath;
            if (File::exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->route('home.index')
                ->with('message_error', 'File tidak tersedia.');
            }
            
        } catch(\Illuminate\Database\QueryException $e) { 
            return redirect()->route('home.index')
            ->with('message_error', $e->getMessage());
        }
    }

}
