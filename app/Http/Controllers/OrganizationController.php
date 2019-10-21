<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException; 
use App\Unit ;
use App\Division ;
use App\Department ;
use App\Sub_department ;
use App\Job_role ;
use DB;
class OrganizationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::select('id','unitName')->where('id',1)->get()->toarray();
        $unit_data = array(); 
        foreach ($units as $unit)
        {
          $divisions = Division::select('id','divisionName','unitId')->where('unitId',$unit['id'])->get()->toarray();
          $unit_data[] = array_merge($unit ,array("divisions" => $divisions));
        }
        $units= Unit::all();
        $divisions= Division::all();
        $departments = Department::all();
        $sub_departments = Sub_department::all();
        $job_roles = Job_role::all();
        $jobRoleGrade = \App\Job_role_grade::pluck('jobRoleGradeName','id')->prepend('Grade','');
        return view('organization.organization',compact('units','unit_data','divisions','departments','sub_departments','job_roles','jobRoleGrade'));
    }
    
    
    public function nodeUpdate()
    {
      $id = $_POST['primaryId'] ;
      if($_POST['tableName']=="units")
      {
        $node = Unit::firstOrNew(array('id' => "$id"));
        $node->unitName = $_POST['name'];
        $node->save();
      }
      elseif($_POST['tableName']=="divisions")
      {
        $node = Division::firstOrNew(array('id' => "$id"));
        $node->divisionName = $_POST['name'];
        $node->unitId = $_POST['foreignId']; 
        $node->save();
      }
      elseif($_POST['tableName']=="departments")
      {
        $node = Department::firstOrNew(array('id' => "$id"));
        $node->DepartmentName = $_POST['name'];
        $node->divisionId = $_POST['foreignId']; 
        $node->save();
      }
      elseif($_POST['tableName']=="sub_departments")
      {
        $node = Sub_department::firstOrNew(array('id' => "$id"));
        $node->subDepartmentName = $_POST['name'];
        $node->departmentId = $_POST['foreignId']; 
        $node->save();
      }
      elseif($_POST['tableName']=="job_roles")
      {
        $node =  Job_role::firstOrNew(array('id' => "$id"));
        $node->jobRoleName = $_POST['name'];
        $node->subDepartmentId = $_POST['foreignId']; 
        $node->jobRoleGradeId = $_POST['jobRoleGradeId'] ; 
        $node->save();
      }
      $return = array(
        'status' => "error",
        'message' => "Error in updation!",
        'primaryId' => $id,
      );
      if($node->id > 0 )
      {
        $return['status'] = "success" ;
        $return['message'] = "Record updated successfully!";
        $return['primaryId'] = $node->id ;
      }
      return json_encode($return);
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subDepartmentList(Request $request)
    {
        $data = Sub_department::select('id','subDepartmentName as name')->where('departmentId', $request->id)->get();
        $name = "subDepartments";
        $no = "4";
        $updateTo = "jobRolesList";
        $url = "SubDepartment";
        return view('organization.radio_list',compact('data','name','no','updateTo','url'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobRolesList(Request $request)
    {
      $data = Job_role::
      join('job_role_grades', 'job_role_grades.id','=','job_roles.jobRoleGradeId')
      ->select('job_roles.id', DB::raw("CONCAT(job_roles.jobRoleName,' (',job_role_grades.jobRoleGradeName,')') AS name"),'job_roles.jobRoleGradeId','job_roles.jobRoleName as jobRoleName')->where('job_roles.subDepartmentId', $request->id)->get();
      $name = "jobroles";
      $no = "5";
      $url = "JobRole";
      return view('organization.radio_list',compact('data','name','no','url'));
    }
    public function updateUnit(Request $request)
    {
      $status = "error";
      $message = "Error in update unit";
      $units = Unit::find($request->id);
      $units->unitName = $request->value;
      $units->save();
      if($units->id)
      {
        $status = "success";
        $message = "Unit updated successfully!";
      }
      echo json_encode(array('status' =>$status,'message' =>$message,'title' =>"Unit"));
      die();
    }
    public function updateDivision(Request $request)
    {
      $status = "error";
      $message = "error in update division";
      $Divisions = Division::find($request->id);
      $Divisions->divisionName = $request->value;
      $Divisions->save();
      if($Divisions->id)
      {
        $status = "success";
        $message = "Division updated successfully!";
      }
      echo json_encode(array('status' =>$status,'message' =>$message,'title' =>"Division"));
      die();
    }
    public function updateDepartment(Request $request)
    {
      $status = "error";
      $message = "error in update department";
      $Departments = Department::find($request->id);
      $Departments->departmentName = $request->value;
      $Departments->save();
      if($Departments->id)
      {
        $status = "success";
        $message = "Department updated successfully!";
      }
      echo json_encode(array('status' =>$status,'message' =>$message,'title' =>"Department"));
      die();
    }
    public function updateSubDepartment(Request $request)
    {
      $status = "error";
      $message = "error in update subdepartment";
      $SubDepartments = Sub_Department::find($request->id);
      $SubDepartments->subDepartmentName = $request->value;
      $SubDepartments->save();
      if($SubDepartments->id)
      {
        $status = "success";
        $message = "Sub department updated successfully!";
      }
      echo json_encode(array('status' =>$status,'message' =>$message,'title' =>"SubDepartment"));
      die();
    }
    public function updateJobRole(Request $request)
    {
      $status = "error";
      $message = "Error in update jobRole";

      if($request->value == '')
      {
        $message = "Please enter role!";
        return json_encode(array('status' =>$status,'message' =>$message,'title' =>"JobRole"));
      }

      $JobRoles = Job_role::find($request->id);
      $JobRoles->jobRoleName = $request->value;
      $JobRoles->jobRoleGradeId = $request->jobRoleGradeId;
      $JobRoles->save();
      if($JobRoles->id)
      {
        $status = "success";
        $message = "Role updated successfully!";
      }
      return json_encode(array('status' =>$status,'message' =>$message,'title' =>"JobRole"));
      
    }
}