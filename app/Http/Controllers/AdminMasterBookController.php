<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\MasterBook;
use App\Models\Santri;
use App\Models\School;
use App\Models\Kelas;

class AdminMasterBookController extends Controller
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
        $kelass = Kelas::orderBy('class_name', 'asc')->get();
        return view('admin.page.masterbook.index', compact('schools'), compact('kelass'));
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
        $masterBook = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('master_book.santri_nisn', $id)
            ->get();

            return json_encode($masterBook);
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

    public function masterbookCover($id)
    {
        //
        $masterBook = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('master_book.santri_nisn', $id)
            ->get();

        $pdf = PDF::loadView('admin.page.masterbook.masterbook-cover', compact('masterBook'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function masterbookSantri($id)
    {
        //
        $masterBook = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('master_book.santri_nisn', $id)
            ->get();

        $pdf = PDF::loadView('admin.page.masterbook.masterbook-santri-information', compact('masterBook'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function masterbookReport()
    {
        //
        $pdf = PDF::loadView('admin.page.masterbook.masterbook-report');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function listData($level, $school, $kelas) {
        if ($level != 0 && $school != 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        } else if ($level != 0 && $school != 0 && $kelas == 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level != 0 && $school == 0 && $kelas == 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_level', '=', $level)
            ->get();
        } else if ($level == 0 && $school != 0 && $kelas == 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('santri.santri_school', '=', $school)
            ->get();
        } else if ($level == 0 && $school == 0 && $kelas != 0) {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->where('kelas.class_id', '=', $kelas)
            ->get();
        }else {
            $masterBooks = MasterBook::leftJoin('santri', 'master_book.santri_nisn', '=', 'santri.santri_nisn')
            ->leftJoin('kelas','santri.santri_class','=','kelas.class_id')
            ->leftJoin('school','kelas.class_school','=','school.school_npsn')
            ->get();
        }

        $no = 0;
        $data = array();
        foreach ($masterBooks as $masterBook) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $masterBook->santri_nism . " / " . $masterBook->santri_nisn;
            $row[] = $masterBook->santri_name;
            $row[] = $masterBook->santri_gender;
            $row[] = $masterBook->master_book_date_download;
            $row[] = '<button type="button" class="btn btn-outline-success radius-30" data-bs-toggle="modal" onclick="listForm(' . $masterBook->santri_nisn . ')">Buku Induk</button>';
            $row[] = '<input type="button" class="btn btn-danger" value="Blok" />';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
