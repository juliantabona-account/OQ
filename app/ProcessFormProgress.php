<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'jobcard' => 'App\Jobcard',
]);

class ProcessFormProgress extends Model
{
    protected $table = 'process_form_progress';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'step_id',
    ];

    /**
     * Get all of the owning cost center models.
     */
    public function trackable()
    {
        return $this->morphTo();
    }
}
