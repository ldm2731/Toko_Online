@extends('front/hello')

@section('content')
<div class="row">
  <div class="col-md-12">

  </div>
</div>
<!-- Page Content -->
<div class="container">

  <div class="row">

    @include('front/component/category')
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="{{ url('') }}/assets/images/SIDEBAR FB 2018 KONVEKSI AM DESAIN.jpg"
              alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ url('') }}/assets/images/sidbar am design baru.jpg"
              alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ url('') }}/assets/images/souvenir.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">
        @foreach ($produk as $produk_row)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="{{$produk_row->gambar}}" alt=""></a>
            <div class="card-body">
              <h5 class="card-title">{{$produk_row->nama_baju}}</h5>
              <p class="card-text">
                <strong>Harga : </strong>{{$produk_row->harga_baju_format}}
                <hr>
                <strong>Stok :</strong> {{ $produk_row->stock }}
                <br>
            </div>
            <div class="card-footer">
              <center>
                <a href="{{route('front.detail', $produk_row->id)}}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
              </center>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

@endsection