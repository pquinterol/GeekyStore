@extends('layouts.app')

@section("title", "User")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ $data->getFullName() }}</h2></div>
                <div class="card-body">
                    <b>{!! trans('user.type') !!}</b> {{ $data->getType() }}<br /><br />
                    <b>{!! trans('user.username') !!}</b> {{ $data->getUsername() }}<br />
                    <b>{!! trans('user.password') !!}</b> {{ $data->getPassword() }}<br />   
                    <br>
                    <form method="POST" action="{{ route('user.delete') }}">
                        @csrf
                        @method('DELETE')
                        <input type="text" style="display:none" name="id" value="{{ $data->getId() }}" />
                        <a  class="btn btn-secondary btn-lg" href="{{route('user.display')}}">{!! trans('changePages.back') !!}</a>
                        <input type="submit" class="btn btn-danger btn-lg" value="{!! trans('changePages.delete') !!}" />
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
