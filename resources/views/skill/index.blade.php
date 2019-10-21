@extends('layouts.main')
@section('content')
<script type="text/javascript" src="{{ url('/js/jquery.validate.js') }}"></script>
@include('layouts.mastermenu', ['active'=>'competencies'])
<!-- page content -->
<div class="right_col" role="main">        
  <h1 class="main_heading m_t5 pull-left">
    <div class="circle main_heading_i"><img src="{{ url('images/icons/user-2.svg') }}"  class="svg" alt="ul icon"></div> <i class="fa fa-legal"></i> Competencies 
  </h1>
  <div class="pull-right add_new">
    <a href="javascript:;" onclick="$('#add-competencies').show(200);;" class="btn bg-gray s_btn btn-shadow"  alt="ul icon"> Add New</a>
  </div>
  <div class="clearfix m_t20"></div><div class="m_t20"></div>   
  <table id="users-table" class="display table" width="100%" cellspacing="0">  
    <thead>
      <th>S. NO</th>
      <th>Competency Name</th>
      <th style="min-width: 120px">Competency Type</th> 
      <th >Verified</th> 
      <th class="text-center width_120">Actions</th>
    </thead>  
  </table>

  <!--Add Modal -->
  <div id="add-competencies" class="addDegree im-modal" role="dialog" style="display: none;"> 
    <div class="im-modal-header">
      <a href="javascript:;" onclick="$('#add-competencies').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
      <h5 class="im-modal-title">Add New Competency</h5>
    </div>
    <div class="im-modal-body m_t30">
      <div class="row">          
        <form id="addSkill" class="tmarg">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
          <div class="col-sm-6 m_b20">
            <div class="form-group">
              <label for="fname">Skill Name *</label>
              <input type="text" class="form-control" name="skillName" id="f_nm" placeholder="Enter Skill Name" required>
            </div>
          </div>          
          <div class="col-sm-6 m_b20">
            <div class="form-group">
              <label for=" ">Skill Type *</label>
              
              <select  required data-placeholder="Select Industry" name="skillTypeId" class="required chosen-select form-control">
                <option value="" >select</option>
                @foreach($skill as $s)
                <option value="{{$s->id}}" >{{$s->skillTypeName}}</option>
                @endforeach
              </select>
            </div>
          </div>    
          <!-- <div class="col-sm-4 m_b20">
            <div class="form-group">
              <label for="fname">Sort Order*</label>
              <input type="text" required class="form-control" name="so" id="f_so" placeholder="Enter Sorting Order" value="1000">
            </div>
          </div>  -->
          <div class="col-sm-12">
          <div class="data_hideshow  m_b20"><i class="fa fa-user" aria-hidden="true"></i> Click to assign this skill for roles</div>
            <div class="form-group">
              <table id="tblJobRole" class="display table" width="100%" cellspacing="0">  
                <thead>
                 <th>
                 <div class="header_chk">
                 <div class="inline_block1">
                    <input type="checkbox" id="checkedAll" value="1" name="checkedAll">
                    <label for="checkedAll"> </label>
                 </div></div>
                 </th>
                  <th>Job Role</th>  
                  <th>Sub Department</th> 
                  <th>Department</th>  
                  <th>Division</th>      
                </thead>  
              </table>
            </div>
          </div> 
          <div class="col-sm-12 text-right m_t20">
            <a href="javascript:;" onclick="$('#add-competencies').hide(200);" class="btn-curvy bg-sky mr10"> Cancel </a>
            <button class="btn-curvy bg-red"> Submit </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="edit-skill1" class="addDegree im-modal" role="dialog" style="display: none;"> 
    <div class="im-modal-header">
      <a href="javascript:;" onclick="$('#edit-skill1').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
      <h5 class="im-modal-title">Edit Competency Details</h5>
    </div>
    <div class="im-modal-body m_t30" id="edit-skill">
    </div>
  </div>

</div>
</div>

<!--Edit Modal -->

<!-- <div id="edit-skill" class="modal fade" role="dialog"></div> -->
<!-- Confirmation Delete Modal -->
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

