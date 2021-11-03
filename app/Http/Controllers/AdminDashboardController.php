<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Santri;
use App\Models\Ustadz;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $this->authorize('dashboard');

        $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->count();

        $ustadzs = Ustadz::leftJoin('school','ustadz.ustadz_school','=','school.school_npsn')
        ->count();

        return view('admin.index', compact('santris'), compact('ustadzs'));
    }
}
