
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
									<h3 class="panel-title"><span class="fa fa-sitemap"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                                                         <div id="errormessage"></div>
                                                                            
                                                                              @if(count($empreportingto_row) > 0)
                                                 
    					                                         @permission('reporting-to-edit')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  <a class="btn btn-success" onclick="javascript:editReportingto({!! $id !!})"> <i class="fa fa-plus"></i>Edit Report To</a>

                                                                                   </div>
                                                                                    </div>
    									          @endpermission
                                                                                  
                                                                                  
                                                                                  
                                                                                
                                                                               @else
                                                                               
                                                                               
                                                                                @permission('reporting-to-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  <a class="btn btn-success" onclick="javascript:addReportingto({!! $id !!})"> <i class="fa fa-plus"></i>Update Report To</a>

                                                                                   </div>
                                                                                    </div>
    									          @endpermission
                                                                               
                                                                               
                                                                               @endif
                                                                                
                                                  

                                                                                <br>   <br>


                                                     <div class="row">

                                                    <div class="col-sm-6 col-md-6">



                                                            <div class="wow fadeInRight" data-wow-delay="0.1s">

                                                            </div>




                                                          <div class="panel-body">

                                                                              <div class="box-header">
                                                                                  <h3 class="box-title"> Reporting To  Information


                                                                                  </h3>
                                                                              </div>


                                                                              <!-- /.box-header -->
                                                                              <div class="box-body">
                                                                                <table  class="table table-bordered table-striped">
                                                                                  <thead>
                                                                                            <tr>
                                                                                                 <th>Reporting To </th>
                                                                                                 


                                                                                         </tr>
                                                                                             </thead>
                                                                                             <tbody>
                                                                                                    @foreach ($empreportingto_row as  $obj)
                                                                                                         <tr>
                                                                                                           <td>
                                                                                                               {{ $obj->emp_firstname }}   {{ $obj->emp_middle_name }}   {{ $obj->emp_lastname }} 
                                                                                                           </td>


                                                                                                              </tr>

                                                                                                              @endforeach

                                                                                            </tbody>
                                                                                            <tfoot>
                                                                                            <tr>

                                                                                               <th>&nbsp;</th>
                                                                                               

                                                                                            </tr>
                                                                                            </tfoot>
                                                                                          </table>
                                                                                        </div>
                                                                                        <!-- /.box-body -->
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
        
        
         @if(count($empreportingto_row) > 0)
        
         
          
            <div id="editreporttodiv" style="display:none;">
                
                
            
             {!! Form::model($empreport, ['method' => 'PATCH','route' => ['EmployeeReportingTo.update', $id]]) !!}  
                 
          <div class="form-wrapper">
						<div>

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-plus"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-10 col-sm-10 col-md-10">
                                                                                            <div class="form-group ">
                                                                                              <label>Report To :</label>

                                                                                                 {!! Form::select('reportto', $reportto,null,array('class' => 'select2 form-control','style'=>'width:100%','data-parsley-required'=>"true",'data-parsley-error-message'=>"Report To  is required",))  !!}


                                                                                           </div>

                         
    											</div>
    										</div>








    										     <div class="box-footer">

                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Save</button>
                                                                                                 {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                                                                                                  <span type=button" class="btn btn-space btn-danger" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                                                                                              </div>
                                                                                            </div>
                                                                                  </div>
								</div>
							</div>

						</div>
						</div>

     {!! Form::close() !!}
            
            
            
        </div>
         
         
         
         
         
         @else
        
        <div id="addreporttodiv" style="display:none;">
            
            
                   {!! Form::open(array('route' => 'EmployeeReportingTo.store','method'=>'POST','data-parsley-validate')) !!}
          <div class="form-wrapper">
						<div>

							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-plus"></span> {{ $title }}</h3>
									</div>
									<div class="panel-body">
									    <div id="sendmessage"></div>
                                        <div id="errormessage"></div>


    										<div class="row">
    											<div class="col-xs-10 col-sm-10 col-md-10">
                            <div class="form-group ">
                              <label>Report To :</label>

                                 {!! Form::select('reportto', $reportto,null,array('class' => 'select2 form-control','style'=>'width:100%','data-parsley-required'=>"true",'data-parsley-error-message'=>"Report To  is required",))  !!}


                           </div>

                         
    											</div>
    										</div>








    										     <div class="box-footer">

                                                                                            <div class="form-group row">
                                                                                              <div class=" col-sm-10">
                                                                                                <button type="submit" class="btn btn-space btn-success">Save</button>
                                                                                                 {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                                                                                                  <span type=button" class="btn btn-space btn-danger" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                                                                                              </div>
                                                                                            </div>
                                                                                  </div>
								</div>
							</div>

						</div>
						</div>

     {!! Form::close() !!}
            
            
            
        </div>
         
         @endif
        
        

     <script>


         function addReportingto( id ){



               var APP_URL = {!! json_encode(url('/')) !!}

              


                     $.blockUI({ message: $('#addreporttodiv'), css: {  top: '20%', width: '700px;' } });

               


         }
      function editReportingto( id ){



               var APP_URL = {!! json_encode(url('/')) !!}

              $.blockUI({ message: $('#editreporttodiv'), css: {  top: '20%', width: '700px;' } });

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
