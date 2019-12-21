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

@endsection()

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>ListofUsers
          <span class="badge badge-secondary" style="font-size: small;">{!!$data['total']!!}
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

          <div class="card">

          {{--       <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div> --}}

                <div class="card-body">
                  {!!$data['table']!!}
                </div><!--body-->

         {{--        <div class="border-top bg-white card-footer text-muted">
                 <button class="btn btn-sm btn-outline-secondary font-weight-normal delete-all" data-url="#"><i class="fa fa-trash mr-1" aria-hidden="true"></i>DeleteAll1</button> 
               </div> --}}<!-- footer-->

          </div>

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


@endsection()