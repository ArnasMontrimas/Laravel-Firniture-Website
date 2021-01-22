@extends('layouts.app')

@section('content')
    <!--MAYBE ADD A FILTER INPUT TO SEARCH THROUGH RECORDS-->
    <main class="index-page-container" >
        <header class="header">
            <h1>Employees</h1>
            @if(session('success'))
                @include('includes.success-alert')
            @endif
        </header>
        @if(count($employees) > 0)
            {{$employees->links()}}
            <div class="card-group">
                @foreach($employees as $emp)
                    <div class="card">
                        <div class="card-body-index">
                            <p>
                                <strong>Name:&nbsp;</strong>
                                {{$emp->name}}
                            </p>
                            <p>
                                <strong>Surname:&nbsp;</strong>
                                {{$emp->surname}}
                            </p>
                            <p>
                                <strong>Email:&nbsp;</strong>
                                {{$emp->email}}
                            </p>
                            <p>
                                <strong>Position:&nbsp;</strong>
                                {{$emp->type}}
                            </p>
                            <p>
                                <strong>Salary:&nbsp;</strong>
                                {{$emp->salary}}$
                            </p>
                            <p>
                                <strong>City:&nbsp;</strong>
                                {{$emp->address->city}}
                            </p>
                            <p>
                                <strong>Street:&nbsp;</strong>
                                {{$emp->address->street}}
                            </p>
                            <p>
                                <strong>Post Code:&nbsp;</strong>
                                {{$emp->address->post_code}}
                            </p>
                        </div>
                        <div class="card-footer-index">
                            @if(auth()->user()->id != $emp->id)
                                <form action="employee/{{$emp->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="DELETE">
                                </form>
                            @endif
                            <a href="employee/{{$emp->id}}/edit">UPDATE</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
@endsection