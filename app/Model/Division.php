<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Division extends Model
{
    use SoftDeletes;
    protected $table='divisions';
    protected $fillable = [
        'id',
        'name',
        'department_id',

    ];
    protected $primaryKey='id';

    public function Department()
    {
        return $this->belongsTo('App\Model\Department');
    }
    public function User()
    {
        return $this->hasMany('App\User');
    }
    public function Group()
    {
        return $this->hasMany('App\Model\Group');
    }
}
