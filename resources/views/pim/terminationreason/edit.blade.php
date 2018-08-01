<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('template.form.layouts')
 
@section('content')







                
    
    <section class="content-header">
      <h1>
        &nbsp;
        <small>&nbsp;</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('TerminationReason.create') }}">New Termination Reason</a></li>
         <li class="active"><a href="{{ route('TerminationReason.index') }}">Termination Reason List</a></li>
      </ol>
    </section>
              




{!! Form::model($terminationreason, ['method' => 'PATCH','route' => ['TerminationReason.update', $terminationreason->id]]) !!} 
    
    
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="float: left;">{{ $title }} </h3>

        
        </div>
          
          

          
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- /.box-header -->
        <div class="box-body">
            
          <div class="row">
            <div class="col-md-6">
                
                
               <div class="form-group">
                <label>Name : </label>
                     {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                
               </div>
                
                
                <div class="form-group">
                <label style="float: left;">Description: </label>
                             
                    {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            
                <!-- /.input group -->
              </div>
                
                
              <!-- /.form-group -->
      
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                
              </div>
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
            
            
            
            
            
            
            
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
         <div class="box-footer">
              
                  <div class="form-group row">
                    <div class="col-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-space btn-success">Save </button>
                      <span type=button" class="btn btn-space btn-default"><a href="{{ route('TerminationReason.index') }}">Cancel</a></span>
                    </div>
                  </div>
        </div>
      </div>
    </section>
 {!! Form::close() !!}






@endsection

