<?php
namespace App\Maintenance;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use DB;
use App\Maintenance\OTF;
/**
 * Description of Maintenance
 *
 * @author koskei
 */
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Schema;
class Maintenance {
    //put your code here
    
    
    public function CreateDB($db){
    
           $db2 ='spice_'.$db;
            
           DB::statement('CREATE DATABASE '.$db2);
          
           DB::statement("GRANT ALL PRIVILEGES ON ".$db2.".* TO '".$db."'@'localhost' IDENTIFIED BY '".$db."'");
           
           
           
            DB::purge('tenant');
      
            // Make sure to use the database name we want to establish a connection.
            Config::set('database.connections.tenant.host', 'localhost');
            Config::set('database.connections.tenant.database',$db2);
            Config::set('database.connections.tenant.username',$db);
            Config::set('database.connections.tenant.password',$db);
      
            // Rearrange the connection data
            DB::reconnect('tenant');
            Schema::connection('tenant')->getConnection()->reconnect();
           
            $file  = base_path() .'/public/hrmpayroll.sql';
            DB::connection('tenant')->unprepared(file_get_contents($file) );
            
            
            
            
            
           
    }
    
    
    public function maintainDB(){
        
        
           

         $admin = new Role();
         $admin->name         = 'admin';
         $admin->display_name = 'User Administrator'; // optional
         $admin->description  = 'User is allowed to manage and edit other users'; // optional
         $admin->tenant =1;
         $admin->save();

         $owner = new Role();
         $owner->name         = 'owner';
         $owner->display_name = 'Human Resource'; // optional
         $owner->description  = 'User is the owner of a given Human Resource Management'; // optional
         $admin->tenant =1;        
         $owner->save();
         
         
         $user = User::where('name', '=', 'Admin')->first();

            // role attach alias
         $user->attachRole($admin); // parameter can be an Role object, array, or id

            // or eloquent's original technique
         $user->roles()->attach($admin->id); // id only
         
         
         $createPost = new Permission();
           
         $createPost->name         = 'create-post';
         
         $createPost->display_name = 'Create Posts'; // optional
            // Allow a user to...
         
         $createPost->description  = 'create new blog posts'; // optional
         
         $createPost->save();

         
         $editUser = new Permission();
         
         $editUser->name         = 'edit-user';
         
         $editUser->display_name = 'Edit Users'; // optional
            // Allow a user to...
         
         $editUser->description  = 'edit existing users'; // optional
         
         $editUser->save();

         
         $admin->attachPermission($createPost);
            // equivalent to $admin->perms()->sync(array($createPost->id));

         $owner->attachPermissions(array($createPost, $editUser));
         
         
                 /*$admin =\App\Role::find(5);
            
        $createPost = new \App\Permission();
        $createPost->name         = 'deduction-delete';
        $createPost->display_name = 'Deduction Delete'; // optional
        // Allow a user to...
        $createPost->description  = 'Deduction Delete'; // optional
        $createPost->save();
        $admin->attachPermission($createPost);*/
         
    }
        
}
