@extends('template.dashboard.layouts')
 
@section('content')

    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('employeejobdetails-view')
                              
                                
                               
                          
        
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
                                                                          <h3 class="box-title">Employment Status</h3>
                                                                        </div>
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                          <table  class="table table-bordered table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                              <th>Effective Date</th>
                                                                              <th>Job Title</th>
                                                                              <th>Employment Status</th>
                                                                            
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                
                                                                            @foreach($activejob  as $obj)
                                                                            <tr>
                                                                              <td>{{ $obj->joineddate }}</td>
                                                                              <td>{{ $obj->jobname }}
                                                                               </td>
                                                                              <td>{{ $obj->empstatus }}</td>
                                                                             
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
                                                                              @permission('employeejobdetails-add')
                                                                        <div class="box-header">
                                                                            <h3 class="box-title">Job Information    <a class="btn btn-success" onclick="javascript:addjobdetails({!! $id !!})"> <i class="fa fa-plus"></i></a></h3> 
                                                                        </div>
                                                                              @endpermission
                                                                      
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                          <table  class="table table-bordered table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                              <th>Effective Date</th>
                                                                              <th>Job Title</th>
                                                                              <th>Employment Status</th>
                                                                              <th>Active</th>
                                                                              
                                                                               <th> </th>
                                                                            
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                
                                                                            @foreach($allempjobdetails  as $obj)
                                                                            <tr>
                                                                              <td>{{ $obj->joineddate }}</td>
                                                                              <td>{{ $obj->jobname }}
                                                                               </td>
                                                                              <td>{{ $obj->empstatus }}</td>
                                                                              
                                                                               <td> @if( $obj->status ==1) 
                                                                                     <span class="label label-success">Active</span>
                                                                                    @else
                                                                                      <span class="label label-danger">Inactive</span>
                                                                                    @endif
                                                                               
                                                                               </td>
                                                                               <td>
                                                                                   
                                                                                          @permission('employeejobdetails-edit')
                                                                                    <a class="btn btn-xs" onclick="javascript:editempslanguages({!! $obj->id !!})"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('employeejobdetails-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['EmpLanguage.destroy', $obj->id],'style'=>'display:inline']) !!}
                                                                                    <button type="submit" class="btn  btn-custom btn-xs" ><i class="fa fa-trash icon-success"></i></button>
                                                                                  
                                                                                   {!! Form::close() !!}
                                                                                     @endpermission
                                                                                   
                                                                                   
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


                                                function addjobdetails(id){


                                               
                                                          var APP_URL = {!! json_encode(url('/')) !!}

                                                           $.get( APP_URL+'/'+"EmpJobDetails/"+id+"/create", function( data ) {


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
 
 
 


