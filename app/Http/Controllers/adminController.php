<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    function getDashboard(){

        return view('pages.admin.admin-dashboard');
    }
}
