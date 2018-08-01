
@extends('template.dashboard.layouts')
 
@section('content')

    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('nationality-edit')
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
              
                                  {!! Form::model($nationality, ['method' => 'PATCH','enctype'=>'multipart/form-data','data-parsley-validate','route' => ['Nationality.update', $nationality->id]]) !!}  
                               
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
    													 <label >Description :</label>
                  
                                                                                           {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px','data-parsley-error-message'=>"Notes is required",'data-parsley-required'=>"true")) !!}
                   
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>

    										
                                                                          
                                                                          
                                                                               
    										
                                                                          
                                                                              
                                                                                  <div class="form-group row col-sm-3">
    										      <button type="submit"  class="btn btn-skin btn-block btn-lg ">
                                                                                     Save
                                                                                    </button>
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

