<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public static function getJobroleLanguage($jobRoleId)
    {
      return \App\Language::
        Join('job_role_language_rels', function($join) use ($jobRoleId){
            $join->on('languages.id', '=', 'job_role_language_rels.languageId')
            ->where('job_role_language_rels.jobRoleId',$jobRoleId);
        })
        ->select('languages.id','languages.languageName','job_role_language_rels.jobRoleId','job_role_language_rels.reading','job_role_language_rels.writeing','job_role_language_rels.speaking','job_role_language_rels.understanding')
        ->groupBy('languages.id')->get();
    }
}