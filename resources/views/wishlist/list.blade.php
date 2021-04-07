@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">
    <div class="col-md-12">
        <ul id="errors">
            <h1>{!! trans('wishlist.list') !!}</h1>
        @include('util.message')
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">{!! trans('wishlist.id') !!}</th>
                        <th scope="col">{!! trans('wishlist.user') !!}</th>
                    </thead>
                    @foreach($data["wishlists"] as $wishlist)
                    <tbody>
                        <tr>
                        <td scope="row">{{ $wishlist->getId() }}</td>
                        <td>{{ $wishlist->getUser() }}</td>
                        <td><a class="btn btn-success" href="{{ route('wishlist.show', $wishlist->getUser()) }}">{!! trans('changePages.show') !!}</a></td>
                        <td><a class="btn btn-danger" href="{{ route('wishlist.removeAll', $wishlist->getUser())}}">{!! trans('wishlist.removeAll') !!}</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </ul>
        <a class="btn btn-primary" href="{{route('home.index')}}">{!! trans('changePages.home') !!}</a>
    </div>
</div>
@endsection