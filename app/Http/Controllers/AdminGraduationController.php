<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class AdminGraduationController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.graduation.graduated.index');
    }

    public function graduationAdd()
    {
        //
        return view('admin.page.graduation.graduated.graduation-add');
    }

    public function graduationPrintLetter() {
        $pdf = PDF::loadView('admin.page.graduation.graduated.graduation-print-letter');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
