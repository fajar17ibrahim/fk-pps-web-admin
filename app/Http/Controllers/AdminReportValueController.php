<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReportValueController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.report.reportvalue.index');
    }

    public function reportValue()
    {
        //
        return view('admin.page.report.reportvalue.report-value');
    }

    public function reportValueSettings()
    {
        //
        return view('admin.page.report.reportvalue.report-value-settings');
    }

    public function reportAttitude()
    {
        //
        return view('admin.page.report.reportvalue.attitude');
    }

    public function reportAttendance()
    {
        //
        return view('admin.page.report.reportvalue.attendance');
    }

    public function reportExtrakurikuler()
    {
        //
        return view('admin.page.report.reportvalue.extrakurikuler');
    }

    public function reportAchievement()
    {
        //
        return view('admin.page.report.reportvalue.achievement');
    }

    public function reportHomeRoomNotes()
    {
        //
        return view('admin.page.report.reportvalue.homeroomnotes');
    }
    
}
