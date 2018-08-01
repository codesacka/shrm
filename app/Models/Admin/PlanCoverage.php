<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PlanCoverage extends Model
{
    //
    
    protected $connection = 'tenant';
    
    protected $table = 'plan_coverages';
}
