@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="row p-5">

    <div class="col-md-12">

        <ul id="errors">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Price (USD)</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
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
                        <td><a class="btn btn-success" href="show/{{ $maintenance->getId() }}">Show</a></td>
                        <td>
                            <form action="{{ route('maintenance.delete', ['id' => $maintenance->getId()])}}" method="post">
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