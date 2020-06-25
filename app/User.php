<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id', 'cardId', 'municipality', 'address', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
    * Methods for check user role
    **/
    public function isAdmin()
    {
        if($this->role ? $this->role->name == "admin" : false)
        {
            return true;
        }
        return false;
    }
    public function isFoodBroker()
    {
        if($this->role ? $this->role->name == "foodbroker" : false)
        {
            return true;
        }
        return false;
    }
}
