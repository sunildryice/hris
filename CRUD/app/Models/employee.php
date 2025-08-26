<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable=[
        'full_name',
        'contact_number',
        'email',
        'permanent_address',
        'temporary_address',
        'dep_id',
        'desig_id'
  ];

          protected $primaryKey = 'staff_id';


          public function department()
    {
        return $this->belongsTo(department::class, 'dep_id','dep_id');
    }

    public function designation()
    {
        return $this->belongsTo(designation::class, 'desig_id','desig_id');
    }

    public function details()
{
    return $this->hasMany(Detail::class, 'emp_id', 'staff_id');
}

    }