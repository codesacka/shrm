<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.dashboard')
 
@section('content')


          
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
	
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider"> {{ $title }} <span class="panel-subtitle"</span></div>
              <div class="panel-body">
                  
                  {!! Form::open(array('route' => 'License.store','method'=>'POST')) !!}
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Name :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                  </div>
                  
                  
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Number :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('number', null, array('placeholder' => 'Number','class' => 'form-control')) !!}
                    </div>
                  </div>
                  
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Issued Date :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('issueddate', null, array('placeholder' => 'Issued date','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
                    </div>
                  </div>
                  
                  
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Renewable Date :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('renewdate', null, array('placeholder' => 'Renewable date','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Issued By :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('issued_by', null, array('placeholder' => 'Issued By','class' => 'form-control')) !!}
                    </div>
                  </div>
               
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Eligible Status :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('eligible_status', null, array('placeholder' => 'Eligible Status','class' => 'form-control')) !!}
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Description :</label>
                    <div class="col-sm-6">
                        {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                       {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-space btn-primary">Submit</button>
                      <button class="btn btn-space btn-secondary">Cancel</button>
                    </div>
                  </div>
                  
                  
                  {!! Form::close() !!}
                  
                  
              </div>
            </div>
          </div>
            
            
            
            
            
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
                    
                        <th style="width:20%;">Name</th>
                        <th style="width:17%;">Description</th>
                       
                        <th style="width:10%;"></th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($passport as  $obj)
                      <tr>
                        <td>
                         {{ $obj->name }}
                        </td>
                      
                        <td class="cell-detail">
                            {{ $obj->description }}
                        </td>
                        
                        <td class="cell-detail"> <a class="btn btn-info" href="{{ route('License.edit',$obj->id) }}">Edit</a>
                             
                        {!! Form::open(['method' => 'DELETE','route' => ['License.destroy', $obj->id],'style'=>'display:inline']) !!}
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

