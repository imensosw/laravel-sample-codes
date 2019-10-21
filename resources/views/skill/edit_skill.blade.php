<div>
  <div class="row">        
    <form id="editEmployee" class="tmarg">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="col-sm-6 m_b20">
        <div class="form-group">
          <label for="fname">Skill Name</label>
          <input type="hidden" name="id" value="<?php echo $skill[0]->id ?>" class="form-control" id="id">
          <input type="text" name="skillName" required value="<?php echo $skill[0]->skillName ?>" class="form-control" id="skillName_edit" placeholder="Enter skill Name">
        </div>
      </div>      
      <div class="col-sm-6 m_b20">
        <div class="form-group">
          <label for=" ">Skill Type</label>
          <select  data-placeholder="Select Industry" name="skillTypeId" class="required chosen-select form-control">
            <option value="" >select</option>
            @foreach($skill_id as $q)
            <option value="{{$q->id}}" @if($skill[0]->skillTypeId==$q->id) {{ "selected" }} @endif >{{$q->skillTypeName}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <!-- <div class="col-sm-4 m_b20">
        <div class="form-group">
          <label for="fname">Sort Order *</label>
          <input type="text" name="so" required value="<?php // echo $skill[0]->so ?>" class="form-control required " id="skillSo_edit" placeholder="Enter Sorting Order">
        </div>
      </div> -->
      <div class="col-sm-12">
        
          <div class="data_hideshow1 m_b20"><i class="fa fa-user" aria-hidden="true"></i> Click to assign this skill for roles</div>
          <div class="form-group">
          <table id="tblEditJobRole" class="display table" width="100%" cellspacing="0">  
            <thead>
              <th><input name="select_all" value="1" id="example-select-all" type="checkbox" />
              <div class="inline_block1"><input type="checkbox" name="select_all" value="123" id="editJobRoleId123" /><label for="editJobRoleId123"> </label></div>
            </th>
              <th class="sorting">Job Role</th>  
              <th>Department</th>  
              <th>Sub Department</th>  
              <th>Division</th>                         
            </thead>  
          </table>
          </div>
      </div>
      <div class="col-sm-12 text-right m_t20 m_b20">
        <button class="bg-red btn-curvy"> Submit </button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(document).on('click','#editJobRoleId123',function(){
    if($(this).is(":checked"))
    {
      $(".multi_check").prop("checked", true)
    }
    else if($(this).is(":not(:checked)"))
    {
      $(".multi_check").prop("checked", false)
    }
  });

$(document).ready(function() {
  $('#tblEditJobRole').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 50,
    ajax: 
    {
      url: "{{ url('jobrole/getJobRoleJson') }}",
      data: function (d) {
          d.skillId = "{{ $skill[0]->id }}" ;  
      }
    },
    //ajax: "{{ url('jobrole/getJobRoleJson/1') }}",
    columns: [      
      { mRender: function (data, type, row) 
        {
          var ckeck = '';
          if( row.jobRoleSkillRelId > 0 )
          {
            ckeck = "checked='checked'";
          }
          var content = '<div class="inline_block1"><input class="multi_check" type="checkbox" name="editJobRoleIds[]" value="'+row.id+'" id="editJobRoleId'+row.id+'" '+ckeck+'  /> <label for="editJobRoleId'+row.id+'" > </label></div>';
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