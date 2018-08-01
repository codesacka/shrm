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
              <div class="panel-heading panel-heading-divider">Update Job title <span class="panel-subtitle"</span></div>
              <div class="panel-body">
                  
                  
                
                      {!! Form::model($license, ['method' => 'PATCH','route' => ['License.update', $license->id]]) !!}  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Name :</label>
                    <div class="col-sm-6">
              
                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                  </div>
               
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Description :</label>
                    <div class="col-sm-6">
                       {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-space btn-primary">Update</button>
                      <button class="btn btn-space btn-secondary">Cancel</button>
                    </div>
                  </div>
                  
                  
                  {!! Form::close() !!}
                  
                  
              </div>
            </div>
          </div>
        </div>
		









@endsection

