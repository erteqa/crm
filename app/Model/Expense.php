<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Expense extends Model
{
    use SoftDeletes;
    protected $table='expenses';
    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'note',
        'date',

    ];
    protected $primaryKey='id';

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
