<div class="skill_level m_t10">
    <ul class="m_skill"> 
    <li>       
        <ul class="p_t30 s_skill_row m_b20">
            <li class="s_skill_col border-right">
               <div class="text-center">
                    <img src="{{ url('images/technical.png') }}">
                    <h5> Technical Competencies</h5>             
                </div>
                <ul class="skill_type">
                    @foreach ($skills as $skill) 
                      @if($skill->skillTypeId == 1 )
                    <li>
                        <div class="skill_cnt">  
                            <div class="skill_rating circle
                            @if( $skill->comepetencyLevelId  > 0  && $skill->comepetencyLevelId <= $skill->userComepetencyLevelId )
                                skill_rating_yes
                            @endif
                            " title="Specialist">P{{ $skill->comepetencyLevelId }}</div> 
                            <span  @if($skill->isMatched > 0 ) class="skill_yes" @endif > 
                                {{ $skill->skillName }}  
                                <span>
                                    @if( $skill->userComepetencyLevelId > 0 )
                                        : P{{ $skill->userComepetencyLevelId }}
                                    @endif
                                </span> 
                            </span> 
                        </div>
                    </li> 
                     @endif
                   @endforeach                 
                </ul>
            </li>
            <li class="s_skill_col border-right"> 
                <div class="text-center">
                    <img src="{{ url('images/cbs.png') }}">
                    <h5> CBS Competencies</h5>
                </div>                
                <ul class="skill_type skill_type_2 radius_0">
                   @foreach ($skills as $skill) 
                      @if($skill->skillTypeId == 2 )
                     <li> 
                        <div class="skill_cnt">
                            <div class="skill_rating circle
                            @if($skill->comepetencyLevelId  > 0  && $skill->comepetencyLevelId <= $skill->userComepetencyLevelId )
                                skill_rating_yes
                            @endif
                            " title="Specialist">P{{ $skill->comepetencyLevelId }}</div> 
                            <span  @if($skill->isMatched > 0 ) class="skill_yes" @endif > 
                                {{ $skill->skillName }}   
                                <span>
                                    @if( $skill->userComepetencyLevelId > 0 )
                                        : P{{ $skill->userComepetencyLevelId }}
                                    @endif
                                </span>
                            </span> 
                            
                        </div>
                    </li> 
                   @endif
                   @endforeach
                  
                </ul>
            </li>
            <li class="s_skill_col">
                 <div class="text-center">
                    <img src="{{ url('images/general.png') }}">
                    <h5> General Competencies</h5>
                </div>
                <ul class="skill_type">
                  
                     @foreach ($skills as $skill) 
                       @if($skill->skillTypeId == 3 )
                         <li> 
                            <div class="skill_cnt">
                                <div class="skill_rating circle
                               @if($skill->comepetencyLevelId  > 0  && $skill->comepetencyLevelId <= $skill->userComepetencyLevelId )
                                skill_rating_yes 
                                @endif" title="Specialist">P{{ $skill->comepetencyLevelId }}</div> 
                                <span  @if($skill->isMatched > 0 ) class="skill_yes" @endif > 
                                {{ $skill->skillName }}  
                                <span>
                                    @if( $skill->userComepetencyLevelId > 0 )
                                        : P{{ $skill->userComepetencyLevelId }}
                                    @endif
                                </span> 
                            </span> 
                            
                            </div>
                        </li> 
                       @endif
                    @endforeach
              

                     @foreach($jobRoleSpecializationRels as $data)
                     <li> 
                        <div class="skill_cnt">
                         <span @if( $data->specializationId == $data->userSpecializationId )  class="green-right" @endif >
                            {{ $data->degreeName }} ({{ $data->specializationName }})
                         </span>
                        </div>
                    </li> 
                    @endforeach
                    
                    <?php  foreach ($languages as $language) { 
                            $lng="";
                            if($language->reading)
                            {
                               $lng.="Read";  
                            }
                           if($language->writeing)
                            {
                                if($lng!=""){$lng.=",";}
                                $lng.="Write";  
                            }
                            if($language->speaking)
                            {
                                if($lng!=""){$lng.=",";}
                                $lng.="Speak";  
                            }
                            if($language->understanding)
                            {
                               if($lng!=""){$lng.=",";}
                               $lng.="Understand";  
                            }
                        if($lng!=""){
                             ?>
                            <li>
                                <div class="skill_cnt">
                                <?php  
                                $x = "0";
                                $y = "0";
                                if($language->reading == 1)
                                {
                                    $x++;
                                    if(  $language->reading == $language->userReading )
                                    {
                                        $y++;
                                    }
                                }
                                if($language->writeing == 1)
                                {
                                    $x++;
                                    if(  $language->writeing == $language->userWriteing )
                                    {
                                        $y++;
                                    }
                                }
                                if($language->speaking == 1)
                                {
                                    $x++;
                                    if(  $language->speaking == $language->userSpeaking )
                                    {
                                        $y++;
                                    }
                                }
                                if($language->understanding == 1)
                                {
                                    $x++;
                                    if( $language->understanding == $language->userUnderstanding )
                                    {
                                        $y++;
                                    }
                                }
                                ?>
                                <span @if( $x == $y )  class="green-right" @endif > 
                                    {{ $language->languageName }} - {{ $lng }} 
                                </span>
                                </div>       
                            </li>

                    <?php } } ?>

            </li>
        </ul>
    </li>
    </ul>

    <div class="form_heading text-center">
        <h2 class="new"><span>Extra Competencies</span></h2>
    </div>
    <ul class="m_skill"> 
    <li>       
        <ul class="p_t0 s_skill_row">
            <li class="s_skill_col border-right">
               
                <ul class="skill_type">
                    @foreach ($userSkills as $skill) 
                      @if($skill->skillTypeId == 1 )
                    <li>
                        <div class="skill_cnt">  
                            <div class="skill_rating circle" title="Specialist"> 
                            </div> 
                            <span  class="skill_yes"  > 
                                {{ $skill->skillName }}  
                                <span>
                                   
                                        : P{{ $skill->comepetencyLevelId }}
                                    
                                </span> 
                            </span> 
                        </div>
                    </li> 
                     @endif
                   @endforeach                 
                </ul>
            </li>
            <li class="s_skill_col border-right"> 
                                
                <ul class="skill_type skill_type_2 radius_0">
                   @foreach ($userSkills as $skill) 
                      @if($skill->skillTypeId == 2 )
                     <li>
                        <div class="skill_cnt">  
                            <div class="skill_rating circle" title="Specialist"> 
                            </div> 
                            <span  class="skill_yes"  > 
                                {{ $skill->skillName }}  
                                <span>
                                   
                                        : P{{ $skill->comepetencyLevelId }}
                                    
                                </span> 
                            </span> 
                        </div>
                    </li> 
                   @endif
                   @endforeach
                  
                </ul>
            </li>
            <li class="s_skill_col">
                 
                <ul class="skill_type">
                  
                     @foreach ($userSkills as $skill) 
                       @if($skill->skillTypeId == 3 )
                         <li>
                        <div class="skill_cnt">  
                            <div class="skill_rating circle" title="Specialist"> 
                            </div> 
                            <span  class="skill_yes"  > 
                                {{ $skill->skillName }}  
                                <span>
                                   
                                        : P{{ $skill->comepetencyLevelId }}
                                    
                                </span> 
                            </span> 
                        </div>
                    </li> 
                       @endif
                    @endforeach
              

                     @foreach($userSpecializations as $data)
                     <li> 
                        <div class="skill_cnt">
                         <span >
                            {{ $data->degreeName }} ({{ $data->specializationName }})
                         </span>
                        </div>
                    </li> 
                    @endforeach
                    
                    <?php 
                    foreach ($userLanguages as $language) { 
                            $lng="";
                            if($language->reading == 1 && $languages->where('id',$language->languageId)->where('reading',1)->count() == 0  )
                            {
                                    $lng.="Read";   
                            }
                           if($language->writeing == 1 && $languages->where('id',$language->languageId)->where('writeing',1)->count() == 0 )
                            {
                                if($lng!=""){$lng.=",";}
                                $lng.="Write";  
                            }
                            if($language->speaking == 1 && $languages->where('id',$language->languageId)->where('speaking',1)->count() == 0 )
                            {
                                if($lng!=""){$lng.=",";}
                                $lng.="Speak";  
                            }
                            if($language->understanding == 1 && $languages->where('id',$language->languageId)->where('understanding',1)->count() == 0 )
                            {
                               if($lng!=""){$lng.=",";}
                               $lng.="Understand";  
                            }
                        if($lng!=""){
                             ?>
                            <li>
                                <div class="skill_cnt">
                                <span> 
                                    {{ $language->languageName }} - {{ $lng }} 
                                </span>
                                </div>       
                            </li>

                    <?php } } ?>

            </li>
        </ul>
    </li>
    </ul>
    @if($jobRoleId > 0)
        @if( sizeof( $jobSkilUserSkill ) == 1 )
        <div class="m_t50 m_b30 text-center">
            <p> Great! you have all the competencies to apply for this<strong> {{ $jobRole->jobRoleName }}</strong> Role.</p>
            @if( $userId == \Auth::user()->id ) 
                @if( $jobSkilUserSkill[0]->status_id == 1 ) 
                    <a href="#" data-id="{{ $jobRole->id }}" id class="btn s_btn bg-green">Applied</a>
                @else 
                    <a href="#" data-id="{{ $jobRole->id }}" id class="apply btn s_btn bg-red">Express Interest</a>
                @endif  
            @endif 
            <a href="{{ url('employeeSearch') }}/{{ $jobRoleId }}" class="btn s_btn bg-gray">  Search Candidates </a>

        </div>
        @else
        <div class="m_t50 m_b30 text-center">
            <p> Sorry! you dont have all the competencies to apply for this<strong> {{ $jobRole->jobRoleName }} </strong> Role.</p>  
           <a href="{{ url('employeeSearch') }}/{{ $jobRoleId }}" class="btn s_btn bg-gray">  Search Candidates </a>     

        </div>
        @endif
    @endif
    
</div>                          