@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! trans('product.create') !!}</div>
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ route('product.save') }}">
                        <div class="col-12">
                            @include('util.message')
                        </div>

                        @csrf
                        <div class="col-12">
                            <label for="EnterProduct" class="form-label">{!! trans('product.name') !!}</label>
                            <input type="text" class="form-control" id="EnterProduct" name="name" value="{{ old('name') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterPrice" class="form-label">{!! trans('product.price') !!}</label>
                            <input type="text" class="form-control" id="EnterPrice" name="price" value="{{ old('price') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterDiscount" class="form-label">{!! trans('product.discount') !!}</label>
                            <input type="text" class="form-control" id="EnterDiscount" name="discount" value="{{ old('discount') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterCategory" class="form-label">{!! trans('product.category') !!}</label>
                            <input type="text" class="form-control" id="EnterCategory" name="category" value="{{ old('category') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterManufacturer" class="form-label">{!! trans('product.manufacturer') !!}</label>
                            <input type="text" class="form-control" id="EnterManufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterQuantity" class="form-label">{!! trans('product.quantity') !!}</label>
                            <input type="text" class="form-control" id="EnterQuantity" name="quantity" value="{{ old('quantity') }}" required/>
                        </div>
                        <div class="col-12">
                            <label for="EnterDescription" class="form-label">{!! trans('product.description') !!}</label>
                            <input type="text" class="form-control" id="EnterDescription" name="description" value="{{ old('description') }}" required/>
                        </div>
                        <div class="col-12">
                            <a  class="btn btn-secondary btn-lg" href="{{route('admin.home.index')}}">{!! trans('user.back') !!}</a>
                            <input type="submit" class="btn btn-success btn-lg" value="{!! trans('product.send') !!}" />
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection