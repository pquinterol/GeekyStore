@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">
    <div class="col-md-12">
        @include('util.message')
        <ul id="errors">
            <div>
                <h1>{!! trans('product.list') !!}</h1>
                
                <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                <a href="discountOnly" class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('product.onlyDis') !!}</a>
                    <form class="d-flex" action="{{route('product.search')}}" method="GET" >
                    <input class="form-control me-2" name="name" type="search" placeholder="{!! trans('changePages.searchName') !!}" aria-label="Search" value="" required>
                    <button class="btn btn-outline-primary" type="submit">{!! trans('changePages.search') !!}</button>
                    </form>
                </div>
                </nav>
            </div>
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">{!! trans('product.id') !!}</th>
                        <th scope="col"><a href="name" role="button" aria-pressed="true">{!! trans('product.viewName') !!}</a></th>
                        <th scope="col"><a href="price" role="button" aria-pressed="true">{!! trans('product.viewPrice') !!}</a></th>
                        <th scope="col"><a href="discount" role="button" aria-pressed="true">{!! trans('product.viewDiscount') !!}</a></th>
                        <th scope="col"><a href="category" role="button" aria-pressed="true">{!! trans('product.viewCategory') !!}</a></th>
                        <th scope="col"><a href="manufacturer" role="button" aria-pressed="true">{!! trans('product.viewManufacturer') !!}</a></th>
                        <th scope="col"><a href="quantity" role="button" aria-pressed="true">{!! trans('product.viewQuantity') !!}</a></th>
                        <th scope="col">{!! trans('product.viewDescription') !!}</th>
                        </tr>
                    </thead>
                    @foreach($data["products"] as $product)
                    <tbody>
                        <tr>
                        <td scope="row">{{ $product->getId() }}</td>
                        <td>{{ $product->getName() }}</td>
                        <td>{{ $product->getPrice() }}</td>
                        <td>{{ $product->getDiscount() }}</td>
                        <td>{{ $product->getCategory() }}</td>
                        <td>{{ $product->getManufacturer() }}</td>
                        <td>{{ $product->getQuantity() }}</td>
                        <td>{{ $product->getDescription() }}</td>
                        <td><a class="btn btn-success" href="{{ route('product.show' , $product->getId()) }}">{!! trans('changePages.show') !!}</a></td>
                        <td><a class="btn btn-success" href="{{ route('cart.add', $product->getId()) }}">{!! trans('cart.add') !!}</a></td>
                        @if (Auth::check())
                            <td><form method="POST" action="{{ route('wishlist.save')}}">
                                @csrf
                                <input type="hidden" name="product" value="{{ $product->getId() }}">
                                <input type="hidden" name="user" value="{{ Auth::user()->getId() }}">
                                <input class="btn btn-success" type="submit" value="{!! trans('changePages.wishlist') !!}" /> 
                            </form></td>
                        @endif
                        
                        <td>
                            <form action="{{ route('product.delete', ['id' => $product->getId()])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="{!! trans('changePages.delete') !!}" />
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <a class="btn btn-primary" href="{{route('home.index')}}">{!! trans('changePages.home') !!}</a>
        </ul>
        
    </div>
</div>
@endsection