<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessFormSteps extends Model
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of d032024... General Fix For Jobcard, Client, Contractor
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $casts = [
        'step_instruction' => 'collection',
    ];

<<<<<<< HEAD
=======
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
=======
>>>>>>> parent of d032024... General Fix For Jobcard, Client, Contractor
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
<<<<<<< HEAD
<<<<<<< HEAD
=======

    public function fields()
    {
        return $this->belongsToMany('App\ProcessFormField', 'process_form_field_allocation', 'step_id', 'field_id')
                    ->withPivot('step_id', 'field_id')
                    ->withTimestamps();
    }
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
=======
>>>>>>> parent of d032024... General Fix For Jobcard, Client, Contractor
}
