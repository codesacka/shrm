<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('template.form.layouts')
 
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
              
         <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">{{ $title }}
                  <span class="panel-subtitle">&nbsp;</span></div>
              <div class="panel-body">
                  
                @if($rowcount ==0 )
                {!! Form::open(array('route' => 'WorkWeek.store','method'=>'POST')) !!}
                @endif
                
                  @if($rowcount > 0 )
               {!! Form::model($row, ['method' => 'PATCH','route' => ['WorkWeek.update', $row->id]]) !!}  
                @endif
                <form>
                    
                    
                    
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Monday :</label>
                    <div class="col-sm-6">
                 
                      {!! Form::select('monday', $daystate,null,array('class' => 'select2'))  !!}
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Tuesday :</label>
                    <div class="col-sm-6">
                 
                      {!! Form::select('tuesday', $daystate,null,array('class' => 'select2'))  !!}
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Wednesday :</label>
                    <div class="col-sm-6">
                 
                      {!! Form::select('wednesday', $daystate,null,array('class' => 'select2'))  !!}
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Thursday :</label>
                    <div class="col-sm-6">
                 
                      {!! Form::select('thursday', $daystate,null,array('class' => 'select2'))  !!}
                    </div>
                  </div>
                  
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Friday :</label>
                    <div class="col-sm-6">
                 
                      {!! Form::select('friday', $daystate,null,array('class' => 'select2'))  !!}
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Saturday :</label>
                    <div class="col-sm-6">
                 
                      {!! Form::select('saturday', $daystate,null,array('class' => 'select2'))  !!}
                    </div>
                  </div>
                  
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Sunday :</label>
                    <div class="col-sm-6">
                 
                      {!! Form::select('sunday', $daystate,null,array('class' => 'select2'))  !!}
                    </div>
                  </div>
                  
                     <div class="row pt-5">
                 
                    <div class="col-6">
                      <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Update</button>
                       
                      </p>
                    </div>
                  </div>
                    
                    
                    
                </form>
              </div>
            </div>
          </div>
        </div>





@endsection
