<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table='balances';
    protected $fillable = [
        'id',
        'amount',
        'user_id',
        'customer_id',
        'note',
        'date',
    ];
    protected $primaryKey='id';
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Customer()
    {
        return $this->belongsTo('App\Model\Customer');
    }
    public function Transaction()
    {
        return $this->hasOne('App\Model\Transaction');
    }
}
