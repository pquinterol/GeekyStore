@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header"><h2>{!! trans('maintenance.createMaintenance') !!}</h2></div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('maintenance.save') }}">
                    @csrf
                    <input type="hidden" placeholder="" name="user" value="{{ Auth::user()->getId() }}" />
                    <div class="col-12">
                    <label for="EnterPrice" class="form-label">{!! trans('maintenance.enterPrice') !!}</label>
                    <input type="text" class="form-control" name="price" id="EnterPrice" value="{{ old('price') }}" />
                    </div>
                    <div class="col-12">
                    <label for="EnterDescription" class="form-label">{!! trans('maintenance.enterDescription') !!}</label>
                    <input type="text" class="form-control" name="description" id="EnterDescription" value="{{ old('description') }}" />
                    <input class="btn btn-success btn-lg" type="submit" value="{!! trans('changePages.send') !!}" />
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection