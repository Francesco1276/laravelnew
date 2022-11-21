@extends('layout')
@section('content')
    <div class="row justify-content-center" style="margin-top: 150px">
        <div class="col-lg-6">

            @if (Session::get('succes'))
            <div class="alert alert-success w-75">
                {{Session::get('succes')}}</div>
                @endif
                

                @if (Session::get('fail'))
            <div class="alert alert-danger w-75">
                {{Session::get('fail')}}</div>
                @endif

                @if (Session::get('notAllowed'))
            <div class="alert alert-danger w-75">
                {{Session::get('notAllowed')}}</div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                <form action="{{route('login.auth')}}" method="POST">
                @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top" name="username" id="Username"
                            value="{{ old('username') }}" placeholder="username">
                        <label for="name">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom" name="password" id="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
 
                    <button class="w-100 btn btn-primary mt-3" type="submit">Login</button>
                </form>
                <small class="d-block mt-3">Doesn't have an account? <a class="text-primary" href="/register">
                        Register
                        Now!</a></small>
            </main>
        </div>
    </div>
 @endsection
    