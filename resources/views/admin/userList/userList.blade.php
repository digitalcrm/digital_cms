@extends('admin.layouts.AdminLTE.app')

@section('main-content')

@section('headSection')

<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<style type="text/css">
            .checkedHighlight{
              background: #f4f4fd!important;
          }
     /*     table tr td{
            border: solid thin red;
        }*/
        </style>
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

@endsection()

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>ListofUsers
          <span class="badge badge-secondary" style="font-size: small;">{{$users->count()}}
          </span>
        </h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">ListofUsers</li>
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
        <div>
          @if(session('success'))
          <div class='alert alert-success'>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>          
            {{session('success')}}
          </div>
          @endif

          @if(session('error'))
          <div class='alert alert-success'>
            {{session('error')}}
          </div>
          @endif

          @if(session('info'))
          <div class='alert alert-warning'>
            {{session('info')}}
          </div>
          @endif
        </div>          
          {{--Table start--}}
          <table id="example1" class="table table-bordered table-striped">               
                      <thead>
                        <tr>
                          <th width="30">         
                                <div class="custom-control custom-checkbox text-center pl-3">
                                <input type="checkbox" class="checkbox custom-control-input" id="check_all">
                                <label class="custom-control-label ml-2" for="check_all">SelectAll</label>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Email Verification</th>
                            <th>Created</th>
                            <th>Action</th>
                            <th>Status</th>                   
                        </tr>
                      </thead>
                      <tbody>
@forelse($users as $user)
                        <tr>
                          <td><div class="custom-control custom-checkbox">
                <input type="checkbox" class="checkbox custom-control-input" id="{{$user->id}}" data-id="{{'$user->id'}}">
                <label class="custom-control-label ml-2" for="{{$user->id}}"></label>
                </div></td>
                          <td>
                            @if($user->picture!='profile.png')
                            <img src="{{asset($user->picture)}}" height="50" width="50"/>
                            @else
                            <span class="medium-badge mr-2">
                              @php
                              $first_letter = mb_substr($user->name, 0, 1);
                              $first_letter_Capital = strtoupper($first_letter);
                              // echo $first_letter_Capital;
                              @endphp
                            {{ $first_letter_Capital }}
                            </span>  
                            @endif
                            <a href="{{url('admin/user-list/' . $user->id)}}"> {{$user->name}} </a>
                          </td> 

                          <td><a href="#"> {{$user->email}} </a></td>
                          
                          <td> 
                        {!! ($user->email_verified_at) ? '<div class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Pass</div>' : '<div class="badge badge-success"><i class="fa fa-times text-danger" aria-hidden="true"></i> Failed</div>' !!}                           
                          </td>

                          <td>{{$user->created_at->toDateString()}}</td>

                           <td>{{ ($user->status) ? 'Active' : 'Blocked'}} </td>
                          
                          <td>
                      <div class="input-group input-group-lg mb-3">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -165px, 0px);">
                          <li class="dropdown-item"><a href="#">Edit</a></li>

                          <li class="dropdown-item">
                            {{-- $bstatus = ($user->status == 0) ? 1 : 0; --}}
                            <a href=" {{url('admin/user-list/block/' . $user->id .'/' .$user->status )}}" 
                            onclick="event.preventDefault(); 
                            document.getElementById("block-form").submit();">
                            {{($user->status == 1) ? "Block" : "Active"}}
                          </a>
                          
                          <form id="block-form" action="{{url('admin/user-list/block/' . $user->id .'/' .$user->status)}}" method="POST" style="display: none;">
                          @csrf
                          </form>
                          </li>

                          <li class="dropdown-item"><a href=" {{url('admin/user-list/delete/' . $user->id)}} ">Delete</a></li>
                        </ul>
                      </div>
                          </td>
                         
                        </tr>                       

                @empty

                <td colspan="5" align="center"><h3>No records available</h3></td>

                @endforelse 
                          </tbody>

                          <tfoot>
                            <tr>
                              <td colspan="7">
                                <button class="btn btn-sm btn-outline-secondary font-weight-normal delete-all" data-url="#"><i class="fa fa-trash mr-1" aria-hidden="true"></i>DeleteAll</button> 
                              </td>
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

 @section('footerSection')

 <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

 <!-- DataTables -->
 <script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
 <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
 <!-- AdminLTE App -->
 {{-- <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script> using this slider doesn't work--}}
   <!-- page script -->
   <script type="text/javascript">

     $(document).ready(function () {
      $('#check_all').on('click', function(e) {
        if($(this).is(':checked',true))  
        {
          $(".checkbox").prop('checked', true);  

        } else {  

          $(".checkbox").prop('checked',false);  

        } 

      });
      $('.checkbox').on('click',function(){

        if($('.checkbox:checked').length == $('.checkbox').length){

         $('#check_all').prop('checked',true);

       }else{

         $('#check_all').prop('checked',false);

       }

     });
      // for color change in table row
      // $('.checkbox').change(function() {
      //   if($('.checkbox:checked').length == $('.checkbox').length){

      //     $("#check_all").change(function() {
      //       $('#check_all').closest("table").find("tr").find("td").toggleClass("checkedHighlight", this.checked);
      //   });

      //  }
        
      // });

      $('.delete-all').on('click', function(e) {

       var idsArr = [];  

       $(".checkbox:checked").each(function() {  

         idsArr.push($(this).attr('data-id'));

       });  
       if(idsArr.length <=0)  
       {  
        alert("Please select atleast one record to delete.");  

      }else {  

        if(confirm("Are you sure, you want to delete the selected role?")){  
          var strIds = idsArr.join(","); 
          $.ajax({
            url: "#",
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+strIds,
            success: function (data) {
              if (data['status']==true) {
                $(".checkbox:checked").each(function() {  

                  $(this).parents("tr").remove();

                });
                alert(data['message']);

              } else {
                alert('Whoops Something went wrong!!');
              }
            },

            error: function (data) {
              alert(data.responseText);

            }

          });

        }  

      }  

    });

      $('[data-toggle=confirmation]').confirmation({

       rootSelector: '[data-toggle=confirmation]',
       onConfirm: function (event, element) {
        element.closest('form').submit();
      }

    });   

    });
  </script>

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
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": true,
    //   "searching": true,
    //   "ordering": false,
    //   "info": true,
    //   "autoWidth": false,
    //   "sorting": false,
    // });
  });
</script>
{{-- checkbox color change after click --}}
<script type="text/javascript">
//for single checkbox or distinct
$(":checkbox").change(function() {
$(this).closest("tr").find("td").toggleClass("checkedHighlight", this.checked);
});
// for selectAll 
$("#check_all").change(function() {
$('#check_all').closest("table").find("tr").find("td").toggleClass("checkedHighlight", this.checked);
});
</script>
{{-- flash message script --}}
<script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>


@endsection()