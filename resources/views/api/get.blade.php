@extends('layouts.app')

@section('content')

<div class="row p-5">

    <div class="col-md-12">
        @include('util.message')
        <ul id="errors">
            <div class="container">
                <h1>{!! trans('api.products') !!}</h1>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <td>{!! trans('api.id') !!}</td>
                            <td>{!! trans('api.name') !!}</td>
                            <td>{!! trans('api.price') !!}</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts->data as $post)
                        <tr>
                            <td>{{ $post->id}}</td>
                            <td>{{ $post->name}}</td>
                            <td>{{ $post->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
        </ul>

    </div>

</div>
@endsection