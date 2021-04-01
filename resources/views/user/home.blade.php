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
                </div>

                <div>
                    <ul class="list-group">
                    @foreach ($products as $key=>$product )
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            {{ $product->name }}
                        </div>
                    </li>
                    @endforeach
                    </ul>

                    <ul class="list-group">
                        @foreach ($categories as $key=>$category )
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                {{ $category->name }}
                                {{-- @foreach ($subcategories as $key=>$subcategory )
                                <ul>
                                    <li>
                                        {{ $subcategory->name }}{{ $subcategory->name }}
                                    </li>
                                </ul>
                                @endforeach --}}
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
