<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
@extends('template.dashboard.layouts')

@section('content')


  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> {{ $title }}</li>
      </ol>
    </section>
    

  
   <section class="content">
  <div class="row">
      
       <div class="col-md-12">
            <div class="panel panel-default">
             
              <div class="panel-body">
 <div class="section">
        <h1>{{ \Config::get('constants.dashboard_welcomemessage') }}</h1>
        <p>
            {{ \Config::get('constants.dashboard_welcomemessage2') }}
               </p>
        <dl class="list-features">
          <dt><i class="icon"></i> Step 1 of 5.</dt>
          <dd>
            <p>Add Your Company’s Addresses. </p>
             <p> <a href="{{ route('Locations.index') }}" class="btn btn-success margin">Manage Addresses</a></p>
            </dd>

          
         <dt><i class="icon"></i> Step 1 of 5.</dt>
          <dd>
            <p>Add Your Company’s Users . </p>
              <p> <a href="{{ route('users.decision') }}" class="btn btn-success margin">Manage users</a></p>
          </dd>

          <dt><i class="icon"></i> Step 2 of 5.</dt>
          <dd>
            <p>Add Your Employees. </p>
            
              <p> <a href="{{ route('Employee.index') }}" class="btn btn-success margin">Manage Employee</a></p>
            
            
          </dd>

        
          
          
        </dl>

       
    </div>

  </div>

       
 
            </div>
          </div>
        </div>
		
   </section>


@endsection
