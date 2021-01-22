@extends('layouts.app')

@section('content')
    <main class="home-container">
        <header class="header">
            <h1>Welcome Home</h1>
            @if(session('success'))
                @include('includes.success-alert')
            @endif
        </header>
        @if(count($products) > 0)
            {{$products->links()}}
            <div class="card-group">
                @foreach ($products as $p)
                <div class="card">
                    <div class="card-header">
                        <img src="{{asset("storage/images/$p->img")}}"  alt="Product Image">
                    </div>
                    <div class="card-body">
                        <p>
                            <strong>Name:&nbsp;</strong>
                            {{$p->name}}
                        </p>
                        <p>
                            <strong>Category:&nbsp;</strong>
                            {{$p->type}}
                        </p>
                        <p>
                            <strong>Price:&nbsp;</strong>
                            {{$p->selling_price}}$
                        </p>
                        <p>
                            <strong>Marial Cost:&nbsp;</strong>
                            {{$p->material_cost}}$
                        </p>
                        <p>
                            <strong>Cost Per Part:&nbsp;</strong>
                            {{$p->cost_per_part}}$
                        </p>
                        <p>
                            <strong>Parts:&nbsp;</strong>
                            {{$p->parts}}
                        </p>
                        <p>
                            <strong>Build Time:&nbsp;</strong>
                            {{$p->build_time}}&nbsp;(Hours)
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </main>
@endsection