<script src="{{ URL::asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}"> 
<link rel="stylesheet" href="{{ URL::asset('account/css/main.css') }}">
<link href="{{ URL::asset('assets/plugins/parsley/parsley.css') }}" rel="stylesheet">
<script src="{{ URL::asset('assets/plugins/parsley/parsley.min.js') }}"></script>
    
    

<section id="login">
    <div class="container">
    	<div class="row">
            
            
            <div class="col-md-12"  id="installationarea" style="display: none;">
            
                
                 <div class="form-wrap">
                     <h1>Installation in Progress </h1>
                     
                     
                     <div class="col-md-4">
                       <img src="{{ URL::asset('img/preloader.gif')  }}" alt="loader">
                     </div>
                       
                     <div class="col-md-4">
                       <img src="{{ URL::asset('img/preloader.gif')  }}" alt="loader">
                     </div>
                        
                     <div class="col-md-4">
                       <img src="{{ URL::asset('img/preloader.gif')  }}" alt="loader">
                     </div>
                       
                 </div>
            
               </div>
            
            
            
    	   <div class="col-md-12"  id="registerarea">
                
                          
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul style=" list-style-type: none;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        
        
        
                        <div id="emailinfo" style="display:none"> 
                        <div class="alert alert-warning">
                                  <p> Email is already registered</p>
                             </div>

                        </div>
                        
                        
                        <div id="tenantinfo" style="display:none"> 
                        <div class="alert alert-warning">
                                  <p> Tenant Url is already registered</p>
                             </div>

                        </div>
   

                      {!! Form::open(array('id'=>'registerform','data-parsley-validate'=>'')) !!}
        	    <div class="form-wrap">
                     <h1>Sign Up </h1>
                     
                       
                     
                        <div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            
                            {!! Form::text('firstname', Input::old('firstname'), array('placeholder' => 'First Name','id'=>'firstname','class' => 'form-control','data-parsley-error-message'=>"First Name is required",'data-parsley-required'=>"true")) !!}
                         
                        </div>
                         <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                           {!! Form::text('firstname', Input::old('lastname'), array('placeholder' => 'Last Name','id'=>'lastname','class' => 'form-control','data-parsley-error-message'=>"Last Name is required",'data-parsley-required'=>"true")) !!}
                          
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                                               
                         {!! Form::text('email', null, array('placeholder' => 'Email','id'=>'email','class' => 'form-control','data-parsley-type'=>"email",'data-parsley-error-message'=>"Valid Email is required",'data-parsley-required'=>"true")) !!}
                        </div>
                        
                         <div class="form-group">
                         {!! Form::select('employeecount', $employeecount,Input::old('employeecount'),array('id'=>'employeecount','class' => 'select2 form-control'))  !!}
                         </div>
                        
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                             {!! Form::password('password', array('placeholder' => 'Password','id'=>'password','class' => 'form-control','data-parsley-error-message'=>"Password is required",'data-parsley-required'=>"true")) !!}
                        </div>
                        
                         <div class="form-group">
                            <label for="key" class="sr-only">Confirm Password</label>
                          {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','data-parsley-equalto'=>'#password','data-parsley-error-message'=>"Confirm Password is required and must be equal to password",'data-parsley-required'=>"true")) !!}
                        </div>
                        
                      <div class="input-group">
                            <input type="text" name='url' id="url" class="form-control" placeholder="Desired Url" data-parsley-error-message="Url is required"  data-parsley-required="true" aria-describedby="basic-addon2" value="{{  Input::old('url') }}" >
                            <span class="input-group-addon" id="basic-addon2">.spicehrm.com</span>
                          </div>

                        <div class="checkbox">
                            <div class="checkbox">
                                    <label><input type="checkbox" name="terms" value="1"  data-parsley-required="true">I agree to the Terms of Service and Privacy Policy</label>
                                  </div>
                            
                        </div>
                        
                       
                        
                     <button type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block">Sign Up</button>
                   
                     <div id='loader' style="display: none;">
                         
                         <img src="{{ URL::asset('img/ajaxloader.gif')  }}" alt="loader">
                     </div>
                     
                    <a href="{{ route('password.request') }}" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                    <hr>
        	    </div>
                
                {!! Form::close() !!}
                
                
    		</div> <!-- /.col-xs-12 -->
                
                
                
                
                
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- /.modal -->


<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>{{ date('Y') }}</p>
                <p>Powered by <strong><a href="http://www.spicehrm.com" target="_blank">Spice Hrm</a></strong></p>
            </div>
        </div>
    </div>
</footer>


<script>
 
 
 
   $(function () {
       
    var APP_URL = {!! json_encode(url('/')) !!}
          
    $('#btn-login').click(function() {   
        
          $("#registerform").on('submit', function(e){
                      e.preventDefault();
                      var form = $(this);

                      form.parsley().validate();

                      if (form.parsley().isValid()){
                       
                       var email =$('#email').val();
                       
                       var url =  $('#url').val();
                       
                       $('#loader').show();
                       
                       $('#btn-login').hide();
                       
                       
                        $.get( APP_URL+"/EmailConfirm/"+email+"/"+url+"/First", function( data ) {
                            
                            if(data == 0){
                                
                                $('#registerarea').hide();
                               
                                $('#installationarea').show();
                                
                                
                                    $.get(APP_URL+"/RegisterClient/store",
                                                 {     lastname      : $('#lastname').val(),
                                                       firstname    : $('#lastname').val(),
                                                       employeecount: $('#employeecount').val(),
                                                       url          : $('#url').val(),
                                                       email          : $('#email').val(),
                                                       key     : $('#password').val()
                                                      


                                             }, function(data, status){
                                                 
                                                 
                                                 if(data ==1){
                                                 
                                                   window.location=  APP_URL+"/ConfirmLogin?msg=success"
                                                 
                                                  }else{
                                                
                                                
                                                   window.location=  APP_URL+"/ConfirmLogin?msg=error"
                                                
                                                }
                      
                      
                                 });
                                
                                
                                
                             }else if(data ==1){
                                
                                
                                $('#loader').hide(); 
                                $('#emailinfo').show();
                                $('#btn-login').show();
                            }else if(data ==2){
                                
                                
                                $('#loader').hide(); 
                                $('#tenantinfo').show();
                                $('#btn-login').show();
                            }
                        });
                         
                      }
          });
        
        
    });
});


    
</script>