@include('template.dashboard.partials.modalheader')



						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Edit Profile Photo</h3>
									</div>
									<div class="panel-body">

    					              {!! Form::open(array('route' => 'Employee.photostore','enctype'=>"multipart/form-data",'method'=>'POST','data-parsley-validate')) !!}
    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Profile Photos</label>

																 {!!  Form::file('emp_photo',array('data-parsley-error-message'=>"Employee Logo is required",'data-parsley-required'=>"true"))  !!}
														


                              <div class="validation"></div>
    												</div>
    											</div>

    										</div>




                             <div class="box-footer">
                               <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Save</button>

                                                                                                       {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}

                                                                                                                                     <span type="button" class="btn btn-space btn-danger" onclick="javascript:$.unblockUI(); return false">Cancel</span>


                                                                                        </div>
                                                                                      </div>


                                                                                  </div>

    						     {!! Form::close() !!}
								</div>
							</div>

						</div>
						</div>
