@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header"><h2>{!! trans('order.createOrder') !!}</h2></div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('order.save') }}">
                    @csrf
                    <input type="hidden" placeholder="" name="user" value="{{ Auth::user()->getId() }}" />
                    <input type="text" placeholder="{!! trans('order.totalPrice') !!}" name="price" value="{{ old('price') }}" />
                    <input type="submit" value="{!! trans('order.send') !!}" />
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection