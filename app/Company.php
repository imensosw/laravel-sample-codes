<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companyName', 'website', 'industryId', 'sectorId', 'countryId', 'location', 
        'companySize', 'turnover', 'businessVerticals', 'share', 'keyCompetitors', 
        'companyCreatiorId', 'companyCreationTime', 'created_at', 'updated_at',
        'stockPrice', 'productportfolio', 'conversation' , 'CFO', 'CEO', 'CHRO', 'CTO',
    ];

    public function country()
    {
        return $this->belongsTo('App\Country','countryId')->withDefault();
    }
    public function industry()
    {
        return $this->belongsTo('App\Industry','industryId')->withDefault();
    }
    public function sectors()
    {
        return $this->belongsTo('App\Sector','sectorId')->withDefault();
    }
    public function prospect()
    {
        return $this->hasOne('App\Prospect','companyId')->withDefault();
    }
    public function person()
    {
        return $this->hasMany('App\Person','companyId');
    }
}
