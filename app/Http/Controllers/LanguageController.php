<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Language ;
use Validator;
use DB;
use Response;
class LanguageController extends Controller
{ 
    /**
     * get optopn json.
     * @param    $id
     * @return optopn json
     */
    public function index()
    {
        return view('language.index'); 
    }
    public function getLanguageDetail()
    { 
        return datatables(Language::select('languages.*')
        ->groupBy('languages.id')
        ->get())->toJson();
    }
    public function addLanguage(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'languageName' => 'required',
            'so' => 'required',
        ],
        [
           'languageName.required' => 'Please enter Language name!',
          'so.required' => 'Please enter sort order!',
        ]
        );
       if ($validator->passes()) 
       {
          $lang= new Language();
          $lang->languageName = $request->languageName;
          $lang->so = $request->so;        
          $ids=$lang->save();
          return response()->json(['success'=>'Record Inserted successfully.']);        
        } 
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function languageUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'languageName' => 'required',
            'so' => 'required',
        ],
        [
          'languageName.required' => 'Please enter Language name!',
          'so.required' => 'Please enter sort order!',
        ]
        );
        if ($validator->passes()) 
        {
            $lang = Language::find($request->id);
	        $lang->languageName = $request->languageName;
	        $lang->so = $request->so;
	        $lang->save();
            return response()->json(['success'=>'Record Updated successfully.']);        
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function deleteLanguage(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:languages,id']
        );
        if($validator->passes()) 
        {
            try 
            {
                $result =  Language::find($request->id)->delete();
                if($result == 1)
                { 
                    return response()->json(['success'=>array('Language Deleted Successfully!')]); 
                }
                else
                {
                    return response()->json(['error'=>array('Error In Delete Language!')]);
                }
            } 
            catch (QueryException  $e) 
            {
                return response()->json(['error'=>array('Error In Delete Language! There is a child record exist.')]);
            }  
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}