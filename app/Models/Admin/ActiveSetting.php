<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ActiveSetting extends Model
{
    //
       protected $connection = 'tenant';
    protected $table = 'active_settings';
}
