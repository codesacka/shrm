
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
        <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('ProcessPayroll.decision') }}">Payroll</a></li>
        <li class="active"><a href="{{ route('Payroll.NHIFStructures') }}">NHIF Structures</a></li>
      </ol>
    </section>
              
              
              
              
              
              
              

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
      
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> {{ $title }}</h3>
                  <div class="panel panel-default panel-table"> 
                    <div class="panel-heading">
                       <div class="tools">
                         <a class="btn btn-default" href="{{ route('ProcessPayroll.decision') }}"> Cancel</a>
                       </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th>Low</th>
                        
                        <th>Max</th>
                        <th>Deduction</th>
                  
                </tr>
                </thead>
                <tbody>
                        @foreach ($n_struct as  $obj)
                      <tr>
                        <td>
                         {{ $obj->low }}
                        </td>
                      
                        <td class="cell-detail">
                            {{ $obj->high }}
                        </td>
                        
                       <td class="cell-detail">
                            {{ $obj->deduction }}
                        </td>
                      
                      </tr>
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
