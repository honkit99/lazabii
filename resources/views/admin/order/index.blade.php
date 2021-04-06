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
                            <p class="mb-0">Furnitures</p>
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
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                    </tr>

                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->phone }}</td>
                        <td>{{ $order->delivery_company_name }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>{{ $order->total_payment_amount }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->transaction_id }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection