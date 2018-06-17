<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessFormSteps extends Model
{
    protected $casts = [
        'plugin' => 'collection',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'process_form_steps';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'plugin', 'created_by', 'order', 'process_form_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
