<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $table = 'mails';
    protected $fillable = [
        'id',
        'host',
        'port',
        'auth',
        'auth_type',
        'username',
        'password',
        'sender',
    ];
    protected $primaryKey = 'id';

}
