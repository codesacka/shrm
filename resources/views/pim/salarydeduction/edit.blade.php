
@extends('template.dashboard.layouts')

@section('content')


    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('salarydeduction-edit')
                           	<div class="row">



                              <div class="col-md-12">

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


        {!! Form::model($row, ['method' => 'PATCH','data-parsley-validate','route' => ['SalaryDeduction.update', $row->id]]) !!}


            <div class="row">

						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil"></span> {{ $title}} </h3>
									</div>
									<div class="panel-body">

                                                                          <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Name : </label>

                               {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','data-parsley-error-message'=>"Name is required",'data-parsley-required'=>"true")) !!}

                            <div class="validation" > </div>
    												</div>

                            <div class="form-group">
                             <label>Employee :</label>
                          {!! Form::select('employee_id', $employee,null,array('class' => 'select2 form-control','style'=>"width: 100%;",'data-parsley-error-message'=>"Employee  is required",'required'))  !!}
                           </div>


                            <div class="form-group">
                             <label>Deduction :</label>
                          {!! Form::select('deduction', $deduction,null,array('class' => ' form-control','style'=>"width: 100%;",'data-parsley-error-message'=>"Deduction  is required",'required'))  !!}
                           </div>

                            <div class="form-group">
    													<label>Pay From : </label>

                              {!! Form::text('payfrom', null, array('placeholder' => 'Pay From','class' => 'form-control datepicker' ,'data-parsley-error-message'=>"Pay Date From is required",'required', 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}

                              <div class="validation" > </div>
    												</div>

                            <div class="form-group">
                              <label>Pay To : </label>
                              {!! Form::text('payto', null, array('placeholder' => 'Pay to','class' => 'form-control datepicker' ,'data-parsley-error-message'=>"Pay Date To is required",'required', 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}

                              <div class="validation" > </div>
                            </div>

                            <div class="form-group">
                               <label>Monthly Deduction Amount :</label>
                               {!! Form::text('amount', null, array('placeholder' => 'Amount','class' => 'form-control ','data-parsley-type'=>"integer",'required','data-parsley-error-message'=>"Amount  is required and numeric")) !!}

                             </div>

    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">

                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>









                      <div class="form-group row col-sm-3">
                        <br/>
    										      <button type="submit"  class="btn btn-skin btn-block btn-lg ">
                                                                                     Save
                                                                                    </button>
                                                                                  </div>



								</div>
							</div>






						</div>
						</div>
				              </div>

                                {!! Form::close() !!}


                              </div>



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
