@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">

        <ul id="errors">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">{!! trans('maintenance.id') !!}</th>
                        <th scope="col">{!! trans('maintenance.status') !!}</th>
                        <th scope="col">{!! trans('maintenance.price') !!}</th>
                        <th scope="col">{!! trans('maintenance.description') !!}</th>
                        <th scope="col">{!! trans('maintenance.date') !!}</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach($data["maintenances"] as $maintenance)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $maintenance->getId() }}</th>
                        <td>{{ $maintenance->getStatus() }}</td>
                        <td>{{ $maintenance->getPrice() }}</td>
                        <td>{{ $maintenance->getDescription() }}</td>
                        <td>{{ $maintenance->getDate() }}</td>
                        <td><a class="btn btn-success" href="{{ route('maintenance.show' , $maintenance->getId())}}">{!! trans('changePages.show') !!}</a></td>
                        <td>
                            <form action="{{ route('maintenance.delete', ['id' => $maintenance->getId()])}}" method="post">
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