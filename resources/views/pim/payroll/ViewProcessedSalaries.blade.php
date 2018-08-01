@extends('template.dashboard.layouts')

@section('content')



    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                                      @permission('report-dashboard')
				<div class="row">




                                    <div class="col-md-12">




                                <div class="row">
                                 <div class="col-md-12">

                                 <div class="callaction bg-gray">

                                   <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left" style="font-weight:bold;color:#555"><i class="fa fa-pie-chart"></i>Employee Payslips Reports</h2>
                                    
                                    
                                    




                                                                                           <!-- /.box-header -->
                                                                                           <div class="box-body">
                                                                                             <table  class="table table-bordered table-striped">

                                                                                               <thead>
                                                                                            <tr>
                                                                                                    <th>First Name</th>
                                                                                                    <th>Middle Name</th>
                                                                                                    <th>Last Name</th>
                                                                                                    <th>Employee ID</th>
                                                                                                     <th>Gross Pay</th>
                                                                                                    <th></th>

                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>


                                                                                            @foreach ($emp_data as  $obj)
                                                                                                  <tr>
                                                                                                    <td>
                                                                                                      {{ $obj->emp_firstname }} </a>
                                                                                                    </td>

                                                                                                    <td>
                                                                                                      {{ $obj->emp_middle_name }} 
                                                                                                    </td>

                                                                                                    <td>
                                                                                                        {{ $obj->emp_lastname }}
                                                                                                    </td>

                                                                                                    <td>
                                                                                                        {{ $obj->employee_id }}
                                                                                                    </td>
                                                                                                     <td>
                                                                                                        {{ $obj->salaryamount }}
                                                                                                    </td>
                                                                                                    <td> 

                                                                                                        <a href="{!! route('ProcessPayroll.PrintPayslip',$obj->salaryid) !!}"   target="_blank"> <i class="fa fa-print"> Print Pay Slip</i></a>
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
                                                                                              <th>&nbsp;</th>
                                                                                            </tr>
                                                                                            </tfoot>

                                                                                                         
                                                                                                         
                                                                                                         
                                                                                                         
                                                                                                       </table>
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



    function fetchfiles( id){


           var APP_URL = {!! json_encode(url('/')) !!}

         $.get( APP_URL+'/Documents/'+id+'/getFiles', function( data ) {


                $('#filetableholder').html(data);

           });

    }


                                      function addfolder(){





                                                                var APP_URL = {!! json_encode(url('/')) !!}

                                                                 $.get( APP_URL+'/Documents/Categorycreate', function( data ) {



                                                                      $.blockUI({ message: data, css: {
                                                                             border: 'none',
                                                                             top: '20%',

                                                                             '-webkit-border-radius': '10px',
                                                                             '-moz-border-radius': '10px',

                                                                             color: '#fff'
                                                                         } });

                                                                      // instanciate new modal


                                                                 });



                                                     }

                                  function adddocumentfile(){





                                                                var APP_URL = {!! json_encode(url('/')) !!}

                                                                 $.get( APP_URL+'/Documents/create', function( data ) {



                                                                      $.blockUI({ message: data, css: {
                                                                             border: 'none',
                                                                             top: '20%',

                                                                             '-webkit-border-radius': '10px',
                                                                             '-moz-border-radius': '10px',

                                                                             color: '#fff'
                                                                         } });

                                                                      // instanciate new modal


                                                                 });



                                                     }
  </script>

 @endsection
