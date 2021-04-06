@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">
        @include('util.message')
        <ul id="errors">
            <div class="row justify-content-center">
                <a href={{ route("cart.index") }} class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('cart.buyNow') !!}</a>
                <a href={{ route("cart.removeAll") }} class="btn btn-danger btn-lg" role="button" aria-pressed="true">{!! trans('cart.empty') !!}</a>
            </div>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{!! trans('product.id') !!}</th>
                            <th scope="col">{!! trans('product.viewName') !!}</th>
                            <th scope="col">{!! trans('product.viewPrice') !!}</th>
                            <th scope="col">{!! trans('product.viewDiscount') !!}</th>
                            <th scope="col">{!! trans('product.viewCategory') !!}</th>
                            <th scope="col">{!! trans('product.viewManufacturer') !!}</th>
                            <th scope="col">{!! trans('product.viewQuantity') !!}</th>
                            <th scope="col">{!! trans('product.viewDescription') !!}</th>
                            </tr>
                    </thead>
                    @foreach($data["products"] as $product)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $product->getId() }}</th>
                        <td>{{ $product->getName() }}</td>
                        <td>{{ $product->getPrice() }}</td>
                        <td>{{ $product->getDiscount() }}</td>
                        <td>{{ $product->getCategory() }}</td>
                        <td>{{ $product->getManufacturer() }}</td>
                        <td>{{ $product->getQuantity() }}</td>
                        <td>{{ $product->getDescription() }}</td>
                        <td><a class="btn btn-success" href="{{ route('product.show', $product->getId()) }}">{!! trans('changePages.show') !!}</a></td>
                        <td><a class="btn btn-success" href="{{ route('cart.add', $product->getId()) }}">{!! trans('cart.add') !!}</a></td>
                        <td><a class="btn btn-danger" href="{{ route('cart.remove', $product->getId()) }}">{!! trans('cart.remove') !!}</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

        </ul>

    </div>

</div>
@endsection