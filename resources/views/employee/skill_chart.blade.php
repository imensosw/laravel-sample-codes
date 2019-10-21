@extends('layouts.main')
@section('content')
<!-- page content -->
<style type="text/css">
    /*#jobRoleId_chosen {
        margin-top: -7px;
    }
    #jobRoleId_chosen .chosen-single {       
        border:none !important;
    }
    #jobRoleId_chosen .chosen-single span {
        font-size: 14px !important; 
    }*/
</style>
<div class="right_col" role="main">
    <div class="width_25 pos_fix prof_area">
        @include('layouts.rightpanel_employee', [])
    </div>

    <h1 class="main_heading m_t10" style="display: block;">
        Role Chart 
        </span><div class="skill_opt pull-right">
        <ul class="inline">
          
            <li>P1 - Entry </li>
            <li>P2 - Intermediate </li>
            <li>P3 - Specialist </li>
            <li>P4 - Master </li>
            <li>P5 - Expert</li>
        </ul>
    </div>
</h1>
<div class="row m_t30">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading m_b30">
                My Role <small class="sml-text text-muted">(Business Unit)</small> 
                <?php //echo \Auth::user()->id; ?>
            </div>
            <div class="col-sm-5 m_b30">
                <label>Employee: </label> 
                {!! Form::select('employeeId', $users,\Auth::user()->id, array('class' => 'col-md-6 chosen-select form-control','id'=>'employeeId')) !!}
            </div>
            <div class="clearfix"></div> 
            <div id="searchDiv">
                @include('employee.skill_chart_search')
            </div>
            <div class="clearfix"></div>
        <div class="panel-body p_t0 p_b30">
            <div id="skill_level" class="skill_level m_t10">
                <ul class="m_skill">
                    <li>                                   
                        <ul class="p_t30 s_skill_row">
                            <li class="s_skill_col border-right">
                                <div class="text-center">
                                    <img src="{{ url('images/technical.png') }}">
                                    <h5> Technical Competencies</h5>
                                </div>

                                <ul class="skill_type">
                                    <li>
                                        <div class="skill_cnt">  
                                            <div class="skill_rating skill_rating_yes circle" title="Specialist">P3</div> 
                                            <span class="skill_yes"> Understand the client specific SOPs, test methods and lab sepcific customized software </span> 
                                        </div>
                                    </li> 
                                    <li> 
                                        <div class="skill_cnt"> 
                                            <div class="skill_rating  skill_rating_yes circle" title="Specialist">P3</div> 
                                            <span class="skill_yes">Expertise on on process monitoring and complete contract review as per ISO 17025 </span>  
                                        </div>
                                    </li>
                                    <li>
                                        <div class="skill_cnt">  
                                            <div class="skill_rating circle" title="Specialist">P3</div> <span> Knowledge on different softline products e.g. textile, leather, toys</span>  
                                        </div>
                                    </li>
                                    <li> 
                                        <div class="skill_cnt"> 
                                            <div class="skill_rating circle" title="Specialist">P3</div> <span>Knowledge on subcontracting process </span>  
                                        </div>
                                    </li>
                                    <li> 
                                        <div class="skill_cnt"> 
                                            <div class="skill_rating circle" title="Master">P4</div> <span> Knowledge on Proforma invoicing and Invoicing </span>  
                                        </div>
                                    </li>
                                    <li> 
                                        <div class="skill_cnt"> 
                                            <div class="skill_rating circle" title="Specialist">P3</div> <span> Knowledge on customer complaint handling techniques </span>  
                                        </div>
                                    </li>
                                    <li> 
                                        <div class="skill_cnt"> 
                                            <div class="skill_rating circle" title="Specialist">P3</div> <span> Ability to provide compassionate, empathetic responses and solutions to complex problems. </span>  
                                        </div>
                                    </li>
                                    <li> 
                                        <div class="skill_cnt"> 
                                            <div class="skill_rating circle" title="Specialist">P3</div> <span> Capable to maintain the Turn around time of test reports. </span>  
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="s_skill_col border-right">
                             <div class="text-center">
                                <img src="{{ url('images/cbs.png') }}">
                                <h5> CBS Competencies</h5>
                            </div>

                            <ul class="skill_type skill_type_2 radius_0">
                               <li> 
                                <div class="skill_cnt">
                                    <div class="skill_rating skill_rating_yes circle" title="Specialist">P2</div> <span class="skill_yes"> Initiative & Decision Making</span>
                                </div>
                            </li> 
                            <li>
                                <div class="skill_cnt"> 
                                    <div class="skill_rating circle" title="Specialist">P2</div> <span> Analyzing & Problem Solving</span> 
                                </div>   
                            </li>
                            <li>
                                <div class="skill_cnt">
                                    <div class="skill_rating circle" title="Specialist">P3</div> <span>Customer Focus</span>
                                </div>       
                            </li>
                            <li>
                                <div class="skill_cnt"> 
                                    <div class="skill_rating circle" title="Specialist">P3</div> <span> Achieve Business Results</span> 
                                </div>     
                            </li>
                            <li>
                                <div class="skill_cnt"> 
                                    <div class="skill_rating circle" title="Specialist">P3</div> <span> Flexibility</span>
                                </div>       
                            </li>
                            <li> 
                                <div class="skill_cnt">
                                    <div class="skill_rating circle" title="Specialist">P3</div> <span> Leading & Engaging</span> 
                                </div>      
                            </li>
                            <li>
                                <div class="skill_cnt"> 
                                    <div class="skill_rating circle" title="Master">P4</div> <span> Teamwork</span>
                                </div>       
                            </li>
                            <li> 
                                <div class="skill_cnt">
                                    <div class="skill_rating circle" title="Master">P4</div> <span>Communication</span>
                                </div>       
                            </li>
                        </ul>
                    </li>
                    <li class="s_skill_col">
                       <div class="text-center">
                        <img src="{{ url('images/general.png') }}">
                        <h5> General Competencies</h5>
                    </div>


                    <ul class="skill_type">

                       <li> 
                        <div class="skill_cnt">
                            <div class="skill_rating circle" title="Specialist">P2</div> <span>MS Office</span>
                        </div>
                    </li> 
                    <li>
                        <div class="skill_cnt"> 
                            <div class="skill_rating circle" title="Specialist">P2</div> <span>MS Excel</span> 
                        </div>   
                    </li>
                    <li>
                        <div class="skill_cnt">
                            <div class="skill_rating circle" title="Specialist">P3</div> <span>MS Powerpoint</span>
                        </div>       
                    </li>
                    <li>
                        <div class="skill_cnt"> 
                            <div class="skill_rating circle" title="Specialist">P3</div> <span> MS Vision</span>
                        </div>       
                    </li>
                    <li>
                        <div class="skill_cnt"> 
                            <div class="skill_rating circle" title="Specialist">P3</div> <span> Oracle Business Suite</span> 
                        </div>     
                    </li>

                    <li> 
                        <div class="skill_cnt">
                           <span>Master - MBA (Finance)</span>
                       </div>
                   </li> 
                   <li>
                    <div class="skill_cnt"> 
                       <span>Bachelor - B.Com (Tax)</span> 
                   </div>   
               </li>

               <li>
                <div class="skill_cnt">
                    <span>Hindi - Read, Write, Speak</span>
                </div>       
            </li>
            <li>
                <div class="skill_cnt"> 
                    <span> English - Read, Write, Speak</span>
                </div>       
            </li>
            <li>
                <div class="skill_cnt"> 
                    <span> Gujrati - Understand</span> 
                </div>     
            </li>
        </ul>
    </li>
