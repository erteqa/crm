<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'id',
        'title',
        'description'
    ];
    protected $primaryKey = 'id';

}
