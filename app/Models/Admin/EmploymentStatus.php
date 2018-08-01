<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    //
        protected $connection = 'tenant';
        protected $table = 'employment_statuses';
}
