  @include('template.partials.header')
<div id="editcompensantioninfoform">
    
       <script src="{{ URL::asset('blockUI/jquery.blockUI.js') }}" type="text/javascript"></script>
     @include('template.partials.parsley')

    {!! Form::model($row, ['method' => 'PATCH','data-parsley-validate','route' => ['EmployeeTaxInfo.update', $row->id]]) !!} 

    
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
                    <label>Kra tax Pin :</label>
                    {!! Form::text('krataxPin', null, array('placeholder' => 'Kra tax Pin','class' => 'form-control','data-parsley-error-message'=>"Kra tax Pin is required",'required')) !!}
                     </div>
                        
                
             
                 <div class="form-group">
                    <label>Nssf :</label>
                     {!! Form::text('nssf', null, array('placeholder' => 'Nssf','class' => 'form-control','data-parsley-error-message'=>"Nssf is required",'required')) !!}
                 
                 </div>
            
             
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                    <label>Nhif :</label>
                       {!! Form::text('nhif', null, array('placeholder' => 'Nhif','class' => 'form-control','data-parsley-error-message'=>"Nhif is required",'required')) !!}
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
                       {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                        <span type=button" class="btn btn-space btn-default" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                    </div>
                  </div>
        </div>
        
      </div>  
            

    
     {!! Form::close() !!}
     
</div>
  
 
  @include('template.partials.footer')
    
    
  