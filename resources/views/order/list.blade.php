@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">
        @include('util.message')
        <ul id="errors">
            <h1>{!! trans('order.list') !!}</h1>
            <div>
            <a href="{{ route('order.inProcess')}}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">{!! trans('order.orderProcess') !!}</a>
            </div>
            <table class="table" id="table">
                    <thead>
                        <tr>
                        <th scope="col">{!! trans('order.id') !!}</th>
                        <th scope="col">{!! trans('order.status') !!}</th>
                        <th scope="col"><a href="{{ route('order.list','price') }}" role="button" aria-pressed="true">{!! trans('order.price') !!}</a></th>
                        <th scope="col"><a href="{{ route('order.list','created_at') }}" role="button" aria-pressed="true">{!! trans('order.date') !!}</a></th>
                        </tr>
                    </thead>
                    @foreach($data["orders"] as $order)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $order->getId() }}</th>
                        <td>{{ $order->getStatus() }}</td>
                        <td>{{ $order->getPrice() }}</td>
                        <td>{{ $order->getDate() }}</td>
                        <td><a class="btn btn-success" href="{{  route('order.show', $order->getId())}}">{!! trans('changePages.show') !!}</a></td>
                        <td>
                            <form action="{{ route('order.delete', ['id' => $order->getId()])}}" method="post">
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
                <a class="btn btn-danger" href="{{route('order.download')}}">{!! trans('changePages.download') !!}</a>
                <button class="btn btn-success" onclick="descargarExcel()">{!! trans('changePages.downloadE') !!}</button>
        </ul>

    </div>

    <script>
        function descargarExcel(){
        var tmpElemento = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('table');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html ;
        tmpElemento.download = 'Orders.xls';

        tmpElemento.click();
        }
        
    </script>

</div>
@endsection