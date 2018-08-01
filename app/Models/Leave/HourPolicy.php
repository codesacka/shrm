<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class HourPolicy extends Model
{
          protected $connection = 'tenant'; //
        protected  $table='hour_policies';
}
