@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ $data->getName()."-".$data->getManufacturer() }}</div>

                <div class="card-body">

                    <b>Product name:</b> {{ $data->getName() }}<br /><br />

                    <b>Product price:</b> {{ $data->getPrice() }}<br /><br />

                    <b>Product Discount:</b> {{ $data->getDiscount() }}<br /><br />

                    <b>Product Category:</b> {{ $data->getCategory() }}<br /><br />

                    <b>Product Manufacturer:</b> {{ $data->getManufacturer() }}<br /><br />

                    <b>Product Quantity:</b> {{ $data->getQuantity() }}<br /><br />

                    <b>Product Description:</b> {{ $data->getDescription() }}<br /><br />


                    <a href="{{ route('home.index')}}" class="btn btn-primary">Inicio</a>
                    <a href="{{ route('product.list', 'name')}}" class="btn btn-dark">Regresar</a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection