<?php

namespace App\Http\Controllers;

use App\r_pizza_information;
use App\r_pizza_size;
use App\r_pizza_topping;
use App\r_pizza_type;
use App\t_pizza;
use App\t_pizza_custom;
use App\t_topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Krlove\EloquentModelGenerator\Model\EloquentModel;

class frontEnd extends Controller
{

    function index(){
        $pizzaInfos = r_pizza_information::with('rPizzaType')->where('stats',1)->get();
        foreach($pizzaInfos as $pizzaInfo){
            $pizzaInfo->pi_img = asset("uploads/".$pizzaInfo->pi_img);

        }
        $toppings = r_pizza_topping::where('stats',1)->get();
        $types = r_pizza_type::where('stats',1)->get();

        return view('pages.frontend-shop.list-products',compact('toppings','types','pizzaInfos'));
    }

    function loginPizzaHouse(Request $request){
        $account = array(
            "ID" => uniqid()
            ,"NAME" => $request->name
            ,"EMAIL" => $request->email
            ,"PHONE" => $request->phone
            ,"HOMENO" => $request->homeno
            ,"STREET" => $request->street
            ,"ZIPCODE" => $request->zipcode
            ,"PROV" => $request->get('provSelect')
            ,"CITY" => $request->get('citySelect')
            ,"BRGY" => $request->get('brgySelect')
            ,"ADDRESS" => $request->address
            ,"LANDMARK" => $request->landmark
            ,"GUEST" => true

        );
        Session::get('pizzaHouseAccount');
        Session::put('pizzaHouseAccount', $account);
        return redirect()->back();
    }

    function addToCart(Request $request){
        $cartVal  = json_decode($request->cartVal)[0];
        $cartID = uniqid();
        $cart = Session::get('pizzaHouseCart');
        $account = Session::get('pizzaHouseAccount');
        $total = 0;

        $toppings = t_topping::with('rPizzaTopping','rPizzaSize')
            ->where('stats',1)
            ->where('ps_id',$cartVal->sizeID)
            ->whereIn('pts_id',(array)$cartVal->toppingsIDs)
            ->get();
        foreach($toppings as $item){

            $total += $item->t_price;
        }

        $pizzas = t_pizza::with('rPizzaInformation','rPizzaSize')
            ->where('stats',1)
            ->where('pi_id',$cartVal->pizzaID)
            ->where('ps_id',$cartVal->sizeID)
            ->first();
        $total += $pizzas->p_price;
        $pizzas->rPizzaInformation->pi_img = asset("uploads/".$pizzas->rPizzaInformation->pi_img);
        $total = $total *  $cartVal->qty;
//        dd($pizzas);
        $cart[] = array(
                "accID" => $account['ID']
                ,"total" => $total
                ,"pizza" => $pizzas->rPizzaInformation->pi_title
                ,"pizzaID" => $pizzas->p_id
                ,"img" => $pizzas->rPizzaInformation->pi_img
                ,"qty" => $cartVal->qty
                ,"size" => $cartVal->stringSize
                ,"customSID"=> $cartVal->customSID
                ,"customPIDs"=> $cartVal->customPIDs
                ,"toppingsIDs"=> $cartVal->toppingsIDs
                ,"toppingsString"=> $cartVal->stringToppings
        );
        Session::put('pizzaHouseCart',$cart);
        return redirect()->back();
    }

    function removeToCart(Request $request){
        $cart = Session::get('pizzaHouseCart');
        $account = Session::get('pizzaHouseAccount');
        unset($cart[$request->id]);
        Session::put('pizzaHouseCart', $cart);


        $cart = Session::get('pizzaHouseCart');
        $total = 0;

        foreach($cart as $id => $vals){
            $total += $vals['total'];
        }

        return json_encode(array("cart"=>$cart,"total"=>number_format($total,2),"count"=>collect($cart)->count()));

    }
    function getProdDetails($id){

        $pizzas = t_pizza::with('rPizzaInformation','rPizzaSize')
            ->where('stats',1)
            ->where('pi_id',$id)
            ->get();

        $sizeToppings = t_topping::with('rPizzaTopping','rPizzaSize')
            ->where('stats',1)
            ->get();

        $pizzaInfos = r_pizza_information::with('rPizzaType')->where('stats',1)->get();
        foreach($pizzaInfos as $pizzaInfo){
            $pizzaInfo->pi_img = asset("uploads/".$pizzaInfo->pi_img);
        }
        $getProd = r_pizza_information::with('rPizzaType')
            ->where('stats',1)
            ->where('pi_id',$id)
            ->get();
        foreach($getProd as $pizzaInfo){
            $pizzaInfo->pi_img = asset("uploads/".$pizzaInfo->pi_img);
        }

        $toppings = r_pizza_topping::where('stats',1)->get();
        foreach($toppings as $topping){
            $topping->pts_img = asset("uploads/".$topping->pts_img);

        }

        return view('pages.frontend-shop.product-details',compact('pizzaInfos','getProd','toppings','pizzas','sizeToppings'));
    }
}
