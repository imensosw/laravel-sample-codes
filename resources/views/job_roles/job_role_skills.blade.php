@extends('layouts.main')
@section('content')
<!-- page content -->

<div class="left-menu-big">
  <div class="sub-nav-area">
    <h4 class="pull-left">Role Chart</h4>
      <div class="pull-right text-right m_t10"><a href="javascript:;" class="filter"  data-toggle="tooltip" data-placement="bottom" title="Filter Role"><i class="fa fa-filter" aria-hidden="true"></i></a>
      </div>
    <div class="clearfix"></div>
    <ol class="breadcrumb">       
    </ol>
    <div class="clearfix"></div>
    <div class="filter_area">
        <div class="search-big">
          <input placeholder="Search role..." class="search-box" type="text" 
          name="search_role" id="search_role"   />
        </div>   
    </div>
    <div class="filter-form" style="display: none;">   
      <div class="close-form"><img src="{{ url('images/close.png') }}" alt="close"></div>
      <div class="row">    
        <div class="col-sm-12">
            <div class="form-group">
                <label> Unit </label>
                {!! Form::select('unitId', $unit,NULL, array('required'=>true,'class' => 'chosen-select form-control removeFormDiv','id'=>'unitId',  
              'onChange'=>"nestedDropdown(this,'getDivisionOption','divisionId',4,'Select Division')" )) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label> Division </label>
                {!! Form::select('divisionId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd4 removeFormDiv','id'=>'divisionId',  
              'onChange'=>"nestedDropdown(this,'getDepartmentOption','departmentId',3,'ndd','Select Department')" )) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label> Department </label>
                {!! Form::select('departmentId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd3 removeFormDiv','id'=>'departmentId',  
              'onChange'=>"nestedDropdown(this,'getSubDepartmenOption','subDepartmentId',2,'ndd','Select Sub Department')" )) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label> Sub Department </label>
                {!! Form::select('subDepartmentId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd2 removeFormDiv','id'=>'subDepartmentId' )) !!}
            </div>
        </div><div class="col-sm-12 text-center m_t20">
        <button class="btn-curvy bg-gray m_b50" type="button" id="search"> Search </button>
      </div>
      </div>  
    </div>
    <div class="clearfix"></div>
    <div id="job_role_list_div" class="h_550">    
           
    </div>
  </div>
</div>
<div class="right_col" role="main"> 
  <div class="container-liquid">          
      {!! Form::open(array('route' => 'storeJobRoleSkills','method'=>'POST','id'=>'storeJobRoleSkills')) !!}
      {{ csrf_field() }} 
      <div id="JobRoleSkillFormDiv">
      </div>    
      {!! Form::close() !!}
    </div>
  </div>
     </div>
   </div> 
 </div>
