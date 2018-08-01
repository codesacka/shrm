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
                   <h2 class="panel-title heading-sm pull-left" style="font-weight:bold;color:#555;"><i class="fa fa-calendar"></i>{{ $title }}</h2>




                                                                                           <!-- /.box-header -->
                                                                                           <div class="box-body">
                                                                                             <table  class="table table-bordered table-striped">

                                                                                                 <thead>
                                                                                                           <tr>
                                                                                                             <th>Name</th><th>From Date</th><th>Date To</th>
                                                                                                               <th>Day</th>
                                                                                                               <th>Reasons</th>


                                                                                                           </tr>
                                                                                                           </thead>
                                                                                                           </thead>
                                                                                                           <tbody>

                                                                                                             @foreach ($events as $k=>$v)


                                                                                                                           <tr>
                                                                                                                             <td>{{ $v['title'] }}</td>
                                                                                                                                     
                                                                                                                               <td>{{ $v['start'] }}</td>
                                                                                                                               
                                                                                                                                <td>{{ $v['end'] }}</td>
                                                                                                                                
                                                                                                                                <td>{{ $v['allDay'] ?  'Full Day'  : 'Half Day' }}</td>
                                                                                                                                
                                                                                                                                <td>{{ $v['reasons'] }}</td>
                                                                                                                                

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
