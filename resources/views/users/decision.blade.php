<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


@extends('template.dashboard.layouts')
 
@section('content')

    @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	      @endif
              
              @if ($message = Session::get('error'))
		<div class="alert alert-danger">
			<p>{{ $message }}</p>
		</div>
	      @endif
              
              
              

         {!! Form::open(array('route' => 'users.decisionstore','method'=>'POST')) !!}
        
         
         
         
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
          <dt><i class="icon"></i> Users </dt>
          <dd>
              <p>Manage Users in SpiceHR. </p>
              
              <p>
                  <a href="{{ route('users.index') }}"  class="btn btn-success margin">Manage users</a>
                
              </p>
                  
          </dd>

          
         <dt><i class="icon"></i> Roles.</dt>
          <dd>
              <p>Manage User Roles  </p> 
              <p> <a href="{{ route('roles.index') }}" class="btn btn-success margin">Manage Roles</a></p>
          </dd>

          <dt><i class="icon"></i>Permission</dt>
          <dd>
              <p>Manage User Permessions </p>
              <p><a href="{{ route('permission.index') }}" class="btn btn-success margin">Manage Permission</a></p>
          </dd>

     
       
          
          
          
          
          
        </dl>

       
    </div>

  </div>

       
 
            </div>
          </div>
        </div>
		
   </section>
       
       {!! Form::close() !!}     
              
              
  @endsection