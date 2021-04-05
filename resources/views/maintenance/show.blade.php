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
            <b>User:</b> {{ $data->getUser() }}<br />
            <b>Status:</b> {{ $data->getStatus() }}<br />
            <b>Total Price(USD):</b> {{ $data->getPrice() }}<br />
            <b>Description:</b> {{ $data->getDescription() }}<br />
            <b>Date:</b> {{ $data->getDate() }}<br />
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
