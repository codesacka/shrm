
@extends('template.dashboard.layouts')
 
@section('content')

    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('users-edit')
                           	<div class="row">

                              @include('template.dashboard.menu.sidemenu')
                              
                              
                              <div class="col-md-9">
                                  
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
                                   {!! Form::model($user, ['method' => 'PATCH','data-parsley-validate','route' => ['users.update', $user->id]]) !!}
                                     {{ csrf_field() }}
              
                                  
                                  
                                         <div class="row">
					
						<div class="form-wrapper">
                                                    
                                                    
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> {{ $title}} </h3>
									</div>
									<div class="panel-body">
									   
                                                                          <div id="errormessage"></div>
                                   
    					                   
    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Name : </label>
                   
                                                                                                         {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','data-parsley-error-message'=>"Name is required",'data-parsley-required'=>"true")) !!}
                                                                                                        
                                                                                                        <div class="validation" ></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													 <label >Email :</label>
                                                                                                          {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','data-parsley-type'=>"email",'data-parsley-error-message'=>"Valid Email is required",'data-parsley-required'=>"true")) !!}
                                                                                          
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>

    										
                                                                                 <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Password : </label>
                   
                                                                                                        {!! Form::password('password', array('placeholder' => 'Password','id'=>'password','class' => 'form-control','data-parsley-error-message'=>"Password is required",'data-parsley-required'=>"true")) !!}
                                                                                                        <div class="validation" > Error</div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													 <label >Confirm Password :</label>
                                                                                                           {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','data-parsley-equalto'=>'#password','data-parsley-error-message'=>"Confirm Password is required and must be equal to password",'data-parsley-required'=>"true")) !!}
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>
                                                                          
                                                                               
    										  <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Role : </label>
                   
                                                                                                           {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                                                                                        <div class="validation" > </div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													 
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>
                                                                          
                                                                              
                                                                          
                                                                                  <div class="row">
                                                                                  <div class="form-group row col-sm-3">
    										      <button type="submit"  class="btn btn-skin btn-block btn-lg ">
                                                                                     Save
                                                                                    </button>
                                                                                    </div>
                                                                                      <div class="form-group row col-sm-1">   
                                                                                    
                                                                                      
                                                                                  </div>
                                                                                   <div class="form-group row col-sm-3">   
                                                                                       <a href="{{ route('users.disable', $user->id) }}"> <span   class="btn btn-warning btn-block btn-lg ">
                                                                                     Disable
                                                                                     </span></a>
                                                                                      
                                                                                      
                                                                                  </div>
                                                                                  </div>
    										
    									
    									
								</div>
							</div>				
						
                                                    
                                                    
                                                    
                                                    
                                                    
						</div>
						</div>
				              </div>
                                   
                                {!! Form::close() !!}
                                  
                                  
                              </div>
                              
                              
                              
                                </div>
                              
                              {{ Form::hidden('permission', '1', array('id' => 'permission')) }}    
                              
                              @endpermission
			</div>
		</div>		
    </section>
<script>   
    $(document).ready(function() { 
        var permission = $('#permission').val();
     if (permission == null){
        $.blockUI({message:'You are not allowed to view this page' , css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#fff', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#FF0000' 
        } }); 
       }
 
       // setTimeout($.unblockUI, 2000); 

    }); 
  </script>

 @endsection

