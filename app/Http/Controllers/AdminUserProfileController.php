<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserProfileController extends Controller
{
    //
    public function index()
    {
        //
        // $token = JWTAuth::getToken();
        // return $token;
        return view('admin.page.userprofile.index');
    }
}
