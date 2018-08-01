

                    @permission('assign-leave-add')

                    @include('template.dashboard.partials.modalheader')


               {!! Form::open(array('route' => 'AssignLeave.store','method'=>'POST','data-parsley-validate')) !!}
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
                            <div class="form-group ">
                              <label>Leave Type :</label>

                                 {!! Form::select('leavetype', $leavetype,null,array('id'=>'leavetype','class' => 'select2 form-control','data-parsley-required'=>"true",'data-parsley-error-message'=>"Leave Type is required",))  !!}


                           </div>

                           <div class="form-group">
                             <label>From Date :</label>

                                   {!! Form::text('fromdate', null, array('id'=>'fromdate','placeholder' => 'From Date','readonly' => 'true','class' => 'form-control datepicker' , 'data-parsley-required'=>"true",'data-parsley-error-message'=>"Date From is required" ,'data-date-format'=>'yyyy-mm-dd')) !!}

                           </div>



                           <div class="form-group">
                             <label >Comment :</label>

                                {!! Form::textarea('comment', null, array('id'=>'comment','placeholder' => 'Description','class' => 'form-control','data-parsley-required'=>"true",'data-parsley-error-message'=>"Comment is required" ,'style'=>'height:100px')) !!}

                           </div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                  <label>Duration :</label>
                                     {!! Form::select('duration', $duration,null,array('class' => 'select2 form-control','data-parsley-required'=>"true",'data-parsley-error-message'=>"Duration is required" ))  !!}
                                </div>
                           <!-- /.form-group -->
                           <div class="form-group">
                                 <label >To Date :</label>

                                       {!! Form::text('todate', null, array('id'=>'todate','placeholder' => 'To Date','readonly' => 'true','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-required'=>"true",'data-parsley-error-message'=>"Date To is required" )) !!}
                               </div>
    											</div>
    										</div>








    										     <div class="box-footer">

                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Save</button>
                                                                                                 {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                                                                                                  <span type=button" class="btn btn-space btn-danger" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                                                                                                  <div style="display:none">
                                                                                                  <img src="{{ URL::asset('img/preloader.gif')  }}">
                                                                                                  </div>
                                                                                              </div>
                                                                                            </div>
                                                                                  </div>
								</div>
							</div>

						</div>
						</div>

     {!! Form::close() !!}
     
     
     
     
     <script type='text/javascript'> 
     
      $(document).ready(function(){
          
         
        });
     </script>

   @endpermission
