
@extends('template.dashboard.layouts')

@section('content')


    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('assign-leave-view')





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
									<h3 class="panel-title"><span class="fa fa-ambulance"></span> {{ $titledays }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                         <div id="errormessage"></div>




                                                     <div class="row">

                                                    <div class="col-sm-12 col-md-12">



                                                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                                                
                                                                
                                                                     <table  class="table table-bordered table-striped ">
                                                                             <thead>
                                                                                        <tr>
                                                                                                <th>Leave Type</th>

                                                                                                <th>Leave Days</th>
                                                                                                

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                 Annual Leave
                                                                                                </td>

                                                                                                <td class="cell-detail">
                                                                                                    {{ $annualamount }} 
                                                                                                </td>
                                                                                                
                                                                                            </tr>
                                                                                            
                                                                                             <tr>
                                                                                                <td>
                                                                                                 Maternity Leave
                                                                                                </td>

                                                                                                <td class="cell-detail">
                                                                                                    {{ $maternityamount }} 
                                                                                                </td>
                                                                                               
                                                                                            </tr>
                                                                                            
                                                                                            
                                                                                             <tr>
                                                                                                <td>
                                                                                                 Sick Leave
                                                                                                </td>

                                                                                                <td class="cell-detail">
                                                                                                    {{ $sickamount }} 
                                                                                                </td>
                                                                                                
                                                                                            </tr>
                                                                                            
                                                                                        </tbody>
                                                                                        
                                                                                     </tbody>
                                                                            <tfoot>
                                                                            <tr>
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

						</div>
                                       
                                       
                                       
                                       
                                       

						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-ambulance"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                         <div id="errormessage"></div>


                                                       @if(Auth::user()->hasRole('employee'))
    					                                         @permission('assign-leave-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  <a class="btn btn-success" onclick="javascript:addLeaveRequest({!! $employee->id !!})"> <i class="fa fa-plus"></i>Request Leave</a>

                                                                                   </div>
                                                                                    </div>
    										                                     @endpermission
                                                      @endif

                                                                                <br>   <br>


                                                     <div class="row">

                                                    <div class="col-sm-12 col-md-12">



                                                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                                                
                                                                
                                                                
                                                                <table  class="table table-bordered table-striped datatable">
                                                                    <thead>
                                                                                        <tr>
                                                                                                <th>Employee</th>

                                                                                                <th>Leave type</th>
                                                                                                <th>Datefrom</th>
                                                                                                 <th>Dateto</th>
                                                                                                 <th>Status</th>

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                                @foreach ($assignleave as  $obj)
                                                                                              <tr>
                                                                                                <td>
                                                                                                 {{ $obj->emp_firstname }}   {{ $obj->emp_middle_name }}  {{ $obj->emp_lastname }}
                                                                                                </td>

                                                                                                <td>
                                                                                                    {{ $obj->leavetype_name }}
                                                                                                </td>
                                                                                                <td>{{ $obj->fromdate }}</td>
                                                                                                 <td>{{ $obj->todate }}</td>
                                                                                                 <td>
                                                                                                     
                                                                                                     @if($obj->status ==0)
                                                                                                     
                                                                                                     <span class="label label-warning">Pending</span>
                                                                                                 
                                                                                                     @elseif($obj->status ==1)
                                                                                                     
                                                                                                           <span class="label label-success">Approved</span>
                                                                                                           
                                                                                                           
                                                                                                    @elseif($obj->status ==2)
                                                                                                    
                                                                                                          <span class="label label-danger">Denied</span>
                                                                                                    
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











                                                              </div>


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





         function addLeaveRequest( id ){



               var APP_URL = {!! json_encode(url('/')) !!}

                $.get( APP_URL+"/AssignLeave/"+id+"/leaverequestcreate", function( data ) {


                     $.blockUI({ message: data, css: {  top: '20%', width: '700px;' } });

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
