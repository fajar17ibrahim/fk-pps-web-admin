<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class AdminReportPrintController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.report.reportprint.index');
    }

    public function utsExportPdf() {
        $pdf = PDF::loadView('admin.page.report.reportprint.uts-export-pdf');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function uasExportPdf() {
        $pdf = PDF::loadView('admin.page.report.reportprint.uas-export-pdf');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
