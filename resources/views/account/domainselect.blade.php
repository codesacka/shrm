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
                 @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul style=" list-style-type: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
        
        	    <div class="form-wrap">
                <h1> Enter your SpiceHRM Domain to login.</h1>
               
                     {!! Form::open(array('route' => 'Domainstore.Login','method'=>'POST')) !!}
                         
                        <div class="input-group">
                            <input type="text" name='hostname' id="hostname" value="{{  Input::old('hostname') }}" class="form-control" placeholder="Domain" aria-describedby="basic-addon2" onkeyup="return forceLower(this);">
                            <span class="input-group-addon" id="basic-addon2">.spicehr.com</span>
                          </div>
                        
                        <div class="checkbox">
                         
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Continue">
                     {!! Form::close() !!}
                   
                    <hr>
        	    </div>
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