<?php

namespace App\Models\Pim;

use Illuminate\Database\Eloquent\Model;

class DeductionHolder extends Model
{
    //
       
     protected $connection = 'tenant';
     protected $table = 'deduction_holders'; 
}
