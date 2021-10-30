<?php

namespace App\Imports;


use App\Model\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $gid;
    public function __construct($gid){
        $this->gid=$gid;
    }
    public function model(array $row)
    {
        if($row[0]=='name' and $row[1]=='phone' )
            return null;
        $temp_password = rand(200000, 999999);
        return new Customer([
            'name'  => $row[0],
            'phone'  => $row[1],
            'address'   => $row[2],
            'email'   => $row[3],
            'group_id'   =>  $this->gid,
            'user_id' => auth()->user()->id,
            'password' => $temp_password,
        ]);
    }
}
