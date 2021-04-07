@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{!! trans('user.display') !!}</h2></div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="row p-5">
                    <div class="col-md-12">
                        <ul id="display-list">
                            @foreach($data["users"] as $user)
                                <li>
                                    <a href="{{ route('user.show', $user->getId()) }}"> ID: {{ $user->getId() }}</a>
                                    <p >{{ $user->getFullName() }} </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <a  class="btn btn-secondary btn-lg" href="{{route('admin.home.index')}}">{!! trans('changePages.back') !!}</a>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
