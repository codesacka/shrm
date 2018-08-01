
@extends('template.dashboard.layouts')
 
@section('content')

    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('emergencycontact-view')
                              
                                
                               
                          
        
                                      <div class="col-md-3 profile" style='font-size: 15px;'>
					
					  @include('template.dashboard.partials.profimage')	
                                      </div>
                              
                              
                              <div class="col-md-9">
                                  
                                  <div class='row'>
                                  
                                      
                                      
                                      
                                      @include('template.dashboard.menu.employeemenu')    
                                  
                                  
                                  
                                  
                                  </div>
                                    
                                  
                               
                                   	<div class="row">

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

                                   <div class="form-wrapper">
                                       
                                             
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-ambulance"></span> {{ $title }}</h3>
									</div>
                                                            
                                                            
                                                            
                                                            


<div class="row">

				<div class="col-sm-3 col-md-12">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
                                            
                                            
                                            <table  class="table table-bordered table-striped ">
                                                                             <thead>
                                                                                        <tr>
                                                                                                <th>Files</th>

                                                                                               
                                                                                                

                                                                                        </tr>
                                                                                        </thead>
                                                                                          <tbody>
						
                                                                                @foreach($empfiles as $file)

                                                                                <tr>
                                                                                    <td><a href="{{ URL::asset('uploads'.$file->attachment) }}" target="blank">{{ $file->name }}</a></td>

                                                                                </tr>



                                                                                @endforeach


                                                                                       </tbody>
                                                                            <tfoot>
                                                                            <tr>
                                                                             
                                                                               
                                                                               
                                                                              <th>&nbsp;</th>
                                                                                              </tr>
                                                                            </tfoot>
                                                                          </table>
                                                
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            
					</div>
				</div>
                                                            
									
							</div>				
						
						</div>
						</div>
                                  
                                  
                                  
                                  
                                              
                                              
                                              	
                                   
                               
                                  
                                  
                              </div>
                              
                             
                                 
           
                              
                                </div>
                                
                     
                              {{ Form::hidden('permission', '1', array('id' => 'permission')) }}    
                              
                              @endpermission
			</div>
		</div>		
    </section>
        
     <script>


         function addemergent( id ){
             
               
             
               var APP_URL = {!! json_encode(url('/')) !!}
                        
                $.get( APP_URL+"/EmergencyContacts/"+id+"/create", function( data ) {
                    
                 
                     $.blockUI({ message: data, css: {  top: '20%', width: '700px;' } }); 
                    
                });
             
             
         }
      function editemergent( id ){
             
               
             
               var APP_URL = {!! json_encode(url('/')) !!}
                        
                $.get( APP_URL+"/EmergencyContacts/"+id+"/edit", function( data ) {
                    
                 
                     $.blockUI({ message: data, css: {  top: '20%', width: '700px;' } }); 
                    
                });
             
             
         }
                                  
                              </script>
                                   
        
        
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
 
 
 