<!-- Confirmation Verify Modal -->
<div class="modal fade" id="verify-employee" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body text-center inline_block">
        <!-- <div class="check circle"> 
          <img src="{{ url('images/icons/check.svg') }}" alt="check" class="svg" />
         <i class="fa fa-info" aria-hidden="true"></i>
        </div> -->
        <h3 class="m_b10 m_t30">Newly Verified Competency</h3> 
        <div class="col-md-4 text-left p_t10">
          <label>New Competency :</label>
        </div>
        <div class="col-md-8 text-left">
          <input type="hidden" name="competencyTypeId" id="competencyTypeId" value=""/> 
          <input type="text" name="competencyNewName" id="competencyNewName" value="" class="form-control" /> 
        </div>
        <div class="clearfix"></div>
        <!-- <h4 class="m_t20">OR</h4> -->
        <div class="m_t20 text-left">
          <div class="col-md-12">
            
            <input type="checkbox" name="isMergeCompetency" id="isMergeCompetency" value="1" >
            <label for="isMergeCompetency"> </label>  
            <label style="margin-right: 5px">Or Merge With Existing Competency</label>  
          </div>
          <div class="clearfix"></div>
          <div class="col-md-4 text-left p_t20">
            <label>Existing Competency :</label>
          </div>   
          <div class="col-md-8 text-left">
            <div class="m_t10 m_b30">   

              <select name="mergeCompetencyId" id="mergeCompetencyId" class="chosen-select form-control" disabled="disabled">
                <optgroup label="Technical">
                @foreach ($skillOptions as  $option)
                  @if($option['skillTypeId'] == 1)
                    <option value="{{ $option['id'] }}">{{ $option['skillName'] }}</option>
                  @endif
                @endforeach  
                </optgroup>
                <optgroup label="CBS">
                @foreach ($skillOptions as  $option)
                  @if($option['skillTypeId'] == 2)
                    <option value="{{ $option['id'] }}">{{ $option['skillName'] }}</option>
                  @endif
                @endforeach
                </optgroup>
                <optgroup label="Computer">
                @foreach ($skillOptions as  $option)
                  @if($option['skillTypeId'] == 3)
                    <option value="{{ $option['id'] }}">{{ $option['skillName'] }}</option>
                  @endif
                @endforeach
                </optgroup>
              </select> 
            </div>
          </div>
        </div>     
        <br>      
        <div class="text-center m_t20 m_b20">             
          <a href="javascript:;"  class="close btn btn_primery l_btn verify_user">Ok</a>
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

<!-- Toggle button code -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#tblJobRole').DataTable({
      processing: true,
      serverSide: true,
      pageLength: 50,
      ajax: "{{ url('jobrole/getJobRoleJson') }}",
      columns: [      
        { 
          mRender: function (data, type, row) 
          {
            var content = '<div class="inline_block1"><input class="multi_check" type="checkbox" name="jobRoleIds[]" value="'+row.id+'" id="jobRoleId'+row.id+'" /><label for="jobRoleId'+row.id+'"> </label></div>';
            return content ;  
          },
          orderable: false
        },          
        { "data": "jobRoleName" },
        { "data": "subDepartmentName" },
        { "data": "departmentName" },
        { "data": "divisionName" }
      ],
    });
  });


</script>

