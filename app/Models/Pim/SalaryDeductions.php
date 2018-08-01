<?php

namespace App\Models\Pim;

use Illuminate\Database\Eloquent\Model;

class SalaryDeductions extends Model
{
    //
      protected $connection = 'tenant';
      protected $table = 'salary_deductions';
}
