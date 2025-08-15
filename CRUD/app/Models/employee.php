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
        'temporary_address'];

          protected $primaryKey = 'staff_id';
    }