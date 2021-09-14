<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMasterUstadzController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.master.ustadz.index');
    }

    
    public function editUstadz()
    {
        //
        return view('admin.page.master.ustadz.ustadz-edit');
    }

    public function addUstadz()
    {
        //
        return view('admin.page.master.ustadz.ustadz-add');
    }
}
