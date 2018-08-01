
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
        <li><a href="{{ route('TerminationReason.create') }}">New TerminationReason</a></li>
        <li class="active"><a href="{{ route('TerminationReason.index') }}">Job TerminationReason</a></li>
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
                       <div class="tools"><a class="btn btn-success" href="{{ route('TerminationReason.create') }}"> New</a>
                         <a class="btn btn-default" href="{{ url('dashboard') }}"> Cancel</a>
                       </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th>Name</th>
                        
                        <th>Description</th>
                        <th></th>
                  
                </tr>
                </thead>
                <tbody>
                     @foreach ($terminationreason as  $obj)
                      <tr>
                        <td>
                         {{ $obj->name }}
                        </td>
                      
                        <td class="cell-detail">
                            {{ $obj->description }}
                        </td>
                        
                        <td class="cell-detail"> <a class="btn btn-default btn-xs" href="{{ route('TerminationReason.edit',$obj->id) }}"><i class="fa fa-edit"></i></a>
                             
                        {!! Form::open(['method' => 'DELETE','route' => ['TerminationReason.destroy', $obj->id],'style'=>'display:inline']) !!}
             {!! Form::submit("Delete", ['class' => 'btn btn-danger btn-xs']) !!}
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


