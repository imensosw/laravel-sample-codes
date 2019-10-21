<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/', 'LoginController@index');
    Route::auth();
    Route::group(['middleware' => ['auth']], function() 
    {
    	//////////////////  USER and LOGIN   //////////////////
    	Route::get('selectLoginRole', 'LoginRoleController@index');
        Route::post('setRole', 'LoginRoleController@setRole');
        Route::get('home',['as'=>'home','uses'=>'HomeController@index']);

        Route::get('manageUser',['uses'=>'UserController@manageUser',
            'middleware' => ['role:Admin']]);
        Route::get('getUserDetail',['uses'=>'UserController@getUserDetail',
            'middleware' => ['role:Admin']]);
        Route::get('userdetail/{id}',['uses'=>'UserController@userdetail',
            'middleware' => ['role:Admin']]);
        Route::post('addNewEmployee',['uses'=>'UserController@addNewEmployee',
            'middleware' => ['role:Admin']]);
        Route::post('user/edit',['uses'=>'UserController@editEmployeeDetail',
            'middleware' => ['role:Admin']]);
        Route::post('user/employeeUpdate',['uses'=>'UserController@employeeUpdate',
            'middleware' => ['role:Admin']]);
       

        ////////////////////manageSpecialization///////////////////
        Route::get('manageSpecialization',['uses'=>'SpecializationController@index',
            'middleware' => ['role:Admin']]);
        Route::get('getSpecializationDetail',['uses'=>'SpecializationController@getSpecializationDetail',
            'middleware' => ['role:Admin']]);
        Route::post('addSpecialization',['uses'=>'SpecializationController@addSpecialization','middleware' => ['role:Admin']]);
        Route::post('specialization/dl',['uses'=>'SpecializationController@deleteSpecialization',
            'middleware' => ['role:Admin']]);
        Route::post('editSpecialization',['uses'=>'SpecializationController@editSpecializationDetail',
            'middleware' => ['role:Admin']]);
        Route::post('specializationUpdate',['uses'=>'SpecializationController@specializationUpdate',
            'middleware' => ['role:Admin']]);
         

        ////////////////// Skill Start  //////////////////////////

        Route::get('skillmanage',['uses'=>'SkillController@index',
            'middleware' => ['role:Admin']]);
        Route::get('skill/detail',['uses'=>'SkillController@getSkillDetail',
            'middleware' => ['role:Admin']]);
        Route::post('add',['uses'=>'SkillController@addSkill',
            'middleware' => ['role:Admin|Manager|Employee']]);
        Route::post('skill/edit',['uses'=>'SkillController@editSkillDetail',
            'middleware' => ['role:Admin']]);
        Route::post('skill/update',['uses'=>'SkillController@skillUpdate',
            'middleware' => ['role:Admin']]);
        Route::post('skill/delete',['uses'=>'SkillController@deleteSkill',
            'middleware' => ['role:Admin']]); 

        Route::get('skill/unverifiedSkills',['uses'=>'SkillController@unverifiedSkills',
            'middleware' => ['role:Admin']]); 
        Route::get('skill/unverifiedSkillsJson',['uses'=>'SkillController@unverifiedSkillsJson',
            'middleware' => ['role:Admin']]);
        Route::post('skill/verify',['uses'=>'SkillController@verifySkill',
            'middleware' => ['role:Admin']]); 
        Route::post('skillNameUpdate',['uses'=>'SkillController@skillNameUpdate',
        'middleware' => ['role:Admin|Manager']]);  

        Route::post('skill/isUserHasCompetency',['uses'=>'SkillController@isUserHasCompetency',]);
        

        //////////////////  organization start  //////////////////
        Route::get('organizationchart ',['as'=>'organizationchart','uses'=>'OrganizationController@index',
            'middleware' => ['role:Admin']]);
        Route::get('organization',['as'=>'organization','uses'=>'OrganizationController@organizationOldUI',
            'middleware' => ['role:Admin']]);
        Route::get('organizationcTree ',['as'=>'organizationcTree','uses'=>'OrganizationController@organizationcTree',
            'middleware' => ['role:Admin']]);
        
        
        Route::post('nodesUpdate',['uses'=>'OrganizationController@nodesUpdate',
            'middleware' => ['role:Admin']]);
        Route::post('nodeUpdate',['uses'=>'OrganizationController@nodeUpdate',
            'middleware' => ['role:Admin']]);
        Route::post('nodeDelete',['uses'=>'OrganizationController@nodeDelete',
            'middleware' => ['role:Admin']]);
        Route::post('divisionList', ['uses'=>'OrganizationController@divisionList',
            'middleware' => ['role:Admin']]);
        Route::post('departmentList', ['uses'=>'OrganizationController@departmentList',
            'middleware' => ['role:Admin']]);
        Route::post('subDepartmentList', ['uses'=>'OrganizationController@subDepartmentList',
            'middleware' => ['role:Admin']]);
        Route::post('jobRolesList', ['uses'=>'OrganizationController@jobRolesList',
            'middleware' => ['role:Admin']]);

        Route::get('getDivisionOption/{id}','DivisionController@getDivisionOption');
        Route::get('getDepartmentOption/{id}','DepartmentController@getDepartmentOption');
        Route::get('getSubDepartmenOption/{id}','SubDepartmentController@getSubDepartmenOption');
        Route::get('getJobRoleOption/{id}','JobRoleController@getJobRoleOption');
       
        Route::post('updateUnit', ['uses'=>'OrganizationController@updateUnit',
            'middleware' => ['role:Admin']]);
        Route::post('updateDivision', ['uses'=>'OrganizationController@updateDivision',
            'middleware' => ['role:Admin']]);
        Route::post('updateDepartment', ['uses'=>'OrganizationController@updateDepartment',
            'middleware' => ['role:Admin']]);
        Route::post('updateSubDepartment', ['uses'=>'OrganizationController@updateSubDepartment',
            'middleware' => ['role:Admin']]);
        Route::post('updateJobRole', ['uses'=>'OrganizationController@updateJobRole',
            'middleware' => ['role:Admin']]);
        
        //////////////////  organization end  //////////////////

        //////////////////  Job Role start  //////////////////


        Route::get('jobRoleSkills',[
            'as'=>'jobRoleSkills',
            'uses'=>'JobRoleController@jobRoleSkills',
            'middleware' => ['role:Admin']
            ]);
        Route::post('jobRoleSkillForm', ['as' => 'jobRoleSkillForm', 'uses' => 'JobRoleController@jobRoleSkillForm',
            'middleware' => ['role:Admin']]);

        Route::post('jobrole/jobRoleSkillSearchForm', ['as' => 'jobrole/jobRoleSkillSearchForm', 'uses' => 'JobRoleController@jobRoleSkillSearchForm',
            'middleware' => ['role:Admin']]);
        Route::post('storeJobRoleSkills', ['as' => 'storeJobRoleSkills', 'uses' => 'JobRoleController@storeJobRoleSkills',
            'middleware' => ['role:Admin']]);

        Route::get('jobrole/getJobRoleJson','JobRoleController@getJobRoleJson');

        Route::post('getjobRoleList',['uses' => 'JobRoleController@getjobRoleList',
            'middleware' => ['role:Admin']]);
        Route::post('getJobRoleSkillRow',['uses' => 'JobRoleController@getJobRoleSkillRow',
            'middleware' => ['role:Admin|Manager|Employee']]);
        Route::post('getJobRoleLanguageRow',['uses' => 'JobRoleController@getJobRoleLanguageRow',
            'middleware' => ['role:Admin']]);
        //////////////////  Job Role end  //////////////////

        //////////////////  Employee start //////////////////
        Route::get('employeeCompetency',['as'=>'employeeCompetency','uses'=>'EmployeeController@employeeCompetency','middleware' => ['role:Manager|Employee']]);
        Route::post('storeEmployeeCompetency', ['as' => 'storeEmployeeCompetency','uses' => 'EmployeeController@storeEmployeeCompetency','middleware' => ['role:Manager|Employee']]);

        Route::get('employeeSkillChart',['as'=>'employeeSkillChart','uses'=>'EmployeeController@employeeSkillChart','middleware' => ['role:Manager|Employee']]);
        Route::post('employee/getSkillChartSearch',['as'=>'employee/getSkillChartSearch','uses'=>'EmployeeController@getSkillChartSearch','middleware' => ['role:Manager|Employee']]);
        Route::get('employeeJobAlert',['as'=>'employeeJobAlert','uses'=>'EmployeeController@employeeJobAlert','middleware' => ['role:Manager|Employee']]);
        Route::post('employee/getjobRoleSkillByjob',['as'=>'employee/getjobRoleSkillByjob','uses'=>'EmployeeController@getjobRoleSkillByjob','middleware' => ['role:Manager|Employee']]);
        Route::post('employee/jobApply',['as'=>'employee/jobApply','uses'=>'EmployeeController@jobApply','middleware' => ['role:Manager|Employee']]);


        //////////////////  Employee end  //////////////////

        //////////////////  General start //////////////////
        Route::get('getSpecializationOption/{id}','SpecializationController@getSpecializationOption');
        Route::get('getDegreeOption/{id}','DegreeController@getDegreeOption');
        Route::post('getQualificationListForm', ['as' => 'getQualificationListForm', 'uses' => 'QualificationController@getQualificationListForm']);
        
        //////////////////  General end //////////////////
    });



