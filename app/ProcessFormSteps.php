<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessFormSteps extends Model
{
    protected $table = 'process_form_steps';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'step_instruction', 'process_form_id',
    ];

    public function processForm()
    {
        return $this->belongsTo('App\ProcessForm', 'process_form_id');
    }

    public function jobcards()
    {
        return $this->hasMany('App\Jobcard', 'step_id');
    }

    public function fields()
    {
        return $this->belongsToMany('App\ProcessFormField', 'process_form_field_allocation', 'step_id', 'field_id')
                    ->withPivot('step_id', 'field_id')
                    ->withTimestamps();
    }
}
