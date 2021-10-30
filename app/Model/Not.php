<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Not extends Model
{
    protected $table = 'nots';
    protected $fillable = [
        'id',
        'user_id',
        'notetype_id',
        'content',
        'customer_id',
    ];
    protected $primaryKey = 'id';

    public function Notetype()
    {
        return $this->belongsTo('App\Model\Notetype');
    }
    public function Customer()
    {
        return $this->belongsTo('App\Model\Customer');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Invoice()
    {
        return $this->belongsTo('App\Model\Invoice');
    }
}
