@extends('layouts.app')


@section('content')
    <main>
        <header class="header">
            <h1>Current Timesheets</h1>
        </header>
        <div class="container">
            <div class="card-group">
                @forelse ($timesheets as $t)
                    <div class="card">
                        <div class="card-body-timesheet">
                            <p>
                                <strong>Timesheet ID:&nbsp;</strong>
                                {{$t->id}}
                            </p>
                            <p>
                                <strong>Employee:&nbsp;</strong>
                                {{$t->employee->email}}
                            </p>
                            <p>
                                <strong>Product:&nbsp;</strong>
                                {{$t->product->name}}
                            </p>
                            <p>
                                <strong>Joborder:&nbsp;</strong>
                                {{$t->joborder->joborder}}
                            </p>
                            <p>
                                <strong>Week Ending:&nbsp;</strong>
                                {{$t->weekEnding}}
                            </p>
                            <p>
                                <strong>Status:&nbsp;</strong>
                                {{$t->joborder->status}}
                            </p>
                        </div>
                        <div class="card-footer-timesheet">
                            <form action="/timesheet/{{$t->id}}/edit" method="POST" class="form">
                                @csrf
                                <div class="form-submit">
                                    <input type="submit" value="Continue Timesheet">
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="card empty-timesheets">
                        <h1>No Timesheets</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
@endsection