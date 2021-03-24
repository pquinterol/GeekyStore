@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">

    <div class="row justify-content-center">

        @include('util.message')
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create product</div>

                <div class="card-body">

                    <form class="row g-3" method="POST" action="{{ route('product.save') }}">

                        @if (Session::has('message'))

                            <div class="col-12">
                                <p class="alert alert-success">{{Session::get('message')}}</p>
                            </div>
                    
                        @endif

                        @csrf
                        <div class="col-12">
                            <label for="EnterName" class="form-label">Enter Name</label>
                            <input type="text" class="form-control" name="name" id="EnterName" value="{{ old('name') }}" required/>
                        </div>
                        <div class="col-md-6">
                            <label for="EnterPrice" class="form-label">Enter Price</label>
                            <input type="text" class="form-control" name="price" id="EnterPrice" value="{{ old('price') }}" required/>
                        </div>
                        <div class="col-md-6">
                            <label for="EnterDiscount" class="form-label">Enter Discount</label>
                            <input type="text" class="form-control" name="discount" id="EnterDiscount" value="{{ old('discount') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterCategory" class="form-label">Enter Category</label>
                            <input type="text" class="form-control" name="category" id="EnterCategory" value="{{ old('category') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterManuf" class="form-label">Enter Manufacturer</label>
                            <input type="text" class="form-control" name="manufacturer" id="EnterManuf" value="{{ old('manufacturer') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterQuanti" class="form-label">Enter Quantity</label>
                            <input type="text" class="form-control" name="quantity" id="EnterQuanti" value="{{ old('quantity') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterDesc" class="form-label">Enter Description</label>
                            <input type="text" class="form-control" name="description" id="EnterDesc" value="{{ old('description') }}" required/>
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