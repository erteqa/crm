<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $fillable = [
        'id',
        'name',
        'course_id',
        'teacher',
        'timeshow',
        'time',
        'link',
        'addby',
        'date',
    ];
    protected $primaryKey = 'id';

    public function Part()
    {
        return $this->hasMany('App\Model\Part');
    }
    public function Course()
    {
        return $this->belongsTo('App\Model\Course');
    }
}
