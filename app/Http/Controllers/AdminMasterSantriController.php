<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMasterSantriController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.master.santri.index');
    }

    public function editSantri()
    {
        //
        return view('admin.page.master.santri.santri-edit');
    }

    public function addSantri()
    {
        //
        return view('admin.page.master.santri.santri-add');
    }

    public function detailsSantri()
    {
        //
        return view('admin.page.master.santri.santri-details');
    }
}
