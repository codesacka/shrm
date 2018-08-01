<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.dashboard')
 
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
              
              
          
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
       
         {!! Form::open(array('route' => 'Dependents.store','method'=>'POST')) !!}
        <div class="row" style="background-color: #FFF">
            <div class="panel panel-default" style="width:100%">
              <div class="panel-heading panel-heading-divider"> {{ $title }}<span class="panel-subtitle"></span></div>
            </div>	
		
		
          <div class="col-sm-6">
            <div class="panel panel-default">
             
              <div class="panel-body">
                <form action="#" data-parsley-validate="" novalidate="">
                  <div class="form-group">
                    <label>First Name :</label>
                      {!! Form::text('firstname', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                  </div>
                  <div class="form-group">
                    <label>Relationship :</label>
                      {!! Form::text('relationship', null, array('placeholder' => 'Relationship','class' => 'form-control')) !!}
                  </div>
                    
                  
                    
                  <div class="form-group">
                    <label>Address :</label>
                     {!! Form::textarea('contacts', null, array('placeholder' => 'Address','class' => 'form-control','style'=>'height:100px')) !!}
                  </div>
                  
                    
       
              </div>
            </div>
          </div>
		  
		  
          <div class="col-sm-6">
            <div class="panel panel-default">
             
              <div class="panel-body">
              
                  <div class="form-group">
                    <label>Last Name :</label>
                      {!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                  </div>
                  <div class="form-group">
                    <label>Telephone :</label>
                    {!! Form::text('telephone', null, array('placeholder' => 'Telephone','class' => 'form-control')) !!}
                  </div>
                 
                  <div class="form-group">
                    <label>Notes : </label>
                     {!! Form::textarea('notes', null, array('placeholder' => 'Notes','class' => 'form-control','style'=>'height:100px')) !!}
                  </div>
                  <div class="row pt-5">
                    <div class="col-6">
                      <label class="custom-control custom-checkbox mt-2">
                       {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                      </label>
                    </div>
                    <div class="col-6">
                      <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Create</button>
                        
                      </p>
                    </div>
                  </div>
               
              </div>
            </div>
          </div>
		  
	  {!! Form::close() !!}  
		  
		  
	
          <!--Responsive table-->
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">{{ $ntitle }}
               
              </div>
              <div class="panel-body">
                <div class="table-responsive noSwipe">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                    
                        <th style="width:20%;">First Name</th>
                        <th style="width:17%;">Last Name</th>
                       <th style="width:17%;">Realationship</th>
                        <th style="width:10%;"></th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($dependent as  $obj)
                      <tr>
                        <td>
                         {{ $obj->firstname }}
                        </td>
                      
                        <td class="cell-detail">
                            {{ $obj->lastname }}
                        </td>
                        
                        
                         <td class="cell-detail">
                            {{ $obj->relationship }}
                        </td>
                        
                        
                        <td class="cell-detail"> <a class="btn btn-info" href="{{ route('Dependents.edit',$obj->id) }}">Edit</a>
                             
                        {!! Form::open(['method' => 'DELETE','route' => ['Dependents.destroy', $obj->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
        	        {!! Form::close() !!}
                        </td>
                      
                      </tr>
                         @endforeach
                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      	  
		  
		  
        </div>












@endsection

