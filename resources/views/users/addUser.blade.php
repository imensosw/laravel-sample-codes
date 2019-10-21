<div class="im-modal-header">
      <a href="javascript:;" onclick="$('#add-employee').hide(200);" class=""><img src="{{ url('images/close.png') }}"  alt="close" class="im-close"></a>
      <h5 class="im-modal-title">Add New Employee</h5>
    </div>
    <div class="im-modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form_heading">
            <h2>Basic Information</h2>
          </div>
        </div>
        <form id="addEmployee" class="tmarg" style="display: inline-block; width: 100%">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="fname">First Name *</label>
              <input type="text" required class="form-control" name="fname" id="f_nm" placeholder="Enter First Name">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="lname">Last Name</label> 
              <input type="hidden" class="form-control" name="userId" id="e_id" placeholder="Enter Last Name">
              <input type="text" class="form-control" name="lname" id="l_nm" placeholder="Enter Last Name">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="lname">Employee Id  *</label> 
              <input type="text" class="form-control" name="employeeId" id="employeeId" required placeholder="Enter Employee Id ">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="email">Email Address *</label>
              <input type="email" required class="form-control" name="email" id="e_id" placeholder="Enter Email Address">
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for="mobile">Mobile No.</label>
              <input type="text" class="form-control" name="mobileNo" id="m_no" placeholder="Enter Mobile Number Name">
            </div>
          </div>
          <div class="col-sm-12" style="display: none;">
            <div class="form_heading">
              <h2>Language Proficiency</h2>
            </div>
            <div class=" panel panel-default m_b0" id="other_details">
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
                          <input type="checkbox" name="lanngRead{{ $language->id }}"  id="lanngRead{{ $language->id }}" value="1">
                          <label for="lanngRead{{ $language->id }}"> </label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="inline_block1">
                          <input type="checkbox" name="lanngWrite{{ $language->id }}" id="lanngWrite{{ $language->id }}"  value="1" >
                          <label for="lanngWrite{{ $language->id }}"> </label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="inline_block1">
                          <input type="checkbox" name="lanngSpeak{{ $language->id }}" id="lanngSpeak{{ $language->id }}" value="1" >
                          <label for="lanngSpeak{{ $language->id }}"> </label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="inline_block1">
                          <input type="checkbox" name="lanngUnderstand{{ $language->id }}" id="lanngUnderstand{{ $language->id }}" value="1" >
                          <label for="lanngUnderstand{{ $language->id }}"> </label>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>            
          <div class="clearfix"></div>
          <div class="col-sm-12">
            <div class="form_heading">
              <h2>Role Information</h2>
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Unit *: </label>
              {!! Form::select('unitId', $unit,NULL, array('required'=>true,'class' => 'chosen-select form-control removeFormDiv','id'=>'unitId',  
              'onChange'=>"nestedDropdown(this,'getDivisionOption','divisionId',4,'Select Division')" )) !!}
            </div>  
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Division *: </label> 
              {!! Form::select('divisionId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd4 removeFormDiv','id'=>'divisionId',  
              'onChange'=>"nestedDropdown(this,'getDepartmentOption','departmentId',3,'ndd','Select Department')" )) !!}
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Department *: </label> 
              {!! Form::select('departmentId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd3 removeFormDiv','id'=>'departmentId',  
              'onChange'=>"nestedDropdown(this,'getSubDepartmenOption','subDepartmentId',2,'ndd','Select Sub Department')" )) !!}
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label> Sub Department *: </label> 
              {!! Form::select('subDepartmentId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd2 removeFormDiv','id'=>'subDepartmentId',  
              'onChange'=>"nestedDropdown(this,'getJobRoleOption','jobRoleId',1,'ndd','Select Role')" )) !!}
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label> Role *:</label> 
              {!! Form::select('jobRoleId', array(),NULL, array('required'=>true,'class' => 'chosen-select form-control ndd1','id'=>'jobRoleId')) !!}
            </div>
          </div>

          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label>Reporting To *</label>
              <select  data-placeholder="Select Industry" name="reportingToId" id="manager" class="required chosen-select form-control">
                <option value="" >select</option>
                @foreach($user_result as $user)
                <option value="{{$user->id}}" >{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-3 m_b10">
            <div class="form-group">
              <label for=" ">Role Type *</label>
              <select  data-placeholder="Select Industry" name="role_id" class=" required chosen-select form-control">
                <option value="" >select</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" >{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="col-sm-12 text-right m_t20">
            <a href="javascript:;" onclick="$('#add-employee').hide(200);" class="btn-curvy bg-sky mr10"> Cancel </a>
            <button class="btn-curvy bg-red"> Submit </button>
          </div>
        </form>      
      </div>
    </div>