</ul>
</li>
</ul>

</div> 
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
  <div id="edit-profile123" class="addUser im-modal" role="dialog" style="display: none;" > 
    <div class="im-modal-header">
      <a href="javascript:;" onclick="$('#edit-profile123').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>        
    </div>
    <div id='email_id' class="im-modal-body">fghfghfg
    </div>
  </div> 
</div>
</div>
</div>
<script type="text/javascript">
    function loadSkillChartTree()
    {
        var  jobRoleId = 0 ;
        if($("#jobRoleId").val() > 0 )
        {
            jobRoleId = $("#jobRoleId").val() ;
        }

        $.ajax({
            url: "{{ url('employee/getjobRoleSkillByjob') }}" ,
            type: "post",
            dataType: "html",
            data:{"_token": "{{ csrf_token() }}", id : jobRoleId ,
                userId :  $("#employeeId").val() } ,
            success:function(data) {
              $("#skill_level").html(data);
            },
            error:function(data)
            {
                $("#skill_level").html("<div class='no-record text-center'><img src='{{ url('images/no-record.png') }}' width='200'><h5 class=text-muted'>No record found</h5></div>");
            }
        }); 
    }
    $(document).ready(function(){
        $(document).on('change','#employeeId,#jobRoleId,#divisionId,#departmentId,#subDepartmentId',function(){
            loadSkillChartTree();
            
        });
        $(document).on('change','#unitId',function(){
            $('#departmentId').empty();
            $('#subDepartmentId').empty();
            $('#jobRoleId').empty();
            $('.chosen-select').trigger('chosen:updated');
            loadSkillChartTree();
        });

        // $(document).on('change','#unitId,',function(){
        //     
        // });
        


        // $(document).on('change','#employeeId',function(){
        //     if( $("#employeeId").val() > 0)
        //     {
        //         $.ajax({
        //             url: "{{ url('employee/getSkillChartSearch') }}" ,
        //             type: "post",
        //             dataType: "html",
        //             data:{"_token": "{{ csrf_token() }}", userId:$("#employeeId").val() } ,
        //             success:function(data) {
        //               $("#searchDiv").html(data);
        //               loadSkillChartTree();
        //             },
        //             error:function(data)
        //             {
                        
        //             }
        //         }); 

                
        //     }
        // });


        $("#jobRoleId").trigger('change') ;

        $(document).on('click','.apply',function(){ 
                var id=$(this).attr('data-id');
                a=$(this);
                    $.ajax({
                         type: "post",
                         url:"employee/jobApply",
                         data:{"_token": "{{ csrf_token() }}",'id':id} ,
                         success: function(data)
                       { 
                         a.removeClass('bg-red');
                         a.removeClass('apply');
                         a.addClass('bg-green');
                         a.html('Applied');
                        alert(data);
                        
                      }, 
                      error:function(data)
                      {
                           var errors = data.responseJSON; 
                           if(errors.success==false && errors.emsg=="validation")
                          { 
                                  errorsHtml = '';

                                  $.each( errors.errors , function( key, value ) {
                                      errorsHtml += value[0]+"\n"; //showing only the first error.
                                  });
                                  errorsHtml += "\n";
                                      
                                  alert(errorsHtml);
                          }
                          else
                          {
                             alert('false');
                          }
                      },
                       dataType:"json"
                    }); 
            return false;
        });  
   });
</script>
@endsection