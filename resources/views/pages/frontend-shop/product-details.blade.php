
@extends('layouts.frontend-main')

@section('title','Product Details')

@section('content')
    <!-- BEGIN #product -->
    <div id="product" class="section-container p-t-20">
        <!-- BEGIN container -->
        <div class="container">

        @foreach($getProd as $prod)
            @php
                $sizeId = $prod->pt_id;
                $pizzaId = $prod->pi_id;
            @endphp
            <!-- BEGIN product -->
            <div class="product">
                <!-- BEGIN product-detail -->
                <div class="product-detail">
                    <!-- BEGIN product-image -->
                    <div class="product-image">
                        <!-- BEGIN product-thumbnail -->
                        <div class="product-thumbnail">
                            <ul class="product-thumbnail-list">
                                @foreach($toppings as $var)
                                    <li>
                                        <a href="javascript:;"
                                        @foreach($sizeToppings->where('pts_id',$var->pts_id) as $item)
                                            {{ $item->ps_id }} = {{ $item->t_price }}
                                        @endforeach
                                        sel="false" id="toppings" val="{{$var->pts_id}}"  data-url="{{asset($var->pts_img)}}" style="border: 1px dimgray solid; margin:10px" data-toggle="tooltip" title="{{$var->pts_title}}">
                                        <img src="{{asset($var->pts_img)}}" alt="None" style="height: 100px; width: 100px" />
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- END product-thumbnail -->
                        <!-- BEGIN product-main-image -->
                        <div class="product-main-image" data-id="main-image">
                            <img src="{{$prod->pi_img}}" alt="{{$prod->pi_img}}" alt=""  />

                        </div>
                        <!-- END product-main-image -->

                    </div>
                    <!-- END product-image -->
                    <!-- BEGIN product-info -->
                    <div class="product-info">
                        <!-- BEGIN product-info-header -->
                        <div class="product-info-header">
                            <h1 class="product-title"> {{$prod->pi_title}} </h1>
                            <ul class="product-category">

                                <li>
                                    <a href="#">
                                        {{$prod->rPizzaType->pt_title}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END product-info-header -->
                        <!-- BEGIN product-info-list -->
                        <span class="description">{{$prod->pi_desc}}</span><br><br>
                        <div class="row">
                            <ul class="product-info-list col-md-12">
                                <label>Pizza Sizes -  Please choose 1 pizza size.</label>
                                @foreach($pizzas as $item)
                                    <li>
                                        <div class="form-check">
                                            <input name="sizes" class="form-check-input" type="radio" id="{{$item->rPizzaSize->ps_id}}"  required price="{{number_format($item->p_price,2)}}" size="{{$item->rPizzaSize->ps_desc}}" checked/>
                                            <label class="form-check-label" for="{{$item->rPizzaSize->ps_id}}" >{{$item->rPizzaSize->ps_desc}} - ₱ {{number_format($item->p_price,2)}}</label>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <ul class="product-info-list col-md-6">
                                <label>Pizza Customize - Please choose 1.</label>
                                <li>
                                    <div class="form-check">
                                        <input custS="Whole" name="customS" class="form-check-input" val =1 type="radio" id="customS1"  required  checked/>
                                        <label class="form-check-label" for="customS1" >Whole</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input custS="Whole" name="customS" class="form-check-input" val =2 type="radio" id="customS2"  required />
                                        <label class="form-check-label" for="customS2" >Half-half</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input custS="Half-half" name="customS" class="form-check-input" val = 4 type="radio" id="customS3"  required  />
                                        <label class="form-check-label" for="customS3" >4 Quarter</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input custS="4 Quarter" name="customS" class="form-check-input" val =6 type="radio" id="customS4"  required  />
                                        <label class="form-check-label" for="customS4" >6 Quarter</label>
                                    </div>
                                </li>

                            </ul>
                            <ul class="product-info-list col-md-6"  style="display: compact;">
                                <label>Pizza Custom - Please choose atleast <span id="totalCustomP">1</span> pizza for customization per slices.</label>
                                @foreach($pizzaInfos->where('pt_id',$sizeId) as $item)
                                    <li>
                                        <div class="form-check">
                                            <input name="customP" custP="{{$item->pi_title}}" class="form-check-input" type="checkbox" id="customP{{$item->pi_id}}" val="{{$item->pi_id}}" required {{($item->pi_id==$pizzaId)?'checked':''}}  />
                                            <label class="form-check-label" for="customP{{$item->pi_id}}" >{{$item->pi_title}}</label>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- END product-info-list -->

                        <!-- BEGIN product-social -->
                        <div class="product-social">
                            <ul>
                                <li><a href="javascript:;" class="facebook" data-toggle="tooltip" data-trigger="hover" data-title="Facebook" data-placement="top"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:;" class="twitter" data-toggle="tooltip" data-trigger="hover" data-title="Twitter" data-placement="top"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="javascript:;" class="google-plus" data-toggle="tooltip" data-trigger="hover" data-title="Google Plus" data-placement="top"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="javascript:;" class="whatsapp" data-toggle="tooltip" data-trigger="hover" data-title="Whatsapp" data-placement="top"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="javascript:;" class="tumblr" data-toggle="tooltip" data-trigger="hover" data-title="Tumblr" data-placement="top"><i class="fa fa-tumblr"></i></a></li>
                            </ul>
                        </div>
                        <!-- END product-social -->
                        <!-- BEGIN product-purchase-container -->
                        <div class="product-purchase-container">


                            <div class="product-price">
                                <div class="price">₱ <span id="total">0.00</span></div>
                            </div>
                            @if(Session::get('pizzaHouseAccount'))
                                <a href="#cartReq"  id="cart" class="btn btn-success" data-toggle="modal" tooltip="tooltip" title= "Click to add your pizza to cart"><i class="fa fa-plus-square"></i> Add to Cart</a>
                            @endif

                            <center>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <!-- Container for PayPal Mark Checkout -->
                                    <div id="paypalCheckoutContainer"></div>
                                </div>
                            </div>
                            </center>
                        </div>
                        <!-- END product-purchase-container -->
                    </div>
                    <!-- END product-info -->
                </div>
                <!-- END product-detail -->
                {{--<!-- BEGIN product-tab -->--}}
                {{--<div class="product-tab">--}}
                    {{--<!-- BEGIN #product-tab -->--}}
                    {{--<ul id="product-tab" class="nav nav-tabs">--}}
                        {{--<li class="active"><a href="#product-desc" data-toggle="tab">Available Toppings</a></li>--}}
                    {{--</ul>--}}
                    {{--<!-- END #product-tab -->--}}
                    {{--<!-- BEGIN #product-tab-content -->--}}
                    {{--<div id="product-tab-content" class="tab-content">--}}
                        {{--<!-- BEGIN #product-desc -->--}}
                        {{--<div class="tab-pane fade active in" id="product-desc" style="align-items: stretch; display: flex; flex-direction: row; flex-wrap: nowrap; overflow-x: auto; overflow-y: hidden;">--}}
                            {{--@foreach($toppings as $var)--}}
                                {{--<a href="javascript:;"--}}
                                   {{--@foreach($sizeToppings->where('pts_id',$var->pts_id) as $item)--}}
                                        {{--{{ $item->ps_id }} = {{ $item->t_price }}--}}
                                   {{--@endforeach--}}
                                   {{--sel="false" id="toppings" val="{{$var->pts_id}}"  data-url="{{asset($var->pts_img)}}" style="border: 1px dimgray solid; margin:10px" data-toggle="tooltip" title="{{$var->pts_title}}">--}}
                                    {{--<img src="{{asset($var->pts_img)}}" alt="None" style="height: 100px; width: 100px" />--}}
                                {{--</a>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                        {{--<!-- END #product-desc -->--}}

                    {{--</div>--}}
                    {{--<!-- END #product-tab-content -->--}}
                {{--</div>--}}
                {{--<!-- END product-tab -->--}}
            </div>
            <!-- END product -->


            @endforeach

            <!-- BEGIN similar-product -->
            <h4 class="m-b-15 m-t-30">You Might Also Like</h4>
            <div class="row row-space-10">

            @foreach($pizzaInfos->take(6) as $item)
                <!-- BEGIN col-2 -->
                    <div class="col-md-2 col-sm-4">
                        <!-- BEGIN item -->
                        <div class="item item-thumbnail">
                            <a href="{{url('product/details/'.$item->pi_id)}}" class="item-image">
                                <img src="{{$item->pi_img}}" alt="" />
                            </a>
                            <div class="item-info">
                                <h4 class="item-title">
                                    <a href="{{url('product/details/'.$item->pi_id)}}">{{$item->pi_title}}<br />
                                        <span style="color:gray">{{$item->rPizzaType->pt_title}}</span>
                                    </a>
                                </h4>
                                <p class="item-desc" title="{{$item->pi_desc}}">{{$item->pi_desc}}</p>

                            </div>
                        </div>
                        <!-- END item -->
                    </div>
                    <!-- END col-2 -->
                @endforeach

            </div>
            <!-- END similar-product -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #product -->

    <div class="modal fade in" id="cartReq" >
        <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content" style="
    border-radius: 10px;
">
                <div class="modal-header" style="background: #b1273f;color: white;height: 70px;border-radius: 10px;">
                    <h4 class="modal-title">{{$prod->pi_title}}</h4>
                    <p class="modal-description">Summary of pizza order</p>
                </div>
                <div class="modal-body">

                    <div class="row" style="padding: 0px 20px 20px 20px;">
                        <br>
                        <center class="col-md-6">
                            <div class="product-price">
                                <div class="price">₱ <span id="total">0.00</span></div>
                            </div>
                        </center>

                        <center class="col-md-6">
                            <div class="cart-qty-input">
                                <a id=change href="#" class="qty-control left disabled" data-click="decrease-qty" data-target="#qty"><i class="fa fa-minus"></i></a>
                                <input style="width: 100% !important;"  type="text" name="qty" value="1" min=1 class="form-control cart-qty " id="qty" />
                                <a id=change href="#" class="qty-control right disabled" data-click="increase-qty" data-target="#qty"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="qty-desc">1 to max order</div>
                        </center>
                        <br>
                        <ul class="product-info-list col-md-12">
                            <label>Pizza Size</label>
                            <li>
                                <span id="pizzaSize">asd </span>
                            </li>
                        </ul>
                        <ul class="product-info-list col-md-12">
                            <label>Custom Slice</label>
                            <li>
                                <span id="pizzaCustomS">asd </span>
                            </li>
                        </ul>
                        <ul class="product-info-list col-md-12">
                            <label>Custom Pizza Combination</label>
                            <li id="lpizzaP">
                            </li>
                        </ul>
                        <ul class="product-info-list col-md-12">
                            <label>Pizza Toppings</label>
                            <li id="lpizzaT">
                            </li>
                        </ul>

                </div>


            </div>
            <div class="modal-footer">
                <form method="POST" action="{{url('/addToCart')}}">
                    <a href="javascript:;" class="btn btn-outline-danger" data-dismiss="modal">  Cancel</a>
                    {{csrf_field()}}
                    <input style="display: none;" value="" name="cartVal">
                    <button  class="btn btn-success"  type="submit" id="addToCart"> <i class="fa fa-plus-square"></i> Add to Cart</button>
                </form>

            </div>
        </div>
    </div>
    </div>


@endsection
@section('extrajs')

    <script>
        insert =[];
        customS = 0;
        countCustomP = 0;
        $("a[id=toppings]").on('click',function(){

            if($(this).attr('sel')!="true"){
                $(this).attr("sel",true);
            }else {
                $(this).attr("sel",false);
            }

            if($(this).attr('sel')=="true"){
                $(this).css('border','5px #36465d solid');
            }else {
                $(this).css('border','1px dimgray solid');
            }
            compute();
            restrictPick();
        });
        $("input[name=customP]").on('click',function(){
            compute()
            restrictPick();
        });
        $("input[name=customS]").on('click',function(){
            compute()
            restrictPick();
        });
        $("input[name=sizes]").on('click',function(){
            compute()
            restrictPick();
        });
        $('a[id=change]').on('click',function(){
            compute();
            restrictPick();
        });

        $('input[id=qty]').on('keyup change input',function(){

            compute();
            restrictPick();
        });

        // $('button[id=addToCart]').on('click',function(){
        //     alert(JSON.stringify(insert));
        //
        // });


        compute();
        restrictPick();


        function restrictPick(){
            countCustomP = $("input[name=customP]:checked").length;
            customS = $("input[name=customS]:checked").attr('val');
            $("input[name=customP]").prop('disabled',false);
            if(customS <= countCustomP)
                $("input[name=customP]").prop('disabled',true);
                $("input[name=customP]:checked").prop('disabled',false);

            if(customS==1){
                $("input[name=customP]").prop('disabled',true);
                $("input[name=customP]").prop('checked',false);
                $("#customP{{$pizzaId}}").prop('checked',true);
            }
            $("#customP{{$pizzaId}}").prop('disabled',true);
            $("#totalCustomP").text($("input[name=customS]:checked").attr('val'));
        };

        function compute(){
            setTimeout(function(){
                sizePrice = $("input[name=sizes]:checked").attr('price');
                sizeID = $("input[name=sizes]:checked").attr('id');
                toppingsTotal = 0.00;
                qty = $('input[id=qty]').val();
                toppings = [];
                customPs = [];
                insert = [];

                toppingsString = [];
                customPsString = [];
                customSString = $("input[name=customS]:checked").attr('custS');
                sizeString = $("input[name=sizes]:checked").attr("size");

                $("#lpizzaP").html(" ");
                $("#lpizzaT").html(" ");
                $.each($("a[sel=true ]"),function(i,val){
                    toppingsTotal += parseFloat($(this).attr(sizeID));
                    toppings.push($(this).attr('val'));
                    toppingsString.push($(this).attr('data-original-title'));
                    $("#lpizzaT").append("<li><span>"+$(this).attr('data-original-title')+"</span></li>");
                });
                $.each($("input[name=customP]:checked"),function(i,val){
                    customPs.push($(this).attr('val'));
                    customPsString.push($(this).attr('custP'));
                    $("#lpizzaP").append("<li><span>"+$(this).attr('custP')+"</span></li>");
                });


                //this is for display only, there will be a backend computation
                insert.push({
                    toppingsIDs: toppings
                    ,customPIDs: customPs
                    ,customSID: customS
                    ,sizeID: sizeID
                    ,pizzaID: {{$prod->pi_id}}
                    ,qty: qty
                    ,price: ((parseFloat(sizePrice) +parseFloat(toppingsTotal))*qty).toFixed(2)
                    ,stringToppings: toppingsString
                    ,stringCustomPs: customPsString
                    ,stringCustomS: customSString
                    ,stringPizza: "{{$prod->pi_title}}"
                    ,stringSize: sizeString
                });
                console.log(insert);
                $("input[name=cartVal]").val(JSON.stringify(insert))
                $("#pizzaSize").text(sizeString)
                $("#pizzaCustomS").text(customSString)
                $("span[id=total]").text(((parseFloat(sizePrice) +parseFloat(toppingsTotal))*qty).toFixed(2));
            },100);
        }

    </script>
@endsection

