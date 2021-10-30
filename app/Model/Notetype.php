<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notetype extends Model
{
    protected $table = 'notetypes';
    protected $fillable = [
        'id',
        'typename'

    ];
    protected $primaryKey = 'id';

    public function Not()
    {
        return $this->hasMany('App\Model\Not');
    }

}
