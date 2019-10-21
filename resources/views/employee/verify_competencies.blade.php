@extends('layouts.main')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="pos_fix prof_area">
    <div class="container_fluid" style="overflow-x: hidden;">
      <div class="circle profileimg">
        <img alt="proline name" src="{{asset('public/profile_image/'.$employee->image)}}">
      </div>
      <div class="h_550 sementic-space">
        <div class="text-center m_b30">
          <div class="employee_nm">{{ $employee->name }}</div>
          <div class="">  {{ $employee->jobRoleName }}</div>
        </div>
        <div class=" m_b30">
        
          <table class="table">
            <tr>
              <th>Employee Id</th>
              <td>{{ $employee->employeeId }}</td> 
            </tr>
            <tr>
              <th>Business Unit</th>
              <td>  {{ $employee->unitName }}  </td>
            </tr>
             <tr>
              <th>Division</th>
              <td>  {{ $employee->divisionName }}  </td>
            </tr>
             <tr>
              <th>Department</th>
              <td>  {{ $employee->departmentName }}  </td>
            </tr>
             <tr>
              <th>Sub Department</th>
              <td>  {{ $employee->subDepartmentName }}  </td>
            </tr>
             <tr>
              <th>Roporting To</th>
              <td>  {{ $employee->reportingToName }}  </td>
            </tr>
            <tr>
              <th>Highest Qualification</th>
              <td>
              <?php
                $userSpecialization =  \Auth::user()::userSpecialization($employee->id) ;
                foreach ($userSpecialization as $specialization) 
                {
                  echo $specialization['qualificationName']." - ".$specialization['degreeName']." - ",$specialization['specializationName'] ."<br>";
                }
              ?>
              </td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $employee->email }}</td>
            </tr>
            <tr>
              <th>Phone</th>
              <td>{{ $employee->mobileNo }}</td>
            </tr>
          </table>
        </div>
      </div>
    <div class="text-center container-fluid">
      <!-- <a href="#" class="btn btn-block bg-red">Profile</a> -->
    </div>
  </div>    
</div> <!--left siderbar-->


<p class="m_t10">Competencies Verification of<strong> {{ $employee->name }}</strong></p>


