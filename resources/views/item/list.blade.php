@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">
    <div class="col-md-12">
        <ul id="errors">
            <h1>{!! trans('item.list') !!}</h1>
        @include('util.message')
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">{!! trans('item.product') !!}</th>
                        <th scope="col">{!! trans('item.quantity') !!}</th>
                        <th scope="col">{!! trans('item.subtotal') !!}</th>
                        </tr>
                    </thead>
                    @foreach($data["items"] as $item)
                    <tbody>
                        <tr>
                        <td scope="row">{{ $item->getProduct() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        <td>{{ $item->getSubtotal() }}</td>
                        <td><a class="btn btn-success" href="{{route('item.show', $item->getId())}}">{!! trans('changePages.show') !!}</a></td>
                        <td>
                            <form action="{{route('item.delete', ['id' => $item->getId()])}}" method="post">
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