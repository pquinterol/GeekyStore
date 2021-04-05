@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">
        @include('util.message')
        <ul id="errors">
            <div class="row justify-content-center">
                <a href={{ route("cart.index") }} class="btn btn-primary btn-lg" role="button" aria-pressed="true">Buy Now</a>
                <a href={{ route("cart.removeAll") }} class="btn btn-danger btn-lg" role="button" aria-pressed="true">Empty Cart</a>
            </div>
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Category</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Description</th>
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
                        <td><a class="btn btn-success" href="{{ route('product.show', $product->getId()) }}">Details</a></td>
                        <td><a class="btn btn-success" href="{{ route('cart.add', $product->getId()) }}">Add to Cart</a></td>
                        <td><a class="btn btn-danger" href="{{ route('cart.remove', $product->getId()) }}">Remove</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

        </ul>

    </div>

</div>
@endsection