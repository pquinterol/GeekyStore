@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ $data["wishlist"]->getId() }}</h2></div>
                <div class="card-body">
                    <b>{!! trans('wishlist.id') !!}</b> {{ $id = $data["wishlist"]->getId() }}<br /><br />
                    <b>{!! trans('wishlist.product') !!}</b> {{ $data["wishlist"]->getProduct() }}<br /><br />
                    <b>{!! trans('wishlist.user') !!}</b> {{ $data["wishlist"]->getUser() }}<br /><br />
                    <a href="{{ route('home.index')}}" class="btn btn-primary">Inicio</a>
                    <a href="{{ route('wishlist.list')}}" class="btn btn-dark">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection