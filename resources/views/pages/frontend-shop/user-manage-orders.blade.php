@extends('layouts.frontend-main')

@section('title','Manage Orders')

@section('content')
<style>
    .timeline {
        list-style-type: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .li {
        transition: all 200ms ease-in;
    }

    .timestamp {
        margin-bottom: 20px;
        padding: 0px 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-weight: 100;
    }

    .status {
        padding: 0px 40px;
        display: flex;
        justify-content: center;
        border-top: 2px solid #D6DCE0;
        position: relative;
        transition: all 200ms ease-in;
    }
    .status h4 {
        font-weight: 600;
    }
    .status:before {
        content: "";
        width: 25px;
        height: 25px;
        background-color: white;
        border-radius: 25px;
        border: 1px solid #ddd;
        position: absolute;
        top: -15px;
        left: 42%;
        transition: all 200ms ease-in;
    }

    .li.complete .status {
        border-top: 2px solid #66DC71;
    }
    .li.complete .status:before {
        background-color: #66DC71;
        border: none;
        transition: all 200ms ease-in;
    }
    .li.complete .status h4 {
        color: #66DC71;
    }

    @media (min-device-width: 320px) and (max-device-width: 700px) {
        .timeline {
            list-style-type: none;
            display: block;
        }

        .li {
            transition: all 200ms ease-in;
            display: flex;
            width: inherit;
        }

        .timestamp {
            width: 100px;
        }

        .status:before {
            left: -8%;
            top: 30%;
            transition: all 200ms ease-in;
        }
    }


    #toggleButton {
        position: absolute;
        left: 50px;
        top: 20px;
        background-color: #75C7F6;
    }

</style>

    <!-- BEGIN #faq -->
    <div id="faq" class="section-container">
        <!-- BEGIN container -->
        <div class="container">

            <!-- BEGIN panel-group -->
            <div class="panel-group faq" id="faq-list">
                    @foreach((is_null(Session::get('pizzaHouseAccount')['GUEST']))?$order->where('u_id',Session::get('pizzaHouseAccount')['ID']):$order->where('o_guest_id',Session::get('pizzaHouseAccount')['GUEST']) as $item)
                        @php

                            $status = ucwords($item->o_status);
                            $color = '';

                            if($status=='Verification') $color ='#80b0ef';
                            elseif($status=='Preparing') $color ='#ffe4b1';
                            elseif($status=='Void') $color ='#ff7c7c';
                            elseif($status=='OnBoard') $color ='#00acac';
                            elseif($status=='Cancelled') $color ='#ff84842b';
                            elseif($status=='Delivered') $color ='#67e6b3';

                        @endphp
                        <!-- BEGIN panel -->
                        <div class="panel panel-inverse">
                            <div class="panel-heading" style="background: {{$color}}; color:black">
                                <h4 class="panel-title">
                                    <div class="pull-right" style="margin-top:3px">
                                        @php
                                            $pending_at = $item->created_at;
                                            $today = \Carbon\Carbon::today();
                                            $timediff = strtotime($today) - strtotime($pending_at);
                                        @endphp
                                        @if($status=='Pending' && $timediff < 86400)
                                            <button class="btn btn-warning" data-toggle="tooltip" title="Cancellation Request"><i class="fa fa-times"></i></button>
                                        @endif
                                        @if($status=='Completed')
                                            <button class="btn btn-danger" data-toggle="tooltip" title="Refund Request"><i class="fa fa-exchange"></i></button>
                                        @endif
                                    </div>
                                    <a data-toggle="collapse" href="#order-{{$item->o_id}}">
                                        <i class="fa fa-truck"></i>
                                        {{ (new DateTime($item->created_at))->format('D M d, Y | h:i A') }} - {{$item->o_fromEmail}}, {{$item->o_transCode}}  - {{ucwords($item->o_status)}}
                                    </a>
                                </h4>
                            </div>
                            <div id="order-{{$item->o_id}}" class="panel-collapse collapse">
                                <div class="panel-body" >
                                    <ul class="timeline" id="timeline">
                                        <li class="li complete">
                                            <div class="timestamp">
                                                {{--<span class="author">Abhi Sharma</span>--}}
                                                <span class="date">{{(new DateTime($item->created_at))->format('F d, Y') }}<span>
                                            </div>
                                            <div class="status">
                                                <h4> Verification </h4>
                                            </div>
                                        </li>
                                        <li class="li {{(!$item->o_preparing_at)?'':'complete'}}">
                                            <div class="timestamp">
                                                {{--<span class="author">PAM Admin</span>--}}
                                                <span class="date">{{($item->o_preparing_at)?(new DateTime($item->o_preparing_at))->format('F d, Y'):'TBA'}}<span>
                                            </div>
                                            <div class="status">
                                                <h4> Preparing </h4>
                                            </div>
                                        </li>
                                        <li class="li {{(!$item->o_onBoard_at)?'':'complete'}}">
                                            <div class="timestamp">
                                                {{--<span class="author">Aaron Rodgers</span>--}}
                                                <span class="date">{{($item->o_onBoard_at)?(new DateTime($item->o_onBoard_at))->format('F d, Y'):'TBA'}}<span>
                                            </div>
                                            <div class="status">
                                                <h4> OnBoard </h4>
                                            </div>
                                        </li>
                                        <li class="li {{(!$item->o_delivered_at)?'':'complete'}}">
                                            <div class="timestamp">
                                                {{--<span class="author">PAM Admin</span>--}}
                                                <span class="date">{{($item->o_delivered_at)?(new DateTime($item->o_delivered_at))->format('F d, Y'):'TBA'}}<span>
                                            </div>
                                            <div class="status">
                                                <h4> Delivered </h4>
                                            </div>
                                        </li>
                                    </ul>

                                @foreach($order_item->where('o_id',$item->o_id) as $ord_item )
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{--{{\App\t_pizza::with('rPizzaInformation','rPizzaSize')->where('p_id',$ord_item->p_id)->first() }}--}}




                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- END panel -->
                    @endforeach

            </div>
            <!-- END panel-group -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #faq -->

@endsection

@section('extrajs')
<script>
</script>
@endsection
