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

	
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">{{ $title }} <span class="panel-subtitle"</span></div>
              <div class="panel-body">
                  
                  {!! Form::open(array('route' => 'JobTitle.store','method'=>'POST')) !!}
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Name :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                  </div>
               
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Reporting To :</label>
                    <div class="col-sm-6">
                       {!! Form::select('reporting', $reportto,null,array('class' => 'form-control'))  !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2 col-sm-10">
                        {!! Form::hidden('employee_id', $employee_id, array('id' => 'employee_id')) !!}
                      <button type="submit" class="btn btn-space btn-primary">Create</button>
                    
                    </div>
                  </div>
                  
                  
                  {!! Form::close() !!}
                  
                  
              </div>
            </div>
          </div>
        </div>
		









@endsection

