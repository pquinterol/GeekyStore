@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-20">
            <div class="card">
                <div class="card-header">
                <h2>{!! trans('user.admin') !!}</h2></div>

                <div class="card-body">
                    <a href={{ route('user.list', 'name') }} class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('user.showUser') !!}</a>
                    <a href={{ route('product.create') }} class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('user.createProduct') !!}</a>
                    <a href={{ route('product.listAdmin', 'name') }} class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('user.listProduct') !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection