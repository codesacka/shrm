
	
                    @permission('empskill-edit')
                    
                    @include('template.dashboard.partials.modalheader')
                       

              
    {!! Form::model($row, ['method' => 'PATCH','data-parsley-validate','route' => ['EmpSkill.update', $row->id]]) !!} 

                                    <div class="form-wrapper">
						<div>
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                        <div id="errormessage"></div>
                                   
    					               
    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													 <label>Skills :</label>
                      
                                                                                                                 {!! Form::select('skills', $skill,null,array('class' => 'form-control select2','data-parsley-error-message'=>"Skills Name is required",'required'))  !!}
                 
                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													  <label>Experience :</label>
                                                                                                                {!! Form::text('experience', null, array('placeholder' => 'Experience','class' => 'form-control','data-parsley-error-message'=>"Experience is required",'required')) !!}
                 
                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>
                                                            
                                                                             

    									
                                                            
                                                            
                                                            
                                                                                 <div class="row">
                                                                                    
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													    <label>Notes :</label>
                                                                                                      {!! Form::textarea('description', null, array('placeholder' => 'Description','data-parsley-error-message'=>"Notes details is required",'data-parsley-required'=>"true",'class' => 'form-control','style'=>'height:100px')) !!}
                 

                                                                                                    
                                                                                                    
                                                                                                    <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													
                                                                                                        
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    											
    										</div>
    										
    										     <div class="box-footer">
              
                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-info">Update</button>
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
   
   