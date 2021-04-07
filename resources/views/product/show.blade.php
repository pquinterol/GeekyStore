@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                <h2>{{ $data->getName()."-".$data->getManufacturer() }}</h2>
                </div>
                @include('util.message')
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-5 align-self-start">
                            <b>{!! trans('product.pId') !!}</b> {{ $data->getId() }}<br /><br />
                            <b>{!! trans('product.pName') !!}</b> {{ $data->getName() }}<br /><br />
                            <b>{!! trans('product.pPrice') !!}</b> {{ $data->getPrice() }}<br /><br />
                            <b>{!! trans('product.pDiscount') !!}</b> {{ $data->getDiscount() }}<br /><br />
                            <b>{!! trans('product.pCategory') !!}</b> {{ $data->getCategory() }}<br /><br />
                            <b>{!! trans('product.pManufacturer') !!}</b> {{ $data->getManufacturer() }}<br /><br />
                            <b>{!! trans('product.pQuantity') !!}</b> {{ $data->getQuantity() }}<br /><br />
                            <b>{!! trans('product.pDescription') !!}</b> {{ $data->getDescription() }}<br /><br />
                        </div>
                        <div class="col-md-5 align-self-center">
                            <b><h4>{!! trans('product.pRatings') !!}</h4></b> {{ $data->getRating() }}<br /><br />
                            <b><h4>{!! trans('product.pRates') !!}</h4></b> {{ $data->getRates() }}<br /><br />
                            <b><h3>{!! trans('product.pRate') !!}</h3></b>
                            <div class="row justify-content-start">
                                <a href="{{ route('product.rate', ['productId' => $data->getId(), 'rating' => '1']) }}" class="btn btn-default">
                                    1
                                    <img class="img-fluid" src="{{ asset('/img/star.svg') }}" alt="" />
                                </a>
                                <a href="{{ route('product.rate', ['productId' => $data->getId(), 'rating' => '2']) }}" class="btn btn-default">
                                    2
                                    <img class="img-fluid" src="{{ asset('/img/star.svg') }}" alt="" />
                                </a>
                                <a href="{{ route('product.rate', ['productId' => $data->getId(), 'rating' => '3']) }}" class="btn btn-default">
                                    3
                                    <img class="img-fluid" src="{{ asset('/img/star.svg') }}" alt="" />
                                </a>
                                <a href="{{ route('product.rate', ['productId' => $data->getId(), 'rating' => '4']) }}" class="btn btn-default">
                                    4
                                    <img class="img-fluid" src="{{ asset('/img/star.svg') }}" alt="" />
                                </a>
                                <a href="{{ route('product.rate', ['productId' => $data->getId(), 'rating' => '5']) }}" class="btn btn-default">
                                    5
                                    <img class="img-fluid" src="{{ asset('/img/star.svg') }}" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <a href="{{ route('home.index')}}" class="btn btn-primary">{!! trans('changePages.home') !!}</a>
                        <a href="{{ route('product.list', 'name')}}" class="btn btn-dark">{!! trans('changePages.back') !!}</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection