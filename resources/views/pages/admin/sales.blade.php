@extends('layouts.main')

@section('title','Sales')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Sales</a></li>
        <li class="breadcrumb-item active">List</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Sales <small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-2 -->

        <!-- end col-2 -->
        <!-- begin col-10 -->
        <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <div class="panel-heading-btn">

                         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">Sales</h4>
                </div>
                <!-- end panel-heading -->

                {{--<div class="panel-body bg-black text-white">...</div>--}}
                <!-- begin alert -->

                @if(session('success') || session('error') )
                    <div class="alert alert-{{(session('success')?'success':'danger')}} fade show">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{(session('success'))?session('success'):session('error')}}
                    </div>
            @endif
            <!-- end alert -->
                <!-- begin nav-tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-items">
                        <a href="#customers" data-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Customers</span>
                            <span class="d-sm-block d-none">Customers</span>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="#stocks" data-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Pizza</span>
                            <span class="d-sm-block d-none">Pizza</span>
                        </a>
                    </li>

                </ul>
                <!-- end nav-tabs -->
                <!-- begin tab-content -->
                <div class="tab-content">
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade active show" id="customers">
                        <h3 class="m-t-10"><i class="fa fa-users"></i> Sales on Customers Purchase</h3>
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <table id="data-table-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 30%">Customer Name</th>
                                    <th>Orders</th>
                                    <th>Discount</th>
                                    <th>Net Sales</th>
                                    <th>VAT Sales</th>
                                    <th>Delivery</th>
                                    <th>Gross Sales</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customer as $item)
                                    <tr>
                                        <td>{{$item->FROM_NAME}}</td>
                                        <td>{{$item->QUANTITY}}</td>
                                        <td>{{(number_format($item->DISCOUNT,2))}}</td>
                                        <td>{{(number_format($item->NET_SALES,2))}}</td>
                                        <td>{{(number_format($item->VAT_SALES,2))}}</td>
                                        <td>{{(number_format($item->DELIVERY,2))}}</td>
                                        <td>{{(number_format($item->GROSS_SALES,2))}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <th style="width: 30%">Total</th>
                                <th>{{collect($customer)->sum('QUANTITY')}}</th>
                                <th>{{(number_format($customer->sum('DISCOUNT'),2))}}</th>
                                <th>{{(number_format($customer->sum('NET_SALES'),2))}}</th>
                                <th>{{(number_format($customer->sum('VAT_SALES'),2))}}</th>
                                <th>{{(number_format($customer->sum('DELIVERY'),2))}}</th>
                                <th>{{(number_format($customer->sum('GROSS_SALES'),2))}}</th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- end panel-body -->
                    </div>
                    <!-- end tab-pane -->
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade" id="stocks">
                        <h3 class="m-t-10"><i class="fas fa-chart-line"></i> Sales on Purchases of Pizza</h3>
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <table id="data-table-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 30%">Stock Info</th>
                                    <th>Orders</th>
                                    <th>Discount</th>
                                    <th>Net Sales</th>
                                    <th>VAT Sales</th>
                                    <th>Delivery</th>
                                    <th>Gross Sales</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stock as $item)
                                    <tr>
                                        <td>
                                            <strong>{{$item->PROD_NAME}}</strong><br> <small>{{$item->SKU}}</small>
                                        </td>
                                        <td>{{$item->QUANTITY}}</td>
                                        <td>{{(number_format($item->DISCOUNT,2))}}</td>
                                        <td>{{(number_format($item->NET_SALES,2))}}</td>
                                        <td>{{(number_format($item->VAT_SALES,2))}}</td>
                                        <td>{{(number_format($item->DELIVERY,2))}}</td>
                                        <td>{{(number_format($item->GROSS_SALES,2))}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <th style="width: 30%">Total</th>
                                <th>{{collect($stock)->sum('QUANTITY')}}</th>
                                <th>{{(number_format($stock->sum('DISCOUNT'),2))}}</th>
                                <th>{{(number_format($stock->sum('NET_SALES'),2))}}</th>
                                <th>{{(number_format($stock->sum('VAT_SALES'),2))}}</th>
                                <th>{{(number_format($stock->sum('DELIVERY'),2))}}</th>
                                <th>{{(number_format($stock->sum('GROSS_SALES'),2))}}</th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- end panel-body -->
                    </div>
                    <!-- end tab-pane -->



            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->



@endsection

@section('extrajs')

    <script>

        $('table[id=data-table-buttons]').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            "aaSorting": [[3, "desc" ]]
            ,dom: 'lBfrtip'
            ,   buttons: [
                { extend: 'copy', className: 'btn-sm',footer:true},
                { extend: 'csv', className: 'btn-sm' ,footer:true},
                { extend: 'excel', className: 'btn-sm',footer:true},
                { extend: 'pdf', className: 'btn-sm',footer:true},
                { extend: 'print', className: 'btn-sm',footer:true},
            ],
        });



    </script>
@endsection
