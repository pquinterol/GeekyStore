@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $data->getId() }}</div>
          <div class="card-body">
            <b>{!! trans('maintenance.id') !!}</b> {{ $data->getId() }}<br />
            <b>{!! trans('maintenance.user') !!}</b> {{ $data->getUser() }}<br />
            <b>{!! trans('maintenance.status') !!}</b> {{ $data->getStatus() }}<br />
            <b>{!! trans('maintenance.totalPrice') !!}</b> {{ $data->getPrice() }}<br />
            <b>{!! trans('maintenance.description') !!}</b> {{ $data->getDescription() }}<br />
            <b>{!! trans('maintenance.date') !!}</b> {{ $data->getDate() }}<br />
          </div>
        </div>
        <div class="row justify-content-center">
          <a href="{{ route('home.index')}}" class="btn btn-primary">{!! trans('changePages.home') !!}</a>
          <a href="{{ route('maintenance.list')}}" class="btn btn-dark">{!! trans('changePages.back') !!}</a>
        </div>
      </div>
    </div>
</div>
@endsection
