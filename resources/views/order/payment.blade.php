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
              <b>{!! trans('payment.id') !!}:</b> {{ $data['result']['id'] }}<br />
              <b>{!! trans('payment.state') !!}:</b> {{ $data['result']['state'] }}<br />
              <b>{!! trans('payment.payerName') !!}</b> {{ $data['result']['payer']->getFirstName() }}<br />
              <b>{!! trans('payment.payerLastName') !!}</b> {{ $data['result']['payer']->getLastName() }}<br />
              <b>{!! trans('payment.payerEmail') !!}</b> {{ $data['result']['payer']->getEmail() }}<br />
              <b>{!! trans('payment.countryCode') !!}</b> {{ $data['result']['payer']->getCountryCode() }}<br />
              <b>{!! trans('payment.totalAmount') !!}</b> {{ $data['result']['transaction']->getTotal() }}<br />
              <b>{!! trans('payment.currency') !!}</b> {{ $data['result']['transaction']->getCurrency() }}<br />
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
