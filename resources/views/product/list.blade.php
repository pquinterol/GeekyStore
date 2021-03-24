@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">

        <ul id="errors">
            
        @if (Session::has('message'))

            <p class="alert alert-danger">{{Session::get('message')}}</p>

        @endif
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">View More</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    @foreach($data["products"] as $product)
                    <tbody>
                        <tr>
                        <td scope="row">{{ $product->getName() }}</td>
                        <td>{{ $product->getPrice() }}</td>
                        <td>{{ $product->getCategory() }}</td>
                        <td>{{ $product->getManufacturer() }}</td>
                        <td>{{ $product->getQuantity() }}</td>
                        <td><a class="btn btn-success" href="{{route('product.show', $product->getId())}}">View</a></td>
                        <td><a class="btn btn-danger" href="{{route('product.delete', $product->getId())}}">Delete</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

        </ul>

        <a class="btn btn-primary" href="{{route('home.index')}}">Index</a>

    </div>

</div>
@endsection