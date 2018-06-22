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
}
