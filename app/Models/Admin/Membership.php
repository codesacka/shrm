<?php

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    //
        protected $connection = 'tenant';
         protected $table = 'memberships';
}
