@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ $data["product"]->getName() }}</div>

                <div class="card-body">

                    <b>Product Id:</b> {{ $id = $data["product"]->getId() }}<br /><br />

                    <b>Product name:</b> {{ $data["product"]->getName() }}<br /><br />

                    <b>Product price:</b> {{ $data["product"]->getPrice() }}<br /><br />

                    <b>Product Discount:</b> {{ $data["product"]->getDiscount() }}<br /><br />

                    <b>Product Category:</b> {{ $data["product"]->getCategory() }}<br /><br />

                    <b>Product Manufacturer:</b> {{ $data["product"]->getManufacturer() }}<br /><br />

                    <b>Product Quantity:</b> {{ $data["product"]->getQuantity() }}<br /><br />

                    <b>Product Description:</b> {{ $data["product"]->getDescription() }}<br /><br />

                    <a href="{{ route('home.index')}}" class="btn btn-primary">Inicio</a>
                    <a class="btn btn-danger" href="{{route('product.delete', $id)}}">Delete</a>
                    <a href="{{ route('product.list')}}" class="btn btn-dark">Regresar</a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection