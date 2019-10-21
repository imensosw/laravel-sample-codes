@extends('layouts.main')
@section('content')
<script type="text/javascript" src="{{ url('/js/jquery.validate.js') }}"></script>
@include('layouts.mastermenu', ['active'=>'competencies'])
<!-- page content -->
<div class="right_col" role="main">        
  <h1 class="main_heading m_t5 pull-left">
    <div class="circle main_heading_i"><img src="{{ url('images/icons/user-2.svg') }}"  class="svg" alt="ul icon"></div> <i class="fa fa-legal"></i> Unverified Competencies 
  </h1>
  <div class="clearfix m_t20"></div><div class="m_t20"></div>   
  <table id="unverifiedSkillsTable" class="display table" width="100%" cellspacing="0">  
    <thead>
      <th>S. NO</th>
      <th>Competency Name</th>
      <th style="min-width: 120px">Competency Type</th> 
      <th class="text-center width_80">Actions</th>
    </thead>  
  </table>

<!-- Confirmation Modal -->
<div class="modal fade" id="delet-employee" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body text-center inline_block">
        <div class="check circle"> 
          <img src="{{ url('images/icons/check.svg') }}" alt="check" class="svg" />
        </div>
        <h3>Are you sure to verify this Competency?</h3>   
        <div class="text-center m_t20 m_b20">             
          <a href="javascript:;"  class="close btn btn_primery l_btn delete_user">Ok</a>
          <button type="button" class="btn-curvy bg-gray" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>

  </div>
</div> 

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.delete_button',function(){
      var id=$(this).attr('data-id');
      $('.delete_user').attr('data-id',id);
    });

    $(document).on('click','.delete_user',function(){
      id=$(this).attr('data-id');
      $.ajax({
       url:'<?php echo url("skill/verify")?>',
       type:'POST',
       data:{
        _token:'<?php echo csrf_token(); ?>',
        id:id,
      },
      success: function(response)
      {
        $('#delet-employee').modal('hide');
        if($.isEmptyObject(response.error))
        {
          var table = $('#unverifiedSkillsTable').DataTable();
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
    
  });

</script> 

<style>
.im-modal table{height:500px; display: -moz-groupbox; }
.im-modal table tr {width: 100%; display: inline-table; table-layout: fixed; } 
.im-modal table tbody{overflow-y: scroll; height: 450px; position: absolute; margin-right: 0px; }
</style>
<script>
$(function() {
    $('#unverifiedSkillsTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        ajax: "{{ url('skill/unverifiedSkillsJson') }}",
        columns: [      
  {
    "data": "id",
    render: function (data, type, row, meta) {
     return meta.row + meta.settings._iDisplayStart + 1;
   }
 },             
 { "data": "skillName" },
 { "data": "skillTypeNameShort" },
 { mRender: function (data, type, row) 
  {
   var content = '<button type="button" data-id="'+row.id+'" class="btn btn_primary btn-sm delete_button" data-toggle="modal" data-target="#delet-employee" data-toggle="tooltip" data-placement="bottom" title="Verify"> <img src="{{ url('images/icons/check.svg') }}" class="svg" alt="trash"> </button>';
   return content ;  
 }},

 ],
    });
});
</script>


@endsection
