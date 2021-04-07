@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ $data["items"]->getId() }}</h2></div>
                <div class="card-body">
                    <b>{!! trans('item.id') !!}</b> {{ $id = $data["items"]->getId() }}<br /><br />
                    <b>{!! trans('item.product') !!}</b> {{ $data["items"]->getProduct() }}<br /><br />
                    <b>{!! trans('item.quantity') !!}</b> {{ $data["items"]->getQuantity() }}<br /><br />
                    <b>{!! trans('item.subtotal') !!}</b> {{ $data["items"]->getSubtotal() }}<br /><br />
                    <a href="{{ route('home.index')}}" class="btn btn-primary">Inicio</a>
                    <a href="{{ route('item.list')}}" class="btn btn-dark">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection