@extends('layouts.app')


@section('content')
    <main>
        <header class="header">
            <h1>Selection</h1>
        </header>
        <div class="container">
            @if ($errors->any())
                @include('includes.alert')
            @endif
            <form action="timesheet/create" class="form" method="POST">
                @csrf
                <div class="form-timesheetProduct">
                    <label for="product">Product</label>
                    <select name="product" id="product">
                        @foreach ($products as $p)
                            <option value={{$p->id}}>{{$p->name}} | {{$p->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-timesheetEmployee">
                    <label for="employee">Employee</label>
                    <select name="employee" id="employee">
                        @foreach ($employees as $e)
                            <option value={{$e->id}}>{{$e->name}} | {{$e->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-timesheetDate">
                    <label for="date">Week Ending</label>
                    <input type="date" name="date" id="date" min="2000-01-15" max="2100-01-15" step="7" required>
                </div>
                <div class="form-submit">
                    <input type="submit" value="Select">
                </div>
            </form>
        </div>
    </main>
@endsection