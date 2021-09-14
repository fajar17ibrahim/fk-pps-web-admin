<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthLoginController extends Controller
{
    //
    public function login()
    {
        //
        return view('admin.auth.login');
    }
}
