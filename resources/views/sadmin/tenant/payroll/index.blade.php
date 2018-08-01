@extends('layouts.adminlayout')
 
@section('content')


<div class="fw-body">
			<div class="content">
                            
                            <div class="col-md-11">
				<h1 class="page_title">{{ $title }}</h1>
				
                                
                                
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
                             
                                </div>
                            
                                {!! Form::open(array('route' => 'Tenant.payroll','method'=>'GET','data-parsley-validate')) !!}
                            <div class="row">

                                <div class="col-md-12">
                                    
                                     <div class="col-md-3">
                                    
                                    
                                      <div class="form-group">
                                <label>Date From :</label>
                                   {!! Form::text('datefrom', null, array('placeholder' => 'Date From','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-error-message'=>"Date From is required",'data-parsley-required'=>'required','readonly'=>'true')) !!}
                                 </div>
                                    
                                    
                                    
                                    
                                </div>
                                    
                                     <div class="col-md-3">
                                    
                                    
                                      <div class="form-group">
                            <label>Date  To:</label>
                            {!! Form::text('dateto', null, array('placeholder' => 'Date To','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd','data-parsley-error-message'=>"Date To is required",'data-parsley-required'=>'required','readonly'=>'true')) !!}
                          </div>
                                    
                                    
                                    
                                    
                                </div>
                                    
                                     <div class="col-md-3">
                                    
                                    
                                    
                                     <div class="form-group">
    				<label>Tenant :</label>
                                
                                    {!! Form::select('tenant', $tenantselect,null,array('class' => 'form-control select2','data-parsley-error-message'=>"Tenant is required",'data-parsley-required'=>'required'))  !!}
                
                                   <div class="validation"></div>
    				</div>
                                    
                                    
                                    
                                </div>
                                     <div class="col-md-3">
                                    
                                     <div class="form-group">
    				<label>Payment Status  :</label>
                               
                                
                                   {!! Form::select('paymentstatus', $paymentstatus,null,array('class' => 'form-control select2','data-parsley-error-message'=>"Payment status  is required",'data-parsley-required'=>'required'))  !!}
                
                                   <div class="validation"></div>
    				</div>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                
                            </div>
                            
                            
                            
                             <div class="row">

                                <div class="col-md-12">
                                    
                                     <div class="col-md-3">
                                    
                                    
                                    
                                    <button type="submit" class="btn btn-success">Search</button>
                                    
                                    
                                    
                                </div>
                                    
                                     <div class="col-md-3">
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                    
                                     <div class="col-md-3">
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                     <div class="col-md-3">
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                
                            </div>
                                
                                
                            {!! Form::close() !!} 
                                
                        </div>
    
    
    
    
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                          
                                
                                <h4 class="card-title">UnProcessed Payroll </h4>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                 <th>Date Posted</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            
                                            @foreach ($salaryrow as $obj)
                                            <tr>
                                                
                                                <td> <a href="{{ url('ViewTenantProcess/'.$tenant.'/'.$obj->id.'/view') }}"> {{  $obj->uploadid }} </a>    </td>
                                                <td> {{  $obj->created_at }} </td>
                                                <td> {{  $obj->description }} </td>
                                                
                                            </tr>
                                            @endforeach
                                            
                                            
                                            
                                         
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    
    
    
                          
</div>

@endsection