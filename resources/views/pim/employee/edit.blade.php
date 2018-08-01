@extends('template.dashboard.layouts')

@section('content')


    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('employee-show')





                                      <div class="col-md-3 profile" style='font-size: 15px;'>

                               @include('template.dashboard.partials.profimage')
                                      </div>


                              <div class="col-md-9">

                                  <div class='row'>




                                      @include('template.dashboard.menu.employeemenu')




                                  </div>


                                    {!! Form::model($employee, ['method' => 'PATCH','enctype'=>'multipart/form-data','data-parsley-validate','route' => ['Employee.update', $employee->id]]) !!}


                                   	<div class="row">
                                            
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


                                   <div class="form-wrapper">


						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

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
    													<label>First Name</label>
    													 {!! Form::text('emp_firstname', null, array('placeholder' => 'First Name','class' => 'form-control','data-parsley-error-message'=>"First name is required",'data-parsley-required'=>"true")) !!}
                                                        <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Middle Name</label>
    													 {!! Form::text('emp_middle_name', null, array('placeholder' => 'Middle Name','class' => 'form-control','data-parsley-error-message'=>"Middle name is required",'data-parsley-required'=>"true")) !!}
                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>

                                                                             <div class="row">

                                                                                  <div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Last Name</label>
    													 {!! Form::text('emp_lastname', null, array('placeholder' => 'Last Name','class' => 'form-control','data-parsley-error-message'=>"Last name is required",'data-parsley-required'=>"true")) !!}
                                                                                                <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Hire date</label>
    													  {!! Form::text('joined_date', null, array('placeholder' => 'Hire date','class' => 'form-control datepicker pull-right' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-error-message'=>"Hire Date name is required",'data-parsley-required'=>"true")) !!}
                                                                                          <div class="validation"></div>
    												</div>
    											</div>

    										</div>

                                                                                 <div class="row">

                                                                               <div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Marital Status</label>
    													{!! Form::select('emp_marital_status', $maritalstatus,null,array('class' => 'select2','style'=>"width: 100%;",'data-parsley-error-message'=>"Marital Status is required",'data-parsley-required'=>"true"))  !!}
                                                                                                <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Gender</label>
    													   {!! Form::select('emp_gender', $gender,null,array('class' => 'select2','style'=>"width: 100%;",'data-parsley-error-message'=>"Gender is required",'data-parsley-required'=>"true"))  !!}
                                                                                          <div class="validation"></div>
    												</div>
    											</div>

    										</div>

                                                                                 <div class="row">
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Birth Date</label>
    													 {!! Form::text('emp_birthday', null, array('placeholder' => 'Birth date','class' => 'form-control datepicker pull-right' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-error-message'=>"Birth Date is required",'data-parsley-required'=>"true")) !!}
                                                                                                <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">

                                                                                                    <div class="validation"></div>
    												</div>
    											</div>

    										</div>



								</div>
							</div>

						</div>
						</div>



                                  	<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span>  {{ $personaltitle }}  </h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Employee ID</label>
    													{!! Form::text('employee_id', null, array('placeholder' => 'Employee ID','class' => 'form-control','data-parsley-error-message'=>"Employee ID is required",'data-parsley-required'=>"true")) !!}
                                                                                <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Employee Email</label>
    													{!! Form::text('emp_work_email', null, array('placeholder' => 'Employee Email','class' => 'form-control','data-parsley-type'=>"email",'data-parsley-error-message'=>"Employee ID is required",'data-parsley-required'=>"true",'readonly'=>'true')) !!}
                                                                                     <div class="validation"></div>
    												</div>
    											</div>
    										</div>

                                                                              <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Job Title</label>
    													 {!! Form::select('job_title_code', $jobtitle,null,array('class' => 'select2','style'=>"width: 100%;",'data-parsley-error-message'=>"Job Title is required",'data-parsley-required'=>"true"))  !!}
                                                                                <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Work station</label>
                                                                                                          {!! Form::select('work_station', $location,null,array('class' => 'select2', 'style'=>"width: 100%;",'data-parsley-error-message'=>"Job Title is required",'data-parsley-required'=>"true"))  !!}

                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>








								</div>
							</div>

						</div>
						</div>



                                              	<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-phone-square"></span>  {{ $contacttitle }}  </h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Work Phone</label>
    													{!! Form::text('emp_work_telephone', null, array('placeholder' => 'Work Phone','class' => 'form-control','data-parsley-error-message'=>"Work Phone is required",'data-parsley-required'=>"true")) !!}
                                                                                <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Mobile Phone</label>
    													{!! Form::text('emp_mobile', null, array('placeholder' => 'Mobile Phone','class' => 'form-control','data-parsley-error-message'=>"Mobile Phone is required",'data-parsley-required'=>"true")) !!}


                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>

                                                                              <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Home Phone</label>
    													{!! Form::text('emp_hm_telephone', null, array('placeholder' => 'Home Phone','class' => 'form-control','data-parsley-error-message'=>"Mobile Phone is required",'data-parsley-required'=>"true")) !!}



                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">

    												</div>
    											</div>
    										</div>

                                                                       




								</div>
							</div>

						</div>
						</div>
                                              
                                              
                                              
                                              	<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-money"></span>  {{ $payrolltitle }}  </h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>KRA Pin</label>
    													{!! Form::text('krataxPin', null, array('placeholder' => 'KRA Tax Pin','class' => 'form-control','data-parsley-error-message'=>"KRA Tax Pin is required",'data-parsley-required'=>"true")) !!}
                                                                                <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>NHIF</label>
    													{!! Form::text('nhif', null, array('placeholder' => 'Nhif','class' => 'form-control','data-parsley-error-message'=>"Nhif is required",'data-parsley-required'=>"true")) !!}


                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>

                                                                              <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>NSSF </label>
    													{!! Form::text('nssf', null, array('placeholder' => 'Nssf','class' => 'form-control','data-parsley-error-message'=>"Nssf is required",'data-parsley-required'=>"true")) !!}



                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">

    												</div>
    											</div>
    										</div>

                             




								</div>
							</div>

						</div>
						</div>
                                              
                                              
                                              
                                              
                                              
                                               
                                              	<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-bank"></span>  {{ $banktitle }}  </h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Bank</label>
                                                                                                        
                                                                                                         {!! Form::select('bank', $bank,null,array('class' => 'select2','style'=>"width: 100%;",'data-parsley-error-message'=>"Bank is required",'data-parsley-required'=>"true"))  !!}
                                                                                                        
                                                                                                        
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Bank Branch</label>
    													{!! Form::text('bankbranch', null, array('placeholder' => 'Bank Branch','class' => 'form-control','data-parsley-error-message'=>"Bank Branch is required",'data-parsley-required'=>"true")) !!}


                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>

                                                                              <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Bank Account </label>
    													   {!! Form::text('bankaccount', null, array('placeholder' => 'Bank Account','class' => 'form-control','data-parsley-error-message'=>"Bank Account is required",'data-parsley-required'=>"true")) !!}

                                                                                                     

                                                                                                         <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">

    												</div>
    											</div>
    										</div>

                                                                            @permission('employee-edit')

                                                                                   <div class="form-group row col-sm-3">
    										                                                             <button type="submit"  class="btn btn-skin btn-block btn-lg ">
                                                                                     Save
                                                                                    </button>
                                                                                  </div>
                                                                          @endpermission




								</div>
							</div>

						</div>
						</div>





                              </div>

                                 {!! Form::close() !!}


                                @include('pim.empeducation.index')

                                @include('pim.empskill.index')

                                 @include('pim.emplanguages.index')

                                </div>


                              {{ Form::hidden('permission', '1', array('id' => 'permission')) }}

                              @endpermission
			</div>
		</div>
    </section>
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
