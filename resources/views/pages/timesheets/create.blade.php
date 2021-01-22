@extends('layouts.app')

@section('content')
    <main>
        <header class="header">
            <h1>Enter Timesheet</h1>
        </header>
        <div class="container">
            <form action="/timesheet/store/{{$product}}/{{$employee}}/{{$weekEnding}}" class="form" method="POST">
                @csrf
                @include('includes.timesheet-form')
                <div class="form-submit">
                    <input type="submit" value="Submit Timesheet">
                </div>
            </form>
        </div>
    </main>
@endsection