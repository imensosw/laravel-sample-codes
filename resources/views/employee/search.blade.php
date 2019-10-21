@extends('layouts.main')
@section('content')
<div class="left-menu-big">
  <div class="sub-nav-area">
    <h4>Search Candidates</h4>
    <div class="search_form">
        <input type="hidden" name="formId" id="formId" value="employeeSearchForm">
        {!! Form::open(array('route' => 'employee/getEmployee',
        'method'=>'POST','id'=>'employeeSearchForm')) !!}
        {{ csrf_field() }}
        <div class="form-group">
         <label>Key Words</label>
         {!! Form::text('searchKeyword',NULL,
         array('id'=>'searchKeyword','class'=>'form-control','placeholder'=>'Enter keyword')) !!}
     </div>
     <div class="form-group">
         <label>Role</label>
         {!! Form::select('jobRoleId', $jobRoles, $jobRoleId , array('class' => 'chosen-select form-control','id'=>'jobRoleId' )) !!}
     </div>


     <div class="form-group m_t30">
        <button class="btn-curvy bg-gray pull-right m_b50" type="button" onclick="ajaxLoad('employeeSearchForm')" > Search </button>
        <a href="javascript:;" onclick="$('#advanceSearchModel').show(200);;" class="btn bg-red s_btn btn-shadow"  alt="ul icon"> Advance Search</a>
    </div>
    {!! Form::close() !!}
</div>
</div>

</div>