<script type="text/javascript">
 $(document).ready(function() {        
  $(document).on('submit','#addSkill',function(){ 
   $.ajax({
     type: "post",
     url:"add",
     data:new FormData(this),
     contentType: false,       
     cache: false,           
     processData:false,
     success: function(data)
     { 
      if($.isEmptyObject(data.error))
      {
        //alert();
        //$('#tblCompaney').DataTable.reload();
        $('#addSkill')[0].reset(); 
        $(".chosen-select").trigger("chosen:updated");    
        $('.im-close').trigger("click"); 
        //$('#add-employee').modal('hide');
        
        var table = $('#users-table').DataTable();
        table.draw(); 
        var table = $('#tblCompaney').DataTable();
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
     url:"skill/update",
     data:new FormData(this),
     contentType: false,       
     cache: false,           
     processData:false,
     success: function(data)
     { 
        if($.isEmptyObject(data.error))
        {
          $('#addSkill')[0].reset(); 
          $(".chosen-select").trigger("chosen:updated");    
          $('.im-close').trigger("click"); 
          var table = $('#users-table').DataTable();
          table.draw(); 
          var table = $('#tblCompaney').DataTable();
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
       url:'<?php echo url("skill/delete")?>',
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
         var table = $('#users-table').DataTable();
          table.draw(); 
         var table = $('#tblCompaney').DataTable();
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

    $(document).on('click','.verify_button',function(){
      var id=$(this).attr('data-id');
      $('.verify_user').attr('data-id',id);
      $('#competencyNewName').val($(this).attr('competency-name'));
      $('#competencyTypeId').val($(this).attr('competency-type'));
    });

    $(document).on('click','.verify_user',function(){
      id=$(this).attr('data-id');
      var isMergeCompetency = 0 ;
      var label = 'Computer';
      if($('#competencyTypeId').val() == 1 )
      {
        label = 'Technical';
      }
      else if($('#competencyTypeId').val() == 2 )
      {
        label = 'CBS';
      }
      if($("#isMergeCompetency").is(':checked'))
      {
        isMergeCompetency = 1 ;
      }
      $.ajax({
       url:'<?php echo url("skill/verify")?>',
       type:'POST',
       data:{
        _token:'<?php echo csrf_token(); ?>', id:id , competencyNewName : $('#competencyNewName').val() , mergeCompetencyId : $('#mergeCompetencyId').val() , isMergeCompetency : isMergeCompetency
      },
      success: function(response)
      {
        $('#verify-employee').modal('hide');
        if($.isEmptyObject(response.error))
        {
          var table = $('#users-table').DataTable();
          table.draw(); 

          $("#mergeCompetencyId").find('optgroup[label="'+label+'"]').append('<option value="'+id+'">'+$('#competencyNewName').val()+'</option>');

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
               url:"skill/edit",
               type: "post",
               dataType: "html",
               data:{"_token": "{{ csrf_token() }}",'id':id  } ,
               success:function(data) {
                 $("#edit-skill").html(data);
                 $("#editEmployee").validate();
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

    $("#addSkill").validate();

    $(".chosen-select").chosen();
    $('.chosen-container').css('width', '100%');

    $(document).on('click','#checkedAll',function(){
      if($(this).is(":checked")){
        $(".multi_check").prop("checked", true);
      }
      else if($(this).is(":not(:checked)")){
        $(".multi_check").prop("checked", false); 
      }
    });

  });

  $(document).on('click','.data_hideshow',function(){
    $("#tblJobRole_wrapper, #tblJobRole_filter, #tblJobRole_info").slideToggle("fast");
    //$(".data_hideshow i").toggleClass("fa-toggle-down fa-toggle-up")
  });
  $(document).on('click','.data_hideshow1',function(){
    $("#tblEditJobRole").slideToggle("fast");
    //$(".data_hideshow1 i").toggleClass("fa-toggle-down fa-toggle-up")
  });
  

  //go to top page
  $(document).on('click', '.gototop-link', function(){
      $('html,body').animate({scrollTop: $("#edit-skill1").offset().top-70},'slow');
  });


  $(document).on('change','#isMergeCompetency',function(){ 
    if($("#isMergeCompetency").is(':checked'))
    {
      $('#competencyNewName').attr('disabled', 'disabled');
      $('#mergeCompetencyId').removeAttr('disabled');  
    }
    else
    {
      $('#mergeCompetencyId').attr('disabled', 'disabled');
      $('#competencyNewName').removeAttr('disabled');
    }
    $('#mergeCompetencyId').trigger('chosen:updated');
  }); 

</script>

<style>
.im-modal table{height:500px; display: -moz-groupbox; }
.im-modal table tr {width: 100%; display: inline-table; table-layout: fixed; } 
.im-modal table tbody{overflow-y: scroll; height: 450px; position: absolute; margin-right: 0px; }
</style>
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        "order": [[ 4, "ASC" ]],
        ajax: "{{ url('skill/detail') }}",
        columns: [      
        {
          "data": "id",
          render: function (data, type, row, meta) {
           return meta.row + meta.settings._iDisplayStart + 1;
         }
       },             
       { "data": "skillName" },
       { "data": "skillTypeNameShort" },
       //{ "data": "statusYN" },
       { mRender: function (data, type, row) 
        {
          var content ='';
          if(row.isApproved == 0)
          {
            content = '<button type="button" data-id="'+row.id+'" competency-name="'+row.skillName+'" competency-type="'+row.skillTypeId+'" class="btn btn_primary btn-sm verify_button edit_record" data-toggle="modal" data-target="#verify-employee" data-toggle="tooltip" data-placement="bottom" title="Not Verified"> <i class="fa fa-circle-o"></i> </button>';
          }
          else
          {
            content = '<button  class="no_btn" title="Verified"> <i class="fa fa-check-circle-o" ></i> </button>';
          }
          
         return content ;  
       }},
       { mRender: function (data, type, row) 
        {
          var content ='';
          // if(row.isApproved == 0)
          // {
          //   content = '<button type="button" data-id="'+row.id+'" competency-name="'+row.skillName+'" competency-type="'+row.skillTypeId+'" class="btn btn_primary btn-sm verify_button edit_record" data-toggle="modal" data-target="#verify-employee" data-toggle="tooltip" data-placement="bottom" title="Verify"> <img src="{{ url('images/icons/check.svg') }}" class="svg" alt="trash"> </button>';
          // }
          content += '<a href="javascript:;" onclick="$(\'#edit-skill1\').show(200);" class="btn bg-orange btn-sm edit_record gototop-link" id="editForm" data-id="'+row.id+'"  alt="ul icon"><img title="Edit" src="images/icons/edit_1.svg" class="svg" alt="edit"> </a> <button type="button" data-id="'+row.id+'" class="btn btn_primary btn-sm delete_button" data-toggle="modal" data-target="#delet-employee" data-toggle="tooltip" data-placement="bottom" title="Delete"> <img src="images/icons/trash.svg" class="svg" alt="trash"></button>';
         return content ;  
       }},
       ],
       columnDefs: [ {
            "targets": 4,
            "className": "text-center"
        }]
    });
});

</script>
@endsection
