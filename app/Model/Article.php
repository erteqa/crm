<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;
    protected $table='articles';
    protected $fillable = [
        'id',
        'title',
        'content',
        'category_id',
        'user_id',
        'status',

    ];
    protected $primaryKey='id';
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
