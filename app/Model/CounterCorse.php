<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CounterCorse extends Model
{
    protected $table='counter_corses';
    protected $fillable = [
        'id',
        'customer_id',
        'course_id',
        'lesson_id',
        'date',
    ];
    protected $primaryKey='id';



}
