<?php

namespace App\Http\Controllers;

    use App\r_pizza_information;
    use App\r_pizza_size;
    use App\t_pizza;
    use Illuminate\Http\Request;

class pizza extends Controller
{
    //

    function getPizza(){
        $pizzas = t_pizza::where('stats',1)->get();
        $pizzaInfos = r_pizza_information::where('stats',1)->get();
        $pizzaSizes = r_pizza_size::where('stats',1)->get();
        return view('test',compact('pizzas','pizzaInfos','pizzaSizes'));
    }

    function test(){

        $pizzas = t_pizza::where('stats',1)->get();
        $pizzaInfos = r_pizza_information::where('stats',1)->get();
        $pizzaSizes = r_pizza_size::where('stats',1)->get();
        return view('test',compact('pizzas','pizzaInfos','pizzaSizes'));

    }
}
