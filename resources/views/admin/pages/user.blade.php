@extends('admin/main')

@section('content')
<div class="row">
  <div class="col-md-12">

    @if ($message = Session::get('error'))
      <div class="alert alert-danger">
        <ul>
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
        <h4 class="p-0 m-0">User Form</h4>
      </div>
      <div class="card-body">
        <form action="{{$action}}" method="{{$method}}">
          @csrf
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Your Name *" value="{{(@$v = old('name'))? $v: @$data->name}} " />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Your Name *" value="{{(@$v = old('username'))? $v: @$data->username}} " />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Your Name *" value="{{(@$v = old('email'))? $v: @$data->email}} " />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your Name *" value="" />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Address</label>
                <textarea name="alamat" class="form-control">{{(@$v = old('alamat')? $v: @$data->alamat)}} </textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="no_tlpn" class="form-control" placeholder="Your Name *" value="{{(@$v = old('no_tlpn'))? $v: @$data->no_tlpn}} " />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Privillage</label>
                <select name="role_id" class="custom-select">
                  <option value="admin">Admin</option>
                  <option value="member">Member</option>
                </select>
              </div>
            </div>

            <div class="col-md-12 text-right">
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
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Address</th>
              <th>Privillage</th>
              <th>Phone Number</th>
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
        'ajax': '{{route("admin.user.datatable")}}',
        'columns': [
          {data: 'name'},
          {data: 'username'},
          {data: 'email'},
          {data: 'alamat'},
          {data: 'role_id'},
          {data: 'no_tlpn'},
          {data: 'action', searchAble: false, showrtAble: false},
        ]
      });
    });
  </script>
@endpush