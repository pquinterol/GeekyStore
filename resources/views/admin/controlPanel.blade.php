@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-20">
            <div class="card">
                <div class="card-header">
                <h2>{!! trans('user.admin') !!}</h2></div>

                <div class="card-body">
                    <a href="../user/display" class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('user.showUser') !!}</a>
                    <a href="../product/create" class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('user.createProduct') !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection