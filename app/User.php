<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'username', 'password', 'gender', 'date_of_birth', 'bio', 'address', 'phone_ext', 'phone_num',
        'avatar', 'status', 'verifyToken', 'settings', 'tutorial_status', 'company_id', 'position_id', 'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function getAvatarAttribute($value)
    {
        return $value != '' ? $value : '/images/profile_placeholder.png';
    }

    /*
    public function position()
    {
        return $this->belongsTo('App\UserPosition');
    }

    public function documents()
    {
        return $this->hasMany('App\UserDocument');
    }

    public function jobcards()
    {
        return $this->hasMany('App\Jobcard');
    }

    public function jobcardViews()
    {
        return $this->hasMany('App\UserJobcardView');
    }

    */
}
