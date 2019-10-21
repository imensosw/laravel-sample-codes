@extends('layouts.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">

    <div class="width_25 pos_fix prof_area">
        @include('layouts.rightpanel_employee', [])
    </div>
  
                <h1 class="main_heading m_t10">My Competencies </h1>
             
          
           {!! Form::open(array('route' => 'storeEmployeeCompetency','method'=>'POST')) !!}
            {{ csrf_field() }}
          
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form_heading fh-inverse">
                            <h2>Language Proficiency</h2>
                        </div>
                        <div id="other_details" class="panel panel-default m_b0">                        
                            <div class="panel-body p_t0">
                                <div class="row">
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
                                                    <input type="checkbox" name="lanngRead{{ $language->id }}"  id="lanngRead{{ $language->id }}" value="1" @if($language->reading) checked="" @endif >
                                                    <label for="lanngRead{{ $language->id }}"> </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="inline_block1">
                                                    <input type="checkbox" name="lanngWrite{{ $language->id }}" id="lanngWrite{{ $language->id }}"  value="1" @if($language->writeing) checked="" @endif>
                                                    <label for="lanngWrite{{ $language->id }}"> </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="inline_block1">
                                                    <input type="checkbox" name="lanngSpeak{{ $language->id }}" id="lanngSpeak{{ $language->id }}" value="1" @if($language->speaking) checked="" @endif>
                                                    <label for="lanngSpeak{{ $language->id }}"> </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="inline_block1">
                                                    <input type="checkbox" name="lanngUnderstand{{ $language->id }}" id="lanngUnderstand{{ $language->id }}" value="1" @if($language->understanding) checked="" @endif>
                                                    <label for="lanngUnderstand{{ $language->id }}"> </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form_heading fh-inverse">
                              <h2>Highest Qualification <span>Choose your highest held qualification here</span></h2>
                            </div>
                        <div class="panel panel-default m_b30">                          
                            
                            <div class="panel-body p_t20">
                                <div id="divQualification" class="row m_t10">
                                <?php
                                foreach($userSpecializationRels as $data){
                                ?>
                                    @include('qualification.edit_more_qualification', [ 'no' => 1, 'randomNo' => mt_rand(1000000, 9999999), 'data' => $data , 'qualifications' => $qualifications ])
                                <?php } ?>   
                                </div>  
                                <a class="link-btn link-btn_1 addMoreQualification" href="javascript:;" onclick="addMoreQualification()">
                                    <i class="fa fa-plus"></i> Add More
                                </a>      
                            </div>    
                        </div>
                         <div class="form_heading fh-inverse">
                            <h2> Computer </h2>
                            </div>
                        <div id="other_details" class="panel panel-default m_b30">
                            <div class="panel-body p_t0">
                                <div class="row">
                                    <table class="table border_t0 computer">
                                        <tr>
                                            <th> </th>
                                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                 <th class="w_12p text-center">
                                                 {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                            <?php } ?>
                                            <th> </th>
                                        </tr>
                                        <tr>
                                        <?php foreach ($userComputerCompetency as $skill) { 
                                        ?>
                                        <tr>
                                           <td>{{ $skill->skillName }}
                                            <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                           </td>
                                            <?php 
                                            foreach ($comepetencyLevels as $comepetencyLevel) {    ?>
                                            <td class="text-center">
                                                <div class="inline_block1">
                                                    <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" value="{{ $comepetencyLevel->id }}"
                                                    @if( $skill->comepetencyLevelIdTemp > 0  && $skill->comepetencyLevelIdTemp == $comepetencyLevel->id )
                                                    checked="" 
                                                    @elseif( ! $skill->comepetencyLevelIdTemp > 0    &&$comepetencyLevel->id == $skill->comepetencyLevelId)
                                                    checked="" 
                                                    @endif
                                                    >
                                                    <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                                </div>
                                            </td>
                                            <?php } ?>
                                            <td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td>
                                        </tr> 
                                        <?php } ?>
                                    </table>
                                    <div class="col-sm-6"> 
                                        <label>Select the skills you want to add</label>
                                        {!! Form::select('skillId',$computerCompetency ,null, array('class' => 'chosen-select form-control skill','id'=>'computer','goTo'=>"getJobRoleSkillRow" ,'skillTypeId'=>3 )) !!}
                                    </div>
                                    <div class="col-sm-6 text-right p_t30"> 
                                        <a class="link-btn link-btn_1 add_new_skill"  skillTypeId="3" tableId="computer"
                                        href="javascript:;">
                                        <i class="fa fa-plus"></i> Add New Computer Skill
                                        </a>    
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form_heading fh-inverse">
                                <h2> Technical Competencies </h2>
                            </div>
                        <div id="techinical_competencies" class="panel panel-default m_b30">
                           <div class="panel-body p_t0">
                                <div class="row">
                                    <table class="table border_t0 technical">
                                        <tr>
                                            <th> </th>
                                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                 <th class="w_12p text-center">
                                                 {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                            <?php } ?>
                                            <th> </th>
                                        </tr>
                                        <tr>
                                        <?php foreach ($userTechnicalCompetency as $skill) {
                                        ?>
                                        <tr>
                                           <td>{{ $skill->skillName }}
                                            <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                           </td>
                                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                            <td class="text-center">
                                                <div class="inline_block1">
                                                    <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" value="{{ $comepetencyLevel->id }}" 
                                                    @if( $skill->comepetencyLevelIdTemp > 0  && $skill->comepetencyLevelIdTemp == $comepetencyLevel->id )
                                                    checked="" 
                                                    @elseif( ! $skill->comepetencyLevelIdTemp > 0    &&$comepetencyLevel->id == $skill->comepetencyLevelId)
                                                    checked="" 
                                                    @endif
                                                    >
                                                    <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                                </div>
                                            </td>
                                            <?php } ?>
                                            <td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td>
                                        </tr> 
                                        <?php } ?>
                                    </table>
                                    <div class="col-sm-6"> 
                                        <label>Select the technical competencies you want to add</label>
                                        {!! Form::select('skillId',$technicalCompetency,null, array('class' => 'chosen-select form-control skill','id'=>'technical',  
                                        'goTo'=>"getJobRoleSkillRow" ,'skillTypeId'=>1  )) !!}
                                    </div>
                                    <div class="col-sm-6 text-right p_t30"> 
                                        <a class="link-btn link-btn_1 add_new_skill"  skillTypeId="1" tableId="technical"
                                        href="javascript:;">
                                        <i class="fa fa-plus"></i> Add New Technical Skill
                                        </a>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_heading fh-inverse">
                                <h2> Behavioral Competency  <span>(Critical Behaviors of Success)</span> </h2>
                            </div>
                        <div id="behavioral_competency" class="panel panel-default m_b30">
                            <div class="panel-body p_t0">
                                <div class="row">
                                    <table class="table border_t0 behavioral">
                                        <tr>
                                            <th> </th>
                                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                 <th class="w_12p text-center">
                                                 {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                            <?php } ?>
                                            <th> </th>
                                        </tr>
                                        <tr>
                                        <?php foreach ($userBehavioralCompetency as $skill) { 
                                        ?>
                                        <tr>
                                           <td>{{ $skill->skillName }}
                                            <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                                     
                                           </td>
                                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                            <td class="text-center">
                                                <div class="inline_block1">
                                                    <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" value="{{ $comepetencyLevel->id }}" @if( $skill->comepetencyLevelIdTemp > 0  && $skill->comepetencyLevelIdTemp == $comepetencyLevel->id )
                                                    checked="" 
                                                    @elseif( ! $skill->comepetencyLevelIdTemp > 0    &&$comepetencyLevel->id == $skill->comepetencyLevelId)
                                                    checked="" 
                                                    @endif
                                                    >
                                                    <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                                </div>
                                            </td>
                                            <?php } ?>
                                            <td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td>
                                        </tr> 
                                        <?php } ?>
                                    </table>
                                    <div class="col-sm-6"> 
                                        <label>Select the behavioral competency you want to add</label>
                                        {!! Form::select('skillId',$behavioralCompetency,null, array('class' => 'chosen-select form-control skill','id'=>'behavioral',  
                                       'goTo'=>"getJobRoleSkillRow",'skillTypeId'=>2  )) !!}
                                    </div>
                                    <div class="col-sm-6 text-right p_t30"> 
                                        <a class="link-btn link-btn_1 add_new_skill"  skillTypeId="2" tableId="behavioral"
                                        href="javascript:;">
                                        <i class="fa fa-plus"></i> Add New CBS Skill
                                        </a>    
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-12 text-right m_b50">
                            <?php if($pendingVerification == 0 ) { ?>
                            <button type="submit" name="save"class="btn-curvy bg-red mr10" > Save</button> 
                            <button type="submit" onclick="return confirm();" name="saveAndVerification" id="saveAndVerification" class="btn-curvy bg-gray" > Save & Send for Verification</button> 
                            <?php } else { ?>
                              <button type="button" class="btn btn-default" disabled="disabled">Verification  Pending </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- /page content -->
<!-- Confirmation Modal -->
<div class="modal fade" id="delet-employee" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body text-center inline_block">
        <div class="check circle"> 
          <img src="{{ url('images/icons/check.svg') }}" alt="check" class="svg" />
        </div>
        <h3>Send for Verification</h3>
        <p>Once the form is sent you will not be able to make further changes</p>     
        <div class="text-center m_t20 m_b20">       
          <a href="javascript:;"  class="close btn btn_primery l_btn delete_user">Okay, Send for Verification</a>
          <button type="button" class="btn-curvy bg-gray" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal code -->
<div id="add_skill" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="{{ url('images/icons/close.svg') }}" alt="close" class="svg close"></button>
        <h4 class="modal-title">Add New Skill</h4>
      </div>
      <div class="modal-body">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Skill Name</label>
                    {!! Form::input('hidden','skillTypeId',null, ['id'=>'skillTypeId'] ) !!}

                    {!! Form::input('hidden','isApproved',0, ['id'=>'isApproved'] ) !!}

                    {!! Form::input('hidden','isManagerApproved',0, ['id'=>'isManagerApproved'] ) !!}

                    {!! Form::input('hidden','tableId',null, ['id'=>'tableId'] ) !!}
                    {!! Form::input('text','skillName',null, ['class' => 'form-control','id'=>'skillName'] ) !!}
                </div>
            </div>
            <div class="col-sm-12 text-center m_b20">
                 <button type="button" name="saveComputerSkill" class="btn-curvy bg-red m_t20" onclick="saveSkill()" > Add </button> 
            </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function confirm()
{
  $("#delet-employee").modal("show");
  return false;
}
$(document).on('click','.delete_user',function()
{
  $("#saveAndVerification").removeAttr('onclick');
  $("#saveAndVerification").trigger('click');
});
    $(document).ready(function(){

        $('#jobRoleId').change(function(){
             $.ajax({
                url: "{{ url('jobRoleSkillForm') }}" ,
                type: "post",
                dataType: "html",
                data:{"_token": "{{ csrf_token() }}", id : $(this).val() } ,
                success:function(data) {
                  $("#JobRoleSkillFormDiv").html(data);
                }
            }); 
        });

        $('.removeFormDiv').change(function(){
            $("#JobRoleSkillFormDiv").html('');
        });
    });
    function addMoreQualification() 
    {
        $.ajax({
            url: "{{ url('getQualificationListForm') }}" ,
            type: "post",
            dataType: "html",
            data : {"_token": "{{ csrf_token() }}" } ,
            success:function(data) {
                $("#divQualification").append(data);
                $(".chosen-select").chosen();
            }
        });
    }  
    $(document).on('click','.removeSpecialization', function(){
        $(this).parent().html('');
    });

    function saveSkill() 
    { 
        var add_competency = $('#tableId').val() ;
        $.ajax({
            url: "{{ url('add') }}" ,
            type: "post",
            dataType: "json",
            data : {"_token": "{{ csrf_token() }}", skillName : $("#skillName").val() , skillTypeId : $("#skillTypeId").val() , isApproved : 0 , isManagerApproved : 0 } ,
            success:function(data) 
            {
                if($.isEmptyObject(data.error))
                {
                    $("#skillName").val('');
                    showMessage(data.success, 'success',10000);
                    $.ajax({
                        url:  "{{ url('getJobRoleSkillRow') }}",
                        type: "post",
                        dataType: "html",
                        data:{"_token": "{{ csrf_token() }}", skillId : data.skillId,skillName : data.skillName } ,
                        success:function(dataInner) 
                        {
                            $('#add_skill').modal('hide');
                            $("."+add_competency+" tbody").append(dataInner);
                            $("#"+add_competency).val('').trigger("chosen:updated");
                            $(".chosen-select").trigger("chosen:updated");   
                        }
                    });
                }
                else
                {
                    showMessage(data.error[0], 'danger',5000000);
                } 
            }
        });
    }  
    
</script> 

<script type="text/javascript">
    $(document).on('change','.skill',function()
    {
        var $this = $(this);
        var add_competency = $this.attr("id");
        var skillId = $this.val();

        if($(this).val()=="")
        {
          return false;
        }
        if($(this).val()=="new")
        {
            $('#skillTypeId').val($this.attr("skillTypeId"));
            $('#tableId').val($this.attr("id"));
            $('#add_skill').modal('show');
            $("#"+$this.attr("id")).val('').trigger("chosen:updated");
            return false;
        }

        var skillName = $this.find("option:selected").text();
        $this.find("option:selected").remove();
        $.ajax({
            url:  $this.attr("goto"),
            type: "post",
            dataType: "html",
            data:{"_token": "{{ csrf_token() }}", skillId : skillId,skillName : skillName } ,
            success:function(data) 
            {
                $("."+add_competency+" tbody").append(data);
                $(".chosen-select").trigger("chosen:updated");   
            }
        });
       
    });
    $(document).on('click','.add_new_skill',function()
    {
        var $this = $(this);
        $('#skillTypeId').val($this.attr("skillTypeId"));
        $('#tableId').val($this.attr("tableId"));
        $('#add_skill').modal('show');
        $("#"+$this.attr("id")).val('').trigger("chosen:updated"); 
    });
    $(document).on('click','.remove_skill',function()
    {
        var option_value = $(this).parent().siblings(":first").text();
        var option_id = $(this).parent().siblings(":first").children("input").val();
        $(this).closest("table").parent().find("select").append("<option value='"+option_id+"'>"+option_value+"</option>");
        $(".chosen-select").trigger("chosen:updated"); 
        $(this).closest("tr").remove();
    });
</script>
@endsection