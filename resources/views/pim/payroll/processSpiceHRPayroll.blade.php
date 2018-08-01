  
@extends('template.form.layouts')
 
@section('content')
                
    
    <section class="content-header">
      <h1>
        &nbsp;
        <small>&nbsp;</small>
      </h1>
      <ol class="breadcrumb">
       <!-- <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('JobTitle.create') }}">New Job Title</a></li>
         <li class="active"><a href="{{ route('JobTitle.index') }}">Job Title List</a></li>-->
      </ol>
    </section>



   <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="float: left;">{{ $title }} </h3>

        
        </div>
          
               
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <div class="row">
        <div class="col-md-6">
            
        {!! Form::open(array('route' => 'ProcessPayroll.store','method'=>'POST')) !!}   
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Payment Period</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              
             <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    {!! Form::text('datefrom', null, array('placeholder' => 'Payment Date from ','class' => 'form-control datepicker pull-right' , 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}
                  
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
              
             <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    {!! Form::text('dateto', null, array('placeholder' => 'Payment Date to','class' => 'form-control datepicker pull-right' , 'readonly', 'data-date-format'=>'yyyy-mm-dd')) !!}
                     {!! Form::hidden('action', 'basicinfo', array('id' => 'action')) !!}
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

          

           
              <!-- /.form group -->

              <!-- IP mask -->
               <div class="form-group">
                    <label>Notes :</label>
                     {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                </div>
              <!-- /.form group -->

            </div>
              
              
                <div class="box-footer">
              
                  <div class="form-group row">
                    <div class=" col-sm-10">
                      <button type="submit" class="btn btn-space btn-primary">Process Payment</button>
                    {!! Form::hidden('processor', 1, array('id' => 'processor')) !!}
                        <span type=button" class="btn btn-space btn-default" onclick="window.history.back(); return false">Cancel</span>
                    </div>
                  </div>
        </div>
            <!-- /.box-body -->
          </div>
            
        {!! Form::close() !!}    
         
          <!-- /.box -->

          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Payment Details </h3>
            </div>
            <div class="box-body">
             
              <div class="panel panel-default">
             
              <div class="panel-body">
 <div class="section">
        <h3>Bank Details</h3>
   
        <dl class="list-features">
          <dt><i class="icon"></i> </dt>
          <dd>
     
             <p>                         
                            <span class="custom-control-description" style="font-weight: bold;"></span>
             </p>
            </dd>

          
         <dt><i class="icon"></i> </dt>
          <dd>
           
              <p>   
                          <span class="custom-control-description" style="font-weight: bold;"></span></p>
          </dd>

          <dt><i class="icon"></i> </dt>
          <dd>
           
            
              <p> <span class="custom-control-description" style="font-weight: bold;"></span></p>
            
            
          </dd>

       
                   <dd>

                   
                       
                   
                       
                   
                  
                   </dd>
          
          
          
                    </dl>


                </div>

              </div>

       
 
            </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
      
       </div>
    </section>
  
   
@endsection