<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Ticket extends Model
{
    use softDeletes;
    protected $table='tickets';
    protected $fillable = [
        'id',
        'subject',
        'reply',
        'user_id',
        'customer_id',
        'department_id',
        'status',
    ];
    protected $primaryKey='id';


    public function Customer()
    {
        return $this->belongsTo('App\Model\Customer');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Department()
    {
        return $this->belongsTo('App\Model\Department');
    }
}
