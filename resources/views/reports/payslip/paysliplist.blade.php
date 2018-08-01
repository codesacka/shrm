<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

@extends('template.table.layouts')
 
@section('content')

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
              
              
              
              
                
    
    <section class="content-header">
      <h1>
        &nbsp;
        <small>&nbsp;</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">Employee List</li>
      </ol>
    </section>
              
              
              
              
              
              
              

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
      
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h2> {{ $title }}</h2>
                  <div class="panel panel-default panel-table"> 
                    <div class="panel-heading">
                       <!--<div class="tools"><a class="btn btn-success" href="{{ route('Employee.create') }}"> Add New Employee</a>
                         <a class="btn btn-default" href="{{ url('dashboard') }}"> Cancel</a>
                       </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Employee ID</th>
                         <th>Gross Pay</th>
                        <th></th>
                  
                </tr>
                </thead>
                <tbody>
               
                    
                @foreach ($emp_data as  $obj)
                      <tr>
                        <td>
                          {{ $obj->emp_firstname }} </a>
                        </td>
                      
                        <td>
                          {{ $obj->emp_middle_name }} 
                        </td>
                        
                        <td>
                            {{ $obj->emp_lastname }}
                        </td>
                        
                        <td>
                            {{ $obj->employee_id }}
                        </td>
                         <td>
                            {{ $obj->salaryamount }}
                        </td>
                        <td> 
                             
                            <a href="{!! route('ProcessPayroll.PrintPayslip',$obj->salaryid) !!}"   target="_blank"> <i class="fa fa-print"> Print Pay Slip</i></a>
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
            </div></div>
            </div>
            <!-- /.box-body -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.row -->
    </section>
    
              
              


@endsection
