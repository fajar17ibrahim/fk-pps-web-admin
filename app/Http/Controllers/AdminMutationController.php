<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMutationController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.page.mutation.index');
    }

    public function mutationAdd()
    {
        //
        return view('admin.page.mutation.mutation-add');
    }
}
