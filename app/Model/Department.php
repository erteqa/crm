<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Department extends Model
{
    use SoftDeletes;
    protected $table='departments';
    protected $fillable = [
        'id',
        'name',

    ];
    protected $rules = [
        'name' => 'required|unique:users',

];
    protected $primaryKey='id';

    public function User()
    {
        return $this->hasMany('App\User');
    }

    public function Division()
    {
        return $this->hasMany('App\Model\Division');
    }
    public function Ticket()
    {
        return $this->hasMany('App\Model\Ticket');
    }
}
