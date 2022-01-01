<?php

namespace App\Http\Controllers;

use Session;
use File;
use Illuminate\Http\Request;
use App\Models\Curriculum;

class AdminCurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.page.curriculum.index');
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
        try {
            //
            $curriculumUla = $request['inCurriculumUla'];
            $silabusUla = $request['inSilabusUla'];
            $rppUla = $request['inRPPUla'];

            $curriculumWustha = $request['inCurriculumWustha'];
            $silabusWustha = $request['inSilabusWustha'];
            $rppWustha = $request['inRPPWustha'];

            $curriculumUlya = $request['inCurriculumUlya'];
            $silabusUlya = $request['inSilabusUlya'];
            $rppUlya = $request['inRPPUlya'];

            if ($curriculumUla) {
                $fileName = "curriculum_" . time().'.' . $request->inCurriculumUla->extension();
                $uploaded = $request->inCurriculumUla->move(public_path('files'), $fileName);
                $level = "Ula";
                $desc = "Curriculum";
            } else if ($silabusUla) {
                $fileName = "silabus_" . time().'.' . $request->inSilabusUla->extension();
                $uploaded = $request->inSilabusUla->move(public_path('files'), $fileName);
                $level = "Ula";
                $desc = "Silabus";
            } else if ($rppUla) {
                $fileName = "rpp_" . time().'.' . $request->inRPPUla->extension();
                $uploaded = $request->inRPPUla->move(public_path('files'), $fileName);
                $level = "Ula";
                $desc = "RPP";
            } else if ($curriculumWustha) {
                $fileName = "curriculum_" . time().'.' . $request->inCurriculumWustha->extension();
                $uploaded = $request->inCurriculumWustha->move(public_path('files'), $fileName);
                $level = "Wustha";
                $desc = "Curriculum";
            } else if ($silabusWustha) {
                $fileName = "silabus_" . time().'.' . $request->inSilabusWustha->extension();
                $uploaded = $request->inSilabusWustha->move(public_path('files'), $fileName);
                $level = "Wustha";
                $desc = "Silabus";
            } else if ($rppWustha) {
                $fileName = "rpp_" . time().'.' . $request->inRPPWustha->extension();
                $uploaded = $request->inRPPWustha->move(public_path('files'), $fileName);
                $level = "Wustha";
                $desc = "RPP";
            } else if ($curriculumUlya) {
                $fileName = "curriculum_" . time().'.' . $request->inCurriculumUlya->extension();
                $uploaded = $request->inCurriculumUlya->move(public_path('files'), $fileName);
                $level = "Ulya";
                $desc = "Curriculum";
            } else if ($silabusUlya) {
                $fileName = "silabus_" . time().'.' . $request->inSilabusUlya->extension();
                $uploaded = $request->inSilabusUlya->move(public_path('files'), $fileName);
                $level = "Ulya";
                $desc = "Silabus";
            } else if ($rppUlya) {
                $fileName = "rpp_" . time().'.' . $request->inRPPUlya->extension();
                $uploaded = $request->inRPPUlya->move(public_path('files'), $fileName);
                $level = "Ulya";
                $desc = "RPP";
            }

            if ($uploaded) {
                $user = Session::get('user');
                $curriculumCheck = Curriculum::where('school_id', '=', $user[0]->ustadz_school)
                    ->where('class_level', '=', $level)
                    ->where('desc', '=', $desc)
                    ->first();

                if ($curriculumCheck) {
                    $filePath = public_path("files/{$curriculumCheck->file}");
                    if (File::exists($filePath)) {
                        unlink($filePath);
                    }

                    $curriculumCheck->school_id = $user[0]->ustadz_school;
                    $curriculumCheck->class_level = $level;
                    $curriculumCheck->desc = $desc;
                    $curriculumCheck->file = $fileName;
                    $save = $curriculumCheck->update();
                } else {
                    $curriculum = new Curriculum;
                    $curriculum->school_id = $user[0]->ustadz_school;
                    $curriculum->class_level = $level;
                    $curriculum->desc = $desc;
                    $curriculum->file = $fileName;
                    $save = $curriculum->save();
                }
            }

            if ($save) {
                return redirect()->route('curriculum.index')
                ->with('message_success', 'File berhasil diupload.');
            } else {
                return redirect()->route('curriculum.index')
                ->with('message_error', 'File gagal diupload.');
            }
        } catch(\Illuminate\Database\QueryException $e) { 
            return redirect()->route('curriculum.index')
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

    public function download($level, $desc)
    {
        try {
        //

        $user = Session::get('user');
        $curriculumCheck = Curriculum::where('class_level', '=', $level)
            ->where('desc', '=', $desc)
            ->first();

            // return $curriculumCheck;

            if ($curriculumCheck) {
                $filePath = public_path("files/{$curriculumCheck->file}");
                // return $filePath;
                if (File::exists($filePath)) {
                    return response()->download($filePath);
                } else {
                    return redirect()->route('curriculum.index')
                    ->with('message_error', 'File tidak tersedia.');
                }
            } else {
                return redirect()->route('curriculum.index')
                ->with('message_error', 'File tidak tersedia.');
            }
        } catch(\Illuminate\Database\QueryException $e) { 
            return redirect()->route('curriculum.index')
            ->with('message_error', $e->getMessage());
        }
    }
}
