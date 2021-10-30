<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    protected $table='user_files';
    protected $fillable = [
        'id',
        'name',
        'path',
        'memo',
        'user_id',

    ];
    protected $primaryKey='id';
}
