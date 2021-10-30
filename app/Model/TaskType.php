<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class TaskType extends Model
{
    use softDeletes;
    protected $table='task_types';
    protected $fillable = [
        'id',
        'name',


    ];
    protected $primaryKey='id';
    public function Task()
    {
        return $this->hasMany('App\Model\Task');
    }
}
