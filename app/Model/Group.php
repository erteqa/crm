<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Group extends Model
{
    use softDeletes;
    protected $table='groups';
    protected $fillable = [
        'id',
        'name',
        'division_id',

    ];
    protected $primaryKey='id';

    public function Division()
    {
        return $this->belongsTo('App\Model\Division');
    }
    public function Customer()
    {
        return $this->hasMany('App\Model\Customer');
    }

}
