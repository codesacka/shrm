@extends('layouts.adminlayout')
 
@section('content')


<div class="fw-body">
			<div class="content">
                            
                            <div class="col-md-11">
				<h1 class="page_title">{{ $title }}</h1>
				
                             
                                </div>
                            
                            
                                
                        </div>
    
    
                                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                                {!! Form::open(array('route' => 'Tenant.ProcesspayrollViewStore','method'=>'POST','data-parsley-validate')) !!}
                                
                                <button type="submit" class="btn btn-success">Process Salary</button>
                                
                                {{ Form::hidden('tenant', $tenant, array('id' => 'tenant')) }}
                                
                                {{ Form::hidden('id', $id, array('id' => 'procid')) }}
                                
                                 {!! Form::close() !!} 
                                
                            </div>
                        </div>
                    </div>
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
                                                 <th>Bank Name</th>
                                                <th>Bank Branch</th>
                                               <th>Account Number</th> 
                                               <th>Net Pay</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            
                                            @foreach ($salary_data as $k=>$obj)
                                            <tr>
                                                
                                                <td> {{  $obj['name'] }} </td>
                                                <td> {{  $obj['bankname']  }} </td>
                                                <td> {{  $obj['bankbranch']  }} </td>
                                                 <td> {{  $obj['bankaccount']  }} </td>
                                                  <td> {{  $obj['netpay']  }} </td>
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