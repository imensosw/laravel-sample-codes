<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; 
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Language;
use DB;
use Validator;
use Response;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();
        return view('users.edit',compact('user','roles','userRole'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function manageUser()
    {
        $languages= DB::table('languages')->select('*')->get();
        $roles= DB::table('roles')->select('*')->get();       
        $unit = \App\Unit::pluck('unitName','id')->prepend('Select Unit','');   
        $user_result=\APP\User::orderBy('name', 'asc')->get();
        $data=array(
            'languages'=>$languages,
            'roles'=>$roles,
            'unit'=>$unit,
            'user_result'=>$user_result
            );
        return view('users.manage_user')->with($data);  
    }
    public function userdetail($id)
    {
         $users= DB::table('users')
                     ->select('*')
                     ->where('id','=', [$id])
                     ->get();
        $roles= DB::table('roles')
                     ->select('*')
                     ->where('description','=','Manager')
                     ->get();    
         echo json_encode(array('users' => $users, 'roles'=>$roles));
    }
    public function addNewEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'employeeId' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'unitId' => 'required|exists:units,id',
            'divisionId' => 'required|exists:divisions,id',
            'departmentId' => 'required|exists:departments,id',
            'subDepartmentId' => 'required|exists:sub_departments,id',
            'jobRoleId' => 'required|exists:job_roles,id',
            'reportingToId' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id'
        ],
        [
        'fname.required' => 'Please enter first name!',
        'employeeId.required' => 'Please enter employee id!',
        'employeeId.unique' => 'An account for the specified employee id already exists. Try another employee id.!',
        'email.required' => 'Please enter email!',
        'email.email' => 'Please enter valid email!',  
        'email.unique' => 'An account for the specified email address already exists. Try another email address.!',
        'unitId.required' => 'Please select unit!',
        'divisionId.required' => 'Please select division!',
        'departmentId.required' => 'Please select department!',
        'subDepartmentId.required' => 'Please select subDepartment!',
        'jobRoleId.required' => 'Please select role!',
        'reportingToId.required' => 'Please select reporting to!',
        'role_id.required' => 'Please select role type!',
        ]);
        if ($validator->passes()) 
        {
            $user = new User();
            $user->name = $request->fname." ".$request->lname;
            $user->fName = $request->fname;
            $user->lName = $request->lname;
            $user->employeeId = $request->employeeId;
            $user->email = $request->email;
            $user->unitId=$request->unitId;
            $user->divisionId=$request->divisionId;
            $user->departmentId=$request->departmentId;
            $user->subDepartmentId=$request->subDepartmentId;
            $user->jobRoleId=$request->jobRoleId;
            $user->password=bcrypt('123456');
            //$user->password=bcrypt($request['fname'].rand(1111,9999));
            $user->remember_token=bcrypt(rand(1111111,9999999));
            $user->mobileNo = $request->mobileNo;
            $user->reportingToId = $request->reportingToId;
            $ids=$user->save();
            if($ids)
            {
                DB::table('role_user')->insert(array('user_id'=>$user->id,'role_id'=>$request->role_id));
                $languages = $request->language ;
                foreach ($languages as $languageId)
                {
                    $userLanguageRel = \App\User_language_rel::firstOrNew(array('userId' => $user->id , 'languageId' => $languageId));
                    $userLanguageRel->userId = $user->id;
                    $userLanguageRel->languageId = $languageId;
                    $userLanguageRel->reading = $request->input("lanngRead$languageId");
                    $userLanguageRel->writeing = $request->input("lanngWrite$languageId");
                    $userLanguageRel->speaking = $request->input("lanngSpeak$languageId");
                    $userLanguageRel->understanding = $request->input("lanngUnderstand$languageId");
                    $userLanguageRel->save();
                }
                return response()->json(['success'=>'User added successfully' ,'id'=>$user->id, 'name'=>$user->name]);   
            }
            else
            {
                return response()->json(['error'=>'Error In Adding User!' ]); 
            }
       }
       return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function editEmployeeDetail(Request $request)
    {
        if(!$request->id)
        {
          $request->id=0;
        }
        $users= DB::table('users')->select('*')->where('id','=', [$request->id])->get();
        if(count($users)<1)
        {
               return false;
        }
        $languages= DB::select('select l.id,l.languageName,ul.reading,ul.writeing,ul.speaking,ul.understanding from languages l left join user_language_rels ul on l.id=ul.languageId and ul.userId="'.$request->id.'"');
        $roles= DB::select('select r.id,r.name,ru.user_id from roles r left join role_user ru on r.id=ru.role_id and ru.user_id="'.$request->id.'"');       
        $unit = \App\Unit::pluck('unitName','id')->prepend('Select Unit','');   
        $division = \App\Division::where(array('unitId'=>$users[0]->unitId))->pluck('divisionName','id')->prepend('Select Divisions','');   
        $department = \App\Department::where(array('divisionId'=>$users[0]->divisionId))->pluck('departmentName','id')->prepend('Select Departments','');   
        $subDepartment = \App\Sub_department::where(array('departmentId'=>$users[0]->departmentId))->pluck('subDepartmentName','id')->prepend('Select Sub DepartmentName','');   
        $job_roles= DB::table('job_roles')->where('subDepartmentId','=',$users[0]->subDepartmentId)->pluck('jobRoleName','id')->prepend('Select Sub DepartmentName','');       
        $user_result=\APP\User::whereNotIn('id',[$request->id])->orderBy('name', 'asc')->get();
        $data=array(
            'users'=>$users,
            'languages'=>$languages,
            'roles'=>$roles,
            'unit'=>$unit,
            'division'=>$division,
            'department'=>$department,
            'subDepartment'=>$subDepartment,
            'job_roles'=>$job_roles,
            'user_result'=>$user_result
            );
        return view('users.editUser')->with($data);  
    }
    public function deleteUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',       
        ]);
        if($request->id == 1)
        {
            return response()->json(['error'=>array('Error In Delete User!')]);
        }
        if($validator->passes()) 
        {
            try 
            {
                DB::beginTransaction();
                $result =  User::find($request->id)->delete();
                if($result == 1)
                { 
                    DB::commit();
                    return response()->json(['success'=>array('User Deleted Successfully!')]); 
                }
                else
                {
                    DB::rollBack();
                    return response()->json(['error'=>array('Error In Delete User!')]);
                }
            } 
            catch (QueryException  $e) 
            {
                DB::rollBack();
                return response()->json(['error'=>array('Error In Delete User! There is child record exist.')]);
            }
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}