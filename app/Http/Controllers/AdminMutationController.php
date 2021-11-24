<?php

namespace App\Http\Controllers;

use Session;
use PDF;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Mutation;
use App\Models\Santri;

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
        try {
            $nisn = $request['soSantri'];

            $mutationCheck = Mutation::where('mutation_santri', '=', $nisn)->first();
            
            $santri = Santri::where('santri_nisn', '=' , $nisn)->first();

            if ($mutationCheck) {
                $mutation = $mutationCheck;
            } else {
                $mutation = new Mutation;
            }

            $mutation->mutation_santri = $nisn;
            $mutation->mutation_class = $santri->santri_class;
            $mutation->mutation_school = $santri->santri_school;
            $mutation->mutation_statement = $request['rbMelanjutkanTidak'];
            $mutation->mutation_school_destination = $request['soSchoolDest'];
            $mutation->reason = $request['inReason'];

            if ($mutationCheck) {
                $saved = $mutation->update();
            } else {
                $saved = $mutation->save();
            }

            if ($saved) {
                return redirect()->route('mutation.index')
                ->with('message_success', 'Mutasi berhasil disimpan.');
            } else {
                return redirect()->route('mutation.index')
                ->with('message_error', 'Mutasi gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('mutation.index')
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
            $nisn = $request['soSantri'];

            
            $santri = Santri::where('santri_nisn', '=' , $nisn)->first();

            $mutation = Mutation::find($id);
            $mutation->mutation_santri = $nisn;
            $mutation->mutation_class = $santri->santri_class;
            $mutation->mutation_school = $santri->santri_school;
            $mutation->mutation_statement = $request['rbMelanjutkanTidak'];
            $mutation->mutation_school_destination = $request['soSchoolDest'];
            $mutation->reason = $request['inReason'];
            $saved = $mutation->update();
           
            if ($saved) {
                return redirect()->route('mutation.index')
                ->with('message_success', 'Mutasi berhasil diperbarui.');
            } else {
                return redirect()->route('mutation.index')
                ->with('message_error', 'Mutasi gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('mutation.index')
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

    public function mutationAdd()
    {
        //
        $schools = School::orderBy('school_name', 'asc')->get();
        $user = Session::get('user');
        if ($user[0]->role_id == 1) {
            $santris = Santri::orderBy('santri_name', 'asc')->get();
        } else {

            $santris = Santri::leftJoin('kelas','santri.santri_class','=','kelas.class_id')
                ->leftJoin('school','kelas.class_school','=','school.school_npsn')
                ->where('kelas.class_level', '=', $user[0]->class_level)
                ->where('school.school_npsn', '=', $user[0]->ustadz_school)
                ->get();
        }

        return view('admin.page.graduation.mutation.mutation-add', compact('santris'), compact('schools'));
    }

    public function mutationEdit($id)
    {
        //
        $mutationCheck = Mutation::find($id);

        if ($mutationCheck) {
            $santri = Santri::where('santri_nisn', '=' , $mutationCheck->mutation_santri)
                    ->first();

            $schoolFrom = Kelas::leftJoin('school', 'school.school_npsn', '=', 'kelas.class_school')
                    ->leftJoin('ustadz', 'ustadz.ustadz_nik', '=', 'school.school_headship')
                    ->where('class_id', '=' , $mutationCheck->mutation_class)
                    ->first();

            $schoolDest = School::where('school_npsn', '=' , $mutationCheck->mutation_school_destination)->first();
        
            $melanjutkan = '';
            $tidak_melanjutkan = '';
            if ($mutationCheck->mutation_statement == 'Melanjutkan') {
                $melanjutkan = 'checked';
            } else {
                $tidak_melanjutkan = 'checked';
            }

            $mutation = array(
                'id' => $mutationCheck->mutation_id,
                'nisn' => $santri->santri_nisn,
                'santri_nama' => $santri->santri_nisn . ' - ' . $santri->santri_name,
                'pps_npsn' => $schoolDest->school_npsn,
                'pps_nama' => $schoolDest->school_name,
                'melanjutkan' => $melanjutkan,
                'melanjutkan_tidak' => $tidak_melanjutkan,
                'alasan' => $mutationCheck->reason
            );
        }

        $schools = School::orderBy('school_name', 'asc')->get();
        
        return view('admin.page.graduation.mutation.mutation-edit', compact('schools'))
            ->with('mutation', $mutation);
    }

    public function mutationPrintLetter($id) {

        $mutationCheck = Mutation::find($id);

        if ($mutationCheck) {
            $santri = Santri::where('santri_nisn', '=' , $mutationCheck->mutation_santri)
                    ->first();

            $schoolFrom = Kelas::leftJoin('school', 'school.school_npsn', '=', 'kelas.class_school')
                    ->leftJoin('ustadz', 'ustadz.ustadz_nik', '=', 'school.school_headship')
                    ->where('class_id', '=' , $mutationCheck->mutation_class)
                    ->first();

            $schoolDest = School::where('school_npsn', '=' , $mutationCheck->mutation_school_destination)->first();

            $mutation = array(
                'sekolah_asal_npsn' => $schoolFrom->school_npsn,
                'sekolah_asal_level' => $schoolFrom->class_level,
                'sekolah_asal_logo' => $schoolFrom->school_photo,
                'sekolah_asal_nama' => $schoolFrom->school_name,
                'sekolah_asal_alamat' => $schoolFrom->school_address . ' RT/RW ' . $schoolFrom->school_rt_rw . ' ' . $schoolFrom->school_village,
                'sekolah_asal_kec' => $schoolFrom->school_districts,
                'sekolah_asal_kab_kota' => $schoolFrom->school_city ,
                'sekolah_asal_provinsi' => $schoolFrom->school_province,
                'sekolah_asal_pos' => $schoolFrom->school_pos_code,
                'sekolah_asal_email' => $schoolFrom->school_email,
                'sekolah_asal_web' => '',
                'sekolah_asal_kepsek' => $schoolFrom->ustadz_name,
                'santri_nama' => $santri->santri_name,
                'santri_nisn' => $santri->santri_nisn,
                'santri_gender' => $santri->santri_gender,
                'santri_ttl' => $santri->santri_born_place  . ', ' . tanggal($santri->santri_born_date),
                'santri_kelas' => $schoolFrom->class_name,
                'santri_ibu_kandung' => $santri->mother_name,
                'ayah_nama' => $santri->father_name,
                'ayah_pekerjaan' => $santri->father_profession,
                'sekolah_dest_nama' => $schoolDest->school_name,
                'sekolah_dest_alamat' => $schoolDest->school_address . ' RT/RW ' . $schoolDest->school_rt_rw . ' ' . $schoolDest->school_village,
                'sekolah_dest_kec' => $schoolDest->school_districts,
                'sekolah_dest_kab_kota' => $schoolDest->school_city,
                'sekolah_dest_provinsi' => $schoolDest->school_province
            );
        }

        // return $mutation;

        $pdf = PDF::loadView('admin.page.graduation.mutation.mutation-print-letter', compact('mutation'));
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
            $row[] = $mutation->santri_nism;
            $row[] = $mutation->santri_name;  
            if ($mutation->mutation_statement != 'Tidak') {
                $label = 'success';
                $cetak = '<a href="mutation-print-letter/'. $mutation->mutation_id .'">Cetak</a>';
            } else {
                $label = 'danger';
                $cetak = 'Kosong';
            }
            $row[] = '<span class="badge bg-' . $label . '">' . $mutation->mutation_statement . '</span>';
            $row[] = $cetak;
            $row[] = '<div class="col">
                            <div class="btn-group">
                                <a href="mutation-edit/'. $mutation->mutation_id .'" class="btn btn-success px-4 ms-auto"><i class="bx bx-edit"></i>Edit</a>
                            </div>
                        </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
