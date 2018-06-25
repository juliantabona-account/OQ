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
        'profile_doc_url', 'logo_url', 'phone_ext', 'phone_num', 'email', 'created_by',
    ];

    public function recentActivity()
    {
        return $this->morphMany('App\RecentActivity', 'trackable')
                    ->orderBy('created_at', 'desc');
    }

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

    public function clients()
    {
        return $this->belongsToMany('App\Company', 'company_clients', 'company_id', 'client_id')
                    ->withPivot('client_id', 'company_id', 'created_by')
                    ->withTimestamps();
    }

    public function contractors()
    {
        return $this->belongsToMany('App\Company', 'company_contractors', 'company_id', 'contractor_id')
                    ->withPivot('contractor_id', 'company_id', 'created_by')
                    ->withTimestamps();
    }

    public function contacts()
    {
        return $this->belongsToMany('App\User', 'company_contacts', 'company_id', 'contact_id')
                    ->withPivot('contact_id', 'company_id')
                    ->withTimestamps();
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
