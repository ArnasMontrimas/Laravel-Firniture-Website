@extends('layouts.app')

@section('content')
    <main>
        <header class="header">
            <h1>Add Products</h1>
            @if(session('success'))
                @include('includes.success-alert')
            @endif
        </header>
        <div class="container">
            @if ($errors->any())
                @include('includes.alert')
            @endif
            <form action="/product" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                @include('includes.product-form')
                <div class="form-submit">
                    <input type="submit" value="Add Product">
                </div>
            </form>
        </div>
    </main>
@endsection