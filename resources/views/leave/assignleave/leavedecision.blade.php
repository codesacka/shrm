<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
@extends('template.dashboard.layouts')

@section('content')

  <script src="{{ URL::asset('assets/plugins/blockUI/jquery.blockUI.js') }}" type="text/javascript"></script>
       
     	<link href="{{ URL::asset('assets/plugins/notifyjs/dist/styles/metro/notify-metro.css') }}" rel="stylesheet" />


	<script src="{{ URL::asset('assets/plugins/notifyjs/dist/notify.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/notifyjs/dist/styles/metro/notify-metro.js') }}"></script>
        
        
        
         <link href="{{ URL::asset('assets/plugins/parsley/parsley.css') }}" rel="stylesheet">
	  
	  
    <script src="{{ URL::asset('assets/plugins/parsley/parsley.min.js') }}"></script>
    
    
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> {{ $title }}</li>
      </ol>
    </section>
    

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
  
   <section class="content">
       
       
       
         <hr>
          <!-- Jumbotron Header -->
        <div class="jumbotron hero-spacer">
            
            <h3 style="text-align:center">  {{ \Config::get('constants.dashboard_leavemessage') }}</h3>
            <p style="text-align:center">     {{ \Config::get('constants.dashboard_leavemessage2') }}</p>
            <p style="text-align:center"><a class="btn btn-primary btn-large" href="{{ route('LeaveType.index') }}">Add Policy </a>
            </p>
         
        </div>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>{{ $title }}</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

             @foreach($emp_all  as $obj)
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                   
                    <div class="caption">
                        <h3>{{ $obj->name }}</h3>
                        <p>{{ $obj->description }}</p>
                        @if(in_array($obj->id,$ap_array))
                      
                        <p> <span class="btn btn-info" onclick="javascript:editformpolicy({!! $obj->id !!})">Edit Policy </span></p>
                        @else
                        <p> <span class="btn btn-success" onclick="javascript:addformpolicy({!! $obj->id !!})">Set up Policy </span></p>
                        @endif 
                    </div>
                </div>
            </div>
            @endforeach
          

           

            

        </div>
        
        
        
		
   </section>


    @include('leave.leavetype.setuppolicy')

    <script type="text/javascript"> 
        
        function addformpolicy( id ){
             
              $('#leavetype').val(id);
              $.blockUI({ message: $('#addpolicyform'),centerX: true,centerY: true, css: {   width: '600px',  padding: '10px',top:'10%'  } }); 
       
      
             
         }
         
         
          function editformpolicy( id ){
             
             
              
              
                var APP_URL = {!! json_encode(url('/')) !!}
                        
                $.get( APP_URL+"/LeavePolicy/"+id+"/edit", function( data ) {
                    
                 
                     $.blockUI({ message: data, centerX: true,centerY: true, css: {   width: '600px',  padding: '10px',top:'10%'  }  }); 
                     
                     
                    if ( $('#state').val() > 0){
                        
                        $('#edithourform').show();
                        
                    }else{
                        
                        $('#editannualform').show();
                        
                    }
                    
                });
       
      
             
          }
          
          
           function editformpolicyannual(){

              $('#earnedmethod2').val('annual');
              
              $('#editannualform').show();
           
              $('#edithourform').hide();
           }
           
           
          function editformpolicyhour(){
              $('#earnedmethod2').val('hour');
              
               $('#edithourform').show();
            
               $('#editannualform').hide();
          }
        
        
        function addformpolicyannual(){
           
           
       
           $('#totalperyear').val('');
           
           $('#amaxbalance').val('');
            
           $('#leaveearned').val('');
           
           
           $('#hourrate').val('1');
           
           $('#perhoursworked').val('1');
            
           $('#hmaxbalance').val('1');
           
           
           $('#earnedmethod2').val('annual');
           
          
           
           $('#annualform').show();
           
           $('#hourform').hide();
       }
         
         
       function addformpolicyhour(){
           
           
          
           $('#totalperyear').val('1');
           
           $('#amaxbalance').val('1');
            
           $('#leaveearned').val('1');
          
           
           $('#hourrate').val('');
           
           $('#perhoursworked').val('');
            
           $('#hmaxbalance').val('');
           
            $('#earnedmethod2').val('hour');
           
            $('#hourform').show();
            
            $('#annualform').hide();
           
       }
    </script>
@endsection
