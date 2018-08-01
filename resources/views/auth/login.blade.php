@extends('layouts.app')

@section('content')
   <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>

<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}"> 
<link rel="stylesheet" href="{{ URL::asset('account/css/main.css') }}">
 <link href="{{ URL::asset('parsley/parsley.css') }}" rel="stylesheet">
 <script src="{{ URL::asset('parsley/parsley.min.js') }}"></script>
    
    

<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-md-12">
                
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
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
                      {!! Form::open(array('route' => 'login','method'=>'POST')) !!}
        	    <div class="form-wrap">
                     <h1>Log In </h1>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">E-Mail Address</label>
                             <input id="email" type="email" class="form-control"  placeholder="E-Mail Address"  name="email" value="{{ old('email') }}"  autofocus>
                        </div>
                        
                         
                        
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        
                       
                         <div class="form-group">
                            
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            
                        </div>
                       
                        
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                   
                     <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
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

@endsection