@extends('layouts.master')

@section("title", "User")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["fullName"] }}</div>
                <div class="card-body">
                    <b>Type:</b> {{ $data["type"] }}<br /><br />
                    <b>Username:</b> {{ $data["username"]}}<br />
                    <b>Password:</b> {{ $data["password"]}}<br />   
                    <br>
                    <form method="POST" action="{{ route('user.delete') }}">
                    @csrf
                        <input type="text" style="display:none" name="id" value="{{ $data['id'] }}" />
                        <input type="submit" class="btn btn-danger btn-lg" value="Delete User" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
