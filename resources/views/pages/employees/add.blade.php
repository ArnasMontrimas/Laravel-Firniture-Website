@extends('layouts.app')


@section('content')
    <main>
        <header class="header">
            <h1>Add Employees</h1>
            @if(session('success'))
                @include('includes.success-alert')
            @endif
        </header>
        <div class="container">
            @if($errors->any())
                @include('includes.alert')
            @endif
            <form action="/employee" method="POST" class="form">
                @csrf
                @include('includes.employee-form')
                <div class="form-submit">
                    <input type="submit" value="Add Employee">
                </div>
            </form>
        </div>
    </main>    
@endsection