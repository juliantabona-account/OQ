<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyBranch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'destination', 'company_id', 'created_by',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function jobcards()
    {
        return $this->hasMany('App\Jobcard', 'company_branch_id', 'company_id');
    }

    public function recentActivities()
    {
        return $this->morphMany('App\RecentActivity', 'trackable')
                    ->orderBy('created_at', 'desc');
    }
}
