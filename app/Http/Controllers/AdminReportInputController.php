<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReportInputController extends Controller
{
    //
    public function index()
    {
        $data = array([[

        ]]);
        // foreach ($reportPrints as $report_print) {
        //     $no++;
        //     $row = array();
        //     $row[] = $no;
        //     $row[] = $report_print->santri_nism . " / " . $report_print->santri_nisn;
        //     $row[] = $report_print->santri_name;
        //     $row[] = $report_print->santri_gender;
        //     $row[] = $report_print->report_print_date_download;
        //     $row[] = '<a href="report-uts-print-pdf/' . $report_print->santri_nisn. '">rapor-uts.pdf</a>';
        //     $row[] = '<a href="/report-uas-print-pdf/' . $report_print->santri_nisn. '">rapor-uas.pdf</a>';
        //     $row[] = '<input type="button" class="btn btn-danger" value="Blok Rapor" />';
        //     $data[] = $row;
        // }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
