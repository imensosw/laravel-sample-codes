<div class="left_col">
  <div class="scroll-view">
    <div class="clearfix"></div>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section navbar">
        <!-- <h3>General</h3> -->
        <ul class="nav side-menu">
          <?php if( session('role') == 2) { ?>
          <li>
            <a href="{{ url('home') }}" title="UL" class="brand_logo"> <img src="{{ url('images/ul-icon1.png') }}" alt="ul icon"> </a>
          </li>
          <li @if( substr(Request::path(),0,4) == 'home') class="active" @endif>
            <a href="{{ url('home') }}" data-toggle="tooltip" data-placement="right" title="Home"> <img src="{{ url('images/icons/home.svg') }}" class="svg" alt="ul icon"> <span>Home </span> </a>
          </li> 
          <li  @if( substr(Request::path(),0,18) == 'employeeCompetency') class="active" @endif>
            <a href="{{ url('employeeCompetency') }}"  data-toggle="tooltip" data-placement="right" title="My Competency"> <img src="{{ url('images/icons/layers.svg') }}" class="svg" alt="ul icon"><span>My Competency</span> </a>
          </li>         
          <li @if( substr(Request::path(),0,16) == 'employeeJobAlert') class="active" @endif>
            <a href="{{ url('employeeJobAlert') }}" data-toggle="tooltip" data-placement="right" title="Job Alert"> <img src="{{ url('images/icons/bell.svg') }}" class="svg" alt="ul icon"> <span>Job Alert </span> </a>
          </li>
          <!-- <li>
            <a href="{{ url('employeeSearch') }}" title="Employee Search" data-toggle="tooltip" data-placement="right" title="Employee Search"> <img src="{{ url('images/icons/search.svg') }}" class="svg" alt="ul icon"> <span>Employee Search </span> </a>
          </li> -->
          <li @if( substr(Request::path(),0,18) == 'employeeSkillChart') class="active" @endif >
            <a href="{{ url('employeeSkillChart') }}" data-toggle="tooltip" data-placement="right" title="Role Chart">  <img src="{{ url('images/icons/tree-structure.svg') }}" class="svg" alt="ul icon">  <span>Role Chart </span> </a>
          </li>
          <li @if( substr(Request::path(),0,14) == 'employeeSearch') class="active" @endif >
           <a href="{{ url('employeeSearch') }}" title="Search Candidates" data-placement="right"  data-toggle="tooltip" > <img src="{{ url('images/icons/search.svg') }}" class="svg" alt="ul icon"> <span>Search Candidates</span> </a>
         </li>

          <?php } elseif( session('role') == 1) { ?>
          <li >
            <a href="{{ url('home') }}"  title="UL" class="brand_logo"> <img src="{{ url('images/ul-icon1.png') }}" alt="ul icon"> </a>
          </li>
          <li @if( substr(Request::path(),0,4) == 'home') class="active" @endif >
            <a href="{{ url('home') }}"  data-toggle="tooltip" data-placement="right" title="Dashboard"> <img src="{{ url('images/icons/link.svg') }}" class="svg" alt="ul icon"> <span>Dashboard </span> </a>
          </li>
          <li @if( substr(Request::path(),0,14) == 'employeeSearch') class="active" @endif >
           <a href="{{ url('employeeSearch') }}" title="Search Candidates" data-placement="right"  data-toggle="tooltip" > <img src="{{ url('images/icons/search.svg') }}" class="svg" alt="ul icon"> <span>Search Candidates</span> </a>
         </li>
         <li @if( substr(Request::path(),0,12) == 'organization') class="active" @endif >
          <a href="{{ url('organization') }}"  title="Organization Chart" data-toggle="tooltip" data-placement="right" title="Add Role"> <img src="{{ url('images/icons/tree-structure.svg') }}" class="svg" alt="ul icon"> <span>Organization Chart</span> </a>
        </li>
        <li @if( substr(Request::path(),0,13) == 'jobRoleSkills') class="active" @endif>
          <a href="{{ url('jobRoleSkills') }}"  data-toggle="tooltip" data-placement="right" title="Role Chart"> <img src="{{ url('images/icons/user.svg') }}" class="svg" alt="ul icon"> <span>Role Chart</span> </a>
        </li>

        <li @if( substr(Request::path(),0,10) == 'manageUser' || substr(Request::path(),0,12) == 'manageDegree' || substr(Request::path(),0,20) == 'manageSpecialization' || substr(Request::path(),0,14) == 'manageLanguage' || substr(Request::path(),0,11) == 'skillmanage') class="active" @endif>
          <a href="{{ url('manageUser') }}" data-toggle="tooltip" data-placement="right" title="Setting"> <img src="{{ url('images/icons/settings.svg') }}" class="svg" alt="ul icon"> <span>Setting</span> </a>
        </li>          
           <!-- <li>
            <a href="{{ url('manageDegree') }}"  data-toggle="tooltip" data-placement="right" title="Master"> <img src="{{ url('images/icons/link.svg') }}" class="svg" alt="ul icon"><span>Set Role Skills </span> </a>
          </li> -->

          <?php } elseif( session('role') == 3) { ?>
          <li>
            <a href="{{ url('home') }}" title="UL" class="brand_logo"> <img src="{{ url('images/ul-icon.png') }}" alt="ul icon"> </a>
          </li>
          <li @if( substr(Request::path(),0,4) == 'home') class="active" @endif>
            <a href="{{ url('home') }}" data-toggle="tooltip" data-placement="right" title="Home"> <img src="{{ url('images/icons/home.svg') }}" class="svg" alt="ul icon"> <span>Home </span> </a>
          </li>
          <li @if( substr(Request::path(),0,18) == 'employeeCompetency') class="active" @endif >
            <a href="{{ url('employeeCompetency') }}" data-toggle="tooltip" data-placement="right" title="My Competency"> <img src="{{ url('images/icons/layers.svg') }}" class="svg" alt="ul icon"><span>My Competency</span> </a>
          </li>      
          <li @if( substr(Request::path(),0,16) == 'employeeJobAlert') class="active" @endif >
            <a href="{{ url('employeeJobAlert') }}" data-toggle="tooltip" data-placement="right" title="Job Alert"> <img src="{{ url('images/icons/bell.svg') }}" class="svg" alt="ul icon"> <span>Job Alert </span> </a>
          </li>
          <li @if( substr(Request::path(),0,18) == 'employeeSkillChart') class="active" @endif>
            <a href="{{ url('employeeSkillChart') }}" data-toggle="tooltip" data-placement="right" title="Role Chart"> <img src="{{ url('images/icons/tree-structure.svg') }}" class="svg" alt="ul icon"> <span>Role Chart </span> </a>
          </li>
          <li @if( substr(Request::path(),0,14) == 'employeeSearch') class="active" @endif >
           <a href="{{ url('employeeSearch') }}" title="Search Candidates" data-placement="right"  data-toggle="tooltip" > <img src="{{ url('images/icons/search.svg') }}" class="svg" alt="ul icon"> <span>Search Candidates</span> </a>
          </li>
          <?php } ?>

          
        </ul>
        <ul class="userinfo">
         <li class="dropdown dropup">
          <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown">
            <div class="top_Proimg">
              <img src="{{asset('public/profile_image/'.\Auth::user()->image)}}" alt="">
            </div>               

          </a>
          <ul class="dropdown-menu dropdown-usermenu">
            <li><div class="top_Pronm">{{ \Auth::user()->name }}
            <span>{{ \Auth::user()->jobRole->jobRoleName }}</span> </div> </li>
            <li><a href="#" class="open_modal"> Profile</a></li>
            <!-- <li>
            <a href="javascript:;"> <span>Settings</span> </a>
            </li> -->
            <li><a href="javascript:;" data-toggle="modal" data-target="#password-change">Change Password</a></li>
            <li><a href="{{ url('logout') }}"> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->
  </div>
