@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create product</div>
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ route('product.save') }}">
                        <div class="col-12">
                            <p class="alert alert-success">@include('util.message')</p>
                        </div>

                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ old('price') }}" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Discount" name="discount" value="{{ old('discount') }}" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Category" name="category" value="{{ old('category') }}" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" value="{{ old('quantity') }}" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Description" name="description" value="{{ old('description') }}" required/>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection