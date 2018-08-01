
	
                    @permission('empsalary-add')
                    
                    @include('template.dashboard.partials.modalheader')
                       

               {!! Form::open(array('route' => 'SalaryDetails.store','method'=>'POST','data-parsley-validate')) !!}
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
                                                                                                    <label>Employee Type </label>
                                                                                                     {!! Form::select('saltype', $emp_saltype,null,array('class' => 'select2 form-control','style'=>"width: 100%;",'required','data-parsley-error-message'=>"Employee Type is required",))  !!}
                                                                                                  </div>



                                                                                                    <div class="form-group">
                                                                                                    <label>Job Title </label>
                                                                                                     {!! Form::select('jobtitle', $jobtitle,null,array('class' => 'select2 form-control','style'=>"width: 100%;",'required','data-parsley-error-message'=>"Job Title is required",))  !!}
                                                                                                  </div>


                                                                                                <div class="form-group">
                                                                                                    <label>Pay From </label>
                                                                                                 
                                                                                                        {!! Form::text('payfrom', null, array('placeholder' => 'Pay From','class' => 'form-control datepicker pull-right' ,'data-parsley-error-message'=>"Employee Hired Date is required",'required', 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}
                                                                                                         {!! Form::hidden('action', 'basicinfo', array('id' => 'action')) !!}
                                                                                                    
                                                                                                    <!-- /.input group -->
                                                                                                  </div>

                                                                                                    <div class="form-group">
                                                                                                        <label class="text-left">Active :</label>

                                                                                                           {!! Form::select('active', $active_setting,null,array('class' => 'form-control','required','data-parsley-error-message'=>"Active Status  is required"))  !!}

                                                                                                      </div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    										            <div class="form-group">
                                                                                              <label>Per</label>
                                                                                             {!! Form::select('salper', $emp_payrate,null,array('class' => 'select2 form-control','style'=>"width: 100%;",'required','data-parsley-error-message'=>"Salary Pay Rate  is required"))  !!}
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                              <label>Amount </label>

                                                                                            
                                                                                                  {!! Form::text('amount', null, array('placeholder' => 'Amount','class' => 'form-control pull-right','data-parsley-type'=>"integer",'required','data-parsley-error-message'=>"Amount  is required and numeric")) !!}

                                                                                             
                                                                                              <!-- /.input group -->
                                                                                            </div>


                                                                                              <div class="form-group">
                                                                                                   <label >Pay To </label>
                                                                                            
                                                                                                  {!! Form::text('payto', null, array('placeholder' => 'Pay to','class' => 'form-control datepicker pull-right' ,'data-parsley-error-message'=>"Employee Hired Date is required",'required', 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}
                                                                                                   {!! Form::hidden('action', 'basicinfo', array('id' => 'action')) !!}
                                                                                             
                                                                                              <!-- /.input group -->
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
   
   