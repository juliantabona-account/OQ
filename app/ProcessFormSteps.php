<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessFormSteps extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $casts = [
        'step_instruction' => 'collection',
    ];

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
}