{!! Form::open(array('route' => 'employee/storeVerifiedCompetency','method'=>'POST')) !!}
{{ csrf_field() }}
{!! Form::hidden('employeeId', $employee->id, array('id'=>'employeeId')) !!}
{!! Form::hidden('employeeName', $employee->name, array('id'=>'employeeName')) !!}
<div class="row">
  <div class="col-sm-12">
   <div class="form_heading fh-inverse">
    <h2> Computer </h2>
  </div>
  <div id="other_details" class="panel panel-default m_b30">
    <div class="panel-body p_t20">
      <div class="table-responsive row">
        <table class="table border_t0">
          <tr>
            <th> </th>
            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
            <th class="w_12p text-center">
             {{ $comepetencyLevel->comepetencyLevelName }} </th>
             <?php } ?>
           </tr>
           <tr>
            <?php foreach ($skills as $skill) { 
              if($skill->skillTypeId == 3 && ( $skill->isApproved == 0 || $skill->comepetencyLevelId != $skill->comepetencyLevelIdTemp ) ) {   
                ?>
                <tr>
                 <td> 
                  <span class="skill_name_span{{ $skill->id }}" =""> {{ $skill->skillName }}</span>
                 @if( $skill->isManagerApproved == 0 ) 
                    <a alt="ul icon" skillId="{{ $skill->id }}" competency-type="{{ $skill->skillTypeId }}"  skillName="{{ $skill->skillName }}" class="btn btn-sm edit_skill" href="javascript:;"><img alt="edit" class="svg" src="{{ url('images/icons/edit_1.svg') }}" title="Edit"> </a>
                  @endif
                  <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                </td>
                <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                <td class="text-center">
                  <div class="inline_block1">
                    <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" value="{{ $comepetencyLevel->id }}"@if($comepetencyLevel->id == $skill->comepetencyLevelIdTemp) checked="" @endif>
                    <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                  </div>
                </td>
                <?php } ?>
              </tr> 
              <?php }} ?>
            </table>
          </div>
        </div>
      </div>
      <div class="form_heading fh-inverse">
        <h2> Technical Competencies </h2>
      </div>
      <div id="techinical_competencies" class="panel panel-default m_b30">


        <div class="panel-body p_t20">
          <div class="table-responsive row">
            <table class="table border_t0">
              <tr>
                <th> </th>
                <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                <th class="w_12p text-center">
                 {{ $comepetencyLevel->comepetencyLevelName }} </th>
                 <?php } ?>
               </tr>
               <tr>
                <?php foreach ($skills as $skill) { 
                  if($skill->skillTypeId == 1 && ( $skill->isApproved == 0 || $skill->comepetencyLevelId != $skill->comepetencyLevelIdTemp ) ) {   
                    ?>
                    <tr>
                     <td>
                      <span class="skill_name_span{{ $skill->id }}" =""> {{ $skill->skillName }}  </span>
                      @if( $skill->isManagerApproved == 0 ) 
                        <a alt="ul icon" skillId="{{ $skill->id }}"  skillName="{{ $skill->skillName }}"  competency-type="{{ $skill->skillTypeId }}"   class="btn btn-sm edit_skill" href="javascript:;"><img alt="edit" class="svg" src="{{ url('images/icons/edit_1.svg') }}" title="Edit"> </a>
                      @endif
                      <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                    </td>
                    <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                    <td class="text-center">
                      <div class="inline_block1">
                        <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelIdTemp) checked="" @endif >
                        <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                      </div>
                    </td>
                    <?php } ?>
                  </tr> 
                  <?php }} ?>
                </table>
              </div>
            </div>
          </div>
          <div class="form_heading fh-inverse">
            <h2> Behavioral Competency  <span class="sml-text">(Critical Behaviors of Success)</span> </h2>
          </div>
          <div id="behavioral_competency" class="panel panel-default m_b30">

            <div class="panel-body p_t20">
              <div class="table-responsive row">
                <table class="table border_t0">
                  <tr>
                    <th> </th>
                    <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                    <th class="w_12p text-center">
                     {{ $comepetencyLevel->comepetencyLevelName }} </th>
                     <?php } ?>
                   </tr>
                   <tr>
                    <?php foreach ($skills as $skill) { 
                      if($skill->skillTypeId == 2 && ( $skill->isApproved == 0 || $skill->comepetencyLevelId != $skill->comepetencyLevelIdTemp ) ) {   
                        ?>
                        <tr>
                         <td>
                          <span class="skill_name_span{{ $skill->id }}" =""> {{ $skill->skillName }}  </span>
                          @if( $skill->isManagerApproved == 0 ) 
                            <a alt="ul icon" skillId="{{ $skill->id }}"  skillName="{{ $skill->skillName }}" competency-type="{{ $skill->skillTypeId }}" class="btn btn-sm edit_skill" href="javascript:;"><img alt="edit" class="svg" src="{{ url('images/icons/edit_1.svg') }}" title="Edit"> </a>
                          @endif
                          <input type="hidden" name="skills[]" value="{{ $skill->id }}" >

                        </td>
                        <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                        <td class="text-center">
                          <div class="inline_block1">
                            <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelIdTemp) checked="" @endif>
                            <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                          </div>
                        </td>
                        <?php } ?>
                      </tr> 
                      <?php }} ?>
                    </table>
                  </div>
                </div>
              </div> 
              <div class="col-sm-12 text-center m_b50">
                <button type="submit" name="verified" class="btn-curvy bg-red" >  Verify</button> 

              </div>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /page content -->
  <!-- Modal code -->
  <div id="edit-skill" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="{{ url('images/icons/close.svg') }}" alt="close" class="svg close"></button>
          <h4 class="modal-title">Edit Competency</h4>
        </div>
        <div class="modal-body text-center inline_block">
          
          <div class="col-md-4 text-left p_t10">
            <label>New Competency :</label>
          </div>
          <div class="col-md-8 text-left">
            <input type="hidden" name="skillId" id="skillId" value="" >
            <input type="hidden" name="competencyTypeId" id="competencyTypeId" value=""/> 
            <input type="text" name="competencyNewName" class="form-control" id="competencyNewName" value="" >
          </div>
          <div class="clearfix"></div>
            <!-- <h4 class="m_t20">OR</h4> -->
            <div class="m_t20 text-left">
              <div class="col-md-8 col-md-offset-4">
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
                    <select name="mergeCompetencyId" id="mergeCompetencyId" class="chosen-select form-control" disabled="disabled"  required="required" >
                    <option value="">Select</option>
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
                <div class="col-md-12 text-left">
                  <label class="error_txt1 mearg_error"></label>
                </div>
              </div>
               <br>   
            <div class="text-center m_t20 m_b20">    
              <button type="button" id="edit_skill_btn" class="btn-curvy bg-red"> Update </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','.edit_skill',function(){
        $('#skillId').val($(this).attr('skillId')); 
        $('#competencyNewName').val($(this).attr('skillName'));
        $('#competencyTypeId').val($(this).attr('competency-type'));

        $('#mergeCompetencyId').attr('disabled', 'disabled');
        $('#competencyNewName').removeAttr('disabled');
        $(".mearg_error").html('');
        $('#mergeCompetencyId').val('');
        $('#mergeCompetencyId').trigger("chosen:updated");

        $('#isMergeCompetency').prop('checked', false);

        $("#edit-skill").modal('show');            
      }); 

      $(document).on('click','#edit_skill_btn',function(){
        var skillId = $('#skillId').val(); 
        var skillName = $('#competencyNewName').val();
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
          if($('#skillId').val() == '')
          {
            showMessage("Please Select Competency!", 'danger',5000000);
            return false ;
          }
          
        }
        $.ajax({
          url:"{{ url('skillNameUpdate') }}",
          type: "post",
          dataType: "json",
          data:{"_token": "{{ csrf_token() }}" , id : skillId , skillName : skillName , mergeCompetencyId : $('#mergeCompetencyId').val() , isMergeCompetency : isMergeCompetency  , newLevel : $("input[name='skill"+skillId+"']:checked").val() } ,
          success:function(data) 
          {
            if($.isEmptyObject(data.error))
            {
              if(isMergeCompetency == 1)
              {
                location.reload();
              }
              else
              {
                $('.skill_name_span'+skillId).html(skillName);  
                var edit_skill = $('.edit_skill[skillId="'+skillId+'"]');
                edit_skill.attr('skillName',skillName)
                showMessage(data.success, 'success',10000);
                $("#edit-skill").modal('hide');
              }
            }
            else
            {
              showMessage(data.error[0], 'danger',5000000);
            } 
          },
          dataType:"json"
        }); 
                
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
          $(".mearg_error").html('');
          $('#mergeCompetencyId').val('');
          $('#mergeCompetencyId').trigger("chosen:updated");

        }
        $('#mergeCompetencyId').trigger('chosen:updated');
      }); 

      $(".chosen-select").chosen();
    $('.chosen-container').css('width', '100%');

    $(document).on('change','#mergeCompetencyId',function(){ 
      $("#edit_skill_btn").attr("disabled", true);
      $.ajax({
          url:"{{ url('skill/isUserHasCompetency') }}",
          type: "post",
          dataType: "json",
          data:{"_token": "{{ csrf_token() }}" , skillId : $(this).val() , 
          employeeId : $('#employeeId').val() , employeeName : $('#employeeName').val() , oldSkillName : $("#mergeCompetencyId :selected").text() , newSkillName : $("#competencyNewName").val() , newLevel :  $("input[name='skill"+$('#skillId').val()+"']:checked").val() } ,
          success:function(data) 
          {
            if($.isEmptyObject(data.error))
            {
              $(".mearg_error").html(data.success);
              $("#edit_skill_btn").removeAttr("disabled");
            }
            else
            {
              showMessage(data.error[0], 'danger',5000000);
            } 
          },
          dataType:"json"
        }); 
    });
    
      
    });

  </script>



</script> 
@endsection