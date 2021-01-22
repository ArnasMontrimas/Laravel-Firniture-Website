@extends('layouts.app')

@section('content')
    <main>
        <header class="header">
            <h1>Continue Timesheet</h1>
            <p><strong>Joborder:&nbsp;</strong>{{$timesheet->joborder->joborder}}</p>
        </header>
        <div class="container">
            <form action="/timesheet/{{$timesheet->id}}/update" class="form" method="POST">
                @csrf
                <div class="form-timesheetDate">
                    <label for="date">Week Ending</label>
                    <!-- Below code gives me a date which is greater by 1 week than the selected timesheet that we want to continue -->
                    <?php 
                        $date = new DateTime($timesheet->weekEnding);
                        $interval = new DateInterval('P7D');
                        $date->add($interval);
                    ?>
                    <input type="date" name="date" id="date" min="{{$date->format('Y-m-d')}}" max="2100-01-15" step="7" required>
                </div>
                @include('includes.timesheet-form')
                <div class="form-submit">
                    <input type="submit" value="Submit Timesheet">
                </div>
            </form>
        </div>
    </main>
@endsection