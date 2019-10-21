<h2 class="main_heading">{{ $jobRoleDetail[0]['jobRoleName'] }} </h2>  
<ul class="list-inline">
    <li> <span class="light_gray_color font_12">Unit :</span> <strong class="normal">{{ $jobRoleDetail[0]['unitName'] }}  </strong> </li>
    <li> <span class="light_gray_color font_12">Division :</span> <strong class="normal">{{ $jobRoleDetail[0]['divisionName'] }} </strong> </li>
    <li> <span class="light_gray_color font_12">Department :</span> <strong class="normal">{{ $jobRoleDetail[0]['departmentName'] }}  </strong> </li>
    <li> <span class="light_gray_color font_12">Sub Department :</span> <strong class="normal">{{ $jobRoleDetail[0]['subDepartmentName'] }} </strong>  </li>
    
</ul>
<input type="hidden" name="jobRoleId" id="jobRoleId" value="{{ $data->id }}" >
<div class="form_heading fh-inverse">
    <h2>Language Proficiency</h2>
</div>
<div id="other_details" class="panel panel-default m_b0">   
    <div class="panel-body p_t0">        
        <div class="row">
            <div class="min-height">
                <table class="table border_t0 language">
                    <tr>
                        <th> </th>
                        <th class="w_15p text-center">Read</th>
                        <th class="w_15p text-center">Write</th>
                        <th class="w_15p text-center">Speak</th>
                        <th class="w_15p text-center">Understand</th>
                        <th class=""></th>
                    </tr>
                    <?php foreach ($languages as $language) { ?>
                    <tr id="duplicate{{ $language->id }}">
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
                        <td class="text-center">
                            <button title="Remove" class="close remove_language" type="button"> <img class="svg" src="images/icons/close.svg"> </button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="col-sm-6"> 
                <label>Select the language you want to add</label>
                {!! Form::select('languageId',$languagesRemaining,null, array('class' => 'chosen-select form-control skill','id'=>'language','onChange'=>"",'goTo'=>"getJobRoleLanguageRow" )) !!}
               </div>
            </div>
        </div>
    </div>
</div>
<div class="form_heading fh-inverse">
    <h2>Highest Qualification</h2>
</div>

<div class="panel panel-default m_b10">
    <div class="panel-body">
        <div class="row" id="divQualification"> 

            <?php 

            foreach($jobRoleSpecializationRels as $jobRoleSpecializationRel){
                $abc = time().rand(1,1000) ;
                ?>
                @include('qualification.edit_more_qualification', [ 'no' => 1, 'randomNo' => $abc , 'data' => $jobRoleSpecializationRel , 'qualifications' => $qualifications ])
                <?php } ?>  
            </div>
            <a class="link-btn link-btn_1 addMoreQualification" href="javascript:;" onclick="addMoreQualification()">
                <i class="fa fa-plus"></i> Add Qualification
            </a>  

        </div>    
    </div>


    <div class="form_heading fh-inverse">
        <h2> Computer </h2>
    </div>
    <div class="panel panel-default m_b30">
        <div class="panel-body p_t0">
            <div class=" row">
                <table class="table border_t0 computer">
                    <tr>
                        <th> </th>
                        <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                        <th class="w_12p text-center">
                           {{ $comepetencyLevel->comepetencyLevelName }} </th>
                           <?php } ?>
                           <th class="width_50"> &nbsp;</th>
                       </tr>
                       <tr>
                        <?php 
                        foreach ($skills as $skill) { 
                            if($skill->skillTypeId == 3 ) 
                            {
                                ?>
                                <tr id="duplicate{{ $skill->id }}">
                                 <td>{{ $skill->skillName }}
                                     <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                 </td>
                                 <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                 <td class="text-center">
                                    <div class="inline_block1">
                                        <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" 
                                        value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelId) checked="" @endif>
                                        <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                    </div>
                                </td>
                                <?php } ?>
                                <td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td>
                            </tr> 
                            <?php }}
                            ?>
                        </table>
                        <div class="col-sm-6"> 
                            <label>Select the skills you want to add</label>
                            {!! Form::select('skillId',$computerCompetency,null, array('class' => 'chosen-select form-control skill','id'=>'computer',  
                            'onChange'=>"",'goTo'=>"getJobRoleSkillRow" )) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_heading fh-inverse">
                <h2> Technical Competencies </h2>
            </div>
            <div class="panel panel-default m_b30">
                <div class="panel-body p_t0">
                    <div class=" row">
                        <table class="table border_t0 technical">
                            <tr>
                                <th> </th>
                                <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                <th class="w_12p text-center">
                                   {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                   <?php } ?>
                                <th class="width_50"> &nbsp;</th>
                               </tr>
                               <tr>
                                <?php 
                                foreach ($skills as $skill) { 
                                    if($skill->skillTypeId == 1 ) 
                                    { 
                                        ?>
                                        <tr id="duplicate{{ $skill->id }}">
                                         <td>{{ $skill->skillName }}
                                             <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                         </td>
                                         <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                         <td class="text-center">
                                            <div class="inline_block1">
                                                <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" 
                                                value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelId) checked="" @endif>
                                                <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                            </div>
                                        </td>
                                        <?php } ?>
                                        <td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td>
                                    </tr> 
                                    <?php }} ?>   
                                </table>
                                <div class="col-sm-6"> 
                                    <label>Select the technical competencies you want to add</label>
                                    {!! Form::select('skillId',$technicalCompetency,null, array('class' => 'chosen-select form-control skill','id'=>'technical',  
                                    'onChange'=>"",'goTo'=>"getJobRoleSkillRow" )) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form_heading fh-inverse">
                        <h2> Behavioral Competency  <span class="sml-text"> (Critical Behaviors of Success)</span> </h2>
                    </div>
                    <div class="panel panel-default m_b30">
                        <div class="panel-body p_t0">
                            <div class=" row">
                                <table class="table border_t0 behavioral">
                                    <tr>
                                        <th> </th>
                                        <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                        <th class="w_12p text-center">
                                           {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                           <?php } ?>
                                        <th class="width_50"> &nbsp;</th>
                                       </tr>
                                       <tr>
                                        <?php 
                                        foreach ($skills as $skill) { 
                                            if($skill->skillTypeId == 2 ) {   
                                                ?>
                                                <tr id="duplicate{{ $skill->id }}">
                                                 <td>{{ $skill->skillName }}
                                                     <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                                 </td>
                                                 <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                 <td class="text-center">
                                                    <div class="inline_block1">
                                                        <input type="radio" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}" 
                                                        value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelId) checked="" @endif>
                                                        <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                                    </div>
                                                </td>
                                                <?php } ?>
                                                <td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td>
                                            </tr> 
                                            <?php }} ?>
                                        </table>
                                        <div class="col-sm-6"> 
                                            <label>Select the behavioral competency you want to add</label>
                                            {!! Form::select('skillId',$behavioralCompetency,null, array('class' => 'chosen-select form-control skill','id'=>'behavioral',  
                                            'onChange'=>"",'goTo'=>"getJobRoleSkillRow" )) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m_t20 m_b30">
                                <button type="submit" class="btn-curvy bg-red" data-toggle="modal" data-target="#myModal"> Submit</button>
                                <a href="{{ url('employeeSearch') }}/{{ $data->id }}" >  
                                    <button type="button" class="btn-curvy bg-gray ">Search Candidates</button>
                                </a>
                            </div>
                            <!--<table id="competency" class="hidden">-->
                                <?php 
                                /*$competency = '<tr id="duplicateskillId"><td>skillName<input type="hidden" name="skills[]" value="skillId"></td>';
                                foreach ($comepetencyLevels as $comepetencyLevel) 
                                {  
                                    $competency .='<td class="text-center"><div class="inline_block1"><input type="radio" id="skillskillId'.$comepetencyLevel->id.'" name="skillskillId"  value="'.$comepetencyLevel->id.'"><label for="skillskillId'.$comepetencyLevel->id.'"></label></div></td>';
                                }
                                echo $competency .='<td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td></tr>';*/
                                ?>
                           <!-- </table>
                            <table id="languageCompetency" class="hidden">-->
                                <?php 
                   /*echo $languageCompetency = '<tr id="duplicateskillId">
                        <td>
                            skillName
                            <input type="hidden" name="language[]" id="languageskillId" value="skillId" >
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngReadskillId"  id="lanngReadskillId" value="1">
                                <label for="lanngReadskillId"> </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngWriteskillId" id="lanngWriteskillId"  value="1">
                                <label for="lanngWriteskillId"> </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngSpeakskillId" id="lanngSpeakskillId" value="1">
                                <label for="lanngSpeakskillId"> </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngUnderstandskillId" id="lanngUnderstandskillId" value="1">
                                <label for="lanngUnderstandskillId"> </label>
                            </div>
                        </td>
                    </tr>'; */
                                ?>
                            <!--</table>-->
<script type="text/javascript">
function removeDuplicateTrById(class1)
{
  $('.'+class1+' tbody tr').each(function(i) {
    $('[id="' + this.id + '"]').slice(1).remove();
  });
}
removeDuplicateTrById();
$(document).on('change','.skill',function()
{
    if($(this).val()=="")
    {
      return false;
    }
    var $this = $(this);
    var add_competency = $this.attr("id");
    var skillId = $this.val();
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
$(document).on('click','.remove_skill',function()
{
 var option_value = $(this).parent().siblings(":first").text();
 var option_id = $(this).parent().siblings(":first").children("input").val();
 $(this).closest("table").parent().find("select").append("<option value='"+option_id+"'>"+option_value+"</option>");
 $(".chosen-select").trigger("chosen:updated"); 
 $(this).closest("tr").remove();
});

$(document).on('click','.remove_language',function()
{
 var option_value = $(this).parent().siblings(":first").text();
 var option_id = $(this).parent().siblings(":first").children("input").val();
 $(this).closest("table").parent().find("select").append("<option value='"+option_id+"'>"+option_value+"</option>");
 $(".chosen-select").trigger("chosen:updated"); 
 $(this).closest("tr").remove();
});
</script>