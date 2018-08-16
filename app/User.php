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
<<<<<<< HEAD
        'days_attending', 'event_attending', 'first_name', 'last_name', 'gender', 'affiliation', 'position',
        'country', 'organisation_type', 'address', 'address_2', 'city', 'state', 'zip_code', 'phone', 'email',
        'additional_email', 'twitter_handle', 'organisation_affiliation', 'communication_channel',
        'accessibility', 'allergies', 'send_future_updates', 'send_data_science_journal_updates',
        'agree_to_addon_list', 'agree_to_details_on_list',
=======
        'first_name', 'last_name', 'email', 'username', 'password', 'gender', 'date_of_birth', 'bio', 'address', 'phone_ext', 'phone_num',
<<<<<<< HEAD
        'avatar', 'status', 'verifyToken', 'settings', 'tutorial_status', 'company_id', 'company_branch_id', 'position', 'created_by',
=======
        'avatar', 'status', 'verifyToken', 'settings', 'tutorial_status', 'company_branch_id', 'position', 'created_by',
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
>>>>>>> 4af73ef3d6103c68d7b2264387ed7dff74e3f8b9
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
<<<<<<< HEAD
=======

    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function companyBranch()
    {
        return $this->belongsTo('App\CompanyBranch', 'company_branch_id');
    }

    public function company()
    {
        return $this->belongsTo('App\CompanyBranch', 'company_id');
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
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
}
