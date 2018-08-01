

                              @permission('empskill-view')
   
                                  
                                  
              
                       
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
									<h3 class="panel-title"><span class="fa fa-database"></span> {{ $empskilltitle }} </h3>
									</div>
									<div class="panel-body">
									   
                                                                                     @permission('empskill-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  <a class="btn btn-success" onclick="javascript:addempskills({!! $employee->id !!})"> <i class="fa fa-plus"></i></a>

                                                                                   </div>
                                                                        </div>
    										@endpermission
                                                            
                                                                          <table  class="table borderless table-striped datatable">
                                                                             <thead>
                                                                                        <tr>
                                                                                                <th>Name</th>

                                                                                               
                                                                                                <th>Experience</th>
                                                                                                <th></th>

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                                @foreach ($empskills as  $obj)
                                                                                              <tr>
                                                                                                <td>
                                                                                                 {{ $obj->name }}
                                                                                                </td>

                                                                                                <td >
                                                                                                    {{ $obj->experience }}
                                                                                                </td>
                                                                                                
                                                                                                    
                                                                                    <td class="cell-detail"> 
                                                                                        
                                                                                          @permission('empskill-edit')
                                                                                    <a class="btn btn-xs" onclick="javascript:editempskills({!! $obj->id !!})"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('empskill-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['EmpSkill.destroy', $obj->id],'style'=>'display:inline']) !!}
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
                                                                            
                                                                             </tr>
                                                                            </tfoot>
                                                                          </table>
                                                                     

                                                                          
                                                                          
                                                                              
                                                                          
                                                                             
    										
                                                                                  
    										
    									
    									
								</div>
							</div>				
						
                                                    
                                                    
                                                    
                                                    
                                                    
						</div>
						</div>
                                         </div>
				          
                              
                              <script>


                                                function addempskills(id){





                                                          var APP_URL = {!! json_encode(url('/')) !!}

                                                           $.get( APP_URL+'/'+"EmpSkill/"+id+"/create", function( data ) {


                                                                $.blockUI({ message: data, css: {   border: 'none', 
                                                                       top: '20%',

                                                                       '-webkit-border-radius': '10px', 
                                                                       '-moz-border-radius': '10px', 

                                                                       color: '#fff'  } }); 

                                                           });



                                               }

                                                function editempskills(id){





                                                          var APP_URL = {!! json_encode(url('/')) !!}

                                                           $.get( APP_URL+'/'+"EmpSkill/"+id+"/edit", function( data ) {


                                                                $.blockUI({ message: data, css: {   border: 'none', 
                                                                       top: '20%',

                                                                       '-webkit-border-radius': '10px', 
                                                                       '-moz-border-radius': '10px', 

                                                                       color: '#fff'  } }); 

                                                           });



                                               }
                                  
                              </script>
                              
                              
                              
                              @endpermission


