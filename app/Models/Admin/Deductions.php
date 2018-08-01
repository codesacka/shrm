<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Deductions extends Model
{    protected $connection = 'tenant';
    //
    protected $table = 'deductions';
}
