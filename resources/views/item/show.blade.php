@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["items"]->getId() }}</div>
                <div class="card-body">
                    <b>item Id:</b> {{ $id = $data["items"]->getId() }}<br /><br />
                    <b>item product:</b> {{ $data["items"]->getProduct() }}<br /><br />
                    <b>item quantity:</b> {{ $data["items"]->getQuantity() }}<br /><br />
                    <b>item subtotal:</b> {{ $data["items"]->getSubtotal() }}<br /><br />
                    <a href="{{ route('home.index')}}" class="btn btn-primary">Inicio</a>
                    <a href="{{ route('item.list')}}" class="btn btn-dark">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection