@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create item</div>
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ route('item.save') }}">
                        <div class="col-12">
                            @include('util.message')
                        </div>

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
                        <div class="col-12">
                            <label for="EnterOrderId" class="form-label">Enter Order Id</label>
                            <input type="text" class="form-control" name="order" id="EnterOrderId" value="{{ old('subtotal') }}" required/>
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