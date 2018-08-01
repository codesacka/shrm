  
@extends('layouts.adminlayout')
 
@section('content')




<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                   
                </div>
                
                
               
                  
                  
                  
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
            
                <!-- Row -->
                <!-- Row -->
               
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                          
                                
                                <h4 class="card-title">UnProcessed Payroll </h4>
                                <div class="table-responsive m-t-40">
                                    
                                    
                                    
                                    @if(count($unprocessedsalary) > 0)
                                    
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            
                                            @foreach ($unprocessedsalary as $obj)
                                            <tr>
                                                
                                                <td> <a href="#"> {{  $obj->name }} </a>    </td>
                                                <td> {{  $obj->comment }} </td>
                                                
                                            </tr>
                                            @endforeach
                                            
                                            
                                            
                                         
                                            
                                            
                                        </tbody>
                                    </table>
                                    
                                    @else
                                    
                                    <div class="alert alert-warning">
                                                 <p>No available  Salaries to be Processed</p>
                                   </div>
                                    
                                    @endif
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>


@endsection