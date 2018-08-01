@extends('template.dashboard.layouts')

@section('content')


    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('processPayroll-decision')
                           	<div class="row">




                              <div class="col-md-12">




                                         <div class="row">




                                             <div class="container">
                                                                <div class="row">
                                                                        <div class="col-sm-4 col-md-4">
                                                                                <div class="wow fadeInUp" data-wow-delay="0.2s">
                                                                                        <div class="box text-center">

                                                                                                <i class="fa fa-balance-scale fa-3x circled bg-skin"></i>
                                                                                                <h4 class="h-bold">Process Payroll</h4>
                                                                                                <p>
                                                                                                Payroll automatically adds new hires and their selected benefits, calculates their deductions, and prorates their first paycheck
                                                                                                </p>

                                                                                        </div>
                                                                                      <p class="text-center wow bounceIn" data-wow-delay="0.4s">
                                                                                            <a href="{{ route('ProcessPayroll.index') }}" class="btn btn-skin btn-lg">Process Payroll <i class="fa fa-angle-right"></i></a>
                                                                                            </p>

                                                                                </div>
                                                                        </div>
                                                                        <div class="col-sm-4 col-md-4">
                                                                                <div class="wow fadeInUp" data-wow-delay="0.2s">
                                                                                        <div class="box text-center">

                                                                                                <i class="fa fa-university  fa-3x circled bg-skin"></i>
                                                                                                <h4 class="h-bold">Benefits Plan</h4>
                                                                                                <p>
                                                                                                Make managing employee health benefits simple. Whether your company already provides insurance/you’re looking to get it for the first time.
                                                                                                </p>
                                                                                        </div>

                                                                                         <p class="text-center wow bounceIn" data-wow-delay="0.4s">
                                                                                            <a href="{{ route('SalaryBenefit.index') }}" class="btn btn-skin btn-lg">Set Benefits Plan <i class="fa fa-angle-right"></i></a>
                                                                                            </p>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-sm-4 col-md-4">
                                                                                <div class="wow fadeInUp" data-wow-delay="0.2s">
                                                                                        <div class="box text-center">
                                                                                                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                                                                                                <h4 class="h-bold">Deductions Settings</h4>
                                                                                                <p>
                                                                                                Syncs deductions to your payroll provider via deduction.These  ensure that your employees are correctly deducted and taxed each paycheck.
                                                                                                </p>
                                                                                        </div>

                                                                                      <p class="text-center wow bounceIn" data-wow-delay="0.4s">
                                                                                            <a href="{{ route('SalaryDeduction.index') }}" class="btn btn-skin btn-lg">Set Up Deductions  <i class="fa fa-angle-right"></i></a>
                                                                                            </p>
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
