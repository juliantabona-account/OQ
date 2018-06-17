<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressStatusSteps extends Model
{
    public function jobcards()
    {
        return $this->morphedByMany('App\Jobcard', 'progressable', 'progress_status', 'step_id', 'progressable_id');
    }
}
