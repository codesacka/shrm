@extends('template.dashboard.layouts')

@section('content')
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="{{ URL::asset('assets/plugins/d3/Donut3D.js') }}"></script>
<style>

path.slice{
	stroke-width:2px;
}
polyline{
	opacity: .3;
	stroke: black;
	stroke-width: 2px;
	fill: none;
}


</style>
    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('empsalary-view')





                                      <div class="col-md-3 profile" style='font-size: 15px;'>

					  @include('template.dashboard.partials.profimage')
                                      </div>


                              <div class="col-md-9">

                                  <div class='row'>




                                      @include('template.dashboard.menu.employeemenu')




                                  </div>



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

                                   <div class="form-wrapper">


						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-briefcase"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                         <div id="errormessage"></div>







                                                                        <div class="panel-body">
                                                                        <div class="box-header">
                                                                          <h3 class="box-title">Compensation  Status</h3>
                                                                        </div>
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                          <table  class="table table-bordered table-striped">
                                                                            <thead>
                                                                                       <thead>
                                                                                        <tr>
                                                                                          <th>Job title</th>
                                                                                          <th>Salary Type</th>
                                                                                          <th>Rates</th>
                                                                                          <th>Amount</th>
                                                                                          <th>Status</th>

                                                                                        </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                                    @foreach($cempsal_row as $row)
                                                                                                        <tr>
                                                                                                          <td>{{ $row->job_titlesname }}</td>
                                                                                                          <td>{{ $row->salarytypes }}
                                                                                                          </td>
                                                                                                          <td>{{ $row->payrates }}</td>
                                                                                                          <td>  {{ $row->amount }}</td>
                                                                                                          <td>   @if($row->active == 1)

                                                                                                             <span class="label label-success">Active </span>

                                                                                                           @else

                                                                                                             <span class="label label-danger">InActive </span>
                                                                                                           @endif
                                                                                                        </tr>

                                                                                                        @endforeach


                                                                                      </tbody>
                                                                                      <tfoot>
                                                                                      <tr>

                                                                                         <th>&nbsp;</th>
                                                                                          <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                         <th>&nbsp;</th>
                                                                                          <th>&nbsp;</th>

                                                                                      </tr>
                                                                                      </tfoot>
                                                                                    </table>
                                                                                  </div>
                                                                                  <!-- /.box-body -->
                                                                                </div>
                                                                                <!-- /.box -->






                                                                          <div class="panel-body">

                                                                        <div class="box-header">
                                                                            <h3 class="box-title">Salary History Information

                                                                                @permission('empsalary-add')
                                                                                <a class="btn btn-success" onclick="javascript:addsalarydetails({!! $id !!})"> <i class="fa fa-plus"></i></a>

                                                                                @endpermission
                                                                            </h3>
                                                                        </div>


                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                          <table  class="table table-bordered table-striped">

                                                                              <thead>
                                                                                        <tr>
                                                                                          <th>Job title</th>
                                                                                          <th>Salary Type</th>
                                                                                          <th>Rates</th>
                                                                                          <th>Amount</th>
                                                                                          <th>Status</th>

                                                                                        </tr>
                                                                                        </thead>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                       @foreach($empsal_row as $row)
                                                                                                        <tr>
                                                                                                          <td>{{ $row->job_titlesname }}</td>
                                                                                                          <td>{{ $row->salarytypes }}
                                                                                                          </td>
                                                                                                          <td>{{ $row->payrates }}</td>
                                                                                                          <td>  {{ $row->amount }}</td>
                                                                                                          <td>   @if($row->active == 1)

                                                                                                             <span class="label label-success">Active </span>

                                                                                                           @else

                                                                                                             <span class="label label-danger">InActive </span>
                                                                                                           @endif
                                                                                                        </tr>

                                                                                                        @endforeach

                                                                                      </tbody>
                                                                                      <tfoot>
                                                                                      <tr>

                                                                                         <th>&nbsp;</th>
                                                                                          <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                      </tr>
                                                                                      </tfoot>
                                                                                    </table>
                                                                                  </div>
                                                                                  <!-- /.box-body -->
                                                                                </div>
                                                                                <!-- /.box -->





                                                                                <div class="panel-body">

                                                                              <div class="box-header">
                                                                                  <h3 class="box-title"> Active Deductions Information


                                                                                  </h3>
                                                                              </div>


                                                                              <!-- /.box-header -->
                                                                              <div class="box-body">
                                                                                <table  class="table table-bordered table-striped">
                                                                                  <thead>
                                                                                            <tr>
                                                                                                 <th>Deduction</th>
                                                                                                   <th>Period</th>
                                                                                                 <th>Amount</th>


                                                                                         </tr>
                                                                                             </thead>
                                                                                             <tbody>
                                                                                                    @foreach ($empded_row as  $obj)
                                                                                                         <tr>
                                                                                                           <td>
                                                                                                               {{ $obj->name }} ( {{ $obj->deductionname }} )
                                                                                                           </td>


                                                                                                           <td>
                                                                                                               {{ $obj->payfrom }}  to    {{ $obj->payto }}
                                                                                                           </td>

                                                                                                           <td>
                                                                                                               {{ $obj->amount }}
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
                                                                                        <!-- /.box-body -->
                                                                                      </div>
                                                                                      <!-- /.box -->




                                                                                      <div class="panel-body">

                                                                                    <div class="box-header">
                                                                                        <h3 class="box-title"> Active Benefits Information


                                                                                        </h3>
                                                                                    </div>


                                                                                    <!-- /.box-header -->
                                                                                    <div class="box-body">
                                                                                      <table  class="table table-bordered table-striped">
                                                                                        <thead>
                                                                                                  <tr>
                                                                                                       <th>Benefit</th>
                                                                                                         <th>Period</th>
                                                                                                       <th>Amount</th>
                                                                                                     <th>Relief</th>
                                                                                                        <th>Paid By</th>

                                                                                               </tr>
                                                                                                   </thead>
                                                                                                   <tbody>
                                                                                                          @foreach ($empben_row as  $obj)
                                                                                                               <tr>
                                                                                                                 <td>
                                                                                                                     {{ $obj->planname }} ( {{ $obj->benefitname }} )
                                                                                                                 </td>


                                                                                                                 <td>
                                                                                                                     {{ $obj->planstart }}  to    {{ $obj->planend }}
                                                                                                                 </td>

                                                                                                                 <td>
                                                                                                                     {{ $obj->amount }}
                                                                                                                 </td>
                                                                                                                 <td>
                                                                                                                     {{ $obj->taxrelief }}
                                                                                                                 </td>
                                                                                                                 <td>
                                                                                                                      @if($obj->deductemployee)

                                                                                                                      Paid by Employee

                                                                                                                      @else
                                                                                                                          Paid by Employer
                                                                                                                      @endif
                                                                                                                 </td>
                                                                                                                    </tr>

                                                                                                                    @endforeach

                                                                                                  </tbody>
                                                                                                  <tfoot>
                                                                                                  <tr>

                                                                                                     <th>&nbsp;</th>
                                                                                                      <th>&nbsp;</th>
                                                                                                    <th>&nbsp;</th>
                                                                                                    <th>&nbsp;</th>

                                                                                                    <th>&nbsp;</th>

                                                                                                  </tr>
                                                                                                  </tfoot>
                                                                                                </table>
                                                                                              </div>



                                                                                          <div id="chart">

                                                                                          </div>






                                                                                              <!-- /.box-body -->
                                                                                            </div>
                                                                                            <!-- /.box -->



















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

    var salesData=[
    	{label:"Basic", color:"#3366CC"},
    	{label:"Plus", color:"#DC3912"},
    	{label:"Lite", color:"#FF9900"},
    	{label:"Elite", color:"#109618"},
    	{label:"Delux", color:"#990099"}
    ];

    var svg = d3.select("#chart").append("svg").attr("width",700).attr("height",300);

    svg.append("g").attr("id","salesDonut");
    //svg.append("g").attr("id","quotesDonut");

    Donut3D.draw("salesDonut", randomData(), 150, 150, 130, 100, 30, 0.4);
    //Donut3D.draw("quotesDonut", randomData(), 450, 150, 130, 100, 30, 0);

    function changeData(){
    	Donut3D.transition("salesDonut", randomData(), 130, 100, 30, 0.4);
    	//Donut3D.transition("quotesDonut", randomData(), 130, 100, 30, 0);
    }

    function randomData(){
    	return salesData.map(function(d){
    		return {label:d.label, value:1000*Math.random(), color:d.color};});
    }



                                                function addsalarydetails(id){



                                                          var APP_URL = {!! json_encode(url('/')) !!}

                                                           $.get( APP_URL+'/'+"SalaryDetails/"+id+"/create", function( data ) {


                                                                $.blockUI({ message: data, css: {   border: 'none',
                                                                       top: '20%',

                                                                       '-webkit-border-radius': '10px',
                                                                       '-moz-border-radius': '10px',

                                                                       color: '#fff'  } });

                                                           });



                                               }

                                                function editempslanguages(id){





                                                          var APP_URL = {!! json_encode(url('/')) !!}

                                                           $.get( APP_URL+'/'+"EmpLanguage/"+id+"/edit", function( data ) {


                                                                $.blockUI({ message: data, css: {   border: 'none',
                                                                       top: '20%',

                                                                       '-webkit-border-radius': '10px',
                                                                       '-moz-border-radius': '10px',

                                                                       color: '#fff'  } });

                                                           });



                                               }

                              </script>



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