</div>

    <!-- Modal code -->
    <div id="edit-profile" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><img src="{{ url('images/icons/close.svg') }}" alt="close" class="svg close"></button>
            <h4 class="modal-title">Edit Profile Details</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form_heading">
                  <h2>Basic Information</h2>
                  <div style="float: right;">
                    <div  id="email_id"></div>
                  </div>
                </div>
              </div>
            </div>
            <form id="editProfile" method="POST" action="updateProfile" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <!-- {!! Form::open(array('route' => 'updateProfile','method'=>'POST')) !!}
                {{ csrf_field() }}-->
              <div class="col-sm-6 m_b20">
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="hidden" name="id" value=" " required="" class="form-control" id="userId">
                  <input type="text" name="fname"  value=" " class="form-control" id="fname_edit" placeholder="Enter First Name">
                </div>
              </div>
              <div class="col-sm-6 m_b20">
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" name="lname" value=" " class="form-control" id="lname_edit" placeholder="Enter Last Name">
                </div>
              </div>      
              <div class="col-sm-6 m_b20">
                <div class="form-group">
                  <label for="mobile">Mobile No.</label>
                  <input type="text" name="mobileNo"  class="form-control" value=" "  id="mobile_edit" placeholder="Enter Mobile No.">
                </div>
              </div>
              <div class="col-sm-6 m_b20">
                <div class="form-group">
                  <label for="Image">Image:</label>
                  <!-- <input type="file" name="image"  id="image_edit"> -->
                  <div class="form-inline">              
                    <span class="fileinput-button btn-block">
                      <input type="file" name="image"  id="image_edit">
                    </span>
                  </div>
                </div>
              </div>    
              <div class="col-sm-12 text-center m_b20">
                <button class="btn-curvy bg-red"> Submit </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="password-change" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><img src="{{ url('images/icons/close.svg') }}" alt="close" class="svg close"></button>
            <h4 class="modal-title">Change Password Details</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form_heading">
                  <h2>New password</h2>
                </div>
              </div>
            </div>
            <form id="updatePassword" method="POST" action="updatePassword" enctype="multipart/form-data">
              <div class="col-sm-6 m_b20">
                <div class="form-group">
                  <label for="fname">New Password</label>
                  <input type="hidden" name="id" class="form-control" id="id" value="{{ \Auth::user()->id }}">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password">
                </div>
              </div>  
              <div class="col-sm-6 m_b20">
                <div class="form-group">
                  <label for="fname">Confirm Password</label>
                  <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm password">
                </div>
              </div>   
              <div class="col-sm-12 text-center m_b20">
                <button class="btn-curvy bg-red"> Submit </button>
              </div>
            </form>
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

    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.open_modal',function(){
          $.ajax({
            url:"{{ url('employee/profile') }}",
            type: "post",
            dataType: "html",
            data:{"_token": "{{ csrf_token() }}" } ,
            success:function(data) {
                //alert(data);
                var email_id=' <label >Email: '+data.user[0]['email']+'</label>';
                $('#userId').val(data.user[0]['id']);
                $('#fname_edit').val(data.user[0]['fName']);
                $('#lname_edit').val(data.user[0]['lName']);
                $('#email_id').html(email_id);
                $('#mobile_edit').val(data.user[0]['mobileNo']); 
                $("#edit-profile").modal('show');
              },
              dataType:"json"
            });          
            //$("#edit_modal").html(data);
            $(".chosen-select").chosen();              
        }); 
        $(document).on('submit','#updatePassword',function(){
          $.ajax({
            url:"{{ url('updatePassword') }}",
            type: "post",
            dataType: "html",
            data:{"_token": "{{ csrf_token() }}",id:$("#id").val(),password:$("#password").val(),cpassword:$("#cpassword").val() } ,
            success:function(data) 
            {
              //alert(data);
              if($.isEmptyObject(data.error))
              {
                $(".close").trigger("click");
                showMessage(data.success, 'success',5000); 
              }
              else
              {
                showMessage(data.error[0], 'danger');
              } 
            },
            dataType:"json"
          });          
          return false;            
        }); 
      });
    </script>
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
      @endforeach
    </div> 
    @if (count($errors) > 0)
    <div class = "alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <script type="text/javascript">
     $(document).ready(function(){  
      setTimeout(function() {
        $('.alert').fadeOut('fast');
        }, 5000); // <-- time in milliseconds
    });
  </script>