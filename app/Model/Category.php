<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable = [
        'id',
        'name',


    ];
    protected $primaryKey='id';
    public function Article()
    {
        return $this->hasMany('App\Model\Article');
    }
}
