@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create User</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            
                <form method="POST" action="{{ route('user.save') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" value="{{ old('fullname') }}">
                    </div>

                    <label>Select user type:</label><br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="admin" name="type" value="admin">
                        <label for="admin">Admin</label><br>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="client" name="type" value="client">
                        <label for="client">Client</label><br>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter username" name="username" value="{{ old('username') }}" />
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter password" name="password" value="{{ old('password') }}" />
                    </div>

                    <input type="submit" class="btn btn-success btn-lg" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
