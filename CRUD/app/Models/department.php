<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable=[
        'dep_name'];
     protected $primaryKey = 'dep_id';

     public function employees()
    {
        return $this->hasMany(employee::class, 'dep_id','dep_id');
    }
}
