<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserProfileController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.userprofile.index');
    }
}
