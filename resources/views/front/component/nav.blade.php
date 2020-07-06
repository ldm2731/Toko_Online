<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('front.home') }}">AM DESAIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('front.home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
        </li>
        <li class="nav-item">
          @if (@Auth::user()->id)
            <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
          @else
            <a class="nav-link" href="{{route('user.login')}}">Login</a>
          @endif
        </li>
      </ul>
    </div>
  </div>
</nav>