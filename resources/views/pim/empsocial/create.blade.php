





<div id="addsocialmediaform" style="display:none; cursor: default">

        {!! Form::open(array('route' => 'SocialMediaDetails.store','method'=>'POST','data-parsley-validate')) !!} 
    
    
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="float: left;">Social Media Contacts</h3>

        
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
                <label style="float: left;">Type: </label>
                    {!! Form::text('type', null, array('placeholder' => 'Facebook,Twitter','class' => 'form-control','required')) !!}
                
               </div>
                
                
                <div class="form-group">
                <label style="float: left;">Link: </label>
                             <br>          
               </div>
                <div class="form-group">
                    
              
           
                <div class="input-group date">
                  <div class="input-group-addon">
                   
                  </div>
                 {!! Form::text('link', null, array('placeholder' => 'Link','class' => 'form-control','required')) !!}
                </div>
                <!-- /.input group -->
              </div>
                
                
              <!-- /.form-group -->
      
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label style="float: left;">Handle</label>
                      {!! Form::text('handle', null, array('placeholder' => 'Handle','class' => 'form-control','required')) !!}
                         {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
              </div>
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
            
            
            
            
            
            
            
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
         <div class="box-footer">
              
                  <div class="form-group row">
                    <div class="col-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-space btn-success">Save </button>
                      <span type=button" class="btn btn-space btn-default" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                    </div>
                  </div>
        </div>
      </div>
    </section>
 {!! Form::close() !!}
</div>