@extends('front/hello')

@section('content')
<div class="row pt-5" style="min-height: 90vh">

  <div class="col-md-4 offset-md-5">
    <h2>
      {{$baju->nama_baju}}
    </h2>
  </div>

  <div class="col-md-4">
    <img src="{{url($baju->gambar)}} " alt="" height="350px" width="100%" style="object-fit: contain">
  </div>

  <div class="col-md-4">
    <table class="table table-hovere">
      <tr>
        <td>Kategori</td>
        <td>:</td>
        <td>{{$baju->category->name}}</td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>:</td>
        <td>{{$baju->harga_baju}}</td>
      </tr>
    </table>
  </div>

  <div class="col-md-4">

    @if ($message = Session::get('error'))
      <div class="alert alert-danger">
        <ul class="m-0">
          @foreach ($message as $message_index => $message_row)
            <li>{{$message_row[0]}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('front.order')}}?id={{Request::segment('2')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" name="alamat" value="{{@Auth::user()->alamat}}">
      </div>

      <div class="form-group">
        <label for="">Phone Number</label>
        <input type="text" class="form-control" name="no_tlpn" value="{{@Auth::user()->no_tlpn}}">
      </div>

      <div class="form-group">
        <button class="btn btn-outline-danger">Pesan</button>
      </div>

    </form>
  </div>

</div>
@endsection