@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">

        <ul id="errors">
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
                        <td><a class="btn btn-success" href="show/{{ $product->getId() }}">Ver</a></td>
                        <td><a class="btn btn-danger" href="">Borrar</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

        </ul>

    </div>

</div>
@endsection