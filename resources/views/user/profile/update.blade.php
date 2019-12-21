@extends('user.layouts.userDashboard.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
                    <form action="/user/profile/{{ $data->id }}" method="POST" class="col-md-12" enctype='multipart/form-data'>
                        @csrf 
                        @method('put') 

              <div class="box-header with-border">
                <h3 class="box-title">
                  <img src="<?php echo ($data->picture !=null)?url($data->picture):url('uploads/default/user.png');?>" height="50" width="50"/>
                  {{$data->name}}
                </h3>
              </div>
{{-- 
              <div class="form-group row">                
                  <label for="firstname" class="col-sm-2 col-form-label text-right">Profile Upload</label>
                <div class="col-sm-4">
                  <input type="file" class="custom-file-input" id="inputGroupFile01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>                    
                </div>
              </div> --}} 

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
    					<div class="form-group row">
    						<label for="middlename" class="col-sm-2 col-form-label text-right">Middle Name</label>
    						<div class="col-sm-4">
    							<input type="text" class="form-control" name="middlename" id="middlename" placeholder="" value="{!!$data->middlename!!}">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label for="lastname" class="col-sm-2 col-form-label text-right">Last Name</label>
    						<div class="col-sm-4">
    							<input type="text" class="form-control" name="lastname" id="lastname" placeholder="" value="{!!$data->lastname!!}">
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

