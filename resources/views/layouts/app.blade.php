<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- bootstrap cdn  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Laravel</title>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark">

  <div class="container-fluid">
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" href="/">Products</a>
    </ul>
  </div>

</nav>
    @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    @yield('content')
</body>
</html>