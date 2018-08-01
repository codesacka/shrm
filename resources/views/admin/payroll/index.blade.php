@extends('template.dashboard.layouts')

@section('content')
<link href="{{ URL::asset('assets/css/wizard.css') }}" rel="stylesheet">

    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('salaryupload-add')
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
                                                                                                  {!! Form::open(array('route' => 'ProcessPayroll.store','method'=>'POST')) !!}



                                                                                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->



                                                                                                                                <div class="wizard-navigation">
                                                                                                                                        <ul>
                                                                                                                    <li><a href="#about" data-toggle="tab">Select Salary Processor </a></li>
                                                                                                                    <li><a href="#account" data-toggle="tab">Employees</a></li>
                                                                                                                    <li><a href="#address" data-toggle="tab">Details</a></li>
                                                                                                                </ul>

                                                                                                                                </div>

                                                                                                        <div class="tab-content">
                                                                                                            <div class="tab-pane" id="about">
                                                                                                              <div class="row">
                                                                                                                  <h4 class="info-text" style="font-size:14px;"> Select How you Want to process payroll <stong style="color:red">Process Salary for Specific Employee Only Once per month ,before end of the month</strong></h4>
                                                                                                                       <div class="col-sm-6 col-sm-offset-1">


                                                                                                                            <div class="form-group">

                                                                                                                              <div class="radio">
                                                                                                                                 <label><input type="radio" name="processor" value="1"> Allow SpiceHR  to process Payroll(Involves Depositing Money with Spicehrm which is transferable to employees)</label>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                            <div class="form-group">
                                                                                                                              <div class="radio">
                                                                                                                                 <label><input type="radio" name="processor" value="2" checked>Self Process Payroll</label>
                                                                                                                                </div>

                                                                                                                            </div>





                                                                                                                      </div>



                                                                                                              </div>
                                                                                                            </div>
                                                                                                            <div class="tab-pane" id="account">
                                                                                                                <h4 class="info-text" style="font-size:14px;">Select Employees To Pay  </h4>
                                                                                                                <div class="row">
                                                                                                                   <div class="col-sm-6 col-sm-offset-1">
                                                                                                                  <table class="table table-bordered">
                                                                                                                        <thead>
                                                                                                                     <tr>
                                                                                                                         <th> <input type="checkbox" id="select_all"/> Selecct All</th>
                                                                                                                             <th>Employee Name</th>


                                                                                                                             <th>Employee ID</th>


                                                                                                                     </tr>
                                                                                                                     </thead>
                                                                                                                     <tbody>
                                                                                                                       @foreach ($employee as  $obj)

                                                                                                                       <tr>
                                                                                                                         <td>    {{ Form::checkbox('employee[]', $obj->id, false, array('class' => 'employeeid','required'=>'true' )) }}</td>
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
                                                                                                            <div class="tab-pane" id="address">



                                                                                                                  <div class="row">

                                                                                                                      <div class="col-md-10">
                                                                                                                        <div class="form-group">
                                                                                                                        <label for="comment">Payment Notes(If Processed by SpiceHrm include Accounts and any relevant details):</label>
                                                                                                                        <textarea class="form-control" rows="5" id="comment" name="description" required="true"></textarea>
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
$(document).ready(function(){
  //select all checkboxes
  $("#select_all").change(function(){  //"select all" change
      var status = this.checked; // "select all" checked status
      $('.employeeid').each(function(){ //iterate all listed checkbox items
          this.checked = status; //change ".checkbox" checked status
      });
  });

  $('.employeeid').change(function(){ //".checkbox" change
      //uncheck "select all", if one of the listed checkbox item is unchecked
      if(this.checked == false){ //if this item is unchecked
          $("#select_all")[0].checked = false; //change "select all" checked status to false
      }

      //check "select all" if all checkbox items are checked
      if ($('.employeeid:checked').length == $('.employeeid').length ){
          $("#select_all")[0].checked = true; //change "select all" checked status to true
      }
  });
})

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
