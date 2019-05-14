<?php

namespace App\Http\Controllers;

use App\Mail\confirmMailer;
use App\Mail\pizzaHouseMailer;
use App\t_order;
use App\t_order_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class mailer extends Controller
{


    function sendMail(Request $request){

        $account = Session::get('pizzaHouseAccount');
        $verify = Session::get('verify');

        $order = t_order::where('o_id',$verify['o_id'])
            ->where('o_verficationCode',$request->verify)
            ->get();
        if($order->count()){
            $orderUpdate = t_order::where('o_id',$verify['o_id'])
                ->where('o_verficationCode',$request->verify)
                ->first();
            $orderUpdate->o_toNote = $request->note;
            $orderUpdate->o_preparing_at = Carbon::now();
            $orderUpdate->o_status = "Preparing";
            $orderUpdate->updated_at = Carbon::now();
            $orderUpdate->save();
            Mail::to($account["EMAIL"],$account["NAME"])->send(new pizzaHouseMailer());

            Session::forget('pizzaHouseCart');
            Session::forget('verify');
        }

        return json_encode(array('success',($order->count())?'ok':'not'));
    }

    function sendConfirm(Request $request){

        $unique = uniqid();
        $account = Session::get('pizzaHouseAccount');
        $cart = Session::get('pizzaHouseCart');
        $sum = 0;
        foreach($cart as $id => $val){
            $sum += $val['total'];
        }
        $verify = Session::get('verify');

        $order = t_order::where('o_id',$verify['o_id'])
            ->get();
        if($order->count()){
//            $orderUpdate = t_order::where('o_id',$verify['o_id'])
//                ->first();
//            $orderUpdate->o_verficationCode = $unique;
//            $orderUpdate->updated_at = Carbon::now();
//            $orderUpdate->save();
//            Session::put('verify',array('code'=>$unique,'o_id'=>$orderUpdate->o_id));
//            Mail::to($account["EMAIL"],$account["NAME"])->send(new confirmMailer());

        }else{
            $order = new t_order();
            $order->u_id = ($account['GUEST'])?$account['GUEST']:$account['ID'];
            $order->o_transCode = uniqid();
            $order->o_payTransCode = null;
            $order->o_payID = null;
            $order->o_verficationCode = $unique;
            $order->o_deliverAt = new \DateTime();
            $order->o_fromName = $account["NAME"];
            $order->o_fromEmail = $account["EMAIL"];
            $order->o_fromPhone = $account["PHONE"];
            $order->o_toHouseNo = $account["HOMENO"];
            $order->o_toAddress = $account["ADDRESS"];
            $order->o_toStreet = $account["STREET"];
            $order->o_toBarangay = $account["BRGY"];
            $order->o_toCity = $account["CITY"];
            $order->o_toProvince = $account["PROV"];
            $order->o_toZipCode =  $account["ZIPCODE"];
            $order->o_toLandmark =  $account["LANDMARK"];
            $order->o_toNote =$request->note;
            $order->o_totalAmount= $sum;
            $order->o_status = "Verification";
            $order->o_preparing_at =  new \DateTime();
            $order->o_void_at = null;
            $order->o_onBoard_at =  null;
            $order->o_paid_at =  null;
            $order->o_delivered_at =  null;
            if($order->save()){

                foreach($cart as $id => $val){

                    $orders = new t_order_item();
                    $orders->o_id = $order->o_id;
                    $orders->p_id = $val["pizzaID"];
                    $orders->oi_sizeCombination = $val["customSID"];
                    $orders->oi_pizaCombination = implode(',',(array)$val["customPIDs"]);
                    $orders->oi_toppings = implode(',',(array)$val["toppingsIDs"]);
                    $orders->oi_qty = $val["qty"];
                    $orders->oi_totalAmount = $val["total"];
                    $orders->save();
                }

                Session::put('verify',array('code'=>$unique,'o_id'=>$order->o_id));
                Mail::to($account["EMAIL"],$account["NAME"])->send(new confirmMailer());
            }
        }


        return json_encode(array("success"=>$order->count()));
    }

}
