@extends('admin/main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                          <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                          <input type="text" name="password" class="form-control" placeholder="Password *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                          <input type="text" name="alamat" class="form-control" placeholder="Alamat *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="no_tlpn">No Telpon</label>
                          <input type="text" name="no_telpn" class="form-control" placeholder="No Telpon *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="privillage">Privillage</label>
                            <select class="custom-select">
                                <option selected>privillage</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
        
                        </div>
                        
                            
                        <div class="form-group">
                          <input onclick="myFunction()" type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        
    </div>
</div>

    
@endsection