<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice_Item extends Model
{
    protected $table = 'invoice__items';
    protected $fillable = [
        'id',
        'invoice_id',
        'product',
        'qty',
        'price',
        'tax',
        'discount',
        'subtotal',
        'totaltax',
        'totaldiscount',
        'product_des',

    ];
    protected $primaryKey = 'id';
    public function Invoice()
    {
        return $this->belongsTo('App\Model\Invoice');
    }
}
