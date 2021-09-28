<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class AdminMutationController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.graduation.mutation.index');
    }

    public function mutationAdd()
    {
        //
        return view('admin.page.graduation.mutation.mutation-add');
    }

    public function mutationPrintLetter() {
        $pdf = PDF::loadView('admin.page.graduation.mutation.mutation-print-letter');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }


}
