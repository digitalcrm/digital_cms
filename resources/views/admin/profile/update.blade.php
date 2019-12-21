@extends('admin.layouts.AdminLTE.app')

@section('main-content')
<style type="text/css">
  .medium-badge {
    object-fit: scale-down;
    height: 50px;
    width: 50px;
    border-radius: 10px;
    padding: 4px 7px;
    text-align: center;
    font-size: 20px;
    font-weight: 400;
    line-height: 20px;
    background-color: #dbd6f5;
    border: 1px solid #dbd6f5;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <h1>{{$data->name}}</h1>
        </div>
        <div class="col-md-10">
          
                     @if($data->picture!='profile.png')
                  <img src="{{url($data->picture) }}" class="rounded mr-2" alt="User Image" style="width: 50px; height: 50px" /> 
                  @else
                  <span class="medium-badge mr-2">
                    @php 
                    $first_char = mb_substr($data->name, 0, 1);
                    $first_char_Capital = strtoupper($first_char);
                    echo $first_char_Capital;
                    @endphp
                  </span>  
                  @endif
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="/admin/profile/{{ $data->id }}" method="POST" class="col-md-12" enctype='multipart/form-data'>
              @csrf 
              @method('put')

              <div class="form-group row">
                <label for="profilepicture" class="col-sm-2 col-form-label text-right">Profile Picture</label>
                <div class="col-sm-4">
                  <input type="file" class="btn btn-default" id="profilepicture" name="profilepicture"  accept="image/*" >
                </div>
              </div>  

              <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label text-right">First Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" value="{!!$data->name!!}" >
                </div>
              </div>
              <div class="form-group row" >
                <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" readonly="" >
                </div>
              </div> 
              <div class="form-group row" >
                  <label for="mobile" class="col-sm-2 col-form-label text-right">Mobile</label>
                  <div class="col-sm-4">
                      <input type="number" class="form-control" name="mobile" id="mobile" value="{{$data->mobile}}" >
                  </div>
              </div>     
              <div class="form-group row" >
                  <label for="address" class="col-sm-2 col-form-label text-right">Address</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="address" name="address" value="{{$data->address}}" >
                  </div>
              </div>
              <button type="submit" class="btn btn-success">Updated</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection()
