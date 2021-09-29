<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class AdminReportEquipmentController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.report.reportequipment.index');
    }

    //
    public function reportCover()
    {
        //
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-cover');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    //
    public function reportLembaga()
    {
        //
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-pkpps-information');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    
    //
    public function reportSantri()
    {
        //
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-santri-information');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    
    //
    public function reportMutation()
    {
        //
        $pdf = PDF::loadView('admin.page.report.reportequipment.report-mutation');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

}
