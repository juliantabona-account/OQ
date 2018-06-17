<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'city', 'state_or_region', 'address', 'industry', 'type', 'website_link',
        'profile_doc_url', 'logo_url', 'phone_ext', 'phone_num', 'email', 'created_by', 'company_id',
    ];

    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function profiles()
    {
        return $this->hasMany('App\User');
    }

    public function costCenters()
    {
        return $this->morphMany('App\CostCenter', 'costcenter');
    }

    public function priorities()
    {
        return $this->morphMany('App\Priority', 'priority');
    }

    public function categories()
    {
        return $this->morphMany('App\Category', 'category');
    }

    public function branches()
    {
        return $this->hasMany('App\CompanyBranch');
    }

    public function processForms()
    {
        return $this->hasMany('App\ProcessForm');
    }

    /*

    public function jobcards()
    {
        return $this->belongsToMany('App\Jobcard', 'jobcard_contacts', 'contact_id', 'jobcard_id');
    }

    public function priorities()
    {
        return $this->hasMany('App\JobcardPriority');
    }

    public function costCenter()
    {
        return $this->hasMany('App\JobcardCostCenter');
    }

    public function category()
    {
        return $this->hasMany('App\JobcardCategory');
    }

    public function statuses()
    {
        return $this->hasMany('App\JobcardStatus');
    }
    */
}
