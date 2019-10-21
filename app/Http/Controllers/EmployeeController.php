<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Crypt;
use Response;
use App\User;
use DB;
use Validator;
class EmployeeController extends Controller
{
   
    public function storeEmployeeCompetency(Request $request)
    {
        $this->validate($request, [
            //'specialization' => 'required',            
         ]);
        $userId = \Auth::user()->id; 
        $user = \App\User::find($userId);
        $languages = $request->language ;
        $message = 'Competency updated successfully!';
        $verificationCount = \App\User_skill_verification::where('userId',$userId)->where('isVerified',0)->count();
        if($verificationCount > 0)
        {
            return redirect('employeeCompetency');
        }
        
        foreach ($languages as $languageId)
        {
            $JobRoleLanguageRel = \App\User_language_rel::firstOrNew(array('userId' => $userId , 'languageId' => $languageId));
            $JobRoleLanguageRel->userId = $userId;
            $JobRoleLanguageRel->languageId = $languageId;
            $JobRoleLanguageRel->reading = ( $request->input("lanngRead$languageId") > 0 ) ? 1 : 0 ;
            $JobRoleLanguageRel->writeing = ( $request->input("lanngWrite$languageId") > 0 ) ? 1 : 0 ;
            $JobRoleLanguageRel->speaking = ( $request->input("lanngSpeak$languageId") > 0 ) ? 1 : 0 ;
            $JobRoleLanguageRel->understanding = ( $request->input("lanngUnderstand$languageId") > 0 ) ? 1 : 0 ;
            $JobRoleLanguageRel->save();
        }

        $specializationIds = $request->input('specializationId') ;
        if($specializationIds)
        {
            $specializationIds = array_filter($specializationIds);  
        }
        $user->specialization()->sync( $specializationIds );

        $skills = $request->input("skills") ;
        $data = array() ;
        if($skills)
        {
            foreach ($skills as  $skillId) 
            {
                if( $request->input("skill$skillId") )
                {
                    $userSkillRel = \App\User_skill_rel::where('userId',$userId)->where('skillId',$skillId)->get();
                    $data[$skillId] =['comepetencyLevelIdTemp' => $request->input("skill$skillId")];
                    if( count( $userSkillRel ) == 0 )
                    {
                        $data[$skillId] =['comepetencyLevelId' => $request->input("skill$skillId"),'comepetencyLevelIdTemp' => $request->input("skill$skillId"),'isApproved' => 0 ];
                    } 
                }
            }
        }
        $user->skill()->sync( $data );
        if( isset( $request["saveAndVerification"] ))
        {
            if($verificationCount == 0)
            {
                $unverifideSkillCount = \App\User_skill_rel:: where('userId',$userId)
                ->whereRaw('( isApproved = 0 OR comepetencyLevelId != comepetencyLevelIdTemp )')->count();
                if($unverifideSkillCount > 0 )
                {
                    $userSkillVerification = new \App\User_skill_verification();
                    $userSkillVerification->userId = $userId;
                    $userSkillVerification->requestDate = date('Y-m-d');
                    $userSkillVerification->created_at = date('Y-m-d H:i:s');
                    $userSkillVerification->updated_at = date('Y-m-d H:i:s');
                    $userSkillVerification->save();
                    $message = 'Competencies sent for verification!';
                }
                else
                {
                    $message = 'No Competencies to verify!';
                    $request->session()->flash('alert-success',$message );
                    return redirect('employeeCompetency');
                } 
            }
        }
        $request->session()->flash('alert-success',$message );
        return redirect('employeeCompetency');
    }
    public function employeeSkillChart() 
    {
        $units=\App\Unit::pluck('unitName','id');
        $divisions=\App\Division::where('unitId',\Auth::user()->unitId)->pluck('divisionName','id')->prepend('Select Division','');
        $departments=\App\Department::where('divisionId',\Auth::user()->divisionId)->pluck('departmentName','id')->prepend('Select Department','');
        $subDepartments=\App\Sub_department::where('departmentId',\Auth::user()->departmentId)->pluck('subDepartmentName','id')->prepend('Select Sub Department','');
        $JobRoles=\App\Job_role::where('subDepartmentId',\Auth::user()->subDepartmentId)->pluck('jobRoleName','id')->prepend('Select Role','0'); 

        $users = User::leftjoin('job_roles','job_roles.id','=','users.jobRoleId')
        ->select(DB::raw("CONCAT(users.name,' (',job_roles.jobRoleName,')') AS name"),'users.id')
        ->where('users.id' , \Auth::user()->id)
        ->orWhere('users.reportingToId',\Auth::user()->id)
        ->pluck('name','id')->prepend('Select','0');

        $user = User::find(\Auth::user()->id); 

        return view('employee.skill_chart',array('JobRoles'=>$JobRoles,'units'=>$units,'divisions'=>$divisions,'departments'=>$departments,'subDepartments'=>$subDepartments, 'users'=>$users, 'user'=>$user  ));
    }
    public function getSkillChartSearch(Request $request)
    {
        $user = User::find($request->userId);

        $units=\App\Unit::pluck('unitName','id');
        $divisions=\App\Division::where('unitId',$user->unitId)->pluck('divisionName','id');
        $departments=\App\Department::where('divisionId',$user->divisionId)->pluck('departmentName','id');
        $subDepartments=\App\Sub_department::where('departmentId',$user->departmentId)->pluck('subDepartmentName','id');
        $JobRoles=\App\Job_role::where('subDepartmentId',$user->subDepartmentId)->pluck('jobRoleName','id'); 

        $users = User::leftjoin('job_roles','job_roles.id','=','users.jobRoleId')
        ->select(DB::raw("CONCAT(users.name,' (',job_roles.jobRoleName,')') AS name"),'users.id')
        ->where('users.id' , $user->id)
        ->orWhere('users.reportingToId',$user->id)
        ->pluck('name','id');

        return view('employee.skill_chart_search',array('JobRoles'=>$JobRoles,'units'=>$units,'divisions'=>$divisions,'departments'=>$departments,'subDepartments'=>$subDepartments, 'user'=>$user));

    }
    
