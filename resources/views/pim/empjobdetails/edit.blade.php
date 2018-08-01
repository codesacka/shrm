

	
                    @permission('emplanguage-add')
                    
                    @include('template.dashboard.partials.modalheader')
                       
                      {!! Form::model($row, ['method' => 'PATCH','data-parsley-validate','route' => ['EmpJobDetails.update', $row->id]]) !!} 
              
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
   
   




<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.dashboard')
 
@section('content')


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
              
              
          
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
         {!! Form::model($row, ['method' => 'PATCH','route' => ['EmpJobDetails.update', $row->id]]) !!} 
        
        <div class="row" style="background-color: #FFF">
            <div class="panel panel-default" style="width:100%">
              <div class="panel-heading panel-heading-divider"> {{ $title }}<span class="panel-subtitle"></span></div>
            </div>	
		
		
          <div class="col-sm-6">
            <div class="panel panel-default">
             
              <div class="panel-body">
                <form action="#" data-parsley-validate="" novalidate="">
                  <div class="form-group">
                    <label>Joined date :</label>
                      {!! Form::text('joineddate', null, array('placeholder' => 'Joined date','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
                  </div>
                                   
                   <div class="form-group">
                    <label>Permanency date :</label>
                      {!! Form::text('permanencydate', null, array('placeholder' => 'Permanency date','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
                  </div>
                                   
                   <div class="form-group">
                    <label>Employment status :</label>
                     
                       {!! Form::select('employmentstatus', $employmentstatus,null,array('class' => 'form-control'))  !!}
                  </div>
                    
                    <div class="form-group">
                    <label>Job category :</label>
                     
                      {!! Form::select('jobcategory', $jobcategory,null,array('class' => 'form-control'))  !!}
                  </div>
                    
                    
                  <div class="form-group">
                    <label>Notes :</label>
                     {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                  </div>
                  
                     <div class="col-6">
                      <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Update</button>
                        
                      </p>
                    </div>
       
              </div>
            </div>
          </div>
		  
		  
          <div class="col-sm-6">
            <div class="panel panel-default">
             
              <div class="panel-body">
              
                  <div class="form-group">
                    <label>Probation date :</label>
                       {!! Form::text('probationdate', null, array('placeholder' => 'Probation date','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
                  </div>
                  
                  
                 <div class="form-group">
                    <label>Job title :</label>
                     
                       {!! Form::select('jobtitle', $jobtitle,null,array('class' => 'form-control'))  !!}
                  </div>
                 
                  <div class="form-group">
                    <label>Job Specification :</label>
                      {!! Form::text('jobspecification', null, array('placeholder' => 'Job Specification ','class' => 'form-control')) !!}
                  </div>
                  
             
                  
                   <div class="form-group">
                    <label>Location :</label>
                      {!! Form::text('location', null, array('placeholder' => 'Location ','class' => 'form-control')) !!}
                  </div>
                  
                  
                   <div class="form-group">
                    <label>Work Shift :</label>
                     {!! Form::select('workshift', $workshifts,null,array('class' => 'form-control'))  !!}
                     
                  </div>
                  
                  <div class="row pt-5">
                    <div class="col-6">
                      <label class="custom-control custom-checkbox mt-2">
                       {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                      </label>
                    </div>
                   
                  </div>
               
              </div>
            </div>
          </div>
		  
	  {!! Form::close() !!}  
		  
		  
	
          <!--Responsive table-->
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">{{ $ntitle }}
               
              </div>
              <div class="panel-body">
                <div class="table-responsive noSwipe">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:20%;">Joined date</th>
                        <th style="width:20%;">Permanency Date</th>
                        <th style="width:17%;">Job Title</th>
                       
                      
                        <th style="width:10%;"></th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($empjobdetails as  $obj)
                        <tr>
                          
                         <td>
                         {{ $obj->joineddate }}
                        </td>
                        
                        <td>
                         {{ $obj->permanencydate }}
                        </td>
                      
                        <td class="cell-detail">
                            {{ $obj->jobtitle }}
                        </td>
                        
                        
                       
                        
                        
                        <td class="cell-detail"> <a class="btn btn-info" href="{{ route('EmpJobDetails.edit',$obj->id) }}">Edit</a>
                             
                        {!! Form::open(['method' => 'DELETE','route' => ['EmpJobDetails.destroy', $obj->id],'style'=>'display:inline']) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
        	{!! Form::close() !!}
                        </td>
                      
                      </tr>
                         @endforeach
                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      	  
		  
		  
        </div>












@endsection

