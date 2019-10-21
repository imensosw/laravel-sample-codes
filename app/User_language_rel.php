<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class User_language_rel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['reading','writeing','speaking','understanding',];

   
}
