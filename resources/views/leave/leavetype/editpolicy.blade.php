
<div id="addpolicyform">

            {!! Form::model($policy, ['method' => 'PATCH','data-parsley-validate','route' => ['SetupPolicy.update', $policy->leavetype]]) !!} 
    
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="float: left;">Leave types</h3>
          <p class="panel-heading panel-heading-divider" style="float: left;">
              Whether they’re relaxing in the sun or recuperating from a cold, your team will feel more energized, happier, and productive with the benefit of paid time off.
          </p>
        
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

        
        <div class="box-body">
              <!-- Minimal style -->

              <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="radio" name="earningmethod" class="minimal"   onclick="javascript:editformpolicyannual()">
                  Annual (example: 120 hours per year)
                </label>
              </div>

              <!-- radio -->
              <div class="form-group">
              
                <label>
                  <input type="radio" name="earningmethod" class="minimal"   onclick="javascript:editformpolicyhour()">
                  Hourly (example: 1 hour per 20 worked)
                </label>
              </div>
        </div>
              
        
        
        <!-- /.box-header -->
        <div class="box-body" id="editannualform" style="display:none; cursor: default">
            
          <div class="row">
            <div class="col-md-6">
                   
                
               <div class="form-group">
                <label style="float: left;">Total Per Year: </label>
                    {!! Form::text('totalperyear', null, array('placeholder' => 'Hours','id'=>'totalperyear','class' => 'form-control','required','data-parsley-type'=>"integer")) !!}
                
               </div>
                
                
                <div class="form-group">
                <label style="float: left;">Max Balance: </label>
                             <br>          
               </div>
                <div class="form-group">
                    
              
           
                <div class="input-group date">
                  <div class="input-group-addon">
                   
                  </div>
                 {!! Form::text('amaxbalance', null, array('placeholder' => 'optional','id'=>'amaxbalance','class' => 'form-control','required','data-parsley-type'=>"integer")) !!}
                </div>
                <!-- /.input group -->
              </div>
                
                
              <!-- /.form-group -->
      
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label style="float: left;">Earned</label>
                      {!! Form::select('leaveearned', $leaveearned,null,array('class' => 'form-control','id'=>'leaveearned'))  !!}                       
              </div>
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
            
            
            
            
            
            
            
          <!-- /.row -->
        </div>
        
        
        
         <!-- /.box-header -->
        <div class="box-body" id="edithourform" style="display:none; cursor: default">
            
          <div class="row">
            <div class="col-md-6">
                   
                
               <div class="form-group">
                <label style="float: left;">Rate (hour): </label>
                    {!! Form::text('hourrate', null, array('id'=>'hourrate','placeholder' => '1','class' => 'form-control','required','data-parsley-type'=>"integer")) !!}
                
               </div>
                
                
                <div class="form-group">
                <label style="float: left;">Max Balance: </label>
                             <br>          
               </div>
                <div class="form-group">
                    
              
           
                <div class="input-group date">
                  <div class="input-group-addon">
                   
                  </div>
                 {!! Form::text('hmaxbalance', null, array('id'=>'hmaxbalance','placeholder' => 'optional','class' => 'form-control','required','data-parsley-type'=>"integer")) !!}
                </div>
                <!-- /.input group -->
              </div>
                
                
              <!-- /.form-group -->
      
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label style="float: left;">Per(hours worked)</label>
                       {!! Form::text('perhoursworked', null, array('id'=>'perhoursworked','placeholder' => '20','class' => 'form-control','required','data-parsley-type'=>"integer")) !!}                
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
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-space btn-success" id="savebtnpolijcy">Save </button>
                       {!! Form::hidden('earnedmethod2', null, array('id' => 'earnedmethod2')) !!}
                        {!! Form::hidden('leavetype', null, array('id' => 'leavetype')) !!}
                       {!! Form::hidden('state', $state, array('id' => 'state')) !!}
                      <span type=button" class="btn btn-space btn-default" onclick="javascript:$.unblockUI(); return false">Cancel</span>
                    </div>
                  </div>
        </div>
      </div>
    </section>
 {!! Form::close() !!}
</div>