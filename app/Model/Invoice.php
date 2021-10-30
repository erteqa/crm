<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Invoice extends Model
{
    use softDeletes;
    protected $table = 'invoices';
    protected $fillable = [
        'id',
        'tid',
        'customer_id',
        'user_id',
        'invoicedate',
        'invoiceduedate',
        'subtotal',
        'discount',
        'discstatus',
        'format_discount',
        'tax',
        'total',
        'pamnt',
        'status',
        'notes',
        'items',
        'taxstatus',
    ];
    protected $primaryKey = 'id';


    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Customer()
    {
        return $this->belongsTo('App\Model\Customer')->withTrashed();
    }
    public function Invoice_Item()
    {
        return $this->hasMany('App\Model\Invoice_Item');
    }
    public function Payment()
    {
        return $this->hasMany('App\Model\Payment');
    }
    public function Transaction()
    {
        return $this->hasMany('App\Model\Transaction');
    }
    public function Not()
    {
        return $this->hasMany('App\Model\Not');
    }
}

