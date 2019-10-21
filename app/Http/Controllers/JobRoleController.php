<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException; 
use App\Job_role ;
use Validator;
use App\Role ;
use DB;
use Response;
class JobRoleController extends Controller
{
    /**
     * get optopn json.
     * @param    $id
     * @return optopn json
     */
    public function getJobRoleOption($id)
    {
        $sectors =  Job_role::where('subDepartmentId',$id)->pluck('jobRoleName','id');
        return json_encode($sectors);
    }
    public function getJobRoleLanguageRow(Request $request)
    {
        $skill = $request->all();
        return view('job_roles.job_role_language_row',compact('skill'));
    }
    public function getJobRoleSkillRow(Request $request)
    {
        $skill = $request->all();
        $comepetencyLevels = \App\Comepetency_level::all();
        return view('job_roles.job_role_skill_row',compact('skill','comepetencyLevels'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->passes()) {
            $jobRole = new Job_role();
            $jobRole->jobRoleName = $request->name ;
            $jobRole->subDepartmentId = $request->parentId ;
            $jobRole->jobRoleGradeId = $request->jobRoleGradeId ; 
            $jobRole->created_at ;
            $jobRole->updated_at ;
            $jobRole->save();
            return response()->json(['success'=>'Role added successfully.','id'=>$jobRole->id , 'name'=>$jobRole->jobRoleName , 'jobRoleGradeId'=>$jobRole->jobRoleGradeId  ,'url'=>'JobRole'  ]); 
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
   
    /**
     * Delete resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function deleteJobRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:job_roles,id',       
        ]);
        if($validator->passes()) 
        {
            try 
            {
                $result =  Job_role::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>'Role Deleted Successfully!' ]); 
                }
                else
                {
                    return response()->json(['error'=>'Error In Delete Role!']);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>'Error In Delete Role! There is child a record exist.']);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    /**
     * Display a page to setup job role skills .
     *
     * @return \Illuminate\Http\Response
     */

    public function jobRoleSkills()
    {
        $unit = \App\Unit::pluck('unitName','id')->prepend('Select Unit','');
        $jobRole = Job_role::all();
        return view('job_roles.job_role_skills',compact('unit','jobRole'));
    }

    public function showRole()
    {
         return view('job_roles.role_show');
    }

    public function getRoleDetail(Request $request)
    {
        $columns = array( 0 =>'id',1=> 'jobRoleName');
        
        $result = Job_role::select('job_roles.*');
        if( !empty($request['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $result->Where('id',$request['search']['value']);
            $result->orWhere('jobRoleName', 'like', '%' . $request['search']['value'] . '%');
              
            }
        $count = $result->count();
        $result->orderBy( $columns[$request['order'][0]['column']],$request['order'][0]['dir']);

        $result->offset($request['start'])->limit($request['length']);
        $companeies = $result->get();

        $data = array();
        foreach ($companeies as $companey) 
        {
            $data[] = $companey;
        }

        $output = array(
            "recordsTotal" => $count ,
            "recordsFiltered" => $count ,
            "data" => $data,
        );
        echo json_encode($output); //output to json format  
    }
}