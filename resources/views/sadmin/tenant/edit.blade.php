@extends('layouts.adminlayout')
 
@section('content')



<div class="fw-body">
			<div class="content">
                            
                            <div class="col-md-11">
				<h1 class="page_title">{{ $title }}</h1>
                                
                                {!! Form::model($tenant, ['method' => 'PATCH','data-parsley-validate','route' => ['Tenant.update', $tenant->id]]) !!}
                                <div class="col-md-6">

                            
                              <div class="form-group">
                                <label for="email">Identifier:</label>
                                   {!! Form::text('identifier', null, array('placeholder' => 'Identifier','class' => 'form-control','data-parsley-error-message'=>"Identifier is required",'required')) !!}
                              </div>
                              <div class="form-group">
                                <label for="pwd">Name:</label>
                                 {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','data-parsley-error-message'=>"Identifier is required",'required')) !!}
                              </div>
                                  <div class="form-group">
                                <label for="pwd">Database Name:</label>
                                 {!! Form::text('schema_name', null, array('placeholder' => 'Database Name','class' => 'form-control','data-parsley-error-message'=>"Database Name is required",'required')) !!}
                              </div>
                                
                                    
                                  <div class="form-group">
                                <label for="pwd">Database Server:</label>
                                 {!! Form::text('schema_server', null, array('placeholder' => 'Database Server','class' => 'form-control','data-parsley-error-message'=>"Database Server is required",'required')) !!}
                              </div>
                                
                                   <div class="form-group">
                                <label for="pwd">Database Server Port:</label>
                                 {!! Form::text('schema_server_port', null, array('placeholder' => 'Database Server Port','class' => 'form-control','data-parsley-error-message'=>"Database Server Port is required",'required')) !!}
                              </div>
                                
                                
                                  <div class="form-group">
                                <label for="pwd">Database Username:</label>
                                 {!! Form::text('schema_username', null, array('placeholder' => 'Database UserName','class' => 'form-control','data-parsley-error-message'=>"Database Name is required",'required')) !!}
                              </div>
                                
                                  
                                  <div class="form-group">
                                <label for="pwd">Database Username:</label>
                                 {!! Form::text('schema_password', null, array('placeholder' => 'Database Password','class' => 'form-control','data-parsley-error-message'=>"Database Password is required",'required')) !!}
                              </div>
                                
                            
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    
                                    <button type="submit" class="btn btn-success">Update</button>
                                    
                                    
                                    <a href="{{ route('Tenant.disableaccount', $tenant->id) }}"><span  class="btn btn-warning">Disable Account </span></a>
                                    
                                   
                                </div>
                                
                                
                                {!! Form::close() !!}

                                
                            </div>
                        </div>
</div>

@endsection