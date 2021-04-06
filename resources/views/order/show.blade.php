@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h2>{{ $data->getId() }}</h2></div>
          <div class="card-body">
            <b>{!! trans('order.id') !!}:</b> {{ $data->getId() }}<br />
            <b>{!! trans('order.tprice') !!}:</b> {{ $data->getPrice() }}<br />
            <b>{!! trans('order.status') !!}</b> {{ $data->getStatus() }}<br />
            <b>{!! trans('order.date') !!}</b> {{ $data->getDate() }}<br />
          </div>
        </div>
        <div class="row justify-content-center">
          <a href="{{ route('home.index')}}" class="btn btn-primary">{!! trans('changePages.home') !!}</a>
          <a href="{{ route('order.list','price')}}" class="btn btn-dark">{!! trans('changePages.back') !!}</a>
        </div>
      </div>
    </div>
</div>
@endsection
