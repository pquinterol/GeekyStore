@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-danger" href="{{ route('wishlist.removeAll', $data["wishlist"]->getUser()) }}">{!! trans('wishlist.removeAll') !!}</a>
            <div class="card">
                <div class="card-header"><h2>{{ $data["header"] }}</h2></div>
                <div class="card-body">
                    @include('util.message')
                    <b>{!! trans('wishlist.id') !!}</b> {{ $data["wishlist"]->getId() }}<br /><br />
                    <b>{!! trans('wishlist.user') !!}</b> {{ $data["wishlist"]->getUser() }}<br /><br />
                    @foreach ($data["wishlist"]["products"] as $product)
                        <div class="card">
                            <div class="card-header"><h4>{!! trans('wishlist.product') !!}</h4></div>
                            <div class="card-body" >
                                <b>{!! trans('product.pId') !!}</b> {{ $product->getId() }}<br /><br />
                                <b>{!! trans('product.pName') !!}</b> {{ $product->getName() }}<br /><br />
                                <b>{!! trans('product.pPrice') !!}</b> {{ $product->getPrice() }}<br /><br />
                                <b>{!! trans('product.pDiscount') !!}</b> {{ $product->getDiscount() }}<br /><br />
                                <b>{!! trans('product.pCategory') !!}</b> {{ $product->getCategory() }}<br /><br />
                                <b>{!! trans('product.pManufacturer') !!}</b> {{ $product->getManufacturer() }}<br /><br />
                                <b>{!! trans('product.pQuantity') !!}</b> {{ $product->getQuantity() }}<br /><br />
                                <b>{!! trans('product.pDescription') !!}</b> {{ $product->getDescription() }}<br /><br />
                                <a class="btn btn-danger" href="{{ route('wishlist.remove', ['userId' => $data["wishlist"]->getUser(), 'productId' => $product->getId()]) }}">{!! trans('wishlist.remove') !!}</a><br /><br />
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('home.index')}}" class="btn btn-primary">Inicio</a>
                    <a href="{{ route('wishlist.list')}}" class="btn btn-dark">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection