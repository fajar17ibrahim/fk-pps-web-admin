<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Ustadz;

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
        $schools = School::orderBy('school_name', 'asc')->get();
        return view('admin.page.master.ustadz.index', compact('schools'));
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

    public function editUstadz()
    {
        //
        return view('admin.page.master.ustadz.ustadz-edit');
    }

    public function addUstadz()
    {
        //
        return view('admin.page.master.ustadz.ustadz-add');
    }

    public function listData() {
        $ustadzs = Ustadz::get();
        
        $no = 0;
        $data = array();
        foreach ($ustadzs as $ustadz) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<div class="d-flex align-items-center">
                            <img src="assets/images/avatars/'. $ustadz->ustadz_photo .'" alt="" class="p-1 border bg-white"  width="90" height="100">
                        </div>';
            $row[] = $ustadz->ustadz_nik;
            $row[] = $ustadz->ustadz_name;  
            $row[] = $ustadz->ustadz_gender;
            $row[] = $ustadz->ustadz_born_place;
            $row[] = $ustadz->ustadz_born_date;
            $row[] = $ustadz->status;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Aksi</button>
                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="master-ustadz-details?id='. $ustadz->ustadz_nik.'">Details</a>
                                </li>
                                <!-- <li><a class="dropdown-item" href="/master-ustadz-edit">Edit</a>
                                </li> -->
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
