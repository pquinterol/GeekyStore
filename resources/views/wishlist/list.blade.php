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
                        <th scope="col">{!! trans('wishlist.product') !!}</th>
                        <th scope="col">{!! trans('wishlist.user') !!}</th>
                    </thead>
                    @foreach($data["wishlist"] as $wishlist)
                    <tbody>
                        <tr>
                        <td scope="row">{{ $wishlist->getProducts() }}</td>
                        <td>{{ $wishlist->getUser() }}</td>
                        <td><a class="btn btn-success" href="{{route('wishlist.show', $wishlist->getId())}}">{!! trans('changePages.show') !!}</a></td>
                        <td>
                            <form action="{{route('wishlist.delete', ['id' => $wishlist->getId()])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="{!! trans('changePages.delete') !!}" />
                                <!--<input type="hidden" name="_method" value="delete" />-->
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </ul>
        <a class="btn btn-primary" href="{{route('home.index')}}">{!! trans('changePages.home') !!}</a>
    </div>
</div>
@endsection