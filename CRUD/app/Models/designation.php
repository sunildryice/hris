<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    protected $fillable=[
        'desig_name'
    ];
         protected $primaryKey = 'desig_id';

     public function employees()
    {
        return $this->hasMany(employee::class, 'desig_id','desig_id');
    }
}
