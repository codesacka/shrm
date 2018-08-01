@extends('template.dashboard.layouts')
 
@section('content')

    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('leavetype-view')
                           	<div class="row">

                           
                              
                              
                              <div class="col-md-12">
                                  
                                  
              
                       
                                         <div class="row">
					
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
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
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-calendar"></span> {{ $title}} </h3>
									</div>
									<div class="panel-body">
                                                                            
                                                                            
                                                                            
                                                                             <div class="box-body">
                                                                                            
                                                                            <div class="row">

                                                                                      {!! Form::open(array('route' => 'AssignleaveApprovals.store','method'=>'POST','data-parsley-validate')) !!}

                                                                                <div class="col-sm-12">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">

                                                                          
                                                                               <table  class="table table-bordered table-striped">

                                                                                                 <thead>
                                                                                                           <tr>
                                                                                                             <th>Name</th><th>From Date</th><th>Date To</th>
                                                                                                               <th>Day</th>
                                                                                                                <th>Number Of Days</th>
                                                                                                               <th>Reasons</th>
                                                                                                                <th>Leave Type</th>
                                                                                                                  <th>Max Days</th>
                                                                                                                  <th>Usage</th>


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
                                                                                                                                
                                                                                                                                 <td>{{ $v['daycount'] }}</td>
                                                                                                                                
                                                                                                                                <td>{{ $v['reasons'] }}</td>
                                                                                                                                 <td>{{ $v['leavetypename'] }}</td>
                                                                                                                                
                                                                                                                                <td>{{ $v['maxday'] }}</td>
                                                                                                                                <td>{{ $v['totalleaveusage'] }}</td>

                                                                                                                           </tr>
                                                                                                            @endforeach
                                                                                                               
                                                                                                           </tbody>
                                                                                                         <tfoot>
                                                                                                         <tr>

                                                                                                            <th>&nbsp;</th>
                                                                                                            <th>&nbsp;</th>
                                                                                                            <th>&nbsp;</th>
                                                                                                            <th>&nbsp;</th> <th>&nbsp;</th>

                                                                                                            <th>&nbsp;</th>
                                                                                                            <th>&nbsp;</th>
                                                                                                            <th>&nbsp;</th>
                                                                                                            <th>&nbsp;</th>

                                                                                                         </tr>
                                                                                                         </tfoot>
                                                                                                       </table>
                                                                                    
                                                                                    
                                                                                    
                                                                                    <div class="radio">
                                                                                        <label><input type="radio" name="status" value='1' data-parsley-required="true">Approve</label>
                                                                                      </div>
                                                                                      <div class="radio">
                                                                                        <label><input type="radio" name="status" value='2'>Reject</label>
                                                                                      </div>
                                                                                     
                                                                                      {!! Form::hidden('id', $id, array('id' => 'id')) !!}
                                                                                 


                                                                                        <div class="box-footer">

                                                                                                                                                <div class="form-group row">
                                                                                                                                                  <div class=" col-sm-10">
                                                                                                                                                      <br/>
                                                                                                                                                    <button type="submit" class="btn btn-space btn-success">Approve Leave</button>
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
 
 
 