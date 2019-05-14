<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sales extends Controller
{
    //
    function index(){

        return view('pages.admin.sales');
    }
}