    public function getjobRoleSkillByjob(Request $request)
    { 
        $userId = $request->userId ;
        $jobRoleId =  $request->id ;
        $skillChartDetail = User::getSkillChartDetail( $userId , $jobRoleId );    
        $languages = $skillChartDetail['languages'];
        $skills = $skillChartDetail['skills'];
        $jobRoleSpecializationRels = $skillChartDetail['jobRoleSpecializationRels'];
        $jobSkilUserSkill = $skillChartDetail['jobSkilUserSkill'];
        $jobRole = $skillChartDetail['jobRole'];  
        $jobApplyCount = \App\User::
            Join('job_apply', function($join) use ($jobRoleId){
                $join->on('job_apply.user_id', '=', 'users.id')
                ->where('job_apply.role_id',$jobRoleId)
                ->where('job_apply.status_id',1);
            })->where('users.id',$userId)->count();

        $userSkills = \App\User_skill_rel::join('skills','skills.id','=','user_skill_rels.skillId')
            ->leftJoin('job_role_skill_rels', function($join) use ($jobRoleId){
                $join->on('skills.id', '=', 'job_role_skill_rels.skillId')
                ->where('job_role_skill_rels.jobRoleId',$jobRoleId);
            })
            ->select('user_skill_rels.*','skills.skillName','skills.skillTypeId') 
            ->where('job_role_skill_rels.id',NULL)
            ->where('user_skill_rels.userId',$userId)
            ->where('user_skill_rels.isApproved',1)->get();


        $userLanguages = \App\User_language_rel::join('languages','languages.id','=','user_language_rels.languageId')
            ->leftJoin('job_role_language_rels', function($join) use ($jobRoleId){
                $join->on('languages.id', '=', 'job_role_language_rels.languageId')
                ->where(function($query){
                    $query->where('job_role_language_rels.reading','user_language_rels.reading')
                    ->where('job_role_language_rels.writeing','user_language_rels.writeing')
                    ->where('job_role_language_rels.speaking','user_language_rels.speaking')
                    ->where('job_role_language_rels.understanding','user_language_rels.understanding')   ;    
                    })
                    ->where('job_role_language_rels.jobRoleId',$jobRoleId);
            })
            ->select('user_language_rels.*','languages.languageName') 
            ->where('job_role_language_rels.id',NULL)
            ->where('user_language_rels.userId',$userId)
            ->groupBy('user_language_rels.id')
            ->get();

        $userSpecializations = \App\User_specialization_rel::join('specializations','specializations.id','=','user_specialization_rels.specializationId')
            ->join('degrees','degrees.id','=','specializations.degreeId')
            ->leftJoin('job_role_specialization_rels', function($join) use ($jobRoleId){
                $join->on('specializations.id', '=', 'job_role_specialization_rels.specializationId')
                ->where('job_role_specialization_rels.jobRoleId',$jobRoleId);
            })
            ->select('user_specialization_rels.*','specializations.specializationName','degrees.degreeName') 
            ->where('job_role_specialization_rels.id',NULL)
            ->where('user_specialization_rels.userId',$userId)
            ->get();

        return view('employee.get_skill_chart',compact('userId','languages','skills','jobRoleSpecializationRels','jobRole','jobApplyCount','jobSkilUserSkill','jobRoleId','userSkills','userLanguages','userSpecializations'));
    }

