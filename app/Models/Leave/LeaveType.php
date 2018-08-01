<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
        protected $connection = 'tenant';//
    protected $table = 'leave_types';
}
