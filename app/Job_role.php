<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB ;
class Job_role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'
    
    ];
    public function qualifications()
	{
	  return $this->belongsToMany('App\Qualification', 'job_role_qualification_rels','jobRoleId','qualificationId'); 
	}
    public function skill()
    {
      return $this->belongsToMany('App\Skill', 'job_role_skill_rels','jobRoleId','skillId'); 
    }
    public function language()
    {
      return $this->belongsToMany('App\Language', 'job_role_language_rels','jobRoleId','languageId'); 
    }
    public function specialization()
    {
      return $this->belongsToMany('App\Specialization', 'job_role_specialization_rels','jobRoleId','specializationId'); 
    }

    public static function getJobRoleDetail( $keyWord , $jobRoleId = FALSE,$unitId= FALSE ,$divisionId= FALSE ,$departmentId= FALSE ,$subDepartmentId= FALSE  )
    {
        $query =  \App\Job_role::
        join('sub_departments', 'sub_departments.id', '=', 'job_roles.subDepartmentId')
        ->join('departments','departments.id','=','sub_departments.departmentId')
        ->join('divisions','divisions.id','=','departments.divisionId')
        ->join('units','units.id','=','divisions.unitId')
        ->leftJoin('job_role_grades','job_role_grades.id','=','job_roles.jobRoleGradeId')
        ->leftJoin('job_role_language_rels','job_role_language_rels.jobRoleId','=','job_roles.id')
        ->leftJoin('job_role_skill_rels','job_role_skill_rels.jobRoleId','=','job_roles.id')
        ->leftJoin('job_role_specialization_rels','job_role_specialization_rels.jobRoleId','=','job_roles.id')
        ->select('job_roles.*',
            'sub_departments.subDepartmentName','sub_departments.departmentId',
            'departments.departmentName','departments.divisionId',
            'divisions.divisionName','divisions.unitId',
            'units.unitName','job_role_grades.jobRoleGradeName',
            DB::raw('count(job_role_language_rels.id) as languageCount'),
            DB::raw('count(job_role_skill_rels.id) as skillCount'),
            DB::raw('count(job_role_specialization_rels.id) as specializationCount')
            )
        ->where("jobRoleName",'LIKE',"%".$keyWord."%");
        if( $jobRoleId > 0 )
        {
            $query->where('job_roles.id',$jobRoleId );
        }
        $query->groupBy('job_roles.id');
        return $query->get();
    }
}
