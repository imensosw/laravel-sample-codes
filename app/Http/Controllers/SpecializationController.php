<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Specialization ;
use Validator;
use DB;
use Response;
class SpecializationController extends Controller
{ 
    /**
     * get optopn json.
     * @param    $id
     * @return optopn json
     */
    public function getSpecializationOption($id)
    {
        $specialization =  Specialization::where('degreeId',$id)->pluck('specializationName','id');
        return json_encode($specialization);
    }
    public function index()
    {
        $degrees= DB::table('degrees')->select('*')->get();
        $data=array(
            'degrees'=>$degrees          
            );

        return view('specialization.index')->with($data); 
    }
    public function getSpecializationDetail()
    { 
        return datatables(Specialization::select('specializations.*','degrees.degreeName')
        //->where('specializations.id','>',1)
        ->leftjoin('degrees','specializations.degreeId','=','degrees.id')
        ->groupBy('specializations.id')
        ->get())->toJson();
    }
    public function addSpecialization(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'specializationName' => 'required',
                'degreeId' => 'required'            
            ],
            [
                'specializationName.required' => 'Please enter Specialization name!',
                'degreeId.required' => 'Please select Degree!',
            ]
        );
        if($validator->passes()) 
        {
            $s = new Specialization();
            $s->specializationName = $request->specializationName;
            $s->degreeId = $request->degreeId;        
            $ids=$s->save();
            return response()->json(['success'=>'Record Inserted successfully.']);       
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function specializationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'specializationName' => 'required',
                'degreeId' => 'required'            
            ],
            [
                'specializationName.required' => 'Please enter Specialization name!',
                'degreeId.required' => 'Please select Degree!',
            ]
        );
        if($validator->passes()) 
        {
            $spec = Specialization::find($request->id);
            $spec->specializationName = $request->specializationName;
            $spec->degreeId = $request->degreeId;
            $spec->save();
            return response()->json(['success'=>'Record Updated successfully.']);       
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function deleteSpecialization(Request $request)
    {
        $validator = Validator::make($request->all(),[
               'id' => 'required|exists:specializations,id']
        );
        if($validator->passes()) 
        {
            try 
            {
                $result =  Specialization::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>array('Specialization Deleted Successfully!')]); 
                }
                else
                {
                    return response()->json(['error'=>array('Error In Delete Specialization!')]);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>array('Error In Delete Specialization! There is a child record exist.')]);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}