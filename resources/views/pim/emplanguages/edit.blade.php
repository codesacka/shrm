
	
                    @permission('emplanguage-edit')
                    
                    @include('template.dashboard.partials.modalheader')
                       
                   {!! Form::model($row, ['method' => 'PATCH','data-parsley-validate','route' => ['EmpLanguage.update', $row->id]]) !!}  
               
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
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													   <label>Language :</label>
                                                                                                                {!! Form::select('language', $languages,null,array('class' => 'form-control','data-parsley-error-message'=>"Skills Name is required",'required'))  !!}
                      
                                       
                 
                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													                      <label>Skill :</label>
                    
                                                                                                                              {!! Form::select('skill', $languageskill,null,array('class' => 'form-control','data-parsley-error-message'=>"Skills Name is required",'required'))  !!}
                                                                                                        
                                                                                                        
                                                                                                        
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
    													 <label>Fluency Level :</label>
                     
                                                                                                 {!! Form::select('fluencylevel', $languagefluencylevel,null,array('class' => 'form-control','data-parsley-error-message'=>"Fluency Level details is required",'data-parsley-required'=>"true",))  !!}
                                                                                                        
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
   
   


