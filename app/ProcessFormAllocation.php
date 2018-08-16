<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'user' => 'App\User',
    'jobcard' => 'App\Jobcard',
]);
class ProcessFormAllocation extends Model
{
    protected $casts = [
        'process_form' => 'collection',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'process_form_allocations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'process_form',
    ];

    public function processable()
    {
        return $this->morphTo();
    }
}
