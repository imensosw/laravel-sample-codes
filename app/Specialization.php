<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Specialization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'specializations';
    protected $created_at='false';
    protected $updated_at='false';
     protected $fillable = [
        'specializationName', 'degreeId',
    ];

    public static function getJobroleSpecialization($jobRoleId)
    {
        return \App\Job_role_specialization_rel::
            join('specializations', 'specializations.id', '=', 'job_role_specialization_rels.specializationId')
            ->join('degrees','degrees.id','=','specializations.degreeId')
            ->select('specializations.id as specializationId','specializations.specializationName',
                'degrees.id as degreeId','degrees.degreeName','degrees.qualificationId')
            ->where('job_role_specialization_rels.jobRoleId',$jobRoleId )
            ->groupBy('job_role_specialization_rels.id')->get();
    }
}
