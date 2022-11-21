@extends('layout')
@section('content') 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row justify-content-center" style="margin-top: 150px">
        <div class="col-lg-6">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="{{route('register.post')}}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="name" class="form-control rounded-top" name="name" id="name"
                            value="{{ old('name') }}" placeholder="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="username" class="form-control rounded-top" name="username" id="username"
                            value="{{ old('username') }}" placeholder="username">
                        <label for="name">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control " name="email" id="email" 
                            value="{{ old('email') }}" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom" name="password" id="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
 
                    <button class="w-100 btn btn-primary mt-3" type="submit">Register</button>
                    
                </form>
                <small class="d-block mt-3">Have an account? <a class="text-primary" href="/login"> Login
                        Here</a></small>
            </main>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
 
</html>
@endsection
    