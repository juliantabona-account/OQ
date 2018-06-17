<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'jobcard' => 'App\Jobcard',
    //  'user' => 'App\User',
    //  'company' => 'App\Company',
    //  'application' => 'App\Application',
]);

class ProgressStatus extends Model
{
    protected $casts = [
        'plugin' => 'collection',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'progress_status';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
    ];
}
