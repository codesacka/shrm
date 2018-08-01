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
              <h3 class="box-title">Employee Documents</h3>
              <div class="box-tools">
               
                  
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataspice table table-bordered table-striped">
                <thead>
                     <tr>
                        <th>Name</th>
                        
                        <th>Description</th>
                        
                  
                </tr>
                </thead>
                <tbody>
                        @foreach ($documents as  $obj)
                      <tr>
                        <td>
                         {{ $obj->name }}
                        </td>
                      
                        <td class="cell-detail">
                            {{ $obj->notes }}
                        </td>
                        
                     
                      
                      </tr>
                         @endforeach
                   
                     
                         
                </tbody>
                <tfoot>
                <tr>
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
