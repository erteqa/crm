<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';
    protected $fillable = [
        'id',
        'name',
        'num',
        'lesson_id',
        'time',
        'addby',
        'link',
        'date',
    ];
    protected $primaryKey = 'id';

    public function Lesson()
    {
        return $this->belongsTo('App\Model\Lesson');
    }
}
