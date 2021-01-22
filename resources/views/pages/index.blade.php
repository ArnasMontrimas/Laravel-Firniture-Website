@extends('layouts.app')

@section('content')
    <main>
        <header class="index-header">
            <h1>Login Credentials</h1>
        </header>
        <div class="container">
            <form action="/" method="post" class="form">
                @csrf
                <div class="form-email">
                    <input type="email" name="email" required placeholder="Email..." autofocus>
                </div>
                <div class="form-password">
                    <input type="password" name="password" required placeholder="Password...">
                </div>
                <div class="form-submit">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </main>
@endsection
