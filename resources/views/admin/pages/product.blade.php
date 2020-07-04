@extends('admin/main')

@section('content')
<div class="row">
  <div class="col-md-12">

    @if ($message = Session::get('error'))
      <div class="alert alert-danger">
        <ul class="m-0">
          @foreach ($message as $message_index => $message_row)
            <li>{{$message_row[0]}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if ($message = Session::get('success'))
      <div class="alert alert-success">{{$message}}</div>
    @endif

    <div class="card">
      <div class="card-header">
        <h4 class="p-0 m-0">Product Form</h4>
      </div>
      <div class="card-body">
        <form action="{{$action}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="nama_baju" class="form-control" placeholder="Your Name *" value="{{(@$v = old('nama_baju'))? $v: @$data->nama_baju}}" />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="harga_baju" class="form-control" placeholder="Your Name *" value="{{(@$v = old('harga_baju'))? $v: @$data->harga_baju}}" />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Stock</label>
                <input type="number" name="stock" class="form-control" placeholder="Your Name *" value="{{(@$v = old('stock'))? $v: @$data->stock}}" />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Images</label>
                <br>
                <input type="file" name="image" />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Category Name</label>
                <select name="category_id" class="custom-select">
                    @foreach ($category as $item)
                        <option value="{{$item->id}}" {{(@$data->category_id == $item->id)? 'selected': ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-12 text-right">
              <a href="{{route('admin.product.index')}}" class="btn btn-outline-danger">Back</a>
              <button class="btn btn-primary">Save</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h4 class="p-0 m-0">User Data</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Images</th>
              <th>Product Category</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
  <script>
    $(document).ready(function () {
      $('table').DataTable({
        "processing": true,
        "serverSide": true,
        'ajax': '{{route("admin.product.datatable")}}',
        'columns': [
          {data: 'nama_baju'},
          {data: 'harga_baju_format'},
          {data: 'stock'},
          {data: 'gambar', render: (data, type, row) => {
            return `
                <img src="{{url('')}}/${row.gambar}" height="120px">
            `;
          }},
          {data: 'category.name'},
          {data: 'action', searchable: false, sortable: false},
        ]
      });
    });
  </script>
@endpush