@extends('layouts.main')
@section('content')
<script type="text/javascript" src="{{ url('/js/jquery.validate.js') }}"></script>
@include('layouts.mastermenu', ['active'=>'users'])
<!-- page content -->
<div class="right_col" role="main">  

  <h1 class="main_heading m_t5 pull-left">
    <div class="circle main_heading_i"><img src="{{ url('images/icons/user-2.svg') }}"  class="svg" alt="ul icon"></div> <i class="fa fa-users"></i> Users 
  </h1>
  <div class="pull-right add_new">
    <a href="javascript:;" onclick="$('#add-employee').show(200);" class="btn bg-gray s_btn btn-shadow add-employee-form"  alt="ul icon"> Add New</a>
  </div>
  <div class="clearfix m_t20"></div><div class="m_t20"></div>     
  

  <table class="table display" id="users-table">
    <thead>
      <tr>
        <th class="width_30">S.N.</th>
        <th>Full Name</th>
        <th>Contact Details</th>
        <th CLASS="width_100">Reporting To</th>
        <th>User Type</th>
        <th class="width_80 text-center">Actions</th>
      </tr>
    </thead>
  </table>

  
  <div class="no-record text-center" style="display: none;">
    <img src="{{ url('images/no-record.png') }}" width="200">
    <h5 class="text-muted">No record found</h5>
  </div>

<!--Add Modal -->
  <div id="add-employee" class="addUser im-modal" role="dialog" style="display: none;"> 
    <div class="im-modal-header">
      <a href="javascript:;" onclick="$('#add-employee').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
      <h5 class="im-modal-title">Add New Employee</h5>
    </div>
    <div class="im-modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form_heading">
            <h2>Basic Information</h2>
          </div>
        </div>
        <form id="addEmployee" class="tmarg" style="display: inline-block; width: 100%">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="fname">First Name *</label>
              <input type="text" required class="form-control" name="fname" id="f_nm" placeholder="Enter First Name">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="lname">Last Name</label> 
              <input type="hidden" class="form-control" name="userId" id="e_id" placeholder="Enter Last Name">
              <input type="text" class="form-control" name="lname" id="l_nm" placeholder="Enter Last Name">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="lname">Employee Id  *</label> 
              <input type="text" class="form-control" name="employeeId" id="employeeId" required placeholder="Enter Employee Id ">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="email">Email Address *</label>
              <input type="email" required class="form-control" name="email" id="e_id" placeholder="Enter Email Address">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="mobile">Mobile No.</label>
              <input type="text" class="form-control" name="mobileNo" id="m_no" placeholder="Enter Mobile Number">
            </div>
          </div>
          <div class="col-sm-12" style="display: none;">
            <div class="form_heading">
              <h2>Language Proficiency</h2>
            </div>
            <div class=" panel panel-default m_b0" id="other_details">
              <div class="panel-body p_t20">
                <div class="table-responsive row">
                  <table class="table border_t0">
                    <tr>
                      <th> </th>
                      <th class="w_15p text-center">Read</th>
                      <th class="w_15p text-center">Write</th>
                      <th class="w_15p text-center">Speak</th>
                      <th class="w_15p text-center">Understand</th>
                    </tr>

                    <?php foreach ($languages as $language) { ?>
                    <tr>
                      <td>    
                        {{ $language->languageName }}
                        <input type="hidden" name="language[]" id="language{{ $language->id }}" value="{{ $language->id }}" >
                      </td>
                      <td class="text-center">
                        <div class="inline_block1">
                          <input type="checkbox" name="lanngRead{{ $language->id }}"  id="lanngRead{{ $language->id }}" value="1">
                          <label for="lanngRead{{ $language->id }}"> </label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="inline_block1">
                          <input type="checkbox" name="lanngWrite{{ $language->id }}" id="lanngWrite{{ $language->id }}"  value="1" >
                          <label for="lanngWrite{{ $language->id }}"> </label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="inline_block1">
                          <input type="checkbox" name="lanngSpeak{{ $language->id }}" id="lanngSpeak{{ $language->id }}" value="1" >
                          <label for="lanngSpeak{{ $language->id }}"> </label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="inline_block1">
                          <input type="checkbox" name="lanngUnderstand{{ $language->id }}" id="lanngUnderstand{{ $language->id }}" value="1" >
                          <label for="lanngUnderstand{{ $language->id }}"> </label>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>            
          <div class="clearfix"></div>
          <div class="col-sm-12">
            <div class="form_heading">
              <h2>Role Information</h2>
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Unit *: </label>
              {!! Form::select('unitId', $unit,NULL, array('required'=>true,'class' => 'chosen-select form-control removeFormDiv','id'=>'unitId',  
              'onChange'=>"nestedDropdown(this,'getDivisionOption','divisionId',4,'Select Division')" )) !!}
            </div>  
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Division *: </label> 
              {!! Form::select('divisionId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd4 removeFormDiv','id'=>'divisionId',  
              'onChange'=>"nestedDropdown(this,'getDepartmentOption','departmentId',3,'ndd','Select Department')" )) !!}
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Department *: </label> 
              {!! Form::select('departmentId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd3 removeFormDiv','id'=>'departmentId',  
              'onChange'=>"nestedDropdown(this,'getSubDepartmenOption','subDepartmentId',2,'ndd','Select Sub Department')" )) !!}
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label> Sub Department *: </label> 
              {!! Form::select('subDepartmentId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd2 removeFormDiv','id'=>'subDepartmentId',  
              'onChange'=>"nestedDropdown(this,'getJobRoleOption','jobRoleId',1,'ndd','Select Role')" )) !!}
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label> Role *:</label> 
              {!! Form::select('jobRoleId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd1','id'=>'jobRoleId')) !!}
            </div>
          </div>

          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Reporting To *</label>
              <select  data-placeholder="Select Industry" name="reportingToId" id="manager" class="required chosen-select form-control">
                <option value="" >select</option>
                @foreach($user_result as $user)
                <option value="{{$user->id}}" >{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for=" ">Role Type *</label>
              <select  data-placeholder="Select Industry" name="role_id" class=" required chosen-select form-control">
                <option value="" >select</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" >{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="col-sm-12 text-right m_t20">
            <a href="javascript:;" onclick="$('#add-employee').hide(200);" class="btn-curvy bg-sky mr10"> Cancel </a>
            <button class="btn-curvy bg-red"> Submit </button>
          </div>
        </form>      
      </div>
    </div>
  </div>
  <!--Add Modal -->
  <div id="edit-employee1" class="addUser im-modal" role="dialog" style="display: none;">
      <div class="im-modal-header">
        <a href="javascript:;" onclick="$('#edit-employee1').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
        <h5 class="im-modal-title">Edit Employee Details</h5>
      </div>
      <div class="im-modal-body" id="edit-employee">

      </div>
  </div>
</div>

<!--Edit Employee -->
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
        url:"addNewEmployee",
        data:new FormData(this),
        contentType: false,       
        cache: false,           
        processData:false,
        success: function(data)
        { 
          if($.isEmptyObject(data.error))
          {
            showMessage(data.success, 'success',5000);
            var table = $('#users-table').DataTable();
            table.draw();
            $('#addEmployee')[0].reset(); 

            $('#manager').append($('<option>', {
                value: data.id,
                text: data.name
            }));
            

            $(".chosen-select").trigger("chosen:updated");    
            $('#add-employee').hide(); 
          }
          else
          {
            showMessage(data.error[0], 'danger');
          }
        }, 
        dataType:"json"
      }); 
      return false;
    }); 

    $(document).on('submit','#editEmployee',function(){ 
     $.ajax({
       type: "post",
       url:"user/employeeUpdate",
       data:new FormData(this),
       contentType: false,       
       cache: false,           
       processData:false,
       success: function(data)
       { 
        if($.isEmptyObject(data.error))
        {
          //$("#edit-employee").modal('hide');
          $(".im-close").trigger('click');
          showMessage(data.success, 'success',5000);
          var table = $('#users-table').DataTable();
          table.draw(); 
        }
        else
        {
          showMessage(data.error[0], 'danger');
        }
      },
      dataType:"json"
    }); 
     return false;
   }); 

    $(document).on('click','.add-employee-form',function(){ 
      $('#addEmployee')[0].reset(); 
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
        url:'<?php echo url("user/dl")?>',
        type:'POST',
        data:{ _token:'<?php echo csrf_token(); ?>', id:id },
        success: function(data)
        {
          if($.isEmptyObject(data.error))
          {
            $('#delet-employee').modal('hide');
            showMessage(data.success, 'success',5000);
            var table = $('#users-table').DataTable();
            table.draw();
          }
          else
          {
            showMessage(data.error[0], 'danger');
          }
        },
        dataType:'json',
      });
    });

    $(document).on('click','#editForm',function(){
     var id = $(this).attr('data-id');
     $.ajax({
       url:"user/edit",
       type: "post",
       dataType: "html",
       data:{"_token": "{{ csrf_token() }}",'id':id  } ,
       success:function(data) {
         $("#edit-employee").html(data);
         $("#editEmployee").validate();
         //$("#edit-employee").modal('show');
       },
       dataType:"html"
     });          
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
      $('html,body').animate({scrollTop: $("#edit-employee1").offset().top-70},'slow');
  });
