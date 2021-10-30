<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Msgbefore extends Model
{

    protected $table='msgbefores';
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id',
        'addby',
        'timebefore',
    ];
    protected $primaryKey='id';



}
