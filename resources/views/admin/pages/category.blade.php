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
  </div>
  
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="p-0 m-0">Category Form</h4>
      </div>
      <div class="card-body">
        <form action="{{$action}}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">

              <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" placeholder="" value="{{(@$v = old('name'))? $v: @$data->name}}" />
              </div>

            </div>
            <div class="col-md-12 text-right">
              <a href="{{route('admin.category.index')}}" class="btn btn-outline-danger">Back</a>
              <button class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="p-0 m-0">Category Data</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Name</th>
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
        'ajax': '{{route("admin.category.datatable")}}',
        'columns': [
          {data: 'name'},
          {data: 'action', searchable: false, sortable: false},
        ]
      });
    });
  </script>
@endpush