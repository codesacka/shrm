<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    // 
   protected $connection = 'tenant';       
  protected $table = 'genders';
    
}
