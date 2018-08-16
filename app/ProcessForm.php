<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessForm extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $casts = [
        'form_structure' => 'collection',
    ];

    protected $table = 'process_form';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'company_id', 'type', 'selected', 'form_structure', 'created_by',
    ];

    public function steps()
    {
        return $this->belongsToMany('App\ProcessFormSteps', 'process_form_step_allocation', 'process_form_id', 'step_id')
                    ->withPivot('process_form_id', 'step_id')
                    ->withTimestamps();
    }

    public function recentActivities()
    {
        return $this->morphMany('App\RecentActivity', 'trackable')
                    ->orderBy('created_at', 'desc');
    }
}
