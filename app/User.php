<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
   
    use Notifiable,HasRoles;
 use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'department_id',
        'phone',
        'profile_pic',
        'division_id',
        'lang',
        'Signature',
        'isactive',
        'pattern',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 protected $dates = ['deleted_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts =[
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function Department()
    {
        return $this->belongsTo('App\Model\Department');
    }

    public function Customer()
    {
        return $this->hasMany('App\Model\Customer');
    }

    public function Division()
    {
        return $this->belongsTo('App\Model\Division');
    }
    public function Task()
    {
        return $this->hasMany('App\Model\Task');
    }
    public function Transaction()
    {
        return $this->hasMany('App\Model\Transaction');
    }
    public function Balance()
    {
        return $this->hasMany('App\Model\Balance');
    }
    public function Payment()
    {
        return $this->hasMany('App\Model\Payment');
    }
    public function Invoice()
    {
        return $this->hasMany('App\Model\Invoice');
    }
    public function Expense()
    {
        return $this->hasMany('App\Model\Expense');
    }
    public function Ticket()
    {
        return $this->hasMany('App\Model\Ticket');
    }
}
