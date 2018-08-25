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

    public function recentActivities()
    {
        return $this->morphMany('App\RecentActivity', 'trackable')
                    ->orderBy('created_at', 'desc');
    }
}
