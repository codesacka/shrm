  @extends('template.dashboard.layouts')
 
@section('content')
<link href="{{ URL::asset('assets/css/wizard.css') }}" rel="stylesheet">
<style>
    
    label{
        
        font-weight:bold;
    }
</style>
    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('leavepolicy-add')
                           	<div class="row">

                            
                              
                         

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul style=" list-style-type: none;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                             
                                             
                                             
                                             <div class="container">
                                                                <div class="row">
                                                                        <div class="col-sm-12 col-md-12">
                                                                                <div class="wow fadeInUp" data-wow-delay="0.2s">
                                                                                       
									<div class="panel-body">
									   
                                                                                    
                                                                              <div class="col-sm-12">

                                                                                            <!--      Wizard container        -->
                                                                                            <div class="wizard-container">
                                                                                                
                                                                                                
                                                                                    <div class="wizard-header">
                                                                                            <h3>
                                                                                               {{ $title }}
                                                                                            </h3>
                                                                                    </div>

                                                                                                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                                                                                  {!! Form::open(array('route' => 'SetupPolicy.store','method'=>'POST')) !!}
                                                                                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->



                                                                                                                                <div class="wizard-navigation">
                                                                                                                                        <ul>
                                                                                                                    <li><a href="#about" data-toggle="tab">Time Off Policy Details</a></li>
                                                                                                                    <li><a href="#account" data-toggle="tab">Accrual Schedule</a></li>
                                                                                                                    <li><a href="#address" data-toggle="tab">Accrual Options</a></li>
                                                                                                                </ul>

                                                                                                                                </div>

                                                                                                        <div class="tab-content">
                                                                                                            <div class="tab-pane" id="about">
                                                                                                              <div class="row">
                                                                                                                  <h4 class="info-text" style="font-size:14px;"> Benefits can sometimes be confusing to employees, but we're here to make them easier. Let's get started by getting to know a little bit about your Plan.</h4>
                                                                                                              
                                                                                                                  <div class="col-sm-6">
                                                                                                                      
                                                                                                                       <div class="form-group">
                                                                                                                        <label>Time Off Type <small>(required)</small></label>
                                                                                                                         {!! Form::select('leavetype', $leavetype,null,array('class' => ' form-control','required'=>'true'))  !!}

                                                                                                                      </div>
                                                                                                                      
                                                                                                                      <div class="form-group">
                                                                                                                        <label>Policy Name <small>(required)</small></label>
                                                                                                                         {!! Form::text('policyname', null, array('placeholder' => 'Policy Name','class' => 'form-control','required'=>'true')) !!}

                                                                                                                      </div>
                                                                                                                     
                                                                                                                      
                                                                                                                      
                                                                                                                  </div>
                                                                                                                
                                                                                                              </div>
                                                                                                            </div>
                                                                                                            <div class="tab-pane" id="account">
                                                                                                                <h4 class="info-text" style="font-size:14px;"> Defines how employees with this policy will accrue their time off. </h4>
                                                                                                                <div class="row">

                                                                                                                    <div class="col-sm-12">
                                                                                                                        
                                                                                                                                   <div class="row">
                                                                                                                            
                                                                                                                             <div class="col-sm-3">
                                                                                                                                    <div class="form-group">
                                                                                                                                      <label>Start .. </label>
                                                                                                                                       {!! Form::text('start', null, array('value'=>'1','placeholder' => '','class' => 'form-control','required'=>'true')) !!}

                                                                                                                                    </div>
                                                                                                                             </div>
                                                                                                                            
                                                                                                                             <div class="col-sm-3">
                                                                                                                                 
                                                                                                                                  <div class="form-group">
                                                                                                                        <label>After Hire Date </label>
                                                                                                                                            {!! Form::select('daysetting', $daysetting,null,array('class' => ' form-control','required'=>'true'))  !!}
                                                                                                                      </div>
                                                                                                                                 
                                                                                                                                 
                                                                                                                             </div>
                                                                                                                        </div>
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                     
                                                                                                              <div class="row">
                                                                                                                <div class="col-sm-4">
                                                                                                                  <div class="form-group">
                                                                                                                     <label>Amount Accrued Hours</label>
                                                                                                                   {!! Form::text('amounthouraccrued', 1, array('placeholder' => '','class' => 'form-control','required'=>'true')) !!}
                                                                                                                  
                                                                                                                  </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-2">
                                                                                                                   <div class="form-group">
                                                                                                                                 <label>on the </label>
                                                                                                                          {!! Form::select('accruedamountfrom', $first,null,array('class' => 'select2 form-control','required'=>'true'))  !!}
                                                                                                                            </div>
                                                                                                                </div>
                                                                                                                <div class="col-sm-1">
                                                                                                                 <div class="form-group">
                                                                                                                                 <label>and </label>
                                                                                                                          {!! Form::select('accruedamountto', $second,null,array('class' => 'select2 form-control','required'=>'true'))  !!}
                                                                                                                            </div>
                                                                                                                </div>
                                                                                                              </div>
                                                                                                                        
                                                                                                                        
                                                                                                                       <div class="row">
                                                                                                                            
                                                                                                                             <div class="col-sm-3">
                                                                                                                                    <div class="form-group">
                                                                                                                                      <label>Max Accrual</label>
                                                                                                                                       {!! Form::text('maxaccrual', 0, array('placeholder' => '','class' => 'form-control','required'=>'true')) !!}

                                                                                                                                    </div>
                                                                                                                             </div>
                                                                                                                            
                                                                                                                             
                                                                                                                        </div>
                                                                                                                        
                                                                                                                        <div class="row">
                                                                                                                            
                                                                                                                             <div class="col-sm-3">
                                                                                                                                    <div class="form-group">
                                                                                                                                      <label>Carryover Amount</label>
                                                                                                                                        {!! Form::select('carryoveramount', $caryoversetting,null,array('class' => 'form-control','required'=>'true'))  !!}

                                                                                                                                    </div>
                                                                                                                             </div>
                                                                                                                            
                                                                                                                             
                                                                                                                        </div>
                                                                                                                        
                                                                                                                        
                                                                                                                         
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="tab-pane" id="address">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <h4 class="info-text" style="font-size:14px;"> What are the Total Monthly Costs for this plan? This will help us to calculate the employee cost when you add this plan to a benefit group. </h4>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-7 col-sm-offset-1">
                                                                                                                         <div class="form-group">
                                                                                                                            <label>First Accrual </label>
                                                                                                                           {!! Form::select('firstaccrual', $firstaccrual,null,array('class' => 'form-control','required'=>'true'))  !!}
                                                                                                                          </div>
                                                                                                                        
                                                                                                                         <div class="form-group">
                                                                                                                            <label>Carryover Date </label>
                                                                                                                            {!! Form::select('carryoverdate', $carryoverdate,null,array('class' => 'form-control','required'=>'true'))  !!}
                                                                                                                          </div>
                                                                                                                        
                                                                                                                          <div class="form-group">
                                                                                                                            <label>Accruals Happen </label>
                                                                                                                            {!! Form::select('accrualshappen', $accrualshappen,null,array('class' => 'form-control','required'=>'true'))  !!}
                                                                                                                          </div>
                                                                                                                    </div>
                                                                                                                   
                                                                                                               
                                                                                                                    
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="wizard-footer height-wizard">
                                                                                                            <div class="pull-right">
                                                                                                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                                                                                                     
                                                                                                                <button  type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' > Finish </button>

                                                                                                            </div>

                                                                                                            <div class="pull-left">
                                                                                                           
                                                                                                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                                                                                            </div>
                                                                                                            <div class="clearfix"></div>
                                                                                                        </div>

                                                                                                    {!! Form::close() !!}
                                                                                                </div>
                                                                                            </div> <!-- wizard container -->
                                                                                        </div>
                                                                     

                                                                 	
    									
							                      	</div>
                                                                                      
                                                                                </div>
                                                                        </div>
                                                                       
                                                                       
                                                                     
                                                                </div>
                                                        </div>
						
				        
                              
                              
                                </div>
                              
                              {{ Form::hidden('permission', '1', array('id' => 'permission')) }}    
                              
                              @endpermission
			</div>
		</div>		
    </section>
        
        
        <script src="{{ URL::asset('assets/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('assets/js/gsdk-bootstrap-wizard.js') }}"></script>

	<script src="{{ URL::asset('assets/js/jquery.validate.min.js') }}"></script>
<script>   
    
    
    $(document).ready(function() { 
        var permission = $('#permission').val();
     if (permission == null){
        $.blockUI({message:'You are not allowed to view this page' , css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#fff', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#FF0000' 
        } }); 
       }
 
       // setTimeout($.unblockUI, 2000); 

    }); 
  </script>

 @endsection
 
 
 