</div>

     <!-- /page content -->
     <script type="text/javascript">
      $(document).ready(function(){
        $('#jobRoleId').change(function(){
         $.ajax({
          url: "{{ url('jobRoleSkillForm') }}" ,
          type: "post",
          dataType: "html",
          data:{"_token": "{{ csrf_token() }}", id : $(this).val() } ,
          success:function(data) {
            $("#JobRoleSkillFormDiv").html(data);
            $(".chosen-select").chosen();
          }
        }); 
       });

        $('.removeFormDiv').change(function(){
          $("#JobRoleSkillFormDiv").html('');
        }); 

        $('#search_role').keyup(function(){

          $("#JobRoleSkillFormDiv").html("<div class='no-record text-center'><img src='{{ url('images/no-record.png') }}' width='200'><h5 class=text-muted'>No record found</h5></div>");
         
         $(".breadcrumb").html("");
         var unitValue = $("#unitId").find("option:selected").text();
         var divisionValue = $("#divisionId").find("option:selected").text();
         var departmentValue = $("#departmentId").find("option:selected").text();
         var subDepartmentValue = $("#subDepartmentId").find("option:selected").text();

         var unitId = $("#unitId").val();
         var divisionId = $("#divisionId").val();
         var departmentId = $("#departmentId").val();
         var subDepartmentId = $("#subDepartmentId").val();

          $.ajax({
            url: "{{ url('getjobRoleList') }}" ,
            type: "post",
            dataType: "html",
            data:{"_token": "{{ csrf_token() }}", key_word : $("#search_role").val(),unitId : unitId, divisionId : divisionId,departmentId : departmentId,subDepartmentId : subDepartmentId } ,
            success:function(data) {
              $("#job_role_list_div").html(data);
              var li = "";
              if(unitId>0)
              {
                li += "<li>"+unitValue+"</li>";
              }
              if(divisionId>0)
              {
                li += "<li>"+divisionValue+"</li>";
              }
              if(departmentId>0)
              {
                li += "<li>"+departmentValue+"</li>";
              }
              if(subDepartmentId>0)
              {
                li += "<li>"+subDepartmentValue+"</li>";
              }
              $(".breadcrumb").html(li);
            }
          }); 
        });
        $('#search_role').trigger( "keyup" );
        $('#search').on("click",function(){
          $('.close-form').trigger( "click" );
          $("#JobRoleSkillFormDiv").html('<img src="{{ url('images/no-record.png') }}" class="norecord" />');
          $(".breadcrumb").html("");
         var unitValue = $("#unitId").find("option:selected").text();
         var divisionValue = $("#divisionId").find("option:selected").text();
         var departmentValue = $("#departmentId").find("option:selected").text();
         var subDepartmentValue = $("#subDepartmentId").find("option:selected").text();

         var unitId = $("#unitId").val();
         var divisionId = $("#divisionId").val();
         var departmentId = $("#departmentId").val();
         var subDepartmentId = $("#subDepartmentId").val();
          $.ajax({
            url: "{{ url('getjobRoleList') }}" ,
            type: "post",
            dataType: "html",
            data:{"_token": "{{ csrf_token() }}", key_word : $("#search_role").val(),unitId : unitId, divisionId : divisionId,departmentId : departmentId,subDepartmentId : subDepartmentId } ,
            success:function(data) {
              $("#job_role_list_div").html(data);
              var li = "";
              if(unitId>0)
              {
                li += "<li>"+unitValue+"</li>";
              }
              if(divisionId>0)
              {
                li += "<li>"+divisionValue+"</li>";
              }
              if(departmentId>0)
              {
                li += "<li>"+departmentValue+"</li>";
              }
              if(subDepartmentId>0)
              {
                li += "<li>"+subDepartmentValue+"</li>";
              }
              $(".breadcrumb").html(li);
            }
          }); 
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

      function showJobRoleSkillForm( that , jobRoleId) 
      {
        $("a").removeClass("active");
        $(that).addClass("active");
        $.ajax({
          url: "{{ url('jobRoleSkillForm') }}" ,
          type: "post",
          dataType: "html",
          data:{"_token": "{{ csrf_token() }}", id : jobRoleId } ,
          success:function(data) {
            $("#JobRoleSkillFormDiv").html(data);
            $(".chosen-select").chosen();
          }
        }); 
      }  

      $(document).on('click','.filter, .close-form', function(){
        $(".filter-form").slideToggle("fast");
      }); 
      $(document).on("submit",'#storeJobRoleSkills',function(){
         $.ajax({
          url: $(this).attr("action"),
          type: "post",
          dataType: "json",
          data:new FormData(this),
          contentType: false,       
          cache: false,           
          processData:false,
          success:function(data) 
          {
            if($.isEmptyObject(data.error))
            {
              showMessage(data.success, 'success',10000);
              if( data.completed == "Y")
              {
                 $('.greenRight'+data.jobRoleId).css( 'display','block' );
              }
            }
            else
            {
              showMessage(data.error[0], 'danger',5000000);
            }
          },
        }); 
        return false;
       });
    </script> 
    @endsection