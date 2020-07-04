@extends('admin/main')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="p-0 m-0">User Form</h4>
      </div>
      <div class="card-body">
        <form method="">
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Your Name *" value="" />
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
                <textarea name="alamat" class="form-control"></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="no_tlpn" class="form-control" placeholder="Your Name *" value="" />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Privillage</label>
                <select name="" id="" class="custom-select">
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
              <th>Email</th>
              <th>Address</th>
              <th>Phone Number</th>
              <th>Privillage</th>
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
      $('table').DataTable();
    });
  </script>
@endpush