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
                  
                  {!! Form::open(array('route' => 'Competency.store','method'=>'POST')) !!}
                  
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
                    <label class="col-sm-3 col-form-label text-right">Parent :</label>
                   
                        <div class="col-sm-6">
                           {!! Form::text('parentname', null, array('placeholder' => 'Type for hints ..','class' => 'form-control', 'id'=>'autocomplete-ajax' ,'style'=>'position: absolute; z-index: 2; background: transparent;')) !!}
                          {!! Form::text('parentname', null, array('id'=>'autocomplete-ajax-x', 'disabled'=>'disabled', 'style'=>'color: #CCC; position: absolute; background: transparent; z-index: 1;','class' => 'form-control')) !!}
              
                          {!! Form::hidden('parent', null, array('id'=>'selction-ajax')) !!} 
                        </div>
                  </div>
                  
                  
                  <div class="form-group row">
                    <div class="col-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-space btn-primary">Create</button>
                    
                    </div>
                  </div>
                  
                  
                  {!! Form::close() !!}
                  
                  
              </div>
            </div>
          </div>
        </div>
		



       
        
    <script type="text/javascript" src="{{ URL::asset('autocomplete/scripts/jquery.mockjax.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('autocomplete/src/jquery.autocomplete.js') }}"></script>
    <!--<script type="text/javascript" src="{{ URL::asset('autocomplete/scripts/countries.js') }}"></script>-->
    <script type='text/javascript'>
    ﻿var holder = {
        <?php 
         foreach($competency as $obj){
            ?> 
            " <?php echo $obj->id ?>": " <?php echo $obj->name ?>",
        <?php }
        ?>
    }
        
   </script>
    
    <script type="text/javascript" src="{{ URL::asset('autocomplete/scripts/demo.js') }}"></script>
        
        
        





@endsection

