<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'id',
        'name',
        'address',
        'city',
        'region',
        'country',
        'phone',
        'email',
        'taxid',
        'tax',
        'zone',
        'logo',
        'lang',
    ];
    protected $primaryKey = 'id';
}
