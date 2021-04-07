@extends('admin.layouts.menu')

@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<!-- Add Project -->
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Order List</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                        </ol>
                    </div>
                </div>

                <table class="table table-dark table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Delivery Company</th>
                        <th>Delivery Status</th>
                        <th>Payment Amount</th>
                        <th>Payment Status</th>
                        <th>Address</th>
                        <th>Transaction ID</th>
                        <th>Tools</th>
                    </tr>

                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $x = $x + 1 }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->delivery_company_name }}</td>
                        <td>
                            <span class="badge {{ 
                                ($order->delivery_status == 0) ? 'bg-success' : 
                                (($order->delivery_status == 1) ? 'bg-warning' : 
                                'bg-danger') 
                            }}"> 
                                {{ $order->delivery_status_name }} 
                            </span>
                        </td>
                        <td>{{ $order->total_payment_amount }}</td>
                        <td>
                            <span class="badge {{ 
                                ($order->payment_status == 0) ? 'bg-success' : 
                                (($order->payment_status == 1) ? 'bg-warning' : 
                                'bg-danger') 
                            }}"> 
                                {{ $order->payment_status_name }} 
                            </span>
                        </td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->transaction_id }}</td>
                        <td>
                            <a href="{{route('admin.order.edit', $order->id)}}" style="float:left;"><i class="bi bi-vector-pen"></i></a>

                            <form action="{{route('admin.order.destroy', $order->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                
                                <a href="#" onclick="$(this).parent().submit();" style="float:left; margin-left: 10px;">
                                <i class="bi bi-x-square"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection