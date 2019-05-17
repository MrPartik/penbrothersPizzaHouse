<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sales extends Controller
{
    //
    function index(){

        return view('pages.admin.sales');
    }

    function orderSalesJSON(Request $request){
        $salesJSON = array();
        $sales = collect(DB::SELECT("
        SELECT  
        SUM(o_totalAmount) GROSS_SALES  
        ,date(created_at) created_at
        FROM t_orders 
        WHERE !isnull(o_paid_at) 
		GROUP BY date(created_at)"));
        foreach($sales as $item){
            $sales = array(strtotime($item->created_at)*1000,$item->GROSS_SALES);
            array_push($salesJSON,$sales);
        }
        return $salesJSON;
    }

    function customerSalesJSON(Request $request){


    }

    function pizzaSalesJSON(Request $request){


    }


}
