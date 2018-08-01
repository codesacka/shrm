<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Support;

use App\Models\Main\SpiceTenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait TenantConnector {
   
   /**
    * Switch the Tenant connection to a different company.
    * @param Company $company
    * @return void
    * @throws
    */
   public function reconnect(SpiceTenant $company) {     
      // Erase the tenant connection, thus making Laravel get the default values all over again.
      DB::purge('tenant');
      
      // Make sure to use the database name we want to establish a connection.
      Config::set('database.connections.tenant.host', $company->schema_server);
      Config::set('database.connections.tenant.database', $company->schema_name);
      Config::set('database.connections.tenant.username', $company->schema_username);
      Config::set('database.connections.tenant.password', $company->schema_password);
      
      // Rearrange the connection data
      DB::reconnect('tenant');
      
      // Ping the database. This will throw an exception in case the database does not exists or the connection fails
      Schema::connection('tenant')->getConnection()->reconnect();
   }
   
}