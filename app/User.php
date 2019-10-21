<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB ;
class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function timeZone()
    {
        return $this->belongsTo('App\Time_zone','timeZoneId')->withDefault();
    }
    public function jobRole()
    {
        return $this->belongsTo('App\Job_role','jobRoleId')->withDefault();
    }
    public function language()
    {
      return $this->belongsToMany('App\Language', 'user_language_rels','userId','languageId'); 
    }
    public function skill()
    {
      return $this->belongsToMany('App\Skill', 'user_skill_rels','userId','skillId'); 
    }
    public function specialization()
    {
      return $this->belongsToMany('App\Specialization', 'user_specialization_rels','userId','specializationId'); 
    }
    public static function userSpecialization($id = FALSE)
    {
        $userId = \Auth::user()->id ; 
        if( $id !== FALSE )
        {
            $userId = $id ;
        }
        return \App\User_specialization_rel::
        join('specializations','specializations.id','=','user_specialization_rels.specializationId')
        ->join('degrees','degrees.id','=','specializations.degreeId')
        ->join('qualifications','qualifications.id','=','degrees.qualificationId')
         ->where('user_specialization_rels.userId', $userId )
        ->select('specializations.specializationName',
            'degrees.degreeName','qualifications.qualificationName'
        )->get();  
    }
    public static function getSkillChartDetail( $userId , $jobRoleId )
    { 
        $userId = $userId ;
        $jobRoleId = $jobRoleId ;
        $jobRole = \App\Job_role::find($jobRoleId);
        $languages = \App\Language::
            Join('job_role_language_rels', function($join) use ($jobRoleId){
                $join->on('languages.id', '=', 'job_role_language_rels.languageId')
                ->where('job_role_language_rels.jobRoleId',$jobRoleId);
            })
            ->leftjoin('user_language_rels', function($join) use ($userId){
                $join->on('user_language_rels.languageId', '=', 'languages.id');
                $join->where('user_language_rels.userId',$userId);
            })
            ->select('languages.id','languages.languageName','job_role_language_rels.jobRoleId','job_role_language_rels.reading','job_role_language_rels.writeing','job_role_language_rels.speaking','job_role_language_rels.understanding','user_language_rels.languageId as userLanguageId'
                ,'user_language_rels.reading as userReading','user_language_rels.writeing as userWriteing','user_language_rels.speaking as userSpeaking','user_language_rels.understanding as userUnderstanding')
            ->groupBy('languages.id')->get();  

        $skills = \App\Skill::
            Join('job_role_skill_rels', function($join) use ($jobRoleId){
                $join->on('skills.id', '=', 'job_role_skill_rels.skillId')
                ->where('job_role_skill_rels.jobRoleId',$jobRoleId);
            })
            ->leftjoin('user_skill_rels', function($join) use ($userId){
                $join->on('user_skill_rels.skillId', '=', 'job_role_skill_rels.skillId')
                ->where('user_skill_rels.isApproved',1)
                ->where('user_skill_rels.userId',$userId);
            })
            ->select('skills.id','skills.skillName','skills.skillTypeId','job_role_skill_rels.jobRoleId','job_role_skill_rels.comepetencyLevelId',
                'user_skill_rels.comepetencyLevelId as userComepetencyLevelId'
                )
            ->groupBy('skills.id')->get();  

        $jobRoleSpecializationRels = \App\Job_role_specialization_rel::
            join('specializations', 'specializations.id', '=', 'job_role_specialization_rels.specializationId')
            ->join('degrees','degrees.id','=','specializations.degreeId')
            ->leftjoin('user_specialization_rels', function($join) use ($userId){
                $join->on('user_specialization_rels.specializationId', '=', 'specializations.id')
                ->where('user_specialization_rels.userId',$userId);
            })
            ->where('job_role_specialization_rels.jobRoleId',$jobRoleId)
            ->select('specializations.id as specializationId','specializations.specializationName',
                'degrees.id as degreeId','degrees.degreeName','degrees.qualificationId',
                'user_specialization_rels.specializationId as userSpecializationId'
            )->groupBy('job_role_specialization_rels.id')->get();
        $jobSkilUserSkill = User::getJobSkilUserSkill( $userId , $jobRoleId ) ; 
        return array('languages'=>$languages , 'skills'=>$skills ,'jobRoleSpecializationRels'=>$jobRoleSpecializationRels , 'jobSkilUserSkill'=>$jobSkilUserSkill ,'jobRole'=>$jobRole );
    }
    public static function getUserSkillChartDetail( $userId  ,$jobRoleId )
    {
        $userId = $userId ;
        $jobRoleId = $jobRoleId ;
        $jobRole = \App\Job_role::find($jobRoleId);

        $languages = \App\User_language_rel::join('languages','languages.id','=','user_language_rels.languageId')->where('userId', $userId)->get();
        $skills =  \App\User_skill_rel::
            join('skills','skills.id','=','user_skill_rels.skillId')
            ->select('skills.id','skills.skillName','skills.skillTypeId',
                'user_skill_rels.comepetencyLevelId as comepetencyLevelId')
            ->where('user_skill_rels.userId', $userId )
            ->where('user_skill_rels.isApproved',1)
            ->get();  

        $jobRoleSpecializationRels = \App\User_specialization_rel::
            join('specializations', 'specializations.id', '=', 'user_specialization_rels.specializationId')
            ->join('degrees','degrees.id','=','specializations.degreeId')
            ->where('user_specialization_rels.userId',$userId)
            ->select('specializations.id as specializationId','specializations.specializationName',
                'degrees.id as degreeId','degrees.degreeName','degrees.qualificationId'
            )->groupBy('user_specialization_rels.id')->get();

        return array('languages'=>$languages , 'skills'=>$skills ,'jobRoleSpecializationRels'=>$jobRoleSpecializationRels  ,'jobRole'=>$jobRole );
    }

    public static function getAppyledjob( $reportingToId = FALSE  )
    {
        $jobApply = DB::table('job_apply')
            ->select( DB::raw("DATE_FORMAT(job_roles_apply.created_at, '%M %d, %Y') as created_at") ,'users.name','job_roles.jobRoleName','users.name','users.employeeId','job_roles_apply.jobRoleName as jobRoleNameApply')
            ->leftJoin('users','users.id','=','job_apply.user_id')
            ->leftJoin('job_roles','job_roles.id','=','users.jobRoleId')
            ->leftJoin('job_roles as job_roles_apply','job_roles_apply.id','=','job_apply.role_id')
            ->where('job_apply.status_id','=', 1);
            if( $reportingToId !== FALSE )
            {
                $jobApply = $jobApply->where('users.reportingToId','=',  \Auth::user()->id );
            }
            $jobApply = $jobApply->get();
            return $jobApply  ;
    }

}