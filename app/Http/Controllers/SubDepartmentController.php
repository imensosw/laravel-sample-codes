<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException; 
use App\Sub_department ;
use DB;
use Validator ;
class SubDepartmentController extends Controller
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
            $subDepartment = new Sub_department();
            $subDepartment->subDepartmentName = $request->name ;
            $subDepartment->departmentId = $request->parentId ;
            $subDepartment->created_at ;
            $subDepartment->updated_at ;
            $subDepartment->save();
            return response()->json(['success'=>'Sub Department added successfully.','id'=>$subDepartment->id , 'name'=>$subDepartment->subDepartmentName ,'url'=>'SubDepartment' ]); 
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    

    /**
     * Delete resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function deleteSubDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:sub_departments,id',       
        ]);
        if($validator->passes()) 
        {
            try 
            {
                $result =  Sub_department::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>'Sub Department Deleted Successfully!' ]); 
                }
                else
                {
                    return response()->json(['error'=>'Error In Delete Sub Department!']);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>'Error In Delete Sub Department! There is a child record exist.']);
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

    public function getSubDepartmenOption($id)
    {
        $sectors =  Sub_department::where('departmentId',$id)->pluck('subDepartmentName','id');
        return json_encode($sectors);
    }
}