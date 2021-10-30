<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Task extends Model
{
    use softDeletes;
    protected $table='tasks';
    protected $fillable = [
        'id',
        'name',
        'task_type_id',
        'user_id',
        'customer_id',
        'state_id',
        'duration',
        'description',
        'addby',
        'Department_id',
        'memo_user',
        'memo_customer',

    ];
    protected $primaryKey='id';
    public function State()
    {
        return $this->belongsTo('App\Model\State');
    }
    public function TaskType()
    {
        return $this->belongsTo('App\Model\TaskType');
    }
    public function Customer()
    {
        return $this->belongsTo('App\Model\Customer');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
