@extends('dashboard.layouts.dashboard')


    <!-- Custom Theme Style -->

@section('content')


  <script src="{{ asset('assets/plugins/blockUI/jquery.blockUI.js') }}" type="text/javascript"></script>
 <div class="right_col" role="main">
     
               
  
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



            <div class="box-header">
              <h3 class="box-title">Employee Leave History</h3>
              <div class="box-tools">
                <a class="btn btn-primary editbasicinfo" id="" onclick="javascript:requestemployeeleave({!! $id !!})">
                <i class="fa fa-plus editbasicinfo"></i>
              </a>
                  
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataspice table table-bordered table-striped">
                <thead>
                     <tr>
                        <th >Name</th>
                        <th >Leave Type</th>
                        <th >From</th>
                        <th >To</th>
                         <th>Duration</th>
                        <th ></th>
                       
                  
                </tr>
                </thead>
                <tbody>
                    
                     
                        @foreach ($assignleave as  $obj)
                      <tr>
                        <td>
                         {{ $obj->emp_firstname.'    '.$obj->emp_middle_name.'  '.$obj->emp_lastname  }}
                        </td>
                      
                        <td>
                            {{ $obj->leavetype_name }}
                        </td>
                        <td>
                            {{ $obj->fromdate }}
                        </td>
                        <td>
                            {{ $obj->todate }}
                        </td>
                         <td>
                            {{ $obj->leave_durations }}
                        </td>
                        <td class="cell-detail"> <a class="btn btn-info btn-xs" href="{{ route('AssignLeave.edit',$obj->id) }}">Edit</a>
                             
                        {!! Form::open(['method' => 'DELETE','route' => ['AssignLeave.destroy', $obj->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
        	{!! Form::close() !!}
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
                   <th>&nbsp;</th>           
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-b -->

        
   
            
            <!-- /.box-body -->
      
        
      
            <!-- /.box-body -->
 
    
<script>
   
   
    function requestemployeeleave(id){
              var APP_URL = {!! json_encode(url('/')) !!}
               
                        
                $.get( APP_URL+'/'+'AssignLeave/'+id+'/leaverequestcreate', function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: {   border: 'none', 
                            top: '20%',
                            
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                           
                            color: '#fff'  }  }); 
                    
                });
             
  
        
    }
    function editdeduction(id){
              var APP_URL = {!! json_encode(url('/')) !!}
               
                        
                $.get( APP_URL+'/'+'SalaryDeduction/'+id+'/edit', function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: { width: '600px',  padding: '10px',top:'10%' } }); 
                    
                });
             
  
        
    }
    
    
 </script>

@endsection
