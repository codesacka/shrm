@extends('template.dashboard.layouts')

@section('content')
<link href="{{ URL::asset('assets/css/wizard.css') }}" rel="stylesheet">

    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('salarybenefit-plan-edit')
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

                                                                                                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                                                                                  {!! Form::model($row, ['method' => 'PATCH','route' => ['SalaryBenefit.update', $row->id]]) !!}



                                                                                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->



                                                                                                                                <div class="wizard-navigation">
                                                                                                                                        <ul>
                                                                                                                    <li><a href="#about" data-toggle="tab">Plan Details</a></li>
                                                                                                                    <li><a href="#account" data-toggle="tab">Plan Coverages</a></li>
                                                                                                                    <li><a href="#address" data-toggle="tab">Plan Costs</a></li>
                                                                                                                </ul>

                                                                                                                                </div>

                                                                                                        <div class="tab-content">
                                                                                                            <div class="tab-pane" id="about">
                                                                                                              <div class="row">
                                                                                                                  <h4 class="info-text" style="font-size:14px;"> Benefits can sometimes be confusing to employees, but we're here to make them easier. Let's get started by getting to know a little bit about your Plan.</h4>

                                                                                                                  <div class="col-sm-6">
                                                                                                                      <div class="form-group">
                                                                                                                        <label>Plan Name <small>(required)</small></label>
                                                                                                                         {!! Form::text('planname', null, array('placeholder' => 'Plan Name','class' => 'form-control','required'=>'true')) !!}

                                                                                                                      </div>
                                                                                                                      <div class="form-group">
                                                                                                                        <label>Plan Start<small>(required)</small></label>
                                                                                                                        {!! Form::text('planstart', null, array('placeholder' => 'Plan Start','readonly'=>"true",'class' => 'form-control datepicker','required'=>'true','data-date-format'=>'yyyy-mm-dd')) !!}


                                                                                                                      </div>

                                                                                                                        <div class="form-group">
                                                                                                                        <label>Plan End<small>(required)</small></label>

                                                                                                                         {!! Form::text('planend', null, array('placeholder' => 'Plan End','readonly'=>"true",'class' => 'form-control datepicker','required'=>'true','data-date-format'=>'yyyy-mm-dd')) !!}

                                                                                                                      </div>

                                                                                                                      <div class="form-group">
                                                                                                                        <label>Desc<small>(required)</small></label>
                                                                                                                        {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px','required'=>'true')) !!}


                                                                                                                      </div>
                                                                                                                  </div>

                                                                                                              </div>
                                                                                                            </div>
                                                                                                            <div class="tab-pane" id="account">
                                                                                                                <h4 class="info-text" style="font-size:14px;"> What coverage options are available on this plan? Select all that apply </h4>
                                                                                                                <div class="row">

                                                                                                                    <div class="col-sm-10">


                                                                                                                            @foreach($plancoverage as $obj)
                                                                                                                              <div class="checkbox">
                                                                                                                                <label>
                                                                                                                                     {{ Form::checkbox('plancoverage[]', $obj->id,in_array($obj->id, $benefits_plan_coverages) ? true : false, array('class' => 'name','required'=>'true')) }}
                                                                                                                                     {{ $obj->name }}</label>
                                                                                                                              </div>
                                                                                                                            @endforeach

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
                                                                                                                            <label>Monthly Amount Contribution </label>

                                                                                                                              {!! Form::text('amount', null, array('placeholder' => 'Amount','class' => 'form-control','required'=>'true')) !!}

                                                                                                                          </div>

                                                                                                                         <div class="form-group">
                                                                                                                            <label>Tax Relief </label>

                                                                                                                             {!! Form::text('taxrelief', null, array('placeholder' => 'Tax Relief','class' => 'form-control','required'=>'true')) !!}

                                                                                                                          </div>

                                                                                                                        <div class="checkbox">
                                                                                                                            <label>{!! Form::checkbox('deductemployee', '1',$row->deductemployee ? true : false) !!}  Deduct from  Employee</label>
                                                                                                                          </div>
                                                                                                                      </div>



                                                                                                                </div>


                                                                                                                  <div class="row">

                                                                                                                      <div class="col-md-10">

                                                                                                                                   <table class="table table-bordered">
                                                                                                                           <thead>
                                                                                                                                      <tr>
                                                                                                                                          <th></th>
                                                                                                                                              <th>Employee Name</th>


                                                                                                                                              <th>Employee ID</th>


                                                                                                                                      </tr>
                                                                                                                                      </thead>
                                                                                                                                      <tbody>
                                                                                                                                        @foreach ($employee as  $obj)

                                                                                                                                        <tr>
                                                                                                                                          <td>    {{ Form::checkbox('employee[]', $obj->id, in_array($obj->id, $employee_group) ? true : false, array('class' => 'employeeid','required'=>'true' )) }}</td>
                                                                                                                                          <td>
                                                                                                                                            {{ $obj->emp_firstname }}   {{ $obj->emp_middle_name }}    {{ $obj->emp_lastname }}
                                                                                                                                          </td>

                                                                                                                                          <td>
                                                                                                                                              {{ $obj->employee_id }}</a>
                                                                                                                                          </td>
                                                                                                                                        </tr>

                                                                                                                                        @endforeach
                                                                                                                                      </tbody>
                                                                                                                                      <tfoot>
                                                                                                                                      <tr>
                                                                                                                                         <th>&nbsp;</th>
                                                                                                                                         <th>&nbsp;</th>
                                                                                                                                         <th>&nbsp;</th>
                                                                                                                                        </tr>
                                                                                                                                      </tfoot>
                                                                                                                                    </table>


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
