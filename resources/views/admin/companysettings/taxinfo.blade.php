
@extends('dashboard.companysettings')

@section('content')
     
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
 {!! Form::open(array('route' => 'CompanySettings.taxstore','method'=>'POST','enctype'=>'multipart/form-data', 'class'=>"form-horizontal",'data-parsley-validate')) !!}
        <div class="grid-block small-12 medium-8 vertical  z-header-container-content">
				
        <div id="ember14604" class="ember-view grid-block shrink z-settingsPage-card paper paper--zDepth-1 u-bumperBottom">
            
          <div class="grid-block vertical u-bumperBottom--md">
              
	  <div class="grid-block shrink u-borderBottom">
		<div class="grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-header">
				<h5>Tax  Information</h5>
			</div>
		</div>
<!---->	</div>
	

	<div id="ember14609" class="ember-view"><div class="grid-block shrink z-settingsPage-card-item u-overflowVisible">
	<!---->
	<div class="small-4 grid-block">
		<div class="grid-content z-settingsPage-card-label">
			KRA/Tax  Pin
		</div>
	</div>
	<div class="small-6 grid-block u-flexCenter u-overflowVisible">
		<div class="grid-content z-settingsPage-card-content u-overflowVisible">
					
							
                 {!! Form::text('kra_pin', $kra_pin, array('placeholder' => 'KRA Pin','class' => 'form-control' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
						
		</div>
	</div>
		<div class="small-2 grid-block u-justifyEnd z-companyProfile-action-padding-top">
<!---->		</div>
</div>
</div>

	<div id="ember14611" class="ember-view"><div class="grid-block shrink z-settingsPage-card-item u-overflowVisible">
	<!---->
	<div class="small-4 grid-block">
		<div class="grid-content z-settingsPage-card-label">
			Personal Relief
		</div>
	</div>
	<div class="small-6 grid-block u-flexCenter u-overflowVisible">
		<div class="grid-content z-settingsPage-card-content u-overflowVisible">
						
                    
                   {!! Form::text('personalrelief', $personalrelief, array('placeholder' => 'Personal relief','class' => 'form-control')) !!}
                    
		</div>
	</div>
		<div class="small-2 grid-block u-justifyEnd z-companyProfile-action-padding-top">
<!---->					</div>
</div>
</div>
              
              
      


</div>
</div>

<div id="ember14613" class="ember-view grid-block shrink z-settingsPage-card paper paper--zDepth-1 u-bumperBottom">
    <div class="grid-block vertical u-bumperBottom--md">
	<div class="grid-block shrink u-borderBottom">
		<div class="grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-header">
				<h5>Other Settings</h5>
			</div>
		</div>
<!---->	</div>
	<div class="grid-block shrink u-borderBottom z-settingsPage-card-item">
		<div class="small-4 grid-block">
			<div class="grid-content z-settingsPage-card-label">
			Currency
			</div>
		</div>
		<div class="small-8 grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-content">
				{!! Form::text('currency', $currency, array('placeholder' => 'Currency','class' => 'form-control' ,  'data-date-format'=>'yyyy-mm-dd')) !!}
			</div>
		</div>
	</div>
       <div class="grid-block shrink u-borderBottom z-settingsPage-card-item">
		<div class="small-4 grid-block">
			<div class="grid-content z-settingsPage-card-label">
			
			</div>
		</div>
		<div class="small-8 grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-content">
				<div class="box-footer">
              
                  <div class="form-group row">
                    <div class=" col-sm-10">
                      <button type="submit" class="btn btn-space btn-primary">Save</button>
                      <button type="button" class="btn btn-space btn-default"><a  href="{{ url('dashboard')}}">Cancel</a></button>
                    </div>
                  </div>
        </div>
			</div>
		</div>
	</div>
        
       

</div>
</div>
                                            
                                            
     
            
            
            
</div>
 
  
 {!! Form::close() !!}

 @endsection					