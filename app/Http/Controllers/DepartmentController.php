<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException; 
use App\Department ;
use DB;
use Validator ;
class DepartmentController extends Controller
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
            $department = new Department();
            $department->departmentName = $request->name ;
            $department->divisionId = $request->parentId ;
            $department->created_at ;
            $department->updated_at ;
            $department->save();
            return response()->json(['success'=>'Department added successfully.','id'=>$department->id , 'name'=>$department->departmentName,'url'=>'Department' ]); 
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    /**
     * get optopn json.
     * @param    $id
     * @return optopn json
     */

    /**
     * Delete resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function deleteDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:departments,id',       
        ]);
        if($validator->passes()) 
        {
            try 
            {
                $result =  Department::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>'Department Deleted Successfully!' ]); 
                }
                else
                {
                    return response()->json(['error'=>'Error In Delete Department!']);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>'Error In Delete Department! There is a child record exist.']);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }


    public function getDepartmentOption($id)
    {
        $sectors =  Department::where('divisionId',$id)->pluck('departmentName','id');
        return json_encode($sectors);
    }
}