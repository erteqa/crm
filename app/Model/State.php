<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class State extends Model
{
    use softDeletes;
    protected $table='states';
    protected $fillable = [
        'id',
        'name',
        'percent',



    ];
    protected $primaryKey='id';

    public function Task()
    {
        return $this->hasMany('App\Model\Task');
    }

}
