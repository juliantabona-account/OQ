<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessFormField extends Model
{
    protected $table = 'process_form_fields';

    public function response()
    {
        return $this->hasMany('App\ProcessFormResponse', 'field_id');
    }
}