    public function getUnverifiedCompetencyJson( Request $request)
    {
      $result = \App\User_skill_verification::where('user_skill_verifications.isVerified',0)->where('users.reportingToId',\Auth::user()->id)
      ->join('users', 'users.id', '=', 'user_skill_verifications.userId')
      ->select('users.id','users.name','users.employeeId')
      ->orderBy('user_skill_verifications.id', 'desc');
      $count = $result->count();
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
      //output to json format
      echo json_encode($output);
    }
    
    public function storeVerifiedCompetency(Request $request)
    { 
        $this->validate($request, [
            //'specialization' => 'required',            
         ]);
        $userId = $request['employeeId']; 
        $user = \App\User::find($userId);
        
        $skills = $request->input("skills") ;
        $data = array() ;
        if($skills)
        {
            $unApproved = array();
            foreach ($skills as  $skillId) 
            {
                if( $request->input("skill$skillId") )
                {
                    $data[$skillId]=['comepetencyLevelId' => $request->input("skill$skillId"),
                    'comepetencyLevelIdTemp' => $request->input("comepetencyLevelIdTemp$skillId"),
                    'isApproved' => 1,];
                }
                 $unApproved[] = $skillId ;
            }
            $user->skill()->syncWithoutDetaching( $data );

            \App\Skill::whereIn('id', $unApproved)
            ->update([
                'isManagerApproved' => 1 ,
            ]);
        }
        \App\User_skill_verification::where('userId', $userId)->where('isVerified', 0)
        ->update(['isVerified' => 1,'verificationDate' => date('Y-m-d'),
            'verificationByUserId' => \Auth::user()->id ,
            'updated_at' => date('Y-m-d H:i:s')]);
    
        return redirect('home');
    }

    public function employeeJobAlert()
    {
        $result = \App\User::getJobSkilUserSkill( \Auth::user()->id ); 
        return view('employee.job_alert',array( 'result'=>$result));
    }

    public function jobApply(Request $request)
    {
        
         $validator = \Validator::make($request->all(), [
                'id' => 'required|unique:job_apply,role_id|exists:job_roles,id'
            ]);
            if($validator->fails()) {
                   return Response::json(array(
                        'success' => false,
                        'emsg'=>'validation',
                        'errors' => $validator->getMessageBag()->toArray()

                    ), 400);
            }
             $user_id = \Auth::user()->id;  

           $id=$request->id;
           $rs=DB::table('job_apply')->insert(array('role_id'=>$id,'user_id'=>$user_id,
            'status_id'=>1,'created_at'=>date('Y-m-d H:i:s')));
           if($rs)
           {
             return  json_encode('Job Applied successfully.');

           }
           return   json_encode('Error in Applying Job!');
    }
public function editProfile()
    {        
         $id = \Auth::user()->id; 
         $users= DB::table('users')->select('*')->where('id','=',  $id)->get();   
        return   json_encode(array('user' =>$users));
    }
public function UpdateProfile(Request $request)
    {      
    $this->validate($request, [
            'fname' => 'required',            
         ]);
    $user = User::find($request->id);
         if($request->image)
         {      
            $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:50000',
        ]);
            $imageName = 'profile'. '_' .$request->id.'.'.'jpg';
            $request->image->move(public_path('/profile_image'), $imageName);
            $user->image = $imageName;
         }  
        $user->name = $request->fname.' '.$request->lname;
        $user->fName = $request->fname;
        $user->lName = $request->lname;      
        $user->mobileNo = $request->mobileNo;           
        $user->save();
        $request->session()->flash('alert-success', 'User profile updated successfully!');
       return redirect('home');
        
    }
}