

                              @permission('emplanguage-view')
   
                                  
                                  
              
                       
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
									<h3 class="panel-title"><span class="fa fa-database"></span> {{ $emplangtitle }} </h3>
									</div>
									<div class="panel-body">
									   
                                                                                     @permission('emplanguage-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  
                                                                                           
                                                                                           <a class="btn btn-success" onclick="javascript:addempslanguages({!! $employee->id !!})"> <i class="fa fa-plus"></i></a>

                                                                                   </div>
                                                                        </div>
    										@endpermission
                                                            
                                                                          <table  class="table borderless table-striped datatable">
                                                                             <thead>
                                                                                               <tr>
                                                                                                <th style="width:20%;">Languages</th>
                                                                                                <th style="width:20%;">Skills</th>
                                                                                                <th style="width:17%;">Fluency level</th>


                                                                                                <th style="width:10%;"></th>

                                                                                              </tr>
                                                                                            </thead>
                                                                                            <tbody>

                                                                                                @foreach ($emplanguages as  $obj)
                                                                                                <tr>

                                                                                                 <td>
                                                                                                 {{ $obj->languagename }}
                                                                                                </td>

                                                                                                <td>
                                                                                                 {{ $obj->lskills }}
                                                                                                </td>

                                                                                                <td class="cell-detail">
                                                                                                    {{ $obj->fluencylevels }}
                                                                                                </td>
                        
                                                                                                
                                                                                                    
                                                                                    <td class="cell-detail"> 
                                                                                        
                                                                                          @permission('emplanguage-edit')
                                                                                    <a class="btn btn-xs" onclick="javascript:editempslanguages({!! $obj->id !!})"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('emplanguage-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['EmpLanguage.destroy', $obj->id],'style'=>'display:inline']) !!}
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


                                                function addempslanguages(id){


                                               
                                                          var APP_URL = {!! json_encode(url('/')) !!}

                                                           $.get( APP_URL+'/'+"EmpLanguage/"+id+"/create", function( data ) {


                                                                $.blockUI({ message: data, css: {   border: 'none', 
                                                                       top: '20%',

                                                                       '-webkit-border-radius': '10px', 
                                                                       '-moz-border-radius': '10px', 

                                                                       color: '#fff'  } }); 

                                                           });



                                               }

                                                function editempslanguages(id){





                                                          var APP_URL = {!! json_encode(url('/')) !!}

                                                           $.get( APP_URL+'/'+"EmpLanguage/"+id+"/edit", function( data ) {


                                                                $.blockUI({ message: data, css: {   border: 'none', 
                                                                       top: '20%',

                                                                       '-webkit-border-radius': '10px', 
                                                                       '-moz-border-radius': '10px', 

                                                                       color: '#fff'  } }); 

                                                           });



                                               }
                                  
                              </script>
                              
                              
                              
                              @endpermission


