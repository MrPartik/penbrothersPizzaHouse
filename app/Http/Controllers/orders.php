<?php

namespace App\Http\Controllers;

use App\r_pizza_information;
use App\t_order;
use App\t_order_item;
use Illuminate\Http\Request;

class orders extends Controller
{


    function index(Request $request){
        $order = t_order::where('stats',1)->get();
        $order_item = t_order_item::where('stats',1)->get();
        $pizzaInfos = r_pizza_information::with('rPizzaType')->where('stats',1)->get();
        foreach($pizzaInfos as $pizzaInfo){
            $pizzaInfo->pi_img = asset("uploads/".$pizzaInfo->pi_img);
        }
        return view('pages.frontend-shop.user-manage-orders',compact('order','order_item','pizzaInfos'));
    }
}
