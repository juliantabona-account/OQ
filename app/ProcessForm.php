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
        'instructions' => 'collection',
    ];

    protected $table = 'process_form';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'type', 'selected', 'instructions', 'created_by',
    ];

    public function steps()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->hasMany('App\ProcessFormSteps');
=======
        return $this->belongsToMany('App\ProcessFormSteps', 'process_form_step_allocation', 'process_form_id', 'step_id')
                    ->withPivot('process_form_id', 'step_id')
                    ->withTimestamps();
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
=======
        return $this->hasMany('App\ProcessFormSteps');
>>>>>>> parent of d032024... General Fix For Jobcard, Client, Contractor
    }
}
