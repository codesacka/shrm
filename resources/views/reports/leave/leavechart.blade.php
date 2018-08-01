@extends('template.dashboard.layouts')

@section('content')

<link href="{{ URL::asset('assets/fullcalendar/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ URL::asset('assets/fullcalendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
<script src="{{ URL::asset('assets/fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/fullcalendar/lib/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/fullcalendar/fullcalendar.min.js') }}"></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'listDay,listWeek,month'
			},

			// customize the button names,
			// otherwise they'd all just say "list"
			views: {
				listDay: { buttonText: 'list day' },
				listWeek: { buttonText: 'list week' }
			},

			defaultView: 'listWeek',
			defaultDate: '2017-09-12',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {!! $events !!}
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>

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
                   <h2 class="panel-title heading-sm pull-left" style="font-weight:bold;color:#555;"><i class="fa fa-calendar"></i> Leave Reports</h2>

                          <br/>


                                                                                           <!-- /.box-header -->
                                                                                           <div class="box-body">
                                                                                           
                                                                                               
                                                                                               <div id='calendar'></div>
                                                                                               
                                                                                               
                                                                                               
                                                                                                   
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



