<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMasterSchoolController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.master.school.index');
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
}
