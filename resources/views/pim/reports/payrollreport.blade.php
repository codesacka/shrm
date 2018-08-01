<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>


@extends('layouts.dashboard')
 
@section('content')

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
              
              
 <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/datatables/css/dataTables.bootstrap4.min.css') }}"/>




   <div class="main-content container">
        <!--Basic forms-->
         {!! Form::open(array('route' => 'PayrollReportSearch.store','method'=>'POST')) !!}
        <div class="row" style="background-color: #ffffff;">
		
	
         
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">{{ $title }}<span class="panel-subtitle"></span></div>
              <div class="panel-body">
                
                  <div class="form-group mt-1">
                    <label for="emailExample1">From : </label>
                    {!! Form::text('startfrom', null, array('placeholder' => 'Issued date','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
                  </div>
                 
                  <div class="row pt-5">
                   
                    <div class="col-6">
                      <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Search</button>
                       
                      </p>
                    </div>
                  </div>
             
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading ">&nbsp;<span class="panel-subtitle"> </span> </div>
              <div class="panel-body">
               
                <div class="form-group mt-1">
                    <label for="emailExample1">End To : </label>
                   {!! Form::text('endto', null, array('placeholder' => 'Issued date','class' => 'form-control datepicker' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
                  </div>
                 
                 
                
              </div>
            </div>
			
			
			
          </div>
            
            
             
            
        </div>
         
          {!! Form::close() !!}
          
          
          
          
          
        <div class="row" style="background-color: #ffffff;">
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">{{ $ntitle }}
                <div class="tools"></div>
              </div>
              <div class="panel-body">
                <table id="table1" class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Date Posted</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                      
                    <?php 
                    $count=0;
                    ?>
                    
                    @foreach($salaryposting as $obj)  
                      
                    <?php $count++;
                    
                    $odd  =($count % 2 ==0)  ? 'even' : 'odd'
                    
                    ?>
                    <tr class="<?php echo $odd; ?>">
                        <td> <a href="{{ url('EmployeePayslip/'.$obj->sid.'/view') }}" target="_blank">{{ $obj->emp_firstname }}   {{ $obj->emp_middle_name }}   {{ $obj->emp_lastname }} </a></td>
                      <td>
                        {{ $obj->amount }} 
                       
                      </td>
                     <td>
                        {{ $obj->created_at }}                       
                      </td>
                    </tr>
                   
                    
                    
                   @endforeach
                   
                    
                    
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
		
       
          
   </div>
 
    <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
        <ul class="pagination">
            
              {{ $salaryposting->links() }}
                
        </ul></div>
          
          
          
          
          


@endsection