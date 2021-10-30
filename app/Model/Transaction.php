<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table='transactions';
    protected $fillable = [
        'id',
        'acid',
        'account',
        'cat',
        'type',
        'debit',
        'credit',
        'customer_id',
        'method',
        'date',
        'amount',
        'remaining',
        'invoice_id',
        'user_id',
        'balance_id',
        'payment_id',
        'note',
        'ext',
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

    public function Invoice()
    {
        return $this->belongsTo('App\Model\Invoice');
    }
    public function Payment()
    {
        return $this->belongsTo('App\Model\Payment');
    }
    public function Balance()
    {
        return $this->belongsTo('App\Model\Balance');
    }
}
