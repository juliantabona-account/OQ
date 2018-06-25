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
        'avatar', 'status', 'verifyToken', 'settings', 'tutorial_status', 'company_id', 'position', 'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function recentActivity()
    {
        return $this->morphMany('App\RecentActivity', 'trackable')
                    ->orderBy('created_at', 'desc');
    }

    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function companyBranch()
    {
        return $this->belongsTo('App\CompanyBranch', 'branch_id');
    }

    public function getAvatarAttribute($value)
    {
        //  If the avatar is not empty ('', NULL, false, e.t.c) then return the avatar url
        //  Otherwise return the default avatar placeholder
        return !empty($value) ? $value : '/images/profile_placeholder.png';
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
