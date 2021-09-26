<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class AdminMasterBookController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.masterbook.index');
    }

    //
    public function masterbookCover()
    {
        //
        $pdf = PDF::loadView('admin.page.masterbook.masterbook-cover');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function masterbookSantri()
    {
        //
        $pdf = PDF::loadView('admin.page.masterbook.masterbook-santri-information');
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
}
