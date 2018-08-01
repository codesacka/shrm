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
									<h3 class="panel-title"><span class="fa fa-briefcase"></span> {{ $title}} </h3>
									</div>
									<div class="panel-body">
									   
                                                                                     @permission('leavepolicy-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools"> 
                                                                                           
                                                                                           <a class="btn btn-success" href="{{ route('LeaveTypePolicy.create') }}"> <i class="fa fa-plus"></i>Add Policy</a>
                                                                                           <a class="btn btn-success" href="{{ route('Assignleave.Approvals') }}"> <i class="fa fa-calendar"></i>Approve Leave Events</a>

                                                                                   </div>
                                                                        </div>
    										@endpermission
                                                            
                                                                          <table  class="table table-bordered table-striped ">
                                                                             <thead>
                                                                                        <tr>
                                                                                                <th>Name</th>

                                                                                                <th>Description</th>
                                                                                                <th></th>

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($leavetype as  $obj)
                                                                                            
                                                                                            
                                                                                              <tr>
                                                                                                <th> {{ $obj->name }}</th>

                                                                                                <th>  {{ $obj->description }}</th>
                                                                                                <th></th>
                                                                                                
                                                                                                

                                                                                             </tr>
                                                                                        
                                                                                            @foreach($annualpolicy  as $row)
                                                                                            @if($obj->id  ==$row->leavetype)
                                                                                        
                                                                                              <tr>
                                                                                                <td>
                                                                                                 {{ $row->policyname }}
                                                                                                </td>

                                                                                                <td class="cell-detail">
                                                                                                   
                                                                                                </td>
                                                                                    <td class="cell-detail"> 
                                                                                        
                                                                                          @permission('leavepolicy-edit')
                                                                                    <a class="btn btn-xs" href="{{ route('LeaveTypePolicy.edit',$row->id) }}"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('leavepolicy-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['LeaveTypePolicy.destroy', $row->id],'style'=>'display:inline']) !!}
                                                                                    <button type="submit" class="btn  btn-custom btn-xs" ><i class="fa fa-trash icon-success"></i></button>
                                                                                  
                                                                                   {!! Form::close() !!}
                                                                                     @endpermission
                                                                        
                                                                                    </td>
                                                                                    
                                                                                  </tr>
                                                                                   @endif
                                                                                  @endforeach
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
 
 
 