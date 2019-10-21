@extends('layouts.main')
@section('content')
<script type="text/javascript" src="{{ url('/js/jquery.validate.js') }}"></script>
@include('layouts.mastermenu', ['active'=>'specialization'])
<div class="right_col" role="main">   
  <h1 class="main_heading m_t5 pull-left">
    <div class="circle main_heading_i"><img src="{{ url('images/icons/user-2.svg') }}"  class="svg" alt="ul icon"></div> <i class="fa fa-star"></i> Specialization 
  </h1>
  <div class="pull-right add_new">
    <a href="javascript:;" onclick="$('#add-specialization').show(200);;" class="btn bg-gray s_btn btn-shadow"  alt="ul icon"> Add New</a>
  </div>
  <div class="clearfix m_t20"></div><div class="m_t20"></div>     
  <table id="users-table" class="display table" width="100%" cellspacing="0">  
    <thead>
      <th>S. NO</th>
      <th>Specialization Name</th>
      <th>Degree Name</th>                           
      <th class="width_80 text-center">Actions</th>
    </thead>  
  </table>

  <!--Add Modal -->
  <div id="add-specialization" class="addDegree im-modal" role="dialog" style="display: none;">   
    <div class="im-modal-header">
      <a href="javascript:;" onclick="$('#add-specialization').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
      <h4 class="im-modal-title">Add New Specialization</h4>
    </div>
    <div class="im-modal-body m_t30">
      <div class="row">
        <form id="addEmployee" class="tmarg">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
          <div class="col-sm-6 m_b20">
            <div class="form-group">
              <label for="fname">Specialization Name *</label>
              <input type="text" class="form-control" name="specializationName" id="f_nm" placeholder="Enter Specialization Name" required>
            </div>
          </div>          
          <div class="col-sm-6 m_b20">
            <div class="form-group">
              <label for=" ">Degree *</label>
              <select  data-placeholder="Select Industry" name="degreeId" class=" chosen-select form-control required" required >
                <option value="" >select</option>
                @foreach($degrees as $degree)
                <option value="{{$degree->id}}" >{{$degree->degreeName}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-12 text-right m_t20">
            <a href="javascript:;" onclick="$('#add-specialization').hide(200);" class="btn-curvy bg-sky mr10"> Cancel </a>
            <button class="btn-curvy bg-red"> Submit </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="add-specialization1" class="addDegree im-modal" role="dialog" style="display: none;"> 
    <div class="im-modal-header">
      <a href="javascript:;" onclick="$('#add-specialization1').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
      <h5 class="im-modal-title">Edit Specialization Details</h5>
    </div>
    <div class="im-modal-body m_t30" id="edit-specialization">
    </div>
  </div>

  <!--Edit Modal -->

  <!-- <div id="edit-specialization" class="modal fade" role="dialog">  </div> -->
  <!-- Confirmation Modal -->
  <div class="modal fade" id="delet-employee" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body text-center inline_block">
          <div class="check circle"> 
            <img src="{{ url('images/icons/check.svg') }}" alt="check" class="svg" />
          </div>
          <h3>Are you sure to delete record ?</h3>      
          <div class="text-center m_t20 m_b20">          
            <a href="javascript:;"  class="close btn btn_primery l_btn delete_user">Ok</a>
            <button type="button" class="btn-curvy bg-gray" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
      
    </div>
  </div> 


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
<script type="text/javascript">
 $(document).ready(function() {        
  $(document).on('submit','#addEmployee',function(){ 
   $.ajax({
     type: "post",
     url:"addSpecialization",
     data:new FormData(this),
     contentType: false,       
     cache: false,           
     processData:false,
     success: function(data)
     { 
        if($.isEmptyObject(data.error))
        {
          //$('#tblCompaney').DataTable.reload();
          $('#addEmployee')[0].reset(); 
          $(".chosen-select").trigger("chosen:updated");    
          $('.im-close').trigger("click"); 
          //$('#add-employee').modal('hide');
          var table = $('#users-table').DataTable();
          table.draw(); 
          showMessage(data.success, 'success',10000);
        }
        else
        {
          showMessage(data.error[0], 'danger',5000000);
        }  
     }, 
     dataType:"json"
}); 
   return false;
 }); 

  $(document).on('submit','#editEmployee',function(){ 
   $.ajax({
     type: "post",
     url:"specializationUpdate",
     data:new FormData(this),
     contentType: false,       
     cache: false,           
     processData:false,
     success: function(data)
     {  
        if($.isEmptyObject(data.error))
        {
          //$('#tblCompaney').DataTable.reload();
          $('#addEmployee')[0].reset(); 
          $(".chosen-select").trigger("chosen:updated");    
          $('.im-close').trigger("click"); 
          //$('#edit-specialization').modal('hide');
          var table = $('#users-table').DataTable();
          table.draw(); 
          showMessage(data.success, 'success',5000000);
        }
        else
        {
          showMessage(data.error[0], 'danger',5000000);
        }
    },
                   dataType:"json"
                 }); 
   return false;
 }); 
});

</script>  

<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click','.delete_button',function(){

      var id=$(this).attr('data-id');

      $('.delete_user').attr('data-id',id);

    });
    $(document).on('click','.delete_user',function(){
      id=$(this).attr('data-id');
      $.ajax({
       url:'<?php echo url("specialization/dl")?>',
       type:'POST',
       data:{
        _token:'<?php echo csrf_token(); ?>',
        id:id,
      },
      success: function(response)
      {
        if($.isEmptyObject(response.error))
        {
          //$('#tblCompaney').DataTable.reload();
         $('#delet-employee').modal('hide');
         var table = $('#users-table').DataTable();
         table.draw();
         showMessage(response.success, 'success',10000);
        }
        else
        {
          showMessage(response.error[0], 'danger',5000000);
        }
      },
     dataType:'json',

   });
    });
    $(document).on('click','#editForm',function(){
     var id = $(this).attr('data-id');
             //alert(id);
             $.ajax({
               url:"editSpecialization",
               type: "post",
               dataType: "html",
               data:{"_token": "{{ csrf_token() }}",'id':id  } ,
               success:function(data) {
                 $("#edit-specialization").html(data);
                 $("#editEmployee").validate();
                 //$("#edit-specialization").modal('show');
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
    $("#addEmployee").validate();
    $(".chosen-select").chosen();
    $('.chosen-container').css('width', '100%');
  });

  //go to top page
  $(document).on('click', '.gototop-link', function(){
      $('html,body').animate({scrollTop: $("#add-specialization1").offset().top-70},'slow');
  });
</script>
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        ajax: "{{ url('getSpecializationDetail') }}",
        columns: [        
    {
      "data": "id",
      render: function (data, type, row, meta) {
       return meta.row + meta.settings._iDisplayStart + 1;
     }
   },
   { "data": "specializationName" },
   { "data": "degreeName" },
   { mRender: function (data, type, row) 
    //    <a href="javascript:;" onclick="$(\'#add-specialization1\').show(200);" class="btn bg-orange btn-sm edit_record"  alt="ul icon" id="editForm" data-id="'+row.id+'"><img src="images/icons/edit_1.svg" class="svg" alt="edit"></a>
    {
     var content = '<a href="javascript:;" id="editForm" onclick="$(\'#add-specialization1\').show(200);" class="btn bg-orange btn-sm edit_record gototop-link" data-id="'+row.id+'" alt="ul icon"><img src="images/icons/edit_1.svg" class="svg" alt="edit"></a>  <button type="button" data-id="'+row.id+'" class="btn btn_primary btn-sm delete_button" data-toggle="modal" data-target="#delet-employee" data-toggle="tooltip" data-placement="bottom" title="Delet"> <img src="images/icons/trash.svg" class="svg" alt="trash"></button>';
     return content ;  
   }},
   ],
    });
});
</script>
@endsection
