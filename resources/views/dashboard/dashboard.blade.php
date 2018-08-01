@extends('template.dashboard.layouts')

@section('content')

<style>

.bar {
  fill: steelblue;
}

.bar:hover {
  fill: brown;
}

.axis--x path {
  display: none;
}
    input[type=file] {

       color:#000;
     }


</style>

    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                                      @permission('admin-dashboard')
				<div class="row">
					<div class="col-md-4 profile" style='font-size: 15px;'>

						<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">

                        <div class="profile-userpic">
                                                  @if(isset($companylogo))
                                                  <img src="{{ URL::asset('uploads/'.$companylogo) }}" class="img-responsive" alt="" onclick="javascript:UpdateLogo()">
                                                                               
                                                   @endif
				                  </div>
                                                    @if(empty($companylogo)) 
                                                     <ul class="lead-list">
							<li> &nbsp;<a href="#" class="btn btn-skin btn-lg" onclick="javascript:UpdateLogo()">Upload Logo <i class="fa fa-download"></i></a></li>

						</ul>
                                                   @endif
				
						<p class=" wow bounceIn" data-wow-delay="0.4s">
						<a href="{{ route('Assignleave.Approvals') }}" class="btn btn-skin btn-lg">Approve Leave Events <i class="fa fa-calendar"></i></a>
						</p>







								<div class="panel panel-profile no-bg">
									<div class="panel-heading overflow-h">
										<h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Recent Leave Events</h2>
										<a href="#"><i class="fa fa-cog pull-right"></i></a>
									</div>
									<div id="scrollbar2" class="panel-body no-padding " data-mcs-theme="minimal-dark">
                                                                            
                                                                            
                                                                       @if(count($comingleave) > 0)

                                                                        @foreach ($comingleave as  $obj)

                                                                        @php

                                                                        $dateleave =explode('-',$obj->fromdate)

                                                                        @endphp
										<div class="profile-event">
											<div class="date-formats">
												<span> {{$dateleave[2]}}</span>
												<small> {{$dateleave[1]}}, {{$dateleave[0]}}</small>
											</div>
											<div class="overflow-h">
												<h3 class="heading-xs"><a href="#"> {{ $obj->emp_firstname.'    '.$obj->emp_middle_name.'  '.$obj->emp_lastname  }}</a></h3>
												<p>  {{ $obj->leavetype_name }}</p>
											</div>
										</div>
                                                                        @endforeach
                                                                        
                                                                       @else
                                                                       
                                                                       
                                                                         <div class="alert alert-warning alert-dismissible">
                                         
                                                                                   
                                                                                    No Upcoming leave date this month 

                                                                                  </div>

                                                                       
                                                                       @endif





									</div>
								</div>


					<!--Notification-->
					<div class="panel-heading-v2 overflow-h">
						<h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Recent Birthdays </h2>
						<a href="#"><i class="fa fa-cog pull-right"></i></a>
					</div>

                                         @if(count($birthdates) > 0)
					<ul class="list-unstyled  margin-bottom-20" data-mcs-theme="minimal-dark">

                                         @foreach($birthdates as $birthrow )
						<li class="notification">
							<i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
							<div class="overflow-h">
								<span><strong> {{ $birthrow->emp_firstname.'    '.$birthrow->emp_middle_name.'  '.$birthrow->emp_lastname  }}</strong> Birth Dates.</span>
								<small> {{ $birthrow->emp_birthday }}</small>
							</div>
						</li>
                                             @endforeach



					</ul>
                                         @else
                                         
                                         
                                          <div class="alert alert-warning alert-dismissible">
                                         
                                                                                   
                                            No Employee Birthday Date 
                                            
                                          </div>

                                         
                                         
                                         @endif

					<!--End Notification-->

					<div class="margin-bottom-50"></div>

					<!--Datepicker-->
					<form action="#" id="sky-form2" class="sky-form">
						<div id="inline-start"></div>
					</form>
					<!--End Datepicker-->



					</div>



                                    </div>
				</div>



                                    <div class="col-md-8">

                                    <div class="row">
					<div class="col-md-12">
						<div class="callaction bg-gray">
							<div class="row">
								<div class="col-md-12">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<h3> Welcome, {{ Auth::user()->name }}</h3>
									<p>You're looking at SpiceHRM, your new tool for work. Here's a quick look at some of the things you can do with SpiceHRM </p>
									</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>

                                        
                                        <hr>  
                                        
                                       <div class="row">
					<div class="col-lg-12">
					<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">
                                                    <div class="cta-text">
                                                             <h3> Get Started </h3>
                                                    </div>
						<ul class="lead-list">
							<li>
                                                            
                                                            @if(! empty($legal_name))
                                                            <span class="fa fa-check fa-2x icon-success"></span> 
                                                            
                                                            @else
                                                              <span class="fa fa-times fa-2x icon-danger"></span> 
                                                          
                                                            @endif
                                                            
                                                            <span class="list"><strong>Add Your Company Information(Company Profile).</strong></span> 
                                                            
                                                            
                                                              @if(! empty($legal_name))
                                                                <a href="{{ route('Company.Profile') }}"><span class="pull-right hidden-xs showopacity btn btn-success">Edit</span></a>
                                                              @else
                                                              <a href="{{ route('Company.Profile') }}"><span class="pull-right hidden-xs showopacity btn btn-info">Next</span></a>
                                                              @endif
                                                           
                                                        
                                                        
                                                        </li>
						        <li>
                                                             @if(! empty($legal_name) && ($locationcount > 0) )
                                                            <span class="fa fa-check fa-2x icon-success"></span> 
                                                            
                                                            @else
                                                              <span class="fa fa-times fa-2x icon-danger"></span> 
                                                          
                                                            @endif
                                                       
                                                       
                                                       
                                                       <span class="list"><strong>Add Your Company Branches Location.</strong></span>  
                                                       
                                                         @if(empty($legal_name))
                                                         
                                                          <span class="pull-right hidden-xs showopacity btn btn-info disabled">Next</span>
                                                       
                                                         @elseif(! empty($legal_name) && ($locationcount == 0) )
                                                         <a href="{{ route('Locations.index') }}"> <span class="pull-right hidden-xs showopacity btn btn-info">Next</span></a>
                                                       
                                                        @elseif($locationcount > 0)
                                                        
                                                          <a href="{{ route('Locations.index') }}"> <span class="pull-right hidden-xs showopacity btn btn-success">Edit</span></a>
                                                        @endif
                                                        
                                                        
                                                        
                                                        
                                                        </li>
                                                        <li>
                                                            
                                                           @if($jobtitlecount ==0)
                                                            <span class="fa fa-times fa-2x icon-danger"></span> 
                                                           @else
                                                           <span class="fa fa-check fa-2x icon-success"></span>
                                                           
                                                           @endif
                                                           
                                                           <span class="list">
                                                                
                                                                
                                                            <strong>Set Up Account Settings(Job titles,Department,Education)</strong></span>  <span class="pull-right hidden-xs showopacity btn btn-info disabled">Next</span></li>
							<li>
                                                            
                                                            
                                                             @if($employeecount ==0)
                                                            <span class="fa fa-times fa-2x icon-danger"></span> 
                                                           @else
                                                           <span class="fa fa-check fa-2x icon-success"></span>
                                                           
                                                           @endif
                                                           
                                                            
                                                            
                                                            <span class="list"><strong>Add your current employees</strong></span> <span class="pull-right hidden-xs showopacity btn btn-info disabled disabled">Next</span></li>
                                                        <li>
                                                            
                                                           @if($benefitcount ==0)
                                                            <span class="fa fa-times fa-2x icon-danger"></span> 
                                                           @else
                                                           <span class="fa fa-check fa-2x icon-success"></span>
                                                           
                                                           @endif
                                                            
                                                            <span class="list"><strong>Setup  Payroll Settings(Benefits)</strong></span>  <span class="pull-right hidden-xs showopacity btn btn-info disabled">Next</span></li>
                                                     
                                                         <li>
                                                             
                                                             
                                                             @if($deductioncount ==0)
                                                            <span class="fa fa-times fa-2x icon-danger"></span> 
                                                           @else
                                                           <span class="fa fa-check fa-2x icon-success"></span>
                                                           
                                                           @endif
                                                             
                                                             
                                                             <span class="list"><strong>Setup  Employee Deductions </strong></span> <span class="pull-right hidden-xs showopacity btn btn-info disabled">Next</span></li>
                                                        
                                                        <li>
                                                               @if($bankcount ==0)
                                                            <span class="fa fa-times fa-2x icon-danger"></span> 
                                                           @else
                                                           <span class="fa fa-check fa-2x icon-success"></span>
                                                           
                                                           @endif
                                                            
                                                            
                                                            <span class="list"><strong>Setup  Employee Banks </strong></span> <span class="pull-right hidden-xs showopacity btn btn-info disabled">Next</span></li>
                                                        
                                                          <li>
                                                            
                                                           @if($leavetypecount ==0)
                                                            <span class="fa fa-times fa-2x icon-danger"></span> 
                                                           @else
                                                           <span class="fa fa-check fa-2x icon-success"></span>
                                                           
                                                           @endif
                                                            
                                                            
                                                            
                                                            <span class="list"><strong>Setup  Leave Settings </strong></span> <span class="pull-right hidden-xs showopacity btn btn-info disabled">Next</span></li>
                                                        
                                                        
						</ul>
						
						</div>
						</div>


					</div>
					<div class="col-lg-6">
						<div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<img src="img/dummy/img-1.png" class="img-responsive" alt="" />
						</div>
					</div>					
				</div>

                                        <hr>

                                <div class="row">
                                 <div class="col-md-12">

                                 <div class="callaction bg-gray">
		                 <div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
                                                       <a href="{{ route('Company.Profile') }}">
							<i class="fa fa-bank fa-3x circled bg-skin"></i>
                                                         </a>
                                                        <h4 class="h-bold" style="font-size: 15px;">Company Profile</h4>
							<p style="font-size: 15px;">
							 Update Company Information
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
                                         <a href="{{ route('Employee.index') }}">
							<i class="fa fa-users fa-3x circled bg-skin"></i>

                                                       </a>
							<h4 class="h-bold" style="font-size: 15px;">Employee Directory</h4>
							<p style="font-size: 15px;">
							Search for coworkers and their contact info.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">

 <a href="{{ route('Documents.index') }}">
							<i class="fa fa-folder-open-o fa-3x circled bg-skin"></i>
            </a>
							<h4 class="h-bold" style="font-size: 15px;">Documents</h4>
							<p style="font-size: 15px;">
							upload and filing away documents for safekeeping.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
 <a href="{{ route('ProcessPayroll.decision') }}">
							<i class="fa fa-balance-scale fa-3x circled bg-skin"></i>
        </a>
							<h4 class="h-bold" style="font-size: 15px;">Payroll </h4>
							<p style="font-size: 15px;">
							 calculate benefits, deductions, and create  first paycheck
							</p>
						</div>
					</div>
				</div>
                                 </div>

		                 <div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
 <a href="{{ route('Coming.index') }}">
							<i class="fa fa-calendar-o fa-3x circled bg-skin"></i>
        </a>y
              <h4 class="h-bold" style="font-size: 15px;">Time Attendance</h4>
							<p style="font-size: 15px;">
							tracking non-exempt employees
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
             <a href="{{ route('LeaveType.Policyindex') }}">
							<i class="fa fa-briefcase fa-3x circled bg-skin"></i>
            </a>
							<h4 class="h-bold" style="font-size: 15px;">Time Off</h4>
							<p style="font-size: 15px;">
							Request time off and check your balances.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
         <a href="{{ route('Coming.index') }}">
							<i class="fa fa-yelp fa-3x circled bg-skin"></i>
        </a>
							<h4 class="h-bold" style="font-size: 15px;">Hiring</h4>
							<p style="font-size: 15px;">
							Manage your job postings and applicants.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
           <a href="{{ route('BiReport.index') }}">
							<i class="fa fa-bar-chart fa-3x circled bg-skin"></i>
            </a>
							<h4 class="h-bold" style="font-size: 15px;">Reports </h4>
							<p>
							View and create the reports you need.
							</p>
						</div>
					</div>
				</div>
                                 </div>
                                 </div>



                                 </div>

			</div>


                                          <hr>

                                          
                      	

                                <!--<div class="row">
                                 <div class="col-md-12">

                                 <div class="callaction bg-gray">
		                 <div class="row">
                                     <h4 class="h-bold">Notifications</h4>
				<div class="col-sm-3 col-md-12">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">

							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Make an appoinment</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>



                                 </div>
                                 </div>
                                 </div>

			</div>-->

                                               <hr>

                                <div class="row">
                                 <div class="col-md-12">

                                 <div class="callaction bg-gray">
		                 <div class="row">
                                     <a href ="{{ route('BiReport.index') }}"><h4 class="h-bold">Reports (Headcount)</h4></a>
				<div class="col-sm-3 col-md-12">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
           <div id="barchart">

           </div>







						</div>
					</div>
				</div>



                                 </div>
                                 </div>
                                 </div>

			</div>



                                    {{ Form::hidden('permission', '1', array('id' => 'permission')) }}


                                    </div>
				</div>
                             @endpermission
			</div>
		</div>
    </section>
        
        <div id="updateLogoDiv" style="display:none;">
            
            
            
                    {!! Form::open(array('route' => 'CompanySettings.storelogo','method'=>'POST','enctype'=>"multipart/form-data" ,'data-parsley-validate')) !!}

                                    <div class="form-wrapper">
						<div>

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-plus"></span> Update Company Logo</h3>
									</div>
									<div class="panel-body">
									   
                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Company Logo</label>
    													 {!!  Form::file('company_logo',null,array('data-parsley-error-message'=>"Company Logo is required",'data-parsley-required'=>"true"))  !!}

                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    											
    										</div>

                                                                              



    										     <div class="box-footer">

                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Update</button>
                                                                                              
                                                                                                  <span type=button" class="btn btn-space btn-danger" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                                                                                              </div>
                                                                                            </div>
                                                                                  </div>
								</div>
							</div>

						</div>
						</div>

     {!! Form::close() !!}
        </div>

    <script src="{{ URL::asset('assets/plugins/chart/d3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/dimple.min.js') }}"></script>
    
    
    

    <script type="text/javascript">
    
      function UpdateLogo(){
        
           $.blockUI({ message: $('#updateLogoDiv'), css: { 
                       border: 'none', 
                       top: '20%',
                       '-webkit-border-radius': '10px', 
                      '-moz-border-radius': '10px', 
                       color: '#fff' 
             } }); 
          
      }    
      var svg = dimple.newSvg("#barchart", 800, 600);
      var data ={!! $charts !!} ;
      var chart = new dimple.chart(svg, data);
      chart.addCategoryAxis("x", "Month");
      chart.addMeasureAxis("y", "Headcount");
      chart.addSeries(null, dimple.plot.bar);
      chart.draw();
    </script>




<script>
    $(document).ready(function() {
        var adminval = $('#permission').val();
     if (adminval == null){
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
