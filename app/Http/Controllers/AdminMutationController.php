<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Mutation;

class AdminMutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('admin.page.graduation.mutation.index', compact('schools'), compact('kelass'));
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

    public function mutationAdd()
    {
        //
        return view('admin.page.graduation.mutation.mutation-add');
    }

    public function mutationPrintLetter() {
        $pdf = PDF::loadView('admin.page.graduation.mutation.mutation-print-letter');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function listData($level, $school) {
        if ($level != 0 && $school != 0) {
            $mutations = Mutation::leftJoin('santri','santri.santri_nisn','=','mutation.mutation_santri')
            ->leftJoin('kelas','kelas.class_id','=','mutation.mutation_class')
            ->leftJoin('school','school.school_npsn','=','mutation.mutation_school')
            ->where('kelas.class_level', '=', $level)
            ->where('mutation.mutation_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0) {
            $mutations = Mutation::leftJoin('santri','santri.santri_nisn','=','mutation.mutation_santri')
            ->leftJoin('kelas','kelas.class_id','=','mutation.mutation_class')
            ->leftJoin('school','school.school_npsn','=','mutation.mutation_school')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0) {
            $mutations = Mutation::leftJoin('santri','santri.santri_nisn','=','mutation.mutation_santri')
            ->leftJoin('kelas','kelas.class_id','=','mutation.mutation_class')
            ->leftJoin('school','school.school_npsn','=','mutation.mutation_school')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else {
            $mutations = Mutation::leftJoin('santri','santri.santri_nisn','=','mutation.mutation_santri')
            ->leftJoin('kelas','kelas.class_id','=','mutation.mutation_class')
            ->leftJoin('school','school.school_npsn','=','mutation.mutation_school')
            ->get();
        } 
        
        $no = 0;
        $data = array();
        foreach ($mutations as $mutation) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $mutation->santri_nisn;
            $row[] = $mutation->santri_name;  
            $row[] = $mutation->santri_gender;
            $row[] = $mutation->class_level ."<br>". $mutation->school_name;
            $row[] = $mutation->class_level ."<br>". $mutation->school_name;
            $row[] = '<span class="badge bg-danger">' . $mutation->mutation_statement . '</span>';
            $row[] = '';
            $row[] = $mutation->reason;
            $row[] = '<a href="mutation-print-letter/'. $mutation->mutation_id .'">Cetak</a>';
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Aksi</button>
                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="mutation-edit/'. $mutation->mutation_id .'">Edit</a>
                                </li>
                                <li><a class="dropdown-item" href="mutation-details/'. $mutation->mutation_id .'">Details</a>
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
