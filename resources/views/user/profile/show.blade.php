@extends('user.layouts.userDashboard.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="box-header with-border">
              <h3 class="box-title">
                <img src="<?php echo ($data->picture !=null)?url($data->picture):url('uploads/default/user.png');?>" height="50" width="50"/>
                {{$data->name}}
            </h3>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<form class="border border-info">
    					@csrf
{{--     					<div class="form-group row">
    						<label for="firstname" class="col-sm-2 col-form-label text-right">Title</label>
    						<div class="col-sm-2">
    							<select class="form-control">
    								<option>Mr.</option>
    								<option>Doctor</option>
    							</select>
    						</div>
    					</div> --}}
    					<div class="form-group row" >
    						<label for="firstname" class="col-sm-2 col-form-label text-right">First Name</label>
    						<div class="col-sm-4">
    							<input type="text" class="form-control-plaintext" id="firstname" value="{{$data->name}}" readonly="">
    						</div>
    					</div>                     
                        <div class="form-group row" >
                            <label for="middlename" class="col-sm-2 col-form-label text-right">Middle Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="middlename" value="{{$data->middlename}}" readonly="">
                            </div>
                        </div>     
                        <div class="form-group row" >
                            <label for="lastname" class="col-sm-2 col-form-label text-right">Last Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="lastname" value="{{$data->lastname}}" readonly="">
                            </div>
                        </div>
    					<div class="form-group row">
    						<label for="email" class="col-sm-2 col-form-label text-right">Email</label>
    						<div class="col-sm-4">
    							<input type="email" class="form-control-plaintext" id="email" value="{{$data->email}}" readonly="">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label for="profiletime" class="col-sm-2 col-form-label text-right">Profile Created_at</label>
    						<div class="col-sm-4">
    							<input type="" class="form-control-plaintext" id="profiletime" value="{{$data->created_at->toDateTimeString()}}" readonly="">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label for="profiletime" class="col-sm-2 col-form-label text-right">Profile Updated_at</label>
    						<div class="col-sm-4">
    							<input type="" class="form-control-plaintext" id="profiletime" value="{{$data->updated_at->format('j-F-Y G : ia')}}" readonly="">
    						</div>
    					</div>
    					
{{--     					<div class="form-group row">
    						<label for="firstname" class="col-sm-2 col-form-label text-right">Suffix</label>
    						<div class="col-sm-2">
    							<select class="form-control">
    								<option>Junior</option>
    								<option>Senior</option>
    							</select>
    						</div>
    					</div> --}}
{{--     					<div class="form-group row">
    						<label for="firstname" class="col-sm-2 col-form-label text-right">Gender</label>
    						<div class="col-sm-2">
    							<select class="form-control">
    								<option>Male</option>
    								<option>Female</option>
    							</select>
    						</div>
    					</div> --}}
                        <div style="text-align: center;">
        					<a href="{{url('user/updateprofile')}}" class="btn btn-primary" >
                                <span>Edit</span>
                            </a>                            
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

