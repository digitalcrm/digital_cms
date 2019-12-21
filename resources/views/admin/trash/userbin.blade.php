@extends('admin.layouts.AdminLTE.app')

@section('main-content')

@section('headSection')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

@endsection()

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	  <section class="content-header">
	   <div class="container-fluid">
	    <div class="row">
	      <div class="col-sm-10">
	        <h3>UsersTrash&nbsp;
	          <span class="badge badge-secondary" style="font-size: small;">{{$userdata->count()}}
	          </span>
	        </h3>
	      </div>
	      <div class="col-sm-2 float-right">
	      	<ol class="breadcrumb float-sm-right">
	      		<li class="breadcrumb-item"><a href="#">Home</a></li>
	      		<li class="breadcrumb-item active"> <a class="btn btn-success" href="{{url('admin/users/restore/all/{id}')}}">RestoreAll</a> </li>
	      	</ol>
	      	
	      </div>
	    </div>
	  </div><!-- /.container-fluid -->
	</section>
	
          <div class="card">
                <div class="card-body">
                	<table id="example1" class="table table-bordered table-striped">{{--Table start--}}
                		

	                		<thead>
	                			<tr>
	                				<th>S.No</th>
	                				<th>User-ID</th>
	                				<th>Name</th>
	                				<th>Email</th>                       
	                				<th>Action</th>                       
	                			</tr>
	                		</thead>
	                		<tbody>
@forelse($userdata as $user)
	                			<tr>
	                				<td>{{ $loop->index+ 1 }}</td>
	                				<td>{{ $user->id }}</td> 
	                				<td>{{ $user->name }}</td>
	                				<td>{{$user->email}}</td>
	                				<td>
	                					<div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                              <span class="caret"></span>
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">                                              
                                              <li><a href="{{ route('restore',$user->id) }}">Restore</a></li>
                                            </ul>
                                      	</div>
	                				</td>
	                			</tr>

        				@empty

        				<td colspan="5" align="center"><h3>Users Trash is Empty Now.</h3></td>

        				@endforelse 
	                				</tbody>

	                				<tfoot>
	                					<tr>
	                						<th>S.No</th>
	                						<th>User-ID</th>
	                						<th>Name</th>
	                						<th>Email</th>
	                						<th>Action</th>
	                					</tr>
	                				</tfoot>

                			</table>{{--Table close--}}                  
                </div><!--body-->
          </div>
 </div>
 <!-- /.content-wrapper -->

 @endsection()

 @section('footerSection')

 <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

 <!-- DataTables -->
 <script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
 <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

 <script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "sorting": false,
    });
  });
</script>


@endsection()