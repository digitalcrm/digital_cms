@extends('admin.layouts.AdminLTE.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Dashboard</h1>
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
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
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
                          <tr><td>1</td><td>12</td><td>Nick</td><td>nick@mail.com</td><td>Delete</td></tr>
                          <tr><td>1</td><td>12</td><td>Nick</td><td>nick@mail.com</td><td>Delete</td></tr>
                          <tr><td>1</td><td>12</td><td>Nick</td><td>nick@mail.com</td><td>Delete</td></tr>
                          <tr><td>1</td><td>12</td><td>Nick</td><td>nick@mail.com</td><td>Delete</td></tr>
                          <tr><td>1</td><td>12</td><td>Nick</td><td>nick@mail.com</td><td>Delete</td></tr>
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
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection()
