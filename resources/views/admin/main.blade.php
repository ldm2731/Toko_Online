
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ url('') }}/assets/css/dashboard.css" rel="stylesheet">

  </head>

<body>
  @include('admin.component.nav')    

  <div class="container-fluid">
    <div class="row">
      @include('admin.component.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-4">
        @yield('content')
      </main>
    </div>
  </div>

<script src="{{ url('') }}/assets/vendor/jquery/jquery.min.js"></script>
<script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@stack('script')
</html>