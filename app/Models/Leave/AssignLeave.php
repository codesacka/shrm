<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class AssignLeave extends Model
{
        protected $connection = 'tenant';//
     protected $table = 'assign_leaves';
}
