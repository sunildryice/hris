<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
   protected $fillable=[
        'emerg_contact',
        'emp_id',
        'emerg_name',
        'relation',
        'blood_group',
       
  ];
         protected $primaryKey = 'det_id';

   public function employees()
    {
        return $this->belongsTo(employee::class, 'staff_id','emp_id');
    }
}
