@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $data->getId() }}</div>
          <div class="card-body">
            <b>ID:</b> {{ $data->getId() }}<br />
            <b>Total Price(USD):</b> {{ $data->getPrice() }}<br />
            <b>Status:</b> {{ $data->getStatus() }}<br />
            <b>Date:</b> {{ $data->getDate() }}<br />
          </div>
        </div>
        <div class="row justify-content-center">
          <a href="{{ route('home.index')}}" class="btn btn-primary">Home</a>
          <a href="{{ route('order.list','price')}}" class="btn btn-dark">Return</a>
        </div>
      </div>
    </div>
</div>
@endsection
