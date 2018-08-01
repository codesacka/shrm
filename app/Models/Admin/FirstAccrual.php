<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class FirstAccrual extends Model
{
    //
    
        protected $connection = 'tenant';
      protected $table = 'first_accruals';
}
