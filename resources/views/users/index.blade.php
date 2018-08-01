@extends('template.dashboard.layouts')
 
@section('content')

    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('users-view')
                           	<div class="row">

                              @include('template.dashboard.menu.sidemenu')
                              
                              
                              <div class="col-md-9">
                                  
                                  
              
                       
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
									<h3 class="panel-title"><span class="fa fa-database"></span> {{ $title}} </h3>
									</div>
									<div class="panel-body">
									   
                                                                                     @permission('users-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fa fa-plus"></i></a>

                                                                                   </div>
                                                                        </div>
    										@endpermission
                                                            
                                                                          <table  class="table table-bordered table-striped datatable">
                                                                             <thead>
                                                                                     <tr>
                                                                                        <th>Name</th>
                                                                                         <th>Email</th>
                                                                                         <th>Roles</th>
                                                                                         <th></th>

                                                                                         </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                               @foreach ($users as  $user)
                                                                                              <tr>
                                                                                                <td>
                                                                                                 {{ $user->name }}
                                                                                                </td>
                                                                                                 <td>{{ $user->email }}</td>
                                                                                                <td class="cell-detail">
                                                                                                    @if(!empty($user->roles))
                                                                                                            @foreach($user->roles as $v)
                                                                                                                    <label class="label label-success">{{ $v->display_name }}</label>
                                                                                                            @endforeach
                                                                                                    @endif
                                                                                                </td>
                                                                                    <td class="cell-detail"> 
                                                                                        
                                                                                          @permission('users-edit')
                                                                                    <a class="btn btn-xs" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('users-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
 
 