<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

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

    public function addSchool()
    {
        //
        return view('admin.page.master.school.school-add');
    }

    public function editSchool()
    {
        //
        return view('admin.page.master.school.school-edit');
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
            $row[] = $school->school_address;
            $row[] = $school->school_status;
            $row[] = '<div class="d-flex align-items-center">
                            <img src="assets/images/logo_fk_pkpps.jpg" alt="" class="p-1 border bg-white"  width="90" height="90">
                        </div>';
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Aksi</button>
                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/master-school-edit">Edit</a>
                                </li>
                                <li><a class="dropdown-item" href="/public/master-school-details">Details</a>
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
