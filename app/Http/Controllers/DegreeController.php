<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Degree ;
use App\Qualification;
use Validator;
use DB;
use Response;
class DegreeController extends Controller
{
    
    /**
     * get optopn json.
     * @param    $id
     * @return optopn json
     */
    public function getDegreeOption($id)
    {
        $degrees =  Degree::where('qualificationId',$id)->pluck('degreeName','id');
        return json_encode($degrees);
    }
    public function manageDegree()
    {
        $qualifications= DB::table('qualifications')->select('*')->get();
        $data=array(
            'qualifications'=>$qualifications          
            );

        return view('degree.manage_degree')->with($data);  
    }
    public function getDegreeDetail()
    { 
        return datatables(Degree::select('degrees.*','qualifications.qualificationName')
        ->leftjoin('qualifications','degrees.qualificationId','=','qualifications.id')
        ->groupBy('degrees.id')
        ->get())->toJson();
    }
    public function editdegreeDetail(Request $request)
    {
        if(!$request->id)
        {
          $request->id=0;
        }
     
        $degree= DB::table('degrees')->select('*')->where('id','=', [$request->id])->get();
        if(count($degree)<1)
        {
               return false;
        }
        $qualification= DB::select('select id,qualificationName from qualifications'); 
        $data=array(
            'degree'=> $degree,
            'qualification'=>$qualification
            );

        return view('degree.editDegree')->with($data);  
    }
    public function addNewDegree(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'degreeName' => 'required',
            'qualificationId' => 'required',
        ],
        [
           'degreeName.required' => 'Please enter degree name!',
          'qualificationId.required' => 'Please select qualification!',
        ]
        );
       if ($validator->passes()) 
       {
          $degree = new Degree();
          $degree->degreeName = $request->degreeName;
          $degree->qualificationId = $request->qualificationId;        
          $ids=$degree->save();
          return response()->json(['success'=>'Degree added successfully.']);        
        }
        return response()->json(['error'=>$validator->errors()->all()]);
     }
    public function degreeUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'degreeName' => 'required',
            'qualificationId' => 'required',
        ],
        [
          'degreeName.required' => 'Please enter Degree name!',
          'qualificationId.required' => 'Please select Qualification!',
        ]
        );
        if ($validator->passes()) 
        {
          $degree = Degree::find($request->id);
          $degree->degreeName = $request->degreeName;
          $degree->qualificationId = $request->qualificationId;        
          $ids=$degree->save();
          return response()->json(['success'=>'Record Updated successfully.']);        
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function deleteDegree(Request $request)
    {
        $validator = Validator::make($request->all(),[
               'id' => 'required|exists:degrees,id']
        );
        if($validator->passes()) 
        {
            try 
            {
                $result =  Degree::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>array('Degree Deleted Successfully!')]); 
                }
                else
                {
                    return response()->json(['error'=>array('Error In Delete Degree!')]);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>array('Error In Delete Degree! There is a child record exist.')]);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}