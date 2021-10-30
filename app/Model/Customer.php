<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Customer extends Authenticatable implements JWTSubject
{
    use SoftDeletes;

    use Notifiable,HasRoles;
    protected $table='customers';
    protected $fillable = [
        'id',
        'name',
        'lang',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'address',
        'group_id',
        'user_id',
        'profile_pic',
        'company_taxid',
        'company',
        'balance',
        'taxid',
        'nationality',
        'passport_number',
        'identity_number',
        'record_number',
        'mersis_number',
        'isactive',
        'vergi_username',
        'vergi_password',
        'sgk_username',
        'sgk_password',
        'eimza_username',
        'eimza_password',
        'edevlet_username',
        'edevlet_password',
        'creat_comp',
        'Tc',
        'follow_by',
        'pattern',
    ];
    protected $primaryKey='id';

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Group()
    {
        return $this->belongsTo('App\Model\Group');
    }
    public function Task()
    {
        return $this->hasMany('App\Model\Task');
    }
    public function Fileowner()
    {
        return $this->hasMany('App\Model\Fileowner');
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
    public function Ticket()
    {
        return $this->hasMany('App\Model\Ticket');
    }
    public function Not()
    {
        return $this->hasMany('App\Model\Not');
    }
}
