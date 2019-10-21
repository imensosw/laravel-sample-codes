<div class="container_fluid" style="overflow-x: hidden;">
  <div class="circle profileimg">
    <img src="{{asset('public/profile_image/'.\Auth::user()->image)}}" alt="proline name">
  </div>
  <div class="h_550 sementic-space">
    <div class="text-center m_b30">
      <div class="employee_nm">{{ \Auth::user()->name }}</div>
      <div class="">  {{ \Auth::user()->jobRole->jobRoleName }} </div>
    </div>
    <div class="m_b30">
      <?php  $userDetail = \App\User::businessUnit() ;
      //echo "<pre>";
      //print_r($userDetail);
      //die(); ?>
      <table class="table">
        <tr>
          <th>Employee Id</th>
          <td>{{ \Auth::user()->employeeId }}</td>
        </tr>
        <tr>
          <th>Business Unit</th>
          <td>  {{ $userDetail->unitName }}  </td>
        </tr>
         <tr>
          <th>Division</th>
          <td>  {{ $userDetail->divisionName }}  </td>
        </tr>
         <tr>
          <th>Department</th>
          <td>  {{ $userDetail->departmentName }}  </td>
        </tr>
         <tr>
          <th>Sub Department</th>
          <td>  {{ $userDetail->subDepartmentName }}  </td>
        </tr>
         <tr>
          <th>Reporting To</th>
          <td>  {{ $userDetail->reportingToName }}  </td>
        </tr>
        <tr>
          <th>Highest Qualification</th>
          <td>
          <?php
            $userSpecialization =  \Auth::user()::userSpecialization() ;
            foreach ($userSpecialization as $specialization) 
            {
              echo $specialization['qualificationName']." - ".$specialization['degreeName']." - ",$specialization['specializationName'] ."<br>";
            }
          ?>
          
          </td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ \Auth::user()->email }}</td>
        </tr>
        <tr>
          <th>Phone</th>
          <td>{{ \Auth::user()->mobileNo }}</td>
        </tr>
       
      </table>
      <div class="m_t20 text-center">
        <a href="#" class="open_modal rounded-btn">Edit Info</a>
       <!--  <a href="javascript:;" id="edit-profile123_btn" data-id="employee_bio_body__" onclick="$('#edit-profile123').show(200);;" class="btn s_btn bg-gray_1"  alt="ul icon"> Full Bio</a> -->
      </div>
    </div>
  </div>
  <div class="text-center container-fluid">
  <!-- <a href="#" class="btn btn-block bg-red">Profile</a> -->
  </div>
</div>