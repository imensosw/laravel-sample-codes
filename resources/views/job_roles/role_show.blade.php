@extends('layouts.main')
@section('content')
<script type="text/javascript" src="{{ url('/js/jquery.validate.js') }}"></script>
<div class="right_col" role="main">  
  <h1 class="main_heading m_t5 pull-left">
    <div class="circle main_heading_i"><img src="{{ url('images/icons/user-2.svg') }}"  class="svg" alt="ul icon"></div> <i class="fa fa-user"></i> Role Chart 
  </h1>
  <div class="pull-right add_new">
      <a href="javascript:;" onclick="$('#add-role').show(200);;" class="btn bg-gray s_btn btn-shadow"  alt="ul icon"> Add New</a>
  </div>
  <div class="clearfix"></div> 
  <table id="tblCompaney" class="display table" width="100%" cellspacing="0">  
    <thead> 
      <th>S. NO</th>                         
      <th>Job Role</th>
      <th>Action</th>
    </thead>  
  </table>
  <!--Add Modal --> 
  <!--Edit Modal -->
  <div id="edit-role" class="modal fade" role="dialog">
  </div>



  <!-- Confirmation Modal -->
  <!-- Toggle button code -->
  <script>
    $(function() {
      $('#toggle-two').bootstrapToggle({
        on: 'Enabled',
        off: 'Disabled'
      });
      $.validator.setDefaults({ ignore: ":hidden:not(select)" })
    })
  </script>
  <!-- Toggle button code -->
<script type="text/javascript">
   $(document).ready(function() {
    var t = $('#tblCompaney').DataTable( {       
      'ajax': {
       "url"    : "<?php echo  url('getRoleDetail') ?>",
       "type" : "POST",
       "datatype": "json",
       "data"   : function( d ) {
        d._token= "{{ csrf_token() }}";
      }        
    }, 
    "bProcessing": true,
    "serverSide": true,
    "bPaginate":true,
    "bProcessing": true,
    "scrollX": true ,
    "pageLength": 30,
    "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]],
    "ordering": true,
    "searching": true,
    "lengthChange": true,
    "language": {
      "zeroRecords": ".",
      "infoEmpty": "No Company Found"
    },
    "columns": [        
    {
      "data": "id",
      render: function (data, type, row, meta) {
       return meta.row + meta.settings._iDisplayStart + 1;
     }
   },          
   { "data": "jobRoleName" },
   { mRender: function (data, type, row) 
    {
     var content = '<a href="#"  class="btn bg-orange btn-sm edit_record" data-toggle="modal" id="viewForm" data-id="'+row.id+'" data-target="#edit-role" data-toggle="tooltip" data-placement="bottom" title="View"> <img src="images/icons/edit_1.svg" class="svg" alt="View"> </a>';
     return content ;  
   }},          
   ],
   "columnDefs": [
   { "width": "80", "targets":0},
   { "width": "80", "targets":2, "className": "text-center"}
   ]        
   }); 
    }); 
</script>
<script type="text/javascript">
 $(document).ready(function() {  
  $(document).on('click','#addRole',function(){ 
        //$('#addRole')[0].reset(); 
        //$(".chosen-select").trigger("chosen:updated");    
        $('#edit-role').modal('hide');                      
      }); 
  });
</script>  
<script type="text/javascript">
  $(document).ready(function(){ 
    $(document).on('click','#viewForm',function(){
     var id = $(this).attr('data-id');
             //alert(id);
             $.ajax({
               url:"editRole",
               type: "post",
               dataType: "html",
               data:{"_token": "{{ csrf_token() }}",'id':id  } ,
               success:function(data) {
                 $("#edit-role").html(data);
                 $("#edit-role").modal('show');
               },
               dataType:"html"
             });          
                  //$("#edit_modal").html(data);
                  $(".chosen-select").chosen();
                }); 
  });
</script> 
<script type="text/javascript">
  $(document).ready(function(){
    $("#addRole").validate();
    $(".chosen-select").chosen();
    $('.chosen-container').css('width', '100%');
  });
</script>



@endsection