<div class="right_col" role="main">
    <div class="anim container-fluid">
        <div class="row">
            <div>
                <h1 class="main_heading m_t10 m_b20">
                    <div class="circle main_heading_i"><img src="../images/icons/search.svg" class="svg" alt="ul icon"></div> Search Employee 
                </h1>                
            </div>     

            <div class="">
                <div class="row search_result" id="searchResultDiv">
                </div>
                <div class="loading"></div>
            </div>
        </div>
    </div>

    <div id="advanceSearchModel" class="im-modal" role="dialog" style="display: none;"> 
        <div class="im-modal-header">
          <a href="javascript:;" onclick="$('#advanceSearchModel').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
          <h5 class="im-modal-title">Advance Search</h5>
      </div>
      <div class="im-modal-body m_t30" >
        {!! Form::open(array('route' => 'employee/getEmployee','method'=>'POST','id'=>'advanSearchForm')) !!}
        {{ csrf_field() }}
        {!! Form::hidden('searchKeyword',NULL,array('id'=>'searchKeywordAdvance')) !!}
        {!! Form::hidden('jobRoleId',NULL,array('id'=>'jobRoleIdAdvance')) !!}
        <div>
            <div class="row">
                <div class="col-sm-12"> 
                    <div id="JobRoleSkillFormDiv">
                        <!-- /////////////////////////////////////////// -->

                        <div class="form_heading">
                            <h2>Language Proficiency</h2>
                        </div>
                        <div class="panel panel-default m_b30" id="other_details">
                            <div class="panel-body p_t20">
                                <div class="table-responsive row">
                                    <table class="table border_t0">
                                        <tr>
                                            <th> </th>
                                            <th class="w_15p text-center">Read</th>
                                            <th class="w_15p text-center">Write</th>
                                            <th class="w_15p text-center">Speak</th>
                                            <th class="w_15p text-center">Understand</th>
                                            <th> </th>
                                        </tr>
                                        <?php foreach ($languages as $language) { ?>
                                        <tr id="languagesRow{{ $language->id }}" style="display: none" >
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
                                                <button type="button" languageId="{{ $language->id }}"  class="close removeLanguagesRow" title="Remove"> <img src="{{ url('images/icons/close.svg') }}" class="svg"> </button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="col-xs-6">
                                    <div class="row" >
                                        {!! Form::select('addMoreLanguages', $languages->pluck('languageName','id')->prepend('Select Language',''),NULL, array('class' => 'chosen-select form-control','id'=>'addMoreLanguages' )) !!}
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

                                </div>  
                                <a class="link-btn link-btn_1 addMoreQualification" href="javascript:;" onclick="addMoreQualification()"><i class="fa fa-plus"></i> Add Qualification</a>    
                            </div>
                        </div>

                        <div class="form_heading">
                            <h2> Computer </h2>
                        </div>
                        <div class="panel panel-default m_b30">
                            <div class="panel-body p_t20">
                                <div class="table-responsive row">
                                    <table class="table border_t0">
                                        <tr>
                                            <th> </th>
                                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                            <th class="w_12p text-center">
                                               {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                               <?php } ?>
                                               <th> </th>
                                           </tr>
                                           <tr>
                                            <?php foreach ($skills as $skill) { 
                                                if($skill->skillTypeId == 3 ) {   
                                                    ?>
                                                    <tr id="skillRow{{ $skill->id }}" style="display: none" >
                                                     <td>{{ $skill->skillName }}
                                                         <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                                     </td>
                                                     <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                     <td class="text-center">
                                                        <div class="inline_block1">
                                                            <input type="checkbox" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}[]" 
                                                            value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelId) checked="" @endif>
                                                            <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                                    <td class="text-center">
                                                        <button type="button" skillId="{{ $skill->id }}"  class="close removeSkillRow" title="Remove"> <img src="{{ url('images/icons/close.svg') }}" class="svg"> </button>
                                                    </td>
                                                </tr> 
                                                <?php }} ?>
                                            </table>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="row" >
                                                {!! Form::select('addMoreSkill', $skills->where('skillTypeId','=',3)->pluck('skillName','id')->prepend('Select skill',''),NULL, array('class' => 'chosen-select form-control addMoreSkill','id'=>'addMoreSkill' )) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form_heading">
                                    <h2> Technical Competencies </h2>
                                </div>
                                <div class="panel panel-default m_b30">
                                    <div class="panel-body p_t20">
                                        <div class="table-responsive row">
                                            <table class="table border_t0">
                                                <tr>
                                                    <th> </th>
                                                    <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                    <th class="w_12p text-center">
                                                       {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                                       <?php } ?>
                                                       <th> </th>
                                                   </tr>
                                                   <tr>
                                                    <?php foreach ($skills as $skill) { 
                                                        if($skill->skillTypeId == 1 ) {   
                                                            ?>
                                                            <tr id="skillRow{{ $skill->id }}" style="display: none">
                                                             <td>{{ $skill->skillName }}
                                                                 <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                                             </td>
                                                             <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                             <td class="text-center">
                                                                <div class="inline_block1">
                                                                    <input type="checkbox" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}[]" 
                                                                    value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelId) checked="" @endif>
                                                                    <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                                                </div>
                                                            </td>
                                                            <?php } ?>
                                                            <td class="text-center">
                                                                <button type="button" skillId="{{ $skill->id }}"  class="close removeSkillRow" title="Remove"> <img src="{{ url('images/icons/close.svg') }}" class="svg"> </button>
                                                            </td>
                                                        </tr> 
                                                        <?php }} ?>
                                                    </table>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="row" >
                                                        {!! Form::select('addMoreSkill', $skills->where('skillTypeId','=',1)->pluck('skillName','id')->prepend('Select skill',''),NULL, array('class' => 'chosen-select form-control addMoreSkill','id'=>'addMoreSkill' )) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form_heading">
                                            <h2> Behavioral Competency  <span>(Critical Behaviors of Success)</span> </h2>
                                        </div>
                                        <div class="panel panel-default m_b30">
                                            <div class="panel-body p_t20">
                                                <div class="table-responsive row">
                                                    <table class="table border_t0">
                                                        <tr>
                                                            <th> </th>
                                                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                            <th class="w_12p text-center">
                                                               {{ $comepetencyLevel->comepetencyLevelName }} </th>
                                                               <?php } ?>
                                                               <th> </th>
                                                           </tr>
                                                           <tr>
                                                            <?php foreach ($skills as $skill) { 
                                                                if($skill->skillTypeId == 2 ) {   
                                                                    ?>
                                                                    <tr id="skillRow{{ $skill->id }}" style="display: none">
                                                                     <td>{{ $skill->skillName }}
                                                                         <input type="hidden" name="skills[]" value="{{ $skill->id }}" >
                                                                     </td>
                                                                     <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                                                                     <td class="text-center">
                                                                        <div class="inline_block1">
                                                                            <input type="checkbox" id="skill{{ $skill->id }}{{ $comepetencyLevel->id }}" name="skill{{ $skill->id }}[]" 
                                                                            value="{{ $comepetencyLevel->id }}" @if($comepetencyLevel->id == $skill->comepetencyLevelId) checked="" @endif>
                                                                            <label for="skill{{ $skill->id }}{{ $comepetencyLevel->id }}"> </label>
                                                                        </div>
                                                                    </td>
                                                                    <?php } ?>
                                                                    <td class="text-center">
                                                                        <button type="button" skillId="{{ $skill->id }}"  class="close removeSkillRow" title="Remove"> <img src="{{ url('images/icons/close.svg') }}" class="svg"> </button>
                                                                    </td>
                                                                </tr> 
                                                                <?php }} ?>
                                                            </table>


                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="row" >
                                                                {!! Form::select('addMoreSkill', $skills->where('skillTypeId','=',2)->pluck('skillName','id')->prepend('Select skill',''),NULL, array('class' => 'chosen-select form-control addMoreSkill','id'=>'addMoreSkill' )) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /////////////////////////////////////////// -->
                                            </div>    
                                            <div class="col-sm-12 text-center">
                                                <button type="button" onclick="ajaxLoad('advanSearchForm')" class="btn bg-red l_btn">Apply Search</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>



                    <script>
                        function ajaxLoad(formId,page = 1) {
                            $('.loading').show();
                            $("#formId").val(formId); 
                            var formData = new FormData($('#'+formId)[0]);
                            formData.append("page", page);
                            $.ajax({
                                type: "POST",
                                url: "{{ url('employee/getEmployee') }}",
                                contentType: false,
                                cache: false,           
                                processData:false,
                                data : formData ,
                                success: function (data) {
                                    $("#searchResultDiv").html(data);
                                    $('.loading').hide();
                                    $('#advanceSearchModel').hide(200);
                                },
                                error: function (xhr, status, error) 
                                {
                                    alert(xhr.responseText);
                                }
                            });
                        }
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
                        $(document).ready(function(){
                            $(".chosen-select").chosen();
                            $('.chosen-container').css('width', '100%');
                            ajaxLoad('employeeSearchForm');

                            $('#jobRoleIdAdvanceSearch').change(function(){
                                $.ajax({
                                    url: "{{ url('jobrole/jobRoleSkillSearchForm') }}" ,
                                    type: "post",
                                    dataType: "html",
                                    data:{"_token": "{{ csrf_token() }}", id : $(this).val() } ,
                                    success:function(data) {
                                        $("#JobRoleSkillFormDiv").html(data);
                                        $(".chosen-select").chosen();
                                    }
                                }); 
                            });

                            $(document).on('click','#employee_bio_btn',function(){
                                var id = $(this).attr('data-id');
                                $.ajax({
                                    url:"{{ url('employee/getEmployeeBio') }}",
                                    type: "post",
                                    dataType: "html",
                                    data:{"_token": "{{ csrf_token() }}",'id':id  } ,
                                    success:function(data) {
                                        $("#employee_bio_body").html(data);
                                    },
                                    dataType:"html"
                                });          
                            }); 

                            $(document).on('click', '#employee_bio_btn', function(){
                                $('html,body').animate({scrollTop:$("#employee_bio_model").offset().top-70},'slow');
                            });

                            $('#jobRoleId').change(function(){
                                $('#jobRoleIdAdvance').val( $(this).val() );
                            });
                            $( "#searchKeyword" ).keyup(function() {
                                $('#searchKeywordAdvance').val( $(this).val() );
                            });

                            var comepetencyLevels = [
                            <?php foreach ($comepetencyLevels as $comepetencyLevel) {  
                                echo  $comepetencyLevel->id.",";
                            } ?>
                            ];
                            $(document).on('change','#addMoreLanguages', function(){
                                $("#languagesRow"+$(this).val()).css("display",'table-row');
                                $('#addMoreLanguages > option[value="'+$(this).val()+'"]').hide();
                                $("#addMoreLanguages").val('').trigger("chosen:updated");
                            });
                            $(document).on('click','.removeLanguagesRow', function(){
                                $("#languagesRow"+$(this).attr('languageId')).css("display",'none');
                                $('#addMoreLanguages > option[value="'+$(this).attr('languageId')+'"]').show();
                                $('#addMoreLanguages').trigger("chosen:updated");
                                $('#lanngRead'+$(this).attr('languageId')).prop('checked', false); 
                                $('#lanngWrite'+$(this).attr('languageId')).prop('checked', false);
                                $('#lanngSpeak'+$(this).attr('languageId')).prop('checked', false); 
                                $('#lanngUnderstand'+$(this).attr('languageId')).prop('checked', false); 

                            });

                            $(document).on('change','.addMoreSkill', function(){
                                $("#skillRow"+$(this).val()).css("display",'table-row');
                                $('.addMoreSkill > option[value="'+$(this).val()+'"]').hide();
                                $(".addMoreSkill").val('').trigger("chosen:updated");
                            });

                            $(document).on('click','.removeSkillRow', function(){
                                $("#skillRow"+$(this).attr('skillId')).css("display",'none');
                                $('.addMoreSkill > option[value="'+$(this).attr('skillId')+'"]').show();
                                $('.addMoreSkill').trigger("chosen:updated");

                                var id = "#skill"+$(this).attr('skillId') ;
                                $.each( comepetencyLevels , function( key, value ) {
                                    $(id+value).prop('checked', false); 
                                });
                            });

                            $(document).on('click','.removeSpecialization', function(){
                                $(this).parent().html('');
                            });
                        });
                    </script>
                    @endsection