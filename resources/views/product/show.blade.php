@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h2>{{ $data->getName()."-".$data->getManufacturer() }}</h2>
                </div>
                <div class="card-body">
                    <b>{!! trans('product.pId') !!}</b> {{ $data->getId() }}<br /><br />
                    <b>{!! trans('product.pName') !!}</b> {{ $data->getName() }}<br /><br />
                    <b>{!! trans('product.pPrice') !!}</b> {{ $data->getPrice() }}<br /><br />
                    <b>{!! trans('product.pDiscount') !!}</b> {{ $data->getDiscount() }}<br /><br />
                    <b>{!! trans('product.pCategory') !!}</b> {{ $data->getCategory() }}<br /><br />
                    <b>{!! trans('product.pManufacturer') !!}</b> {{ $data->getManufacturer() }}<br /><br />
                    <b>{!! trans('product.pQuantity') !!}</b> {{ $data->getQuantity() }}<br /><br />
                    <b>{!! trans('product.pDescription') !!}</b> {{ $data->getDescription() }}<br /><br />
                    <a href="{{ route('home.index')}}" class="btn btn-primary">{!! trans('changePages.home') !!}</a>
                    <a href="{{ route('product.list', $data->getName())}}" class="btn btn-dark">{!! trans('changePages.back') !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection