@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">
    <div class="col-md-12">
        <ul id="errors">
        @include('util.message')
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">View More</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    @foreach($data["items"] as $item)
                    <tbody>
                        <tr>
                        <td scope="row">{{ $item->getProduct() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        <td>{{ $item->getSubtotal() }}</td>
                        <td><a class="btn btn-success" href="{{route('item.show', $item->getId())}}">View</a></td>
                        <td>
                            <form action="{{route('item.delete', ['id' => $item->getId()])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete" />
                                <!--<input type="hidden" name="_method" value="delete" />-->
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </ul>
        <a class="btn btn-primary" href="{{route('home.index')}}">Index</a>
    </div>
</div>
@endsection