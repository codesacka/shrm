<?php

namespace App\Models\Pim;

use Illuminate\Database\Eloquent\Model;

class Taxable extends Model
{
    //
        protected $connection = 'tenant';
     protected $table = 'taxables';
}
