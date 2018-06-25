<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'jobcard' => 'App\Jobcard',
    'company' => 'App\Company',
    'user' => 'App\User',
    'document' => 'App\Document',
]);

class RecentActivity extends Model
{
    protected $casts = [
        'activity' => 'collection',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity', 'created_by',
    ];

    /**
     * Get all of the owning documentable models.
     */
    public function trackable()
    {
        return $this->morphTo();
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
