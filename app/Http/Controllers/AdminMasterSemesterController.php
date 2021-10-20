<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class AdminMasterSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.page.master.semester.index');
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
        $semester = Semester::find($id);
        $data = array(
            'id' => $semester->semester_id, 
            'name' => $semester->semester_name);
        return json_encode($data);
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
        $semester = Semester::find($id);
        $data = array(
            'id' => $semester->semester_id, 
            'name' => $semester->semester_name);
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            //
            $semester = Semester::find($id);
            $semester->semester_name = $request['inNamaSemester'];
            $updated = $semester->update();
    
            if ($updated) {
                return redirect()->route('master-semester.index')
                ->with('message_success', 'Semester berhasil diperbarui.');
            } else {
                return redirect()->route('master-semester.index')
                ->with('message_error', 'Semester gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-semester.index')
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

    public function listData() { 
        $semesters = Semester::get();
        
        $no = 0;
        $data = array();
        foreach ($semesters as $semester) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $semester->semester_id;
            $row[] = $semester->semester_name;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $semester->semester_id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
