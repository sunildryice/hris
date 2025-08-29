<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
   protected $fillable=[
    'emp_id',
    'check_in',
    'date',
    'check_out'
   ];
   protected $primaryKey='attend_id';
    public function employees()
    {
        return $this->belongsTo(employee::class, 'staff_id','emp_id');
    }
}

