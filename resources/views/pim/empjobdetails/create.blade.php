
	
                    @permission('emplanguage-add')
                    
                    @include('template.dashboard.partials.modalheader')
                       

               {!! Form::open(array('route' => 'EmpJobDetails.store','method'=>'POST','data-parsley-validate')) !!}
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
                                                                                                    <label>Joined date :</label>
                                                                                                      {!! Form::text('joineddate', null, array('placeholder' => 'Joined date','class' => 'form-control datepicker' , 'readonly',  'data-date-format'=>'yyyy-mm-dd' ,'data-parsley-error-message'=>"Joined date is required",'data-parsley-required'=>"true")) !!}
                                                                                                  </div>

                                                                                                   <div class="form-group">
                                                                                                    <label>Permanency date :</label>
                                                                                                      {!! Form::text('permanencydate', null, array('placeholder' => 'Permanency date','class' => 'form-control datepicker' ,'readonly' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-error-message'=>"Joined date is required",'data-parsley-required'=>"true")) !!}
                                                                                                  </div>

                                                                                                   <div class="form-group">
                                                                                                    <label>Employment status :</label>

                                                                                                       {!! Form::select('employmentstatus', $employmentstatus,null,array('class' => 'form-control','data-parsley-error-message'=>"Employment status is required",'data-parsley-required'=>"true"))  !!}
                                                                                                  </div>

                                                                                                    <div class="form-group">
                                                                                                    <label>Department :</label>

                                                                                                      {!! Form::select('jobcategory', $jobcategory,null,array('class' => 'form-control','data-parsley-error-message'=>"Department is required",'data-parsley-required'=>"true"))  !!}
                                                                                                  </div>


                                                                                                  <div class="form-group">
                                                                                                    <label>Notes :</label>
                                                                                                     {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px','data-parsley-error-message'=>"Notes is required",'data-parsley-required'=>"true")) !!}
                                                                                                  </div>
    											</div>
    											
    										
                                                                                    
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6">
    												 <div class="form-group">
                                                                                                            <label>Probation date :</label>
                                                                                                               {!! Form::text('probationdate', null, array('placeholder' => 'Probation date','class' => 'form-control datepicker' ,'data-parsley-error-message'=>"Probation date is required",'data-parsley-required'=>"true", 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}
                                                                                                          </div>


                                                                                                         <div class="form-group">
                                                                                                            <label>Job title :</label>

                                                                                                               {!! Form::select('jobtitle', $jobtitle,null,array('class' => 'form-control','data-parsley-error-message'=>"Job title is required",'data-parsley-required'=>"true"))  !!}
                                                                                                          </div>

                                                                                                          <div class="form-group">
                                                                                                            <label>Job Specification :</label>
                                                                                                              {!! Form::text('jobspecification', null, array('placeholder' => 'Job Specification ','class' => 'form-control','data-parsley-error-message'=>"Job Specification is required",'data-parsley-required'=>"true")) !!}
                                                                                                          </div>



                                                                                                           <div class="form-group">
                                                                                                            <label>Location :</label>
                                                                                                               {!! Form::select('location', $location,null,array('class' => 'form-control','data-parsley-error-message'=>"Location is required",'data-parsley-required'=>"true"))  !!}
                                                                                               
                                                                                                           </div>


                                                                                                           <div class="form-group">
                                                                                                            <label>Report to :</label>
                                                                                                             {!! Form::select('reportto', $reportto,null,array('class' => 'form-control','data-parsley-error-message'=>"Report to is required",'data-parsley-required'=>"true"))  !!}

                                                                                                          </div>
                                                                                                          <div class="form-group">
                                                                                                            <label>Active :</label>
                                                                                                             {!! Form::select('status', $active,null,array('class' => 'form-control','data-parsley-error-message'=>"Active is required",'data-parsley-required'=>"true"))  !!}

                                                                                                          </div>
    											</div>
    											
    											
    										</div>
    										
    										     <div class="box-footer">
              
                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                            
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
   
   


