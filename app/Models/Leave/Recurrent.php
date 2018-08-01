<?php

namespace App\Models\Leave;

use Illuminate\Database\Eloquent\Model;

class Recurrent extends Model
{
        protected $connection = 'tenant';//
        protected $table = 'recurrents';
}
