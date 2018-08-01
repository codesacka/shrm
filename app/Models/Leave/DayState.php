<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class DayState extends Model
{
        protected $connection = 'tenant';//
         protected $table = 'day_states';
}
