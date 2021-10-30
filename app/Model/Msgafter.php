<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Msgafter extends Model
{
    protected $table='msgafters';
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id',
        'addby',
        'isread',
    ];
    protected $primaryKey='id';


}
