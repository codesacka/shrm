     
     
   
    {!! Form::model($empcont_row, ['method' => 'PATCH','data-parsley-validate','route' => ['ContactDetails.update', $empcont_row->id]]) !!}    
    
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="float: left;">Social Media Contacts</h3>

        
        </div>
          
          

        <!-- /.box-header -->
        <div class="box-body">
            
          <div class="row">
            <div class="col-md-6">
                
                
               <div class="form-group">
                <label style="float: left;"> Address Street 1: </label>
                     {!! Form::text('streetaddress1', null, array('placeholder' => 'Address Street 1','class' => 'form-control','required')) !!}
                
               </div>
                
                
                <div class="form-group">
                      
                  <label style="float: left;"> City :</label>
                      {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control','required')) !!}
                  </div>
                    
                 <div class="form-group">
                      
                  <label style="float: left;"> County/State  :</label>
                      {!! Form::text('county', null, array('placeholder' => 'County','class' => 'form-control','required')) !!}
                  </div>   
                    
                  <div class="form-group">
                      
                  <label style="float: left;"> Home Telephone  :</label>
                      {!! Form::text('hometelephone', null, array('placeholder' => 'Home Telephone','class' => 'form-control','required')) !!}
                  </div>   
                    
                 <div class="form-group">
                      
                  <label style="float: left;"> Work Telephone  :</label>
                      {!! Form::text('worktelephone', null, array('placeholder' => 'Work Telephone','class' => 'form-control','required')) !!}
                  </div>   
               <div class="form-group">
                    
                  <label style="float: left;"> Other Email  :</label>
                  <br>
                </div>
                  <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                   
                  </div>
                {!! Form::text('otheremail', null, array('placeholder' => 'Other Email','class' => 'form-control','required','data-parsley-type'=>"email")) !!}
                </div>
                <!-- /.input group -->
              </div>
                
                
              <!-- /.form-group -->
      
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                    <div class="form-group">
                    <label style="float: left;"> Address Street 2 :</label>
                      {!! Form::text('streetaddress2', null, array('placeholder' => 'Address Street 1','class' => 'form-control','required')) !!}
                  </div>
                  
                  
                   <div class="form-group">
                    <label style="float: left;"> Country :</label>
                                          
                       {!! Form::select('country', $nationality,null,array('class' => 'form-control','required'))  !!}
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label style="float: left;">Postal code :</label>
                      {!! Form::text('postalcode', null, array('placeholder' => 'Postal code','class' => 'form-control','required')) !!}
                  </div>
                 
                  <div class="form-group">
                    <label style="float: left;">Mobile :</label>
                      {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control','required')) !!}
                  </div>
                  
                  <div class="form-group">
                    <label style="float: left;">Work Email :</label>
                      {!! Form::text('workemail', null, array('placeholder' => 'Work Email','class' => 'form-control','required','data-parsley-type'=>"email")) !!}
                  </div>
                  
                  
                  <div class="row pt-5">
                    <div class="col-6">
                      <label class="custom-control custom-checkbox mt-2">
                       {!! Form::hidden('employee_id', $id, array('id' => 'employee_id')) !!}
                      </label>
                    </div>
                   
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
                      <button type="submit" class="btn btn-space btn-success">Update </button>
                    
                    </div>
                  </div>
        </div>
      </div>
    </section>
 {!! Form::close() !!}
