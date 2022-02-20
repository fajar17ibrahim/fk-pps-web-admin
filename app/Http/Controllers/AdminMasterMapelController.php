<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\KelompokMapel;
use App\Models\Mapel;
use App\Models\MapelTeacher;

class AdminMastermapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('master-mapel');

        $kelompokMapels = KelompokMapel::orderBy('kelompok_name', 'asc')->get();
        return view('admin.page.master.mapel.index', compact('kelompokMapels'));
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
        try {
            //
            $this->authorize('master-mapel');
            $user = Session::get('user');

            $mapel = new Mapel;
            $mapel->mapel_name = $request['inName'];
            $mapel->mapel_kelompok = $request['soKelompok'];
            $save = $mapel->save();
    
            if ($save) {
                $mapelLast = Mapel::orderBy('mapel_id', 'desc')->first();
                $mapelTeacher = new MapelTeacher;
                $mapelTeacher->mapel_id = $mapelLast->mapel_id;
                $mapelTeacher->class_id = $user['kelas'];
                $mapelTeacher->ustadz_nik = "";
                $mapelTeacherSaved = $mapelTeacher->save();

                if ($mapelTeacherSaved) {
                    return redirect()->route('master-mapel.index')
                    ->with('message_success', 'mapel berhasil disimpan.');
                } else {
                    return redirect()->route('master-mapel.index')
                    ->with('message_error', 'mapel gagal disimpan.');
                }
            } else {
                return redirect()->route('master-mapel.index')
                ->with('message_error', 'mapel gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-mapel.index')
            ->with('message_error', $e->getMessage());
        }
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
        $this->authorize('master-mapel');

        $mapel = Mapel::find($id);
        $data = array(
            'id' => $mapel->mapel_id, 
            'name' => $mapel->mapel_name,
            'kelompok' => $mapel->mapel_kelompok);
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
        $this->authorize('master-mapel');

        $mapel = Mapel::find($id);
        $data = array(
            'id' => $mapel->mapel_id, 
            'name' => $mapel->mapel_name,
            'kelompok' => $mapel->mapel_kelompok);
        return json_encode($data);
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
            $this->authorize('master-mapel');
            
            $mapel = Mapel::find($id);
            $mapel->mapel_name = $request['inNameEdit'];
            $mapel->mapel_kelompok = $request['soKelompokEdit'];
            $save = $mapel->update();
    
            if ($save) {
                return redirect()->route('master-mapel.index')
                ->with('message_success', 'Mapel berhasil diperbarui.');
            } else {
                return redirect()->route('master-mapel.index')
                ->with('message_error', 'Mapel gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('master-mapel.index')
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
        
        $mapels = Mapel::leftJoin('kelompok_mapel', 'mapel.mapel_kelompok', '=', 'kelompok_mapel.kelompok_id')
        ->get();
        
        $no = 0;
        $data = array();
        foreach ($mapels as $mapel) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $mapel->mapel_id;
            $row[] = $mapel->mapel_name;
            $row[] = $mapel->kelompok_name;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $mapel->mapel_id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
