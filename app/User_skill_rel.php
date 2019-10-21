<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class User_skill_rel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['comepetencyLevelId','isApproved',];

   
}
