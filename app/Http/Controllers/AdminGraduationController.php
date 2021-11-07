<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Graduation;

class AdminGraduationController extends Controller
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
        if ($user[0]->role_id == 1) {
            $schools = School::orderBy('school_name', 'asc')->get();
            $kelass = Kelas::orderBy('class_name', 'asc')->get();
        } else {
            $schools = School::orderBy('school_name', 'asc')
            ->where('school.school_npsn', '=', $user[0]->ustadz_school)
            ->get();
            $kelass = Kelas::orderBy('class_name', 'asc')
            ->where('kelas.class_level', '=', $user[0]->class_level)
            ->get();
        }
        return view('admin.page.graduation.graduated.index', compact('schools'), compact('kelass'));
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

    public function graduationAdd()
    {
        //
        return view('admin.page.graduation.graduated.graduation-add');
    }

    public function graduationPrintLetter() {
        $pdf = PDF::loadView('admin.page.graduation.graduated.graduation-print-letter');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function listData($level, $school) {
        if ($level != 0 && $school != 0) {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_npsn','=','graduation.graduation_school')
            ->where('kelas.class_level', '=', $level)
            ->where('graduation.graduation_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0) {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_npsn','=','graduation.graduation_school')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0) {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_npsn','=','graduation.graduation_school')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else {
            $graduations = Graduation::leftJoin('santri','santri.santri_nisn','=','graduation.graduation_santri')
            ->leftJoin('kelas','kelas.class_id','=','graduation.graduation_class')
            ->leftJoin('school','school.school_npsn','=','graduation.graduation_school')
            ->get();
        } 
        
        $no = 0;
        $data = array();
        foreach ($graduations as $graduation) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $graduation->santri_nisn;
            $row[] = $graduation->santri_name;  
            $row[] = $graduation->santri_gender;
            $row[] = $graduation->class_level;
            $row[] = '<span class="badge bg-warning text-dark">'. $graduation->graduated_statement .'</span>';
            $row[] = $graduation->graduated_year;
            $row[] = '<a href="graduation-print-letter/'. $graduation->graduation_id .'">Cetak</a>';
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Aksi</button>
                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="graduation-edit/'. $graduation->graduation_id .'">Edit</a>
                                </li>
                                <li><a class="dropdown-item" href="graduation-details/'. $graduation->graduation_id .'">Details</a>
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
