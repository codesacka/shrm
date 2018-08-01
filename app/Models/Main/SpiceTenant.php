<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Main;

use App\Support\TenantConnector;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string mysql_host
 * @property string mysql_database
 * @property string mysql_username
 * @property string mysql_password
 * @property string company_name
 */
class SpiceTenant extends Model {
    
    use TenantConnector;
       
    protected $connection = 'main';
    
    protected $table = 'tenants';
    /**
     * @return $this
     */
    public function connect() {
        $this->reconnect($this);
        return $this;
    }
    
}