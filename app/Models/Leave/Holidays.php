<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
     protected $connection = 'tenant'; //
     protected $table = 'holidays';
}
