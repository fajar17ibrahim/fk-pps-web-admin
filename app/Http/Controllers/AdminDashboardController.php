<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $value = $request->header('X-Header-Name', 'default');
        return view('admin.index');
    }
}
