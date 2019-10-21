<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Skill ;
use App\Skill_type;
use Validator;
use DB;
use Response;
class SkillController extends Controller
{ 
    /**
     * get optopn json.
     * @param    $id
     * @return optopn json
     */
    public function index()
    {
        $skill= DB::table('skill_types')->select('*')->get();
        $skillOptions=Skill::where('isManagerApproved',1)->where('isApproved',1)->get();
        $data=array('skill' => $skill ,'skillOptions' => $skillOptions );
        return view('skill.index')->with($data);  
    }
    public function getSkillDetail()
    { 
        return datatables(Skill::select('skills.*','skill_types.skillTypeNameShort','sys_status.statusYN')
        ->leftjoin('skill_types','skills.skillTypeId','=','skill_types.id')
        ->leftjoin('sys_status','sys_status.id','=','skills.isManagerApproved')
        ->where('isManagerApproved',1)
        ->groupBy('skills.id')
        ->get())->toJson();
    }
    public function addSkill(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'skillName' => 'required',
            'skillTypeId' => 'required',
        ],
        [
           'skillName.required' => 'Please enter Skill name!',
           'skillTypeId.required' => 'Please select Skill type!',
        ]
        );
       if ($validator->passes()) 
       {
            $skill= new Skill();
            $skill->SkillName = $request->skillName;
            $skill->skillTypeId = $request->skillTypeId;   
            if($request->has('isApproved'))    
            {
                $skill->isApproved = $request->isApproved;  
            }
            if($request->has('isManagerApproved'))    
            {
                $skill->isManagerApproved = $request->isManagerApproved;
            }
            //$skill->so = $request->so;  
            $skill->created_by = \Auth::user()->id ;         
            $ids=$skill->save();

            $jobRoleIds = $request->input('jobRoleIds') ;
            $skill->jobRole()->sync( $jobRoleIds );

            return response()->json(['success'=>'Record added successfully.','skillId'=>$skill->id,'skillName'=>$skill->SkillName]);        
        } 
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function skillUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'skillName' => 'required',
            'skillTypeId' => 'required',
        ],
        [
           'skillName.required' => 'Please enter Skill name!',
           'skillTypeId.required' => 'Please select Skill type!',
        ]
        );
        if ($validator->passes()) 
        {
            $skill = Skill::find($request->id);
            $skill->skillName = $request->skillName;
            $skill->skillTypeId = $request->skillTypeId;
            $skill->so = $request->so;
            $skill->save();
            $jobRoleIds = $request->input('editJobRoleIds') ;
            $skill->jobRole()->sync( $jobRoleIds );
            return response()->json(['success'=>'Record Updated successfully.']);        
        } 
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function deleteSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'id' => 'required|exists:skills,id'           
        ]);
        if($validator->passes()) 
        {
            try 
            {
                $result =  Skill::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>array('Skill Deleted Successfully!')]); 
                }
                else
                {
                    return response()->json(['error'=>array('Error In Delete Skill!')]);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>array('Error In Delete Skill! There is a child record exist.')]);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
    public function isUserHasCompetency(Request $request)
    { 
        $userSkillRel = \App\User_skill_rel::
        where('skillId',$request->skillId)->where('userId',$request->employeeId )->get();
        $count = count($userSkillRel ) ;
        $success = "";
        if($count > 0 )
        {
            $success = "Please note that ".$request->employeeName." already has ".$request->oldSkillName." on P".$userSkillRel[0]['comepetencyLevelId'].". Merging  will results in ".$request->oldSkillName." with P".$request->newLevel."";
        }
        return response()->json([ 'success'=>$success ]);
    }
    

}