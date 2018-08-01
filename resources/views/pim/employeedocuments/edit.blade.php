  @include('template.partials.header')

       <script src="{{ URL::asset('blockUI/jquery.blockUI.js') }}" type="text/javascript"></script>
     @include('template.partials.parsley')

    {!! Form::model($row, ['method' => 'PATCH','data-parsley-validate','enctype'=>'multipart/form-data','route' => ['EmployeeDocuments.update', $row->id]]) !!}
  
      <div class="col-md-12">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $title }}</h3>

          <div class="box-tools pull-right">
           
          </div>
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

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name : </label>
                 {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','data-parsley-error-message'=>"File Name is required",'required')) !!}
              </div>
             
              
                
                <div class="form-group">
                <label>Notes: </label>
                   {!! Form::textarea('notes', null, array('placeholder' => 'Description','data-parsley-error-message'=>"Notes Details is required",'required','class' => 'form-control','style'=>'height:100px')) !!}
              </div>
               
         
              
             
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>File :</label>
              
              
                {!! Form::file('attachment', null, array('placeholder' => 'Name','data-parsley-error-message'=>"File  is required",'required')) !!}
           
              
              </div>
            
             
              
                
                
              
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
      
      
      <!-- /.box -->

      <!-- /.row -->
      
      
      
      
   
         
            <div class="box-footer">
              
                  <div class="form-group row">
                    <div class=" col-sm-10">
                      <button type="submit" class="btn btn-space btn-primary">Update</button>
                       {!! Form::hidden('employee_id', $employee_id, array('id' => 'employee_id')) !!}
                        <span type=button" class="btn btn-space btn-default" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                    </div>
                  </div>
        </div>
        
      </div>  
            

    
     {!! Form::close() !!}
     








  @include('template.partials.footer')