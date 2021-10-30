<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fileowner extends Model
{

    protected $table='fileowners';
    protected $fillable = [
        'id',
        'name',
        'memo',
        'path',
        'customer_id',

    ];
    protected $primaryKey='id';
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
