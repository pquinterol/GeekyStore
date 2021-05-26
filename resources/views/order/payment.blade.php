@extends('layouts.app')

@section("title", "Payment")

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h2>{{ "Payment" }}</h2></div>
          <div class="card-body">
            @if ($data != null)
              <b>{!! "ID" !!}:</b> {{ $data['result']['id'] }}<br />
              <b>{!! "State" !!}:</b> {{ $data['result']['state'] }}<br />
              <b>{!! "Payer Name" !!}</b> {{ $data['result']['payer']->getFirstName() }}<br />
              <b>{!! "Payer Last Name" !!}</b> {{ $data['result']['payer']->getLastName() }}<br />
              <b>{!! "Payer Email" !!}</b> {{ $data['result']['payer']->getEmail() }}<br />
              <b>{!! "Country Code" !!}</b> {{ $data['result']['payer']->getCountryCode() }}<br />
              <b>{!! "Total Amount" !!}</b> {{ $data['result']['transaction']->getTotal() }}<br />
              <b>{!! "Currency" !!}</b> {{ $data['result']['transaction']->getCurrency() }}<br />
            @endif
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
