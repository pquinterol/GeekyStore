@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">

    <div class="row justify-content-center">

        @include('util.message')
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create item</div>

                <div class="card-body">

                    <form class="row g-3" method="POST" action="{{ route('item.save') }}">

                        @if (Session::has('message'))

                            <div class="col-12">
                                <p class="alert alert-success">{{Session::get('message')}}</p>
                            </div>
                    
                        @endif

                        @csrf
                        <div class="col-12">
                            <label for="EnterProduct" class="form-label">Enter Product</label>
                            <input type="text" class="form-control" name="product" id="EnterProduct" value="{{ old('product') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterQuantity" class="form-label">Enter Quantity</label>
                            <input type="text" class="form-control" name="quantity" id="EnterQuantity" value="{{ old('quantity') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterSubtotal" class="form-label">Enter Subtotal</label>
                            <input type="text" class="form-control" name="subtotal" id="EnterSubtotal" value="{{ old('subtotal') }}" required/>
                        </div>
                        <div class="col-6">
                            <input type="submit" value="Send" class="btn btn-success" />
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary" href="{{route('home.index')}}">Index</a>
                        </div>
                        
                    </form>

                    

                </div>

            </div>

        </div>

    </div>

</div>

@endsection