@extends('layouts.app')


@section('content')
    <main>
        <header class="header">
            <h1>Export To Excel</h1>
        </header>
        <main>
            @if ($errors->any())
                @include('includes.alert')
            @endif
            <form action="/export/exportExcecution" class="form" method="POST">
                @csrf
                <div class="form-timesheetDate">
                    <label for="weeklyReport">Weekly Report</label>
                    <input type="date" name="weeklyReport" id="weeklyReport" min="{{$minDate}}" max="{{$maxDate}}" step="7">
                </div>
                <div class="form-submit">
                    <input class="button" type="submit" value="Export">
                </div>
                <br>
                <br>
            </form>
            <form action="/export/exportExcecution" class="form" method="POST">
                @csrf
                <div class="form-timesheetDate">
                    <label for="monthlyReport">Monthly Report</label>
                    <input type="month" name="monthlyReport" id="monthlyReport" min="{{substr($minDate, 0, 7)}}" max="{{substr($maxDate, 0, 7)}}">
                </div>
                <div class="form-submit">
                    <input class="button" type="submit" value="Export">
                </div>
                <br>
                <br>
            </form>
            <form action="/export/exportExcecution" class="form" method="POST">
                @csrf
                <div class="form-timesheetDate">
                    <label for="yearlyReport">Annual Report</label>
                    <input type="number" name="yearlyReport" id="yearlyReport" min="{{substr($minDate, 0, 4)}}" max="{{substr($minDate, 0, 4)}}" placeholder="Enter Year">
                </div>
                <div class="form-submit">
                    <input class="button" type="submit" value="Export">
                </div>
                <br>
                <br>
            </form>
            <form action="/export/exportExcecution" class="form" method="POST">
                @csrf
                <div class="form-timesheetDate">
                    <label for="allTimeReport">All Time Report</label>
                    <input type="checkbox" name="allTimeReport" id="allTimeReport">
                </div>
                <div class="form-submit">
                    <input class="button" type="submit" value="Export">
                </div>
            </form>
        </main>
    </main>
@endsection