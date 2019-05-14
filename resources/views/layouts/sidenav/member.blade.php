<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        {{Auth::user()->name}}
                        <small>Affiliates Profile</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                    <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>

            <li class="{{Request::is('dashboard')?'active':''}}">
                <a href="{{url('dashboard')}}">
                    <i class="fa fa-th"></i>
                    <span>Dashboard </span>
                </a>
            </li>
            <li class="has-sub {{(Route::is('prodList')||Route::is('prodCat'))?'active':''}}">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-shopping-cart"></i>
                    <span>Products</span>
                    @php
                        $prod = \App\r_product_info::all()->where('PROD_DISPLAY_STATUS',1);
                    @endphp
                    <span class="label m-l-5 label-success" data-toggle="tooltip" title="Approved">{{$prod->where('PROD_IS_APPROVED','1')->count()}}</span>
                    <span class="label m-l-5 label-warning" data-toggle="tooltip" title="Pending">{{$prod->where('PROD_APPROVED_AT','')->count()}}</span>
                    <span class="label m-l-5 label-danger" data-toggle="tooltip" title="Rejected">{{$prod->where('PROD_IS_APPROVED','0')->count()}}</span>
                </a>
                <ul class="sub-menu">
                    <li class="{{Route::is('prodList')?'active':''}}"><a href="{{url('product/list')}}">Product List</a></li>
{{--                    <li class="{{Route::is('prodCat')?'active':''}}"><a href="{{url('product/category')}}">Product Category</a></li>--}}

                </ul>
            </li>
            <li class="has-sub {{(Request::is('inventory-remaining')||Request::is('inventory-manage')||Route::is('sku'))?'active':'' }}">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-chart-pie"></i>
                    <span>Inventory</span>
                </a>
                <ul class="sub-menu">
                    <li class="{{Request::is('inventory-remaining')||Route::is('sku')?'active':''}}"><a href="{{url('inventory-remaining')}}">Remaining Inventory</a></li>
                    {{--                    <li class="{{Request::is('inventory-manage')?'active':''}}"><a href="{{url('inventory-manage')}}">Manage Inventory</a></li>--}}
                </ul>
            </li>

            {{--<li class="has-sub {{(Request::is('order-cancel')||Request::is('order-pending')||Request::is('order-complete')||Request::is('order-refund') ||Request::is('order-void'))?'active':'' }}">--}}
            {{--<a href="javascript:;">--}}
            {{--<b class="caret"></b>--}}
            {{--<i class="fa fa-truck"></i>--}}
            {{--<span>Orders</span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li class="{{Request::is('order-pending')?'active':''}}"><a href="{{url('order-pending')}}">Pending</a></li>--}}
            {{--<li class="{{Request::is('order-complete')?'active':''}}"><a href="{{url('order-complete')}}">Completed</a></li>--}}
            {{--<li class="{{Request::is('order-cancel')?'active':''}}"><a href="{{url('order-cancel')}}">Cancellation Requests</a></li>--}}
            {{--<li class="{{Request::is('order-refund')?'active':''}}"><a href="{{url('order-refund')}}">Refund Requests</a></li>--}}
            {{--<li class="{{Request::is('order-void')?'active':''}}"><a href="{{url('order-void')}}">Void Orders</a></li>--}}
            {{--</ul>--}}
            {{--</li> --}}


            <li class="{{Request::is('orders')?'active':''}}">
                <a href="{{url('orders')}}">
                    <i class="fa fa-truck"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="{{Request::is('sales')?'active':''}}">
                <a href="{{url('sales')}}">
                    <i class="fa fa-money-bill-alt"></i>
                    <span>Sales</span>
                </a>
            </li>

            {{--<li class="has-sub {{Request::is('sales'))?'active':'' }}">--}}
            {{--<a href="javascript:;">--}}
            {{--<b class="caret"></b>--}}
            {{--<i class="fa fa-money-bill-alt"></i>--}}
            {{--<span>Sales</span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li class="{{Request::is('sales')?'active':''}}"><a href="{{url('sales')}}">Sales</a></li>--}}
            {{--<li class="{{Request::is('sales-markup')?'active':''}}"><a href="{{url('sales-markup')}}">Markup Sales</a></li>--}}
            {{--<li class="{{Request::is('sales-vat')?'active':''}}"><a href="{{url('sales-vat')}}">VAT Sales</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}


            {{--<li class="has-sub {{(Route::is('users')||Route::is('affiliates'))?'active':''}}">--}}
                {{--<a href="javascript:;">--}}
                    {{--<b class="caret"></b>--}}
                    {{--<i class="fa fa-users"></i>--}}
                    {{--<span>Users</span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="{{Route::is('affiliates')?'active':''}}"><a href="{{url('affiliates')}}">Affiliate's List</a></li>--}}
                    {{--<li class="{{Route::is('users')?'active':''}}"><a href="{{url('users')}}">User's List</a></li>--}}

                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="has-sub {{(Route::is('tax')||Route::is('currency'))?'active':''}}">--}}
                {{--<a href="javascript:;">--}}
                    {{--<b class="caret"></b>--}}
                    {{--<i class="fa fa-cogs"></i>--}}
                    {{--<span>Configurations</span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="{{Route::is('tax')?'active':''}}"><a href="{{url('tax')}}">Tax & Fees</a></li>--}}
                    {{--<li class="{{Route::is('currency')?'active':''}}"><a href="{{url('currency')}}">Currencies</a></li>--}}
                    {{--<li class="{{Route::is('compliance')?'active':''}}"><a href="{{url('compliance')}}">Compliance</a></li>--}}

                {{--</ul>--}}
            {{--</li>--}}


            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>




