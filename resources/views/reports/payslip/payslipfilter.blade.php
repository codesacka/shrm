@extends('template.dashboard.layouts')

@section('content')



    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                                      @permission('payslip-filter-report')
				<div class="row">




                                    <div class="col-md-12">




                                <div class="row">
                                 <div class="col-md-12">

                                 <div class="callaction bg-gray">

                                   <div class="panel-heading overflow-h">
                   <h2 class="panel-title heading-sm pull-left" style="font-weight:bold;color:#555;"><i class="fa fa-pie-chart"></i>Select Payslip Period  and Employee</h2>

                                                                                  <!-- /.box-header -->
                    <div class="box-body">
                                                                                            
                        <div class="row">
                            
                                  {!! Form::open(array('route' => 'Payslip.IndividualReport','method'=>'GET','data-parsley-validate')) !!}
                            
                            <div class="col-sm-12">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                
                       <div class="form-group">
                        <label>Date From :</label>
                           {!! Form::text('datefrom', null, array('placeholder' => 'Date From','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-error-message'=>"Date From is required",'data-parsley-required'=>'required','readonly'=>'true')) !!}
                         </div>
                 
                                
                        <div class="form-group">
                            <label>Date  To:</label>
                            {!! Form::text('dateto', null, array('placeholder' => 'Date To','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-error-message'=>"Date To is required",'data-parsley-required'=>'required','readonly'=>'true')) !!}
                          </div>
                 
    				 <div class="form-group">
    				<label>Employee :</label>
                           {!! Form::select('employee', $employee,null,array('class' => 'form-control select2','data-parsley-error-message'=>"Employee is required",'data-parsley-required'=>'required'))  !!}
                
                                   <div class="validation"></div>
    				</div>
                                
                                
                                    <div class="box-footer">

                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Display Reports</button>
                                                                                             </div>
                                                                                            </div>
                                                                                  </div>
                                
                                
    	                      </div>
                            
                            </div>
                                  
                               {!! Form::close() !!} 
                            
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
