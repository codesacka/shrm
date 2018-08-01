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

                                                                                      {!! Form::open(array('route' => 'Assignleave.Approvals','method'=>'GET','data-parsley-validate')) !!}

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
                                                                                                                               <td><a href='{{ route('AssignLeave.ApproveNow',$v['id']) }}'>{{ $v['title'] }}</a></td>
                                                                                                                                     
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
 
 
 