@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">
        @include('util.message')
        <ul id="errors">
            <div>
                <a href="discountOnly" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Discount Only</a>
            </div>
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col"><a href="name" role="button" aria-pressed="true">Name</a></th>
                        <th scope="col"><a href="price" role="button" aria-pressed="true">Price</a></th>
                        <th scope="col"><a href="discount" role="button" aria-pressed="true">Discount</a></th>
                        <th scope="col"><a href="category" role="button" aria-pressed="true">Category</a></th>
                        <th scope="col"><a href="manufacturer" role="button" aria-pressed="true">Manufacturer</a></th>
                        <th scope="col"><a href="quantity" role="button" aria-pressed="true">Quantity</a></th>
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
                        <td><a class="btn btn-success" href="{{ route('product.show', $product->getId()) }}">Show</a></td>
                        <td>
                            <form action="{{ route('product.delete', ['id' => $product->getId()])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete" />
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

        </ul>

    </div>

</div>
@endsection