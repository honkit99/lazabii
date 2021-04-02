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
                <h3>Product list</h3>
                <div>
                    <ul class="list-group">
                    @foreach ($products as $key=>$product )
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            {{ $product->name }} RM{{ $product->price }}
                        </div>
                      
                    </li>
                    @endforeach
                    </ul>
        <h3>Category list</h3>
                    <ul class="list-group">
                        @foreach ($categories as $category )
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                {{ $category->name }}
                                @if ($category->children)
                                <ul>
                                    @foreach ($category->children as $child )
                                    <li>
                                        <a href="{{ route('user.product.show',$child->id) }}">{{ $child->name }}</a>
                                    </li>
                                    @endforeach                                  
                                </ul>
                                    
                                @endif
                                
                            </div>
                        </li>
                        @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
