@extends('template.dashboard.layouts')
 
@section('content')


    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                                      @permission('admin-dashboard')
				<div class="row">
					<div class="col-md-4 profile" style='font-size: 15px;'>
					
						<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">
                                           
						<p class=" wow bounceIn" data-wow-delay="0.4s">
                                                   @permission('createdocumentfile-add')
						<a href="#" class="btn btn-skin btn-lg" onclick="javascript:adddocumentfile()"> <i class="fa fa-upload"></i>Upload</a>
                                                   @endpermission
                                                
                                                  @permission('createdocumentcategory-add')
                                                
                                                <a href="#" class="btn btn-skin btn-lg" onclick="javascript:addfolder()"> <i class="fa fa-plus"></i>Add Folder</a>
                                                
                                                    @endpermission
						</p>
						
                                            
                                            
                                         
                                                        
							
							     
				
					
								<div class="panel panel-profile no-bg">
									<div class="panel-heading overflow-h">
										<h2 class="panel-title heading-sm pull-left"><i class="fa fa-file-o"></i>Files</h2>
										<a href="#"><i class="fa fa-cog pull-right"></i></a>
									</div>
									<div id="scrollbar2" class="panel-body no-padding" data-mcs-theme="minimal-dark">
                                                                            
                                                                            @foreach($docfolder as $doc)
										<div class="profile-event">
						                                 <div class="overflow-h">
                                                                                     <h3 style="font-size: 15px;"> <i class="fa fa-folder"></i><a href="#" onclick="javascript:fetchfiles({!! $doc->id !!})">{{ $doc->name }}</a></h3>
												
											</div>
										</div>
                                                                            @endforeach
										
										
										
									</div>
								</div>
							

					

					
					<!--End Notification-->

					<div class="margin-bottom-50"></div>

					<!--Datepicker-->
					<form action="#" id="sky-form2" class="sky-form">
						<div id="inline-start"></div>
					</form>
					<!--End Datepicker-->
				


					</div>
                                    
                                    
                                    
                                    </div>
				</div>
                                    
                                    
                                    
                                    <div class="col-md-8">
                                    
                               
                              
                                        
                                <div class="row">
                                 <div class="col-md-12">
                                     
                                 <div class="callaction bg-gray">
                                      <div id="filetableholder">
                                     
                                     
		                 
				
			
				
                                 </div>
                                 </div>
                                 </div>
                               
			</div>
                                        
                                        
                                      {{ Form::hidden('defaultfolder', $defaultfolder, array('id' => 'defaultfolder')) }}  
                                        
                                    {{ Form::hidden('permission', '1', array('id' => 'permission')) }}    
                                    
                                    
                                    </div>				
				</div>
                             @endpermission
			</div>
		</div>		
    </section>
<script>   
    $(document).ready(function() { 
        var adminval = $('#permission').val();
     if (adminval == null){
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
    
    
    if($('#defaultfolder').val() >0){
        
         var APP_URL = {!! json_encode(url('/')) !!}
        
         $.get( APP_URL+'/Documents/'+$('#defaultfolder').val()+'/getFiles', function( data ) {
             
           
                $('#filetableholder').html(data);

           });
        
    }
    
    function fetchfiles( id){
        
        
           var APP_URL = {!! json_encode(url('/')) !!}
        
         $.get( APP_URL+'/Documents/'+id+'/getFiles', function( data ) {
             
           
                $('#filetableholder').html(data);

           });
        
    }

                                  
                                      function addfolder(){
        




                                                                var APP_URL = {!! json_encode(url('/')) !!}

                                                                 $.get( APP_URL+'/Documents/Categorycreate', function( data ) {



                                                                      $.blockUI({ message: data, css: { 
                                                                             border: 'none', 
                                                                             top: '20%',

                                                                             '-webkit-border-radius': '10px', 
                                                                             '-moz-border-radius': '10px', 

                                                                             color: '#fff' 
                                                                         } }); 

                                                                      // instanciate new modal


                                                                 });



                                                     }
                                                     
                                  function adddocumentfile(){
        




                                                                var APP_URL = {!! json_encode(url('/')) !!}

                                                                 $.get( APP_URL+'/Documents/create', function( data ) {



                                                                      $.blockUI({ message: data, css: { 
                                                                             border: 'none', 
                                                                             top: '20%',

                                                                             '-webkit-border-radius': '10px', 
                                                                             '-moz-border-radius': '10px', 

                                                                             color: '#fff' 
                                                                         } }); 

                                                                      // instanciate new modal


                                                                 });



                                                     }
  </script>

 @endsection