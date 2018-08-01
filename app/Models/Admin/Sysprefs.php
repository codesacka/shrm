<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Support\TenantConnector;

class Sysprefs extends Model
{
    //
    
    use TenantConnector;
    
    
     protected $connection = 'tenant';

     
     
     
}
