
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
              
              
              
 {!! Form::open(array('route' => 'CompanySettings.store','method'=>'POST','enctype'=>'multipart/form-data', 'class'=>"form-horizontal",'data-parsley-validate')) !!}
                                      
        <div class="grid-block small-12 medium-8 vertical  z-header-container-content">
				
        <div id="ember14604" class="ember-view grid-block shrink z-settingsPage-card paper paper--zDepth-1 u-bumperBottom">
            
          <div class="grid-block vertical u-bumperBottom--md">
              
	  <div class="grid-block shrink u-borderBottom">
		<div class="grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-header">
				<h5>General Information</h5>
			</div>
		</div>
<!---->	</div>
	

	<div id="ember14609" class="ember-view"><div class="grid-block shrink z-settingsPage-card-item u-overflowVisible">
	<!---->
	<div class="small-4 grid-block">
		<div class="grid-content z-settingsPage-card-label">
			Doing Business As (DBA)
		</div>
	</div>
	<div class="small-6 grid-block u-flexCenter u-overflowVisible">
		<div class="grid-content z-settingsPage-card-content u-overflowVisible">
					
							
                  {!! Form::text('dba', $dba, array('placeholder' => 'Doing Business As (DBA)','class' => 'form-control','data-parsley-error-message'=>"DBA is required",'data-parsley-required'=>"true")) !!}
						
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
			Company Website
		</div>
	</div>
	<div class="small-6 grid-block u-flexCenter u-overflowVisible">
		<div class="grid-content z-settingsPage-card-content u-overflowVisible">
						
                    
                    {!! Form::text('company_website', $company_website, array('placeholder' => 'Company Website','class' => 'form-control','data-parsley-error-message'=>"Company Website is required",'data-parsley-required'=>"true")) !!}
                    
		</div>
	</div>
		<div class="small-2 grid-block u-justifyEnd z-companyProfile-action-padding-top">
<!---->					</div>
</div>
</div>
              
              
              
              	<div id="ember14611" class="ember-view"><div class="grid-block shrink z-settingsPage-card-item u-overflowVisible">
	<!---->
	<div class="small-4 grid-block">
		<div class="grid-content z-settingsPage-card-label">
			Legal Name
		</div>
	</div>
	<div class="small-6 grid-block u-flexCenter u-overflowVisible">
		<div class="grid-content z-settingsPage-card-content u-overflowVisible">
						
                    
                    {!! Form::text('legal_name', $legal_name, array('placeholder' => 'Legal Name','class' => 'form-control','data-parsley-error-message'=>"Legal Name is required",'data-parsley-required'=>"true")) !!}
                    
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
				<h5>Contact Information</h5>
			</div>
		</div>
<!---->	</div>
		<div class="grid-block shrink u-borderBottom z-settingsPage-card-item">
		<div class="small-4 grid-block">
			<div class="grid-content z-settingsPage-card-label">
			Mobile Phone
			</div>
		</div>
		<div class="small-8 grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-content">
				 {!! Form::text('mobilephone', $mobilephone, array('placeholder' => 'Mobile Phone','class' => 'form-control' ,'data-parsley-error-message'=>"Mobile Phone Details(Number)  is required",'data-parsley-required'=>"true",'data-parsley-type'=>"number")) !!}
			</div>
		</div>
	</div>
        <div class="grid-block shrink u-borderBottom z-settingsPage-card-item">
		<div class="small-4 grid-block">
			<div class="grid-content z-settingsPage-card-label">
			Telephone
			</div>
		</div>
		<div class="small-8 grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-content">
				  {!! Form::text('telephone', $telephone, array('placeholder' => 'Telephone','class' => 'form-control','data-parsley-error-message'=>"Telephone Details(Number)  is required",'data-parsley-required'=>"true",'data-parsley-type'=>"number")) !!}
			</div>
		</div>
	</div>
        
        <div class="grid-block shrink u-borderBottom z-settingsPage-card-item">
		<div class="small-4 grid-block">
			<div class="grid-content z-settingsPage-card-label">
			Address
			</div>
		</div>
		<div class="small-8 grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-content">
				  {!! Form::textarea('postal_address', $postal_address, array('placeholder' => 'postal address','class' => 'form-control' ,'style'=>'height:100px','data-parsley-error-message'=>"Address is required",'data-parsley-required'=>"true")) !!}
			</div>
		</div>
	</div>

</div>
</div>
                                            
                                            
   <div id="ember14613" class="ember-view grid-block shrink z-settingsPage-card paper paper--zDepth-1 u-bumperBottom">
    <div class="grid-block vertical u-bumperBottom--md">
	<div class="grid-block shrink u-borderBottom">
		<div class="grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-header">
				<h5>Email Contact Information</h5>
			</div>
		</div>
<!---->	</div>
		<div class="grid-block shrink u-borderBottom z-settingsPage-card-item">
		<div class="small-4 grid-block">
			<div class="grid-content z-settingsPage-card-label">
			Primary Admin (Email)
			</div>
		</div>
		<div class="small-8 grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-content">
				 {!! Form::text('primaryadmin', $primaryadmin, array('placeholder' => 'Primary Admin','class' => 'form-control','data-parsley-error-message'=>"Primary Admin is required must be Email",'data-parsley-required'=>"true",'data-parsley-type'=>"email"	 )) !!}
			</div>
		</div>
	</div>
        <div class="grid-block shrink u-borderBottom z-settingsPage-card-item">
		<div class="small-4 grid-block">
			<div class="grid-content z-settingsPage-card-label">
			HR Contact(Email)
			</div>
		</div>
		<div class="small-8 grid-block u-flexCenter">
			<div class="grid-content z-settingsPage-card-content">
				 {!! Form::text('hrcontact', $hrcontact, array('placeholder' => 'HR Contact','class' => 'form-control','data-parsley-error-message'=>"Hr Contact is required and must be a valid email",'data-parsley-required'=>"true",'data-parsley-type'=>"email")) !!}
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