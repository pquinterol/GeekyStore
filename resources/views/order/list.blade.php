@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">
        @include('util.message')
        <ul id="errors">
            <div>
            <a href="{{ route('order.inProcess')}}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Orders In Process</a>
            </div>
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Status</th>
                        <th scope="col"><a href="{{ route('order.list','price') }}" role="button" aria-pressed="true">Price</a></th>
                        <th scope="col"><a href="{{ route('order.list','created_at') }}" role="button" aria-pressed="true">Date</a></th>
                        </tr>
                    </thead>
                    @foreach($data["orders"] as $order)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $order->getId() }}</th>
                        <td>{{ $order->getStatus() }}</td>
                        <td>{{ $order->getPrice() }}</td>
                        <td>{{ $order->getDate() }}</td>
                        <td><a class="btn btn-success" href="{{  route('order.show', $order->getId())}}">Show</a></td>
                        <td>
                            <form action="{{ route('order.delete', ['id' => $order->getId()])}}" method="post">
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

    </div>

</div>
@endsection