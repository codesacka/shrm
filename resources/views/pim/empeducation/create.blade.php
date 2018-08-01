
                    @permission('empeducation-add')

                    @include('template.dashboard.partials.modalheader')


                    {!! Form::open(array('route' => 'EmpEducation.store','method'=>'POST','data-parsley-validate')) !!}

                                    <div class="form-wrapper">
						<div>

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-plus"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage">Your message has been sent. Thank you!</div>
                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Education Level</label>
    													 {!! Form::select('level', $education,null,array('class' => 'select2 form-control','style'=>"width: 100%;",'data-parsley-error-message'=>"Education Level is required",'data-parsley-required'=>"true"))  !!}

                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													   <label>College Attended :</label>
                                                                                                        {!! Form::text('college', null, array('placeholder' => 'College','class' => 'form-control','data-parsley-error-message'=>"College Attended is required",'data-parsley-required'=>"true")) !!}
                                                                                                <div class="validation"></div>
    												</div>
    											</div>
    										</div>

                                                                                <div class="row">

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													    <label>Specialization :</label>
                                                                                                    {!! Form::text('specialization', null, array('placeholder' => 'Specialization','class' => 'form-control','data-parsley-error-message'=>"Education Specialization is required",'data-parsley-required'=>"true")) !!}
                                                                                                   <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													 <label>Score :</label>
                                                                                                        {!! Form::text('score', null, array('placeholder' => 'Score','class' => 'form-control','data-parsley-error-message'=>"Score Details  is required",'data-parsley-required'=>"true")) !!}
                                                                                                       <div class="validation"></div>
    												</div>
    											</div>

    										</div>

    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Start date </label>
    													   {!! Form::text('startdate', null, array('placeholder' => 'Start date','class' => 'form-control datepicker ' ,'data-parsley-error-message'=>"Start Date From is required",'data-parsley-required'=>"true", 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}

                                                                                     <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>End Date</label>
    													 {!! Form::text('enddate', null, array('placeholder' => 'End Date :','class' => 'form-control datepicker' ,'data-parsley-error-message'=>"Pay Date To is required",'data-parsley-required'=>"true", 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}



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
