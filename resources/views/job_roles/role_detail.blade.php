
  <div id="add-role" class="addDegree im-modal" role="dialog" style="display: none;"> 

   
      <div class="im-modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="{{ url('images/icons/close.svg') }}" alt="close" class="svg close"></button>
        <h4 class="modal-title">Role Details</h4>
      </div>
      <div class="modal-body m_t30">
        <div class="row">
   
    <div class="clearfix"></div>
    <div class="col-sm-12 m_b20">
        <div class="form-group">
          <div class="form_heading">
              <h2>Language Proficiency</h2>
          </div>
            <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Language</th>
                <th>Operation</th>               
              </tr>
            </thead>
            <tbody>
              <?php $sno=1; ?>
              <?php foreach ($languages as $language) { ?>
                
                <tr>
                  <td>{{$sno++}}</td>
                    <td>
                        {{ $language->languageName }}                       
                    </td>
                    <td >
                        <div class="inline_block1">
                            @if($language->reading) {{'Reading'}} @endif
                            @if($language->writeing) {{', writeing'}} @endif
                            @if($language->speaking) {{', Speaking'}} @endif
                            @if($language->understanding) {{', Understanding'}} @endif 
                        </div>
                    </td>    
                </tr>
                <?php } ?>          
              </tbody>
            </table>
        </div>
      </div>

      <div class="col-sm-12 m_b20">
        <div class="form-group">
          <div class="form_heading">
              <h2>Highest Qualification Choose your highest held qualification here</h2>
          </div>
            <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Qualification</th>
                <th>Degree</th>
                <th>Specialization</th>  

              </tr>
            </thead>
            <tbody>
              <?php $sno=1; ?>
              <?php foreach ($jobRoleSpecializationRels as $ql) { ?>               
                <tr>
                  <td>{{$sno++}}</td>
                    <td>
                       {{$ql->qualificationName}}                       
                    </td>
                    <td >                          
                        {{$ql->degreeName}}
                    </td> 
                    <td >                           
                        {{$ql->specializationName}}
                    </td>   

                </tr>
                <?php } ?>          
              </tbody>
            </table>
        </div>
      </div>

 <div class="col-sm-12 m_b20">
        <div class="form-group">
          <div class="form_heading">
              <h2>Computer</h2>
          </div>
           <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Skill</th>
                <th>Operation</th>               
              </tr>
            </thead>
            <tbody>
              <?php $sno=1; ?>
                
                <?php foreach ($skills as $skill) { 
                if($skill->skillTypeId == 3 ) {   
                ?>
                <tr>
                  <td>{{$sno++}}</td>
                   <td>{{ $skill->skillName }}
                   </td>
                    <td >
                    <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                   
                       @if($comepetencyLevel->id == $skill->comepetencyLevelId) {{$comepetencyLevel->comepetencyLevelName}} @endif
                    
                    <?php } ?>
                    </td>
                </tr> 
                <?php }} ?>
                       
              </tbody>
            </table>
        </div>
      </div>
      
      <div class="col-sm-12 m_b20">
        <div class="form-group">
            <div class="form_heading">
                <h2>Technical Competencies</h2>
            </div>
            <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Technical</th>
                <th>Operation</th>               
              </tr>
            </thead>
            <tbody>
              <?php $sno=1; ?>
                   <?php foreach ($skills as $skill) { 
                if($skill->skillTypeId == 1 ) {   
                ?>
                <tr>
                   <td>{{ $sno++ }}
                   </td>
                   <td>{{ $skill->skillName }}
                   </td>
                    <td >
                    <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>
                   
                        <div class="inline_block1">
                             @if($comepetencyLevel->id == $skill->comepetencyLevelId) {{$comepetencyLevel->comepetencyLevelName}} @endif
                        </div>
                    
                    <?php } ?>
                    </td>
                </tr> 
                <?php }} ?>
              </tbody>
            </table>
        </div>
      </div>

      <div class="col-sm-12 m_b20">
        <div class="form-group">
            <div class="form_heading">
                <h2>Behavioral Competency <span>(Critical Behaviors of Success)</span> </h2>
            </div>          
            <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Technical</th>
                <th>Operation</th>               
              </tr>
            </thead>
            <tbody>
              <?php $sno=1; ?>
              <?php foreach ($skills as $skill) { 
                if($skill->skillTypeId == 2 ) {   
                ?>
                <tr>
                  <td>{{ $sno++ }}</td>
                   <td>{{ $skill->skillName }}                  
                   </td>
                    <td >
                    <?php foreach ($comepetencyLevels as $comepetencyLevel) {  ?>         <div class="inline_block1">
                             @if($comepetencyLevel->id == $skill->comepetencyLevelId) {{$comepetencyLevel->comepetencyLevelName}} @endif
                        </div>                    
                    <?php } ?>
                    </td>
                </tr> 
                <?php }} ?>
              </tbody>
            </table>
        </div>
      </div>

          <div class="col-sm-12 text-center m_b20">
        <button class="btn bg-red" id="addRole"> Cancel </button>
      </div>
 
    </div>
      </div>
    </div>

  </div>
<script type="text/javascript">
     /* $("#editEmployee").validate();
      $('#unitId_edit').trigger('change');
      $('#divisionId_edit').trigger('change');
      $('#unitId_edit').trigger('change');
      $('#unitId_edit').trigger('change');*/
</script>