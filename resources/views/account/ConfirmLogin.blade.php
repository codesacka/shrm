@extends('layouts.app')

@section('content')
<script src="{{ URL::asset('assets/plugins/jQuery/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}"> 
<link rel="stylesheet" href="{{ URL::asset('account/css/main.css') }}">

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
                     
                     
                       @if ($successmsg ==success)
                        <div class="alert alert-success">
                                <p>Email with Login Details Send to your Email</p>
                        </div>
                      @endif
                      
                       @if ($successmsg ==error)
                        <div class="alert alert-success">
                                <p>Errors During Registration contact the system administrator</p>
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
        
        	
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>



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

<script type="text/javascript">
    $( document ).ready(function() {
        
        $("#hostname" ).keyup(function() {
            
            var strInput =  $("#hostname").val();
                strInput =strInput.toLowerCase();
            $("#hostname").val(strInput);
            
          });
    });
    
    
</script>

@endsection