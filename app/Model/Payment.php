<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Payment extends Model
{
    use softDeletes;
    protected $table='payments';
    protected $fillable = [

        'id',
        'amount',
        'user_id',
        'invoice_id',
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
    public function Invoice()
    {
        return $this->belongsTo('App\Model\Invoice');
    }
    public function Transaction()
    {
        return $this->hasOne('App\Model\Transaction');
    }
}
