<?php

namespace App\Models\Pim;

use Illuminate\Database\Eloquent\Model;

class EmpReportTo extends Model
{
    protected $connection = 'tenant';
    //
    protected $table = 'emp_report_tos';
}
