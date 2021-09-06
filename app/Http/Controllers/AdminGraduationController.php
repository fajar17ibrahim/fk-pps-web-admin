<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminGraduationController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.graduation.index');
    }

    public function graduationAdd()
    {
        //
        return view('admin.page.graduation.graduation-add');
    }
}
