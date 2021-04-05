@extends('layouts.app')

@section("title", "User")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data->getFullName() }}</div>
                <div class="card-body">
                    <b>Type:</b> {{ $data->getType() }}<br /><br />
                    <b>Username:</b> {{ $data->getUsername() }}<br />
                    <b>Password:</b> {{ $data->getPassword() }}<br />   
                    <br>
                    <form method="POST" action="{{ route('user.delete') }}">
                        @csrf
                        <input type="text" style="display:none" name="id" value="{{ $data->getId() }}" />
                        <input type="submit" class="btn btn-danger btn-lg" value="Delete User" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
