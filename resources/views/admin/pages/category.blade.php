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
                            <label for="name">Category Name</label>
                          <input type="text" name="name" class="form-control" placeholder="" value="" />
                        </div>
                        
                        <div class="form-group">
                          <button type="button" class="btn btn-success">Input</button>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        
    </div>
</div>

    
@endsection