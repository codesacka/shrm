
	
                    @permission('empskill-add')
                    
                    @include('template.dashboard.partials.modalheader')
                       

               {!! Form::open(array('route' => 'Documents.categorystore','method'=>'POST','data-parsley-validate')) !!}
                                    <div class="form-wrapper">
						<div>
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-plus"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                        <div id="errormessage"></div>
                                   
    					               
    										<div class="row">
    											<div class="col-xs-12 col-sm-12 col-md-12">
    												<div class="form-group">
    													 <label>Name :</label>
                                                                                                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','data-parsley-error-message'=>"Name is required",'data-parsley-required'=>"true")) !!}
                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    										
    										</div>
                                                            
                                                                             

    									
                                                            
                                                            
                                                            
    										
    										     <div class="box-footer">
              
                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Save</button>
                                                                                              
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
   
   