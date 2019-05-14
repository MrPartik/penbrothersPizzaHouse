@php
    $account = \Session::get('pizzaHouseAccount');
    $cart = \Session::get('pizzaHouseCart');
    $sum = 0;
@endphp
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Pizza House | @yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('assets/plugins/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/e-commerce/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/e-commerce/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/e-commerce/theme/default.css')}}" id="theme" rel="stylesheet" />
    <link href="{{asset('assets/plugins/jquery-smart-wizard/src/css/smart_wizard.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/parsley/src/parsley.css')}}" rel="stylesheet" />

	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px white;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #b1273f;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #b1273f;
        }



        .loader {
            position: relative;
        }

        .loader::after {
            background-color: rgba(0,0,0,.7);
            content: 'Loading...';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
    </style>
</head>

<body>
    <!-- BEGIN #page-container -->
    <div id="page-container" class="fade">
        <!-- BEGIN #top-nav -->
        <div id="top-nav" class="top-nav">
            <!-- BEGIN container -->
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('register')}}"><i class="fa fa-user-plus"></i> Sign Up</a></li>
                        <li><a href="{{url('login')}}"><i class="fa fa-user"></i> Sign In</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i> Customer Care</a></li>
                        <li><a href="#"><i class="fa fa-arrow-circle-down"></i> Order Tracker</a></li>
                        <li><a href="#"><i class="fa fa-truck"></i> Order Now</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="#">Career</a></li>
                        <li><a href="#">Our Forum</a></li> -->
                        <li><a href="#"><i class="fa fa-newspaper-o"></i> Newsletter</a></li>
                        <li><a href="#"><i class="fa fa-facebook f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus f-s-14"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- END container -->
        </div>
        <!-- END #top-nav -->

        <!-- BEGIN #header -->
        <div id="header" class="header">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN header-container -->
                <div class="header-container">
                    <!-- BEGIN navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header-logo">
                            <a href="{{url('/')}}">
                                <span>Pizza</span>House
                                <small>Pizza always onboard</small>
                            </a>
                        </div>
                    </div>
                    <!-- END navbar-header -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav">

                                @if(Session::get('pizzaHouseAccount'))
                                    <li class="{{Request::is('/summary-orders')?'active':''}}" ><a href="{{url('/summary-orders')}}">Manage Orders</a></li>
                                @endif
                                    <li class="dropdown dropdown-hover">
                                        <a href="#" data-toggle="dropdown">
                                            <i class="fa fa-search search-btn"></i>
                                            <span class="arrow top"></span>
                                        </a>
                                        <div class="dropdown-menu p-15">
                                            <form action="{{url('/search')}}" method="GET" name="search_form">
                                                <div class="input-group">
                                                    <input required name='search' type="text" placeholder="Search" class="form-control bg-silver-lighter" />
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-inverse" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END header-nav -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <ul class="nav pull-right">
                             <li class="dropdown dropdown-hover">
                                <a href="#" class="header-cart" data-toggle="dropdown">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span cart="count" class="total">{{collect($cart)->count()}}</span>
                                    <span class="arrow top"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-cart p-0">
                                    <div class="cart-header">
                                        @if($cart)
                                        @php
                                            foreach($cart as $id => $val){
                                                $sum += $val['total'];
                                            }
                                        @endphp
                                        @endif
                                        <h4 class="cart-title">Pizza Bag - Total of ₱ <span cart="total">{{number_format($sum,2)}}</span></h4>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
                                            @if($cart)
                                            @foreach($cart as $id => $item)
                                            <li liVal="{{$id}}">
                                                <div class="cart-item-image"><img src="{{$item['img']}}" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>{{$item['pizza']}}</h4>
                                                    <p>{{$item['qty']}} pizza</p>
                                                    <p class="price">₱ {{number_format($item['total'],2)}}</p>
                                                </div>
                                                <div class="cart-item-close">
                                                        <a href="#" val="{{$id}}" id="remCartItem" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="cart-footer">
                                        <div class="row row-space-10">
                                            <div class="col-xs-6">
                                                <a href="checkout_cart.html" class="btn btn-default btn-block">View Cart</a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a data-backdrop="static" data-keyboard="false" id=cartCheckout href="#checkout" data-toggle="modal" class="btn btn-inverse btn-block">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li class="{{(!is_null($account))?'dropdown dropdown-hover':''}}" >
                                <a href="{{(!is_null($account))?'javascript:;':'#loginGuest'}}" {{(is_null($account))?'data-toggle=modal':'data-toggle=dropdown'}} >
                                    <img src="{{asset('assets/img/user/user-12.jpg')}}" class="user-img" alt="" />
                                    <span class="hidden-md hidden-sm hidden-xs">
                                      {{(!is_null($account))?$account['NAME']:'Not Logged In'}}
                                    </span>
                                    <span class="arrow top"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-cart p-0">
                                    <div class="cart-header">
                                        <h4 class="cart-title">Information - {{$account['ID']}} </h4>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
                                            <li>
                                                <strong>Contact Info:</strong><br> {{$account['EMAIL']}} / {{$account['PHONE']}}
                                            </li>
                                            <li>
                                                <strong>Delivery to: </strong><br> {{$account['ADDRESS']}}
                                            </li>
                                            <li>
                                                <strong>Landmark: </strong><br> {{$account['LANDMARK']}}
                                            </li>

                                        </ul>
                                    </div>
                                    {{--<div class="cart-footer">--}}
                                        {{--<div class="row row-space-10">--}}
                                            {{--<div class="col-xs-6">--}}
                                                {{--<a href="checkout_cart.html" class="btn btn-default btn-block">View Cart</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xs-6">--}}
                                                {{--<a href="checkout_cart.html" class="btn btn-inverse btn-block">Checkout</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </li>
                            @if(!is_null($account))
                                <li class="divider"></li>
                                <li>
                                    <a href="{{url("/logoutPizzaHouse/".$account['ID'])}}"  >
                                        <span class="hidden-md hidden-sm hidden-xs">Logout
                                    </span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                    <!-- END header-nav -->
                </div>
                <!-- END header-container -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #header -->

        @yield('content')

        <!-- BEGIN #footer -->
        <div id="footer" class="footer">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="footer-header">ABOUT US</h4>
                        <p>Hi their! We are PizzaHouse <br>PizzaHouse Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- BEGIN col-3 -->
                    <div class="col-md-3">
                        <h4 class="footer-header">Latest Pizza</h4>
                        <ul class="list-unstyled list-product">
                            @foreach($pizzaInfos->sortby('created_at')->take(3) as $item)
                            <li>
                                <div class="image" style="overflow:hidden">
                                    <img src="{{$item->pi_img}}" alt="" />
                                </div>
                                <div class="info">
                                    <h4 class="info-title">{{$item->pi_title}}</h4>
                                    <div class="info-description">
                                       {{$item->rPizzaType->pt_title}}
                                        </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-md-3">
                        <h4 class="footer-header">OUR CONTACT</h4>
                        <address>
                            <strong>PizzaHouse, Inc.</strong><br />
                            Address<br /><br />
                            <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                            <abbr title="Fax">Fax:</abbr> (123) 456-7891<br />
                            <abbr title="Email">Email:</abbr> <a href="mailto:noreply@pizzahouse.com">sales@myshop.com</a><br />
                            <abbr title="Skype">Skype:</abbr> <a href="skype:PizzaHouse">PizzaHouse</a>
                        </address>
                    </div>
                    <!-- END col-3 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer -->

        <!-- BEGIN #footer-copyright -->
        <div id="footer-copyright" class="footer-copyright">
            <!-- BEGIN container -->
            <div class="container">
                <div class="payment-method">
                    <img src="{{asset('assets/img/payment/payment-method.png')}}" alt="" />
                </div>
                <div class="copyright">
                    Copyright &copy; {{date('Y')}} PizzaHouse . All rights reserved.
                </div>
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer-copyright -->
    </div>
    <!-- END #page-container -->



    @if(!Session::get('pizzaHouseAccount'))
    <div class="modal fade in" id="loginGuest" >
        <div class="modal-dialog" style="width: 700px;">
            <div class="modal-content" style="
    border-radius: 10px;
">
                <div class="modal-header" style="background: #b1273f;color: white;height: 70px;border-radius: 10px;">
                    <h4 class="modal-title">PizzaHouse, Please select</h4>
                    <p class="modal-description">Select login if you already have an account, guest if don't have.</p>
                </div>
                <div class="modal-body">

                    <div class="row" style="padding: 20px;">
                        <center>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <a href="{{url('login')}}">
                                        <div style="color: #6f6f6f;width: 100%;height: 250px;border: 1px gray solid;border-radius: 10px;"">
                                            <i class="fa fa-user" style="font-size: 150px; padding-top:10%"></i>
                                            <br>
                                            <label >Please Login me, I want to use my existing data.</label>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#guestTab" data-toggle="modal" onclick="$('#loginGuest').modal('toggle')">
                                        <div  style="color: #6f6f6f;width: 100%;height: 250px;border: 1px gray solid;border-radius: 10px;">
                                            <i class="fa fa-user-o" style="font-size: 150px; padding-top:10%"></i>
                                            <br>
                                            <label>I don't have an account, I want to order pizza without logging in.</label>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>


                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-outline-danger" onclick="$('#loginGuest').modal('toggle');  ">  Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="guestTab" >
        <div class="modal-dialog" style="width: 600px;">
            <div class="modal-content" style="
    border-radius: 10px;
">
                <div class="modal-header" style="background: #6f6f6f;color: white;height: 70px;border-radius: 10px;">
                    <h4 class="modal-title">PizzaHouse - Order as Guest </h4>
                    <p class="modal-description">Fillout the form below to continue ordering, if you want to signup, click <a class="label" href="{{url('register')}}">here </a>instead.</p>
                </div>
                <form method="POST" action="{{url('loginPizzaHouse')}}">
                    {{csrf_field()}}
                <div class="modal-body">
                    <div class="row" style="height: 450px;overflow: hidden auto;padding: 20px;">
                        <label>Contact Information</label>
                        <br>

                        <div class="form-group col-md-12">
                            <span>* Name</span>
                            <input class="form form-control" name="name"  required/>
                        </div>
                        <div class="form-group col-md-6">
                            <span>* Email</span>
                            <input class="form form-control" name="email" type="email" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <span>* Phone</span>
                            <input class="form form-control" name="phone" required/>
                        </div>

                        <label>Delivery Details</label>
                        <br>
                        <div class="form-group col-md-3">
                            <span>* Home No.</span>
                            <input class="form form-control" name="homeno" type="text" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <span>* Street.</span>
                            <input class="form form-control" name="street" type="text" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <span>Zip Code</span>
                            <input class="form form-control" name="zipcode" type="text" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <span>* Province</span>
                            <select class="form form-control" id="provSelect" name="provSelect" style="width:100%;" required></select>
                        </div>
                        <div class="form-group col-md-6">
                            <span>* City /Municipality</span>
                            <select class="form form-control" id="citySelect" style="width:100%;" name="citySelect" required></select>
                        </div>
                        <div class="form-group col-md-12">
                            <span>* Barangay</span>
                            <select  class="form form-control" id="brgySelect" name="brgySelect" style="width:100%;" required></select>
                        </div>
                        <div class="form-group col-md-12">
                            <span>* Edit Address </span>
                            <textarea  class="form form-control" id="address" name="address" style="width:100%;" required></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <span>LandMark </span>
                            <textarea  class="form form-control" id="landmark" name="landmark" style="width:100%;" required></textarea>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-outline-danger" onclick="$('#loginGuest').modal('toggle'); $('#guestTab').modal('toggle');"> <i class="fa fa-arrow-left"></i> Back</a>
                    <button  class="btn btn-success" type="submit"> <i class="fa fa-send"></i> Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @else
        <div class="modal fade in" id="checkout"  tabindex="-1">
            <div class="modal-dialog" style="width: 500px;">
                <div class="modal-content" style="
    border-radius: 10px;
">
                    <div class="modal-header" style="background: #2d353c;color: white;height: 70px;border-radius: 10px;">
                        <h4 class="modal-title">Checkout</h4>
                        <p class="modal-description">You are about to checkout your orders</p>
                    </div>
                    <div class="modal-body">

                        <div class="row" style="padding: 0px 20px 0px 20px;max-height: 389px;overflow-y: auto;">
                            <br>
                            <center class="col-md-12">
                                <div class="product-price">
                                    <div class="price">₱ <span id="total">0.00</span></div>
                                </div>
                            </center>


                            <center>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <a id="COD" data-backdrop="static" data-keyboard="false" data-dismiss="modal" href="#cashOnDelivery" data-toggle="modal">
                                            <div  style="color: #6f6f6f;width: 100%;height: 175px;border: 1px gray solid;border-radius: 10px;">
                                            <i class="fa fa-money" style="font-size: 100px; padding-top:10%"></i>
                                            <br>
                                            <label style="padding: 5px; font-size: 12px;">Cash on Delivery</label>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#guestTab" data-toggle="modal" onclick="$('#loginGuest').modal('toggle')">
                                        <div  style="color: #6f6f6f;width: 100%;height: 175px;border: 1px gray solid;border-radius: 10px;">
                                            <i class="fa fa-paypal" style="font-size: 100px; padding-top:10%"></i>
                                            <br>
                                            <label style="padding: 5px; font-size: 12px;">Paypal</label>
                                        </div>
                                    </a>
                                </div>
                        </div>
                        </center>
                            <label style="padding-top:50px">Order Items</label>
                            <ul id="order-items"  class="product-info-list col-md-12">
                            </ul>

                    </div>


                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-outline-danger" data-dismiss="modal" data-toggle="modal">  Cancel</a>

                </div>
            </div>
        </div>
        </div>


        <div class="modal fade in" id="cashOnDelivery" tabindex="-1" >
            <div class="modal-dialog" style="width: 500px;">
                <div class="modal-content" style="
    border-radius: 10px;
">
                    <div class="modal-header" style="background: #2d353c;color: white;height: 70px;border-radius: 10px;">
                        <h4 class="modal-title">Cash on Delivery</h4>
                        <p class="modal-description">Please Confirm Your Transaction</p>
                    </div>
                    <div class="modal-body">

                        <div class="row" style="padding: 0px 20px 20px 20px;height: 450px;overflow-y: auto;">

                            <label style="margin-bottom: 15px;">We sent you a verification code in your email. Please check.</label>
                            <center><strong style="font-size: 30px;color: #2d353c;">{{$account["EMAIL"]}}</strong><br></center>
                            <center><small style="color: #2d353c;">if you want to proceed for checking out this order, you must verify your transaction by putting the verification code inside the verification code field and click the verify button.</small><br></center>
                            <div class="form-group col-md-12" style="margin-top:20px">
                                <span>Verification Code</span>
                                <input class="form form-control" name="verify" id="verify"  required/>
                            </div>
                            <div class="form-group col-md-12">
                                <span>Delivery Instruction </span>
                                <textarea  class="form form-control" id="note" name="note" style="width:100%;" required></textarea>
                            </div>

                        <label style="margin-top: 10px;">Delivery Information </label>
                        <ul  class="product-info-list col-md-12">
                            <li><strong>Delivery to: </strong> <br>{{$account['ADDRESS']}}</li>
                            <li><strong>Contact Information: </strong> <br>{{$account['EMAIL']}}/ {{$account['PHONE']}}</li>
                            <li><strong>Landmark: </strong> <br>{{$account['LANDMARK']}}</li>
                            {{--<li><strong>Landmark: </strong> <br>{{$account['LANDMARK']}}</li>--}}
                        </ul>
                    </div>


                </div>
                <div class="modal-footer">
                    <a  data-backdrop="static" data-keyboard="false" class="btn btn-outline-danger"  data-dismiss="modal" data-toggle="modal" href="#checkout">  Cancel</a>
                    <button id="btn_COD" class="btn btn-success" type="submit"> <i class="fa fa-send"></i> Submit</button>

                </div>
            </div>
        </div>
        </div>
    @endif



    <!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap3/js/bootstrap.min.js')}}"></script>
	<!--[if lt IE 9]>
		<script src="{{asset('assets/crossbrowserjs/html5shiv.js')}}"></script>
		<script src="{{asset('assets/crossbrowserjs/respond.min.js')}}"></script>
		<script src="{{asset('assets/crossbrowserjs/excanvas.min.js')}}"></script>
	<![endif]-->
	<script src="{{asset('assets/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('assets/js/e-commerce/apps.min.js')}}"></script>
    <script src="{{asset('assets/plugins/parsley/dist/parsley.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js')}}"></script>
    <script src="{{asset('assets/js/demo/form-wizards-validation.demo.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
	    $(document).ready(function() {
	        App.init();
            FormWizardValidation.init();
	    });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const moneyFormat = num => {
            const n = String(num),
                p = n.indexOf('.')
            return n.replace(
                /\d(?=(?:\d{3})+(?:\.|$))/g,
                (m, i) => p < 0 || i < p ? `${m},` : m
            )
        }


        $("#password").on('keyup', function (e) {
            if (e.keyCode == 13) {
                $('a[id=loginbtn]').trigger('click');

            }
        });
	</script>

    <script>
        $.getJSON('{{asset('forMapping/refprovince.json')}}', function(prov) {
            $.each(prov.RECORDS,function(id,item){
                $('#provSelect').append("<option value="+item.provCode+">"+item.provDesc+"</option>");
            });

            $('#provSelect').trigger('change');

        });

        $('#provSelect').on('change',function(){
            $prov = $(this);
            $.getJSON('{{asset('forMapping/refcitymun.json')}}', function(cities) {
                city =$.grep( cities.RECORDS, function( n, i ) {
                    return n.provCode==$prov.val();
                });
                $('#citySelect').html(" ");
                $.each(city,function(id,item){
                    $('#citySelect').append("<option value="+item.citymunCode+">"+item.citymunDesc+"</option>");
                });

            });
            $('#citySelect').trigger('change');
            setAddress();
        });

        $('#citySelect').on('change',function(){
            $city = $(this);
            $.getJSON('{{asset('forMapping/refbrgy.json')}}', function(brgys) {
                console.log($city.val());
                brgy =$.grep( brgys.RECORDS, function( n, i ) {
                    return n.citymunCode==$city.val();
                });
                $('#brgySelect').html(" ");
                $.each(brgy,function(id,item){
                    $('#brgySelect').append("<option value="+item.brgyCode+">"+item.brgyDesc+"</option>");
                });

            });
            $('#brgySelect').trigger('change');
            setAddress();
        });

        $('a[id=cartCheckout]').on('click',function(){
            $.ajax({
                url:"{{url('removeToCart')}}"
                ,type:"POST"
                ,data:{
                    _token:CSRF_TOKEN
                    ,id:-1
                }
                ,dataType:'json'
                ,success: function(data){
                    $("ul[id=order-items]").html(" ");
                    $("span[id=total]").text(data.total);
                    $.each(data.cart,function(id,val){
                        $("ul[id=order-items]").append("<li><span>"+val.pizza+"("+val.qty+") - ₱"+val.total.toFixed(2)+"</span></li>");
                    });

                },error: function(data){
                    console.log(data);
                }
            });

        });

        $('button[id=btn_COD]').on('click',function(){

            $('.modal-content').addClass('loader');
            $.ajax({
                url:"{{url('checkVerify')}}"
                ,type:"POST"
                ,data:{
                    _token:CSRF_TOKEN
                    ,note:$("textarea[id=note]").val()
                    ,verify: $("input[id=verify]").val()
                }
                ,dataType:'json'
                ,success: function(data){
                   if(data.success=="1"){
                       alert("Your order has been verified, please wait for your pizza to arrive");
                       $('.modal-content').removeClass('loader');
                   }else{
                       alert("Please confirm your verification code");
                       $("#verify").val("");
                       $('.modal-content').removeClass('loader');
                   }

                },error: function(data){
                    console.log(data);
                }
            });

        });

        $('a[id=remCartItem]').on('click',function(){
            $id = $(this).attr('val');
            $.ajax({
               url:"{{url('removeToCart')}}"
                ,type:"POST"
                ,data:{
                    _token:CSRF_TOKEN
                    ,id:$id
                }
                ,dataType:'json'
                ,success: function(data){
                   $("span[cart=total]").text(data.total);
                   $("span[cart=count]").text(data.count);
                    $("li[lival="+$id+"]").remove();

                },error: function(data){
                    console.log(data);
                }
            });
        });
        $('a[id=COD]').on('click',function(){
            $('.modal-content').addClass('loader');
            $.ajax({
               url:"{{url('verify')}}"
                ,type:"POST"
                ,data:{
                    _token:CSRF_TOKEN
                    ,note:$('input[id=note]').val()
                }
                ,dataType:'json'
                ,success: function(data){
                    $('.modal-content').removeClass('loader');
                },error: function(data){
                    console.log(data);
                }
            });
        });

        $("input[name='homeno']").on('keyup',function(){
            setAddress();
        });
        $("input[name='street']").on('keyup',function(){
            setAddress();
        });
        $("input[name='zipcode']").on('keyup',function(){
            setAddress();
        });
        $('#brgySelect').on('change',function(){
            setAddress();
        });
        function setAddress(){

            setTimeout(function(){
                $('#address').text($("input[name='homeno']").val()+", "
                    +$("input[name='street']").val()+", "
                    +$('#brgySelect option:selected').text()+", "
                    +$('#citySelect option:selected').text()+", "
                    +$('#provSelect option:selected').text()+", "
                    +$("input[name='zipcode']").val());
            },1000);
        }
        $('select').select2();
    </script>

    @yield('extrajs')
</body>
</html>
