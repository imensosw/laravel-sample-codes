<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'isManagerApproved','so'
    
    ];

    public function jobRole()
    {
      return $this->belongsToMany('App\Job_role', 'job_role_skill_rels','skillId','jobRoleId'); 
    }

    
    public static function getUnverifideSkill($id)
    {
      $skills = \App\User_skill_rel::
      Join('skills', 'skills.id', '=', 'user_skill_rels.skillId' ) 
      ->select('skills.id','skills.skillName','skills.skillTypeId','user_skill_rels.userId','user_skill_rels.comepetencyLevelId','user_skill_rels.isApproved','skills.isManagerApproved','user_skill_rels.comepetencyLevelIdTemp')
      ->where('user_skill_rels.userId', $id)
      ->groupBy('skills.id')->get();  
      return $skills;
    }
    public static function getSkillByID($id,$jobRoleId)
    {
      $skills = Skill::
      leftJoin('user_skill_rels', function($join) use ($id){
            $join->on('skills.id', '=', 'user_skill_rels.skillId')
            ->where('user_skill_rels.userid',$id);
      })
      ->select('skills.id','skills.skillName','skills.skillTypeId','user_skill_rels.userId','user_skill_rels.comepetencyLevelId','user_skill_rels.isApproved')
      ->groupBy('skills.id')->get();  
      return $skills;
    }
    public static function getJobroleSkill($jobRoleId)
    {
      return \App\Skill::
        join('job_role_skill_rels', function($join) use ($jobRoleId){
            $join->on('skills.id', '=', 'job_role_skill_rels.skillId')
            ->where('job_role_skill_rels.jobRoleId',$jobRoleId);
        })
        ->select('skills.id','skills.skillName','skills.skillTypeId','job_role_skill_rels.jobRoleId','job_role_skill_rels.comepetencyLevelId')
        ->groupBy('skills.id')->get();  
    }
    public static function getUnverifiedSkills()
    {
      return Skill::select('skills.*','skill_types.skillTypeNameShort')->leftjoin('skill_types','skills.skillTypeId','=','skill_types.id')->where('isApproved',0)->where('isManagerApproved',1)->groupBy('skills.id')->get();  
    }
   
}
