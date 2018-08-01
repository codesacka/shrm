<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('template.dashboard.layouts')
 
@section('content')


    {!! Form::model($jobtitle, ['method' => 'PATCH',,'enctype'=>'multipart/form-data','route' => ['Documents.update', $jobtitle->id]]) !!}  
    
     @permission('documents-edit')
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
                <label style="float: left;">Document Owner : </label>
                   
                
                   {!! Form::select('type', $type,null,array('class' => 'select2 form-control'))  !!}
                
               </div>
                
               <div class="form-group">
                <label style="float: left;">Name : </label>
                   
                
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                
               </div>
                
                
      
                <div class="form-group">
                    
               <label style="float: left;">Notes : </label>
           
               
                  {!! Form::textarea('notes', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                
                <!-- /.input group -->
              </div>
                
                <div class="form-group">
                <label style="float: left;">Attachment : </label>
                      {{Form::file('attachment')}}
              </div>
                
                
              <!-- /.form-group -->
      
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              
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
                      
                    
                      
                    </div>
                  </div>
        </div>
      </div>
    </section>
    
       @endpermission
       
 {!! Form::close() !!}









@endsection


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

	   @permission('documents-edit')
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider"> {{ $title }} <span class="panel-subtitle"</span></div>
              <div class="panel-body">
                  
                  
                
                      {!! Form::model($jobtitle, ['method' => 'PATCH','route' => ['JobTitle.update', $jobtitle->id]]) !!}  
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
		



   @endpermission





@endsection

