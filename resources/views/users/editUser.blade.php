<div>
  <div class="row">
    <div class="col-sm-12">
      <div class="form_heading">
        <h2>Basic Information</h2>
      </div>
    </div>
    <form id="editEmployee" class="tmarg">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="col-sm-3 m_b10">
        <div class="form-group">
          <label for="fname">First Name *</label>
          <input type="hidden" name="id" value="<?php echo $users[0]->id ?>" class="form-control" id="id">
          <input type="text" name="fname" required value="<?php echo $users[0]->fName ?>" class="form-control" id="fname_edit" placeholder="Enter First Name">
        </div>
      </div>
        <div class="col-sm-3 m_b10">
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" value="<?php echo $users[0]->lName ?>" class="form-control" id="lname_edit" placeholder="Enter Last Name">
          </div>
        </div>
        <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="lname">Employee Id  *</label> 
              <input type="text" class="form-control" name="employeeId" id="employeeId" required value="<?php echo $users[0]->employeeId ?>" placeholder="Enter Employee Id">
            </div>
          </div>
        <div class="col-sm-3 m_b10">
          <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" name="email" required value="<?php echo $users[0]->email ?>" class="form-control" id="email_id_edit" placeholder="Enter Email Address">
          </div>
        </div>
        <div class="col-sm-3 m_b10">
          <div class="form-group">
            <label for="mobile">Mobile No.</label>
            <input type="text" name="mobileNo"  class="form-control" value="<?php echo $users[0]->mobileNo ?>"  id="mobile_edit" placeholder="Enter Mobile No.">
          </div>
        </div>
@if($users[0]->id!=1)
<div class="clearfix"></div>
<div class="col-sm-12">
  <div class="form_heading">
    <h2>Role Information</h2>
  </div>
</div>
<div class="clearfix"></div>
<!-- <div class="col-sm-6 m_b20 form-group">
<?php // $unitId=$users[0]->unitId;$divisionId=$users[0]->divisionId;$departmentId=$users[0]->departmentId;
// $subDepartmentId=$users[0]->subDepartmentId;
?>
</div> -->
<div class="col-sm-3 m_b20 form-group">
  <label>Unit * </label> {!! Form::select('unitId', $unit,$users[0]->unitId, array('class' => 'chosen-select form-control removeFormDiv','id'=>'unitId_edit',  
  'onChange'=>"nestedDropdown(this,'getDivisionOption','divisionId_edit',4,'Select Division')" )) !!}
</div>
<div class="col-sm-3 m_b20 form-group">
  <label>Division *</label> {!! Form::select('divisionId',$division,$users[0]->divisionId, array('class' => 'chosen-select form-control ndd4 removeFormDiv','id'=>'divisionId_edit',  
  'onChange'=>"nestedDropdown(this,'getDepartmentOption','departmentId_edit',3,'ndd','Select Department')" )) !!}
</div>
<div class="col-sm-3 m_b20 form-group">
  <label>Department *</label> {!! Form::select('departmentId',$department,$users[0]->departmentId, array('class' => 'chosen-select form-control ndd3 removeFormDiv','id'=>'departmentId_edit',  
  'onChange'=>"nestedDropdown(this,'getSubDepartmenOption','subDepartmentId_edit',2,'ndd','Select Sub Department')" )) !!}
</div>
<div class="col-sm-3 m_b20 form-group">
  <label>Sub Department *</label> {!! Form::select('subDepartmentId',$subDepartment,$users[0]->subDepartmentId, array('class' => 'chosen-select form-control ndd2 removeFormDiv','id'=>'subDepartmentId_edit',  
  'onChange'=>"nestedDropdown(this,'getJobRoleOption','jobRoleId_edit',1,'ndd','Select Role')" )) !!}
</div>       

<div class="col-sm-3 m_b20 form-group">
  <label>Role *</label> {!! Form::select('jobRoleId',$job_roles,$users[0]->jobRoleId, array('class' => 'chosen-select form-control ndd1','id'=>'jobRoleId_edit')) !!}
</div> 

<div class="col-sm-3 m_b20 form-group">
  <label for=" ">Reporting To * </label>
  <select  data-placeholder="Select Industry" name="reportingToId" class="<?php if($users[0]->id!=1){ echo 'required'; } ?>  chosen-select form-control">
    <option value="" >select</option>
    @foreach($user_result as $user)
    <option value="{{$user->id}}" @if($user->id==$users[0]->reportingToId){{ 'selected' }} @endif >{{$user->name}}</option>
    @endforeach
  </select>
</div>
<div class="col-sm-3 m_b20">
  <div class="form-group">
    <label for=" ">Role Type*</label>
    <select  data-placeholder="Select Industry" name="role_id" class="required chosen-select form-control">
      <option value="" >select</option>
      @foreach($roles as $role)
      <option value="{{$role->id}}" @if($role->user_id>0) {{ "selected" }} @endif  >{{$role->name}}</option>
      @endforeach
    </select>
  </div>
</div>
@endif
<div class="col-sm-12 text-right m_t20 m_b20">
  <button class="bg-red btn-curvy"> Submit </button>
</div>
</form>
</div>
</div>
<script type="text/javascript">
 /* $("#editEmployee").validate();
  $('#unitId_edit').trigger('change');
  $('#divisionId_edit').trigger('change');
  $('#unitId_edit').trigger('change');
  $('#unitId_edit').trigger('change');*/
</script>

