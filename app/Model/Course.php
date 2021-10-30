<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
 //   use softDeletes;
    protected $table='courses';
    protected $fillable = [
        'id',
        'title',
        'teacher',
        'writer',
        'category',
        'difficulty',
        'hashtag',
        'link',
        'addby',
        'date',
    ];
    protected $primaryKey='id';

    public function Lesson()
    {
        return $this->hasMany('App\Model\Lesson');
    }

}
