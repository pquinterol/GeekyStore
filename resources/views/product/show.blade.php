@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>{{ $data["product"]->getName() }}</h1>
                </div>
                <div class="card-body">
                    <b>{!! trans('product.pId') !!}</b> {{ $id = $data["product"]->getId() }}<br /><br />
                    <b>{!! trans('product.pName') !!}</b> {{ $name = $data["product"]->getName() }}<br /><br />
                    <b>{!! trans('product.pPrice') !!}</b> {{ $data["product"]->getPrice() }}<br /><br />
                    <b>{!! trans('product.pDiscount') !!}</b> {{ $data["product"]->getDiscount() }}<br /><br />
                    <b>{!! trans('product.pCategory') !!}</b> {{ $data["product"]->getCategory() }}<br /><br />
                    <b>{!! trans('product.pManufacturer') !!}</b> {{ $data["product"]->getManufacturer() }}<br /><br />
                    <b>{!! trans('product.pQuantity') !!}</b> {{ $data["product"]->getQuantity() }}<br /><br />
                    <b>{!! trans('product.pDescription') !!}</b> {{ $data["product"]->getDescription() }}<br /><br />
                    <a href="{{ route('home.index')}}" class="btn btn-primary">{!! trans('product.home') !!}</a>
                    <!-- 
                        <a href="{{ route('product.list', '$name = $data["product"]->getName()')}}" class="btn btn-dark">Regresar</a>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection