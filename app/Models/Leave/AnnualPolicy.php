<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class AnnualPolicy extends Model
{
       protected $connection = 'tenant'; //
    protected  $table='leave_policies';
}
