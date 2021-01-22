@extends('layouts.app')


@section('content')
    <main>
        <header class="header">
            <h1>Update Product: {{$product->name}}</h1>
            @if(session('success'))
                @include('includes.success-alert')
            @endif
        </header>
        <div class="container">
            @if ($errors->any())
                @include('includes.alert')
            @endif
            <form action="/product/{{$product->id}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include("includes.product-form")
                <div class="form-submit">
                    <input type="submit" value="Update Product">
                </div>
            </form>
        </div>
    </main>
@endsection