</script>


<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        ajax: "{{ url('getUserDetail') }}",
        columns: [
            {
              "data": "id", render: function (data, type, row, meta) 
              { return meta.row + meta.settings._iDisplayStart + 1; }
            }, 
            { 
              mRender: function (data, type, row) 
              {
               var content = "<div><strong>"+row.name +"</strong> <small>("+row.employeeId +")</small></div><small class='light_gray_color'>"+row.jobRoleName+"</small>";
               return content ;  
             }
            },  
            { 
              mRender: function (data, type, row) 
              {
               var content = row.mobileNo+"<br />" +row.email;
               return content ;  
              }
            },  
            { "data": "reportingToName" },
            { "data": "roleName" },
            { 
              mRender: function (data, type, row) 
              {
               var id=row.id;
               var content = '<a href="javascript:;" id="editForm" onclick="$(\'#edit-employee1\').show(200);" class="btn bg-orange btn-sm edit_record gototop-link" data-id="'+row.id+'" alt="ul icon"><img src="images/icons/edit_1.svg" class="svg" alt="edit"></a> <button type="button" data-id="'+row.id+'" class="btn btn_primary btn-sm delete_button" data-toggle="modal" data-target="#delet-employee" data-toggle="tooltip" data-placement="bottom" title="Delet"> <img src="images/icons/trash.svg" class="svg" alt="trash"></button>';
               return content ;  
              }
            }
        ]
    });
});
</script>
@endsection
