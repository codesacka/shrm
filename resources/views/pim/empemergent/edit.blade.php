

	
                    @permission('emergencycontact-edit')
                    
                    @include('template.dashboard.partials.modalheader')
                       

                  {!! Form::model($r, ['method' => 'PATCH','data-parsley-validate','route' => ['EmergencyContacts.update', $r->id]]) !!}
                                    <div class="form-wrapper">
						<div>
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-edit"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                        <div id="errormessage"></div>
                                   
    					               
    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
                                                                                            
                                                                                            
                                                                                                     <div class="form-group">
                                                                                                                <label style="float: left;">Name: </label>
                                                                                                                 {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','data-parsley-error-message'=>"Name is required",'required')) !!}

                                                                                                               </div>

                                                                                                         <div class="form-group">
                                                                                                                <label style="float: left;">Work telephone: </label>
                                                                                                              
                                                                                                         
                                                                                                                    {!! Form::text('worktelephone', null, array('placeholder' => 'Work telephone','class' => 'form-control','data-parsley-error-message'=>"Work Telephone is required",'required')) !!}
                                                                                                               
                                                                                                                <!-- /.input group -->
                                                                                                              </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label style="float:left;"> Mobile  :</label>
                                                                                                                      {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control','data-parsley-error-message'=>"Mobile is required",'required')) !!}
                                                                                                                  </div>    
    								
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												       <div class="form-group">
                                                                                                        <label> Relationship  :</label>
                                                                                                          {!! Form::text('relationship', null, array('placeholder' => 'Relationship','class' => 'form-control','data-parsley-error-message'=>"Relationship  is required",'required')) !!}
                                                                                                      </div>
                                                                                                   <div class="form-group">
                                                                                                    <label> Home telephone  :</label>
                                                                                                          {!! Form::text('hometelephone', null, array('placeholder' => 'Home telephone','class' => 'form-control','data-parsley-error-message'=>"Home Telephone  is required",'required')) !!}
                                                                                                          {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                                                                                                      </div>
    											</div>
    										</div>
                                                                                 
                                                                                  	                                                                            

    									
                                                            
                                                            
                                                            
    										
    										     <div class="box-footer">
              
                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Save</button>
                                                                                                 {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                                                                                                  <span type=button" class="btn btn-space btn-danger" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                                                                                              </div>
                                                                                            </div>
                                                                                  </div>
								</div>
							</div>				
						
						</div>
						</div>
    
     {!! Form::close() !!}
     
   @endpermission
   