<!doctype html>
<html lang="en">
 
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('icon/icons8-black-panther-mask-100.png')}}">
 
    

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TODO APP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
</head>
 
<body>
@if (Auth::check())


<nav class="navbar bg-light">
<div class="container">
<nav class="navbar navbar-primary bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <h5>
      <img src="{{asset('icon/icons8-t-67.png')}}" alt="" width="30" height="30"class="d-inline-block align-text-center">
      TODO APP
</h5>
    </a>
  </div>
</nav>

<button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><img src="{{asset('icon/icons8-logout-50.png')}}" alt="" width="30" height="30"class></button>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="d-flex align-items-center">
  <a class="navbar-brand" href="#">
  <a href="/logout" class="btn btn-outline-danger">Logout</a> 
  <p class="m-2">{{Auth::user()->name}}</p>
  <img src="" alt="">
  </div>
</div>
<div class="d-flex align-items-center"></div>
</div>
</nav>

@endif
<div class="hero-img">
      @yield('content')
</div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
      AOS.init();
    </script>
</body>
 
</html>