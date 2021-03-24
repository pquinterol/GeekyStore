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

                    @if($errors->any())
                    <ul id="errors">

                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                    @endif

                    <form method="POST" action="{{ route('product.save') }}">

                        @csrf
                        <input type="text" placeholder="Enter Name" name="name" value="{{ old('name') }}" required/>
                        <input type="text" placeholder="Enter Price" name="price" value="{{ old('price') }}" required/>
                        <input type="text" placeholder="Enter Discount" name="discount" value="{{ old('discount') }}" required/>
                        <input type="text" placeholder="Enter Category" name="category" value="{{ old('category') }}" required/>
                        <input type="text" placeholder="Enter Manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required/>
                        <input type="text" placeholder="Enter Quantity" name="quantity" value="{{ old('quantity') }}" required/>
                        <input type="text" placeholder="Enter Description" name="description" value="{{ old('description') }}" required/>
                        
                        <input type="submit" value="Send" />

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection