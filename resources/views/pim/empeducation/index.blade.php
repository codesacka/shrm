
                              @permission('empeducation-view')
   
                                  
                                  
              
                       
                                         <div class="row">
					
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
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
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-database"></span> {{ $empeducationtitle}} </h3>
									</div>
									<div class="panel-body">
									   
                                                                                  @permission('empeducation-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  <a class="btn btn-success" onclick="javascript:addempeducation({!! $employee->id !!})"> <i class="fa fa-plus"></i></a>

                                                                                   </div>
                                                                                    </div>
    										@endpermission
                                                            
                                                                          <table  class="table borderless table-striped datatable">
                                                                             <thead>
                                                                                        <tr>
                                                                                                <th>Level</th>

                                                                                                <th>Specialization</th>
                                                                                                <th>College</th>
                                                                                                <th></th>

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                                @foreach ($empeducation as  $obj)
                                                                                              <tr>
                                                                                                <td>
                                                                                                 {{ $obj->name }}
                                                                                                </td>

                                                                                                <td >
                                                                                                    {{ $obj->specialization }}
                                                                                                </td>
                                                                                                 <td >
                                                                                                    {{ $obj->college }}
                                                                                                </td>
                                                                                    <td class="cell-detail"> 
                                                                                        
                                                                                          @permission('empeducation-edit')
                                                                                    <a class="btn btn-xs" onclick="javascript:editempeducation({!! $obj->id !!})"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('empeducation-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['EmpEducation.destroy', $obj->id],'style'=>'display:inline']) !!}
                                                                                    <button type="submit" class="btn  btn-custom btn-xs" ><i class="fa fa-trash icon-success"></i></button>
                                                                                  
                                                                                   {!! Form::close() !!}
                                                                                     @endpermission
                                                                        
                                                                                    </td>
                                                                                    
                                                                                  </tr>
                                                                                     @endforeach



                                                                            </tbody>
                                                                            <tfoot>
                                                                            <tr>
                                                                               <th>&nbsp;</th> 
                                                                               <th>&nbsp;</th>
                                                                                <th>&nbsp;</th>
                                                                              <th>&nbsp;</th>
                                                                                              </tr>
                                                                            </tfoot>
                                                                          </table>
                                                                     
                    
    										
    									
    									
								</div>
							</div>				
						
                                                    
                                                    
                                                    
                                                    
                                                    
						</div>
						</div>
                                         </div>
				          
                              
                              <script>
                                  
                                      function addempeducation(id){
        




                                                                var APP_URL = {!! json_encode(url('/')) !!}

                                                                 $.get( APP_URL+'/'+"EmpEducation/"+id+"/create", function( data ) {



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
                                                     
                                               function editempeducation(id){
        

             
               

                                                                            var APP_URL = {!! json_encode(url('/')) !!}

                                                                             $.get( APP_URL+'/'+"EmpEducation/"+id+"/edit", function( data ) {


                                                                                  $.blockUI({ message: data, css: { 
                                                                                         border: 'none', 
                                                                                         top: '20%',

                                                                                         '-webkit-border-radius': '10px', 
                                                                                         '-moz-border-radius': '10px', 

                                                                                         color: '#fff' 
                                                                                     } }); 

                                                                                  //$.blockUI({ message: data, css: {  top: '20%', width: '700px;' } }); 

                                                                             });



                                                                 }
                                  
                              </script>
                              
                              
                              
                              @endpermission

