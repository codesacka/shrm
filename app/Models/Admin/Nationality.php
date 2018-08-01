<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    //
    
     protected $connection = 'tenant';
     protected $table = 'nationalities';
}
