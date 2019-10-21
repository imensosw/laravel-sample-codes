<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException; 
use App\Division ;
use DB;
use Validator ;
class DivisionController extends Controller
{
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
            $division = new Division();
            $division->divisionName = $request->name ;
            $division->unitId = $request->parentId ;
            $division->created_at ;
            $division->updated_at ;
            $division->save();
            return response()->json(['success'=>'Division added successfully.','id'=>$division->id , 'name'=>$division->divisionName ,'url'=>'Division']);        

        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    /**
     * Delete resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function deleteDivision(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:divisions,id',       
        ]);
        if($validator->passes()) 
        {
            try 
            {
                $result =  Division::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>'Division Deleted Successfully!' ]); 
                }
                else
                {
                    return response()->json(['error'=>'Error In Delete Division!']);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>'Error In Delete Division! There is a child record exist.']);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    /**
     * get optopn json.
     * @param    $id
     * @return optopn json
     */
    public function getDivisionOption($id)
    {
        $sectors =  Division::where('unitId',$id)->pluck('divisionName','id');
        return json_encode($sectors);
    }
    
}