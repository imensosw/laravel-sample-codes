<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException; 
use App\Unit ;
use DB;
use Validator ;
class UnitController extends Controller
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
        ],
        [
            'name.required' => 'Please enter bussiness unit!'
        ]
        );
        if ($validator->passes()) {
            $unit = new Unit();
            $unit->unitName = $request->name ;
            $unit->created_at ;
            $unit->updated_at ;
            $unit->save();
            return response()->json(['success'=>'Unit added successfully.','id'=>$unit->id , 'name'=>$unit->unitName ,'url'=>'Unit' ]);        
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    /**
     * Delete resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function deleteUnit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:units,id',       
        ]);
        if($validator->passes()) 
        {
            try 
            {
                $result =  Unit::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>'Unit Deleted Successfully!' ]); 
                }
                else
                {
                    return response()->json(['error'=>'Error In Delete Unit!']);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>'Error In Delete Unit! There is a child record exist.']);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}