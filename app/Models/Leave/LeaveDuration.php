<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class LeaveDuration extends Model
{
        protected $connection = 'tenant'; //
     protected $table = 'leave_durations';
}
