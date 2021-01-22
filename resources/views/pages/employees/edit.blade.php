@extends('layouts.app')

@section('content')
    <main>
        <header class="header">
            <h1>Update Employee: {{$employee->email}}</h1>
            @if(session('success'))
                @include('includes.success-alert')
            @endif
        </header>
        <div class="container">
            @if ($errors->any())
                @include('includes.alert')
            @endif
            <form action="/employee/{{$employee->id}}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include("includes.employee-form")
                <div class="form-submit">
                    <input type="submit" value="Update Employee">
                </div>
            </form>
        </div>
    </main>
@endsection