<div class="panel panel-default m_b30" id="other_details">
    <div class="form_heading">
    <h2>Language Proficiency</h2>
    </div>
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

<div class="panel panel-default m_b10">
    <div class="form_heading">
    <h2>Highest Qualification <span>Choose your highest held qualification here</span></h2>
    </div>
    <div class="panel-body p_t20">
        <div class="row" id="divQualification"> 
        <div class="row">
            <?php 
            foreach($jobRoleSpecializationRels as $data){
            ?>
            @include('qualification.edit_more_qualification', [ 'no' => 1, 'randomNo' => time() , 'data' => $data , 'qualifications' => $qualifications ])
            <?php } ?>  
        </div>
        <!-- <a class="link-btn link-btn_1 addMoreQualification" href="javascript:;" onclick="addMoreQualification()">
        <i class="fa fa-plus"></i> Add More Qualification
        </a>  --> 
        </div>
    </div>    
</div>

<div class="panel panel-default m_b30">
    <div class="form_heading">
    <h2> Computer </h2>
    </div>
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
                if($skill->skillTypeId == 3 ) {   
                ?>
                <tr>
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
                </tr> 
                <?php }} ?>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default m_b30">
    <div class="form_heading">
        <h2> Technical Competencies </h2>
    </div>
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
                if($skill->skillTypeId == 1 ) {   
                ?>
                <tr>
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
                </tr> 
                <?php }} ?>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default m_b30">
    <div class="form_heading">
        <h2> Behavioral Competency  <span>(Critical Behaviors of Success)</span> </h2>
    </div>
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
                if($skill->skillTypeId == 2 ) {   
                ?>
                <tr>
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
                </tr> 
                <?php }} ?>
            </table>
        </div>
    </div>
</div>


