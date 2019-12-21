@extends('admin.layouts.AdminLTE.app')

@section('main-content')
<style type="text/css">
  .medium-badge {
    object-fit: scale-down;
    height: 24px;
    width: 24px;
    border-radius: 2px;
    padding: 4px 7px;
    text-align: center;
    font-size: 11px;
    font-weight: 400;
    line-height: 15px;
    background-color: #dbd6f5;
    border: 1px solid #dbd6f5;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="box-header with-border">
              <h3 class="box-title">                              
                  Admin Profile
            </h3>
        </div>
          <div class="col-sm-10 float-sm-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="">
              @csrf

              <div class="form-group row" >
                <label for="firstname" class="col-sm-2 col-form-label text-right">First Name</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control-plaintext" id="firstname" value="{{$data->name}}" readonly="">
                </div> 
                <div class="col-sm-8">
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
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control-plaintext" id="email" value="{{$data->email}}" readonly="">
                </div>
              </div>
              <div class="form-group row" >
                  <label for="mobile" class="col-sm-2 col-form-label text-right">Mobile</label>
                  <div class="col-sm-4">
                      <input type="number" class="form-control-plaintext" id="mobile" value="{{$data->mobile}}" readonly="">
                  </div>
              </div>     
              <div class="form-group row" >
                  <label for="address" class="col-sm-2 col-form-label text-right">Address</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control-plaintext" id="address" value="{{$data->address}}" readonly="">
                  </div>
              </div>
              <div class="form-group row">
                <label for="profiletime" class="col-sm-2 col-form-label text-right">Profile Updated_at</label>
                <div class="col-sm-4">
                  <input type="" class="form-control-plaintext" id="profiletime" value="{{$data->updated_at }}" readonly="">
                </div>
                <div>
                  <a href="{{url('admin/updateprofile')}}" class="btn btn-primary" >
                    <span>Edit</span>
                  </a> 
                </div>
              </div>
                


            </form>

          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection()
