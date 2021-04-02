@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <a href="{{ route('user.cart.index') }}">Cart</a>
                </div>
                <br>
                @foreach ($filproducts as $fill)
                <span>{{ $fill->name }}</span>
                @foreach ($fill->product as $product)
                <br><br>
                --{{ $product->name }}<br>RM{{ $product->price }}<br> Description : {{ $product->description }}
                @endforeach
               
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
