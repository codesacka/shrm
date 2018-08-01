@extends('template.dashboard.layouts')
 
@section('content')

    
    	<!-- Section: intro -->
    <section id="intro" class="intro" >
        
		<div class="intro-content" >
                    
                    
                
			<div class="container custom-container">
                              @permission('company-profile')
                           	<div class="row">

                              @include('template.dashboard.menu.sidemenu')
                              
                              
                              <div class="col-md-9">
                                  
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
              
                                  
                                   {!! Form::open(array('route' => 'CompanySettings.store','method'=>'POST','enctype'=>'multipart/form-data','data-parsley-validate')) !!}
                                         <div class="row">
					
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> {{ $title}} </h3>
									</div>
									<div class="panel-body">
					
                                                                          <div id="errormessage"></div>
                                   
    					                   
    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Doing Business As (DBA)</label>
    																
							
                                                                                                        {!! Form::text('dba', $dba, array('placeholder' => 'Doing Business As (DBA)','class' => 'form-control input-md','data-parsley-error-message'=>"DBA is required",'data-parsley-required'=>"true")) !!}
				
                                                                                                        
                                                                                                        <div class="validation" > Error</div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Company Website</label>
                                                                                                        
                                                                                                        
                                                                                                {!! Form::text('company_website', $company_website, array('placeholder' => 'Company Website','class' => 'form-control input-md','data-parsley-error-message'=>"Company Website is required",'data-parsley-required'=>"true")) !!}
                    
    													
                                                                                                   <div class="validation"></div>
    												</div>
    											</div>
    										</div>

    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Legal Name</label>
    													  
                                                                                                       {!! Form::text('legal_name', $legal_name, array('placeholder' => 'Legal Name','class' => 'form-control','data-parsley-error-message'=>"Legal Name is required",'data-parsley-required'=>"true")) !!}
                  
                                                                                   <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Phone number</label>
    													
                                                                                                         {!! Form::text('telephone', $telephone, array('placeholder' => 'Telephone','class' => 'form-control','data-parsley-error-message'=>"Telephone Details(Number)  is required",'data-parsley-required'=>"true",'data-parsley-type'=>"number")) !!}
                                                                                                        
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>
                                                                          
                                                                          
                                                                               
    										<div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Mobile Phone</label>
    													  
                                                                                                      {!! Form::text('mobilephone', $mobilephone, array('placeholder' => 'Mobile Phone','class' => 'form-control' ,'data-parsley-error-message'=>"Mobile Phone Details(Number)  is required",'data-parsley-required'=>"true",'data-parsley-type'=>"number")) !!}
			
                                                                                   <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Primary Admin (Email)</label>
    													 {!! Form::text('primaryadmin', $primaryadmin, array('placeholder' => 'Primary Admin','class' => 'form-control','data-parsley-error-message'=>"Primary Admin is required must be Email",'data-parsley-required'=>"true",'data-parsley-type'=>"email"	 )) !!}
			
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>
                                                                          
                                                                                <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Address</label>
    												{!! Form::textarea('postal_address', $postal_address, array('placeholder' => 'postal address','class' => 'form-control' ,'style'=>'height:100px','data-parsley-error-message'=>"Address is required",'data-parsley-required'=>"true")) !!}
		
                                                                                   <div class="validation"></div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>HR Contact(Email)</label>
    													 {!! Form::text('hrcontact', $hrcontact, array('placeholder' => 'HR Contact','class' => 'form-control','data-parsley-error-message'=>"Hr Contact is required and must be a valid email",'data-parsley-required'=>"true",'data-parsley-type'=>"email")) !!}
			
                                                                                                        <div class="validation"></div>
    												</div>
    											</div>
    										</div>
    										
                                                                                  
    										
    									
    									
								</div>
							</div>	
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> {{ $taxtitle}} </h3>
									</div>
                                                            <div class="panel-body">
                                                                
                                                                <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Kra Pin</label>
    																
							
                                                                                                        {!! Form::text('kra_pin', $kra_pin, array('placeholder' => 'KRA Pin','class' => 'form-control input-md','data-parsley-error-message'=>"KRA Pin is required",'data-parsley-required'=>"true")) !!}
				
                                                                                                        
                                                                                                        <div class="validation" > Error</div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Nhif</label>
                                                                                                        
                                                                                                        
                                                                                                {!! Form::text('nhifpin', $nhifpin, array('placeholder' => 'Nhif Pin','class' => 'form-control input-md','data-parsley-error-message'=>"Nhif Pin is required",'data-parsley-required'=>"true")) !!}
                    
    													
                                                                                                   <div class="validation"></div>
    												</div>
    											</div>
    										</div>
                                                                
                                                                             <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Nssf</label>
    																
							
                                                                                                        {!! Form::text('nssfpin', $nssfpin, array('placeholder' => 'NSSF Pin','class' => 'form-control input-md','data-parsley-error-message'=>"NSSF Pin is required",'data-parsley-required'=>"true")) !!}
				
                                                                                                        
                                                                                                        <div class="validation" > Error</div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
                                                                                                    
                                                                                                    	<label>Personal Relief</label>
    																
							
                                                                                                        {!! Form::text('personalrelief', $personalrelief, array('placeholder' => 'Personal Relief','class' => 'form-control input-md','data-parsley-error-message'=>"Personal Relief is required",'data-parsley-required'=>"true")) !!}
				
    													
    												</div>
    											</div>
    										</div>
                                                                
                                                                
                                                                
                                                                
                                                                         <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Currency</label>
    																
							
                                                                                                        {!! Form::text('currency', $currency, array('placeholder' => 'Currency','class' => 'form-control input-md','data-parsley-error-message'=>"Currency is required",'data-parsley-required'=>"true")) !!}
				
                                                                                                        
                                                                                                        <div class="validation" > Error</div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
                                                                                                    
                                                                                                    
    													
    												</div>
    											</div>
    										</div>
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                    
                                                    
                                                    	<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> {{ $leavetitle}} </h3>
									</div>
                                                            <div class="panel-body">
                                                                
                                                                <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Maximum Maternity Leave</label>
    																
							
                                                                                                        {!! Form::text('maternityleave', $maternityleave, array('placeholder' => 'KRA Pin','class' => 'form-control input-md','data-parsley-error-message'=>"Maternity Leave is required",'data-parsley-required'=>"true")) !!}
				
                                                                                                        
                                                                                                        <div class="validation" > </div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Maximum Annual Leave</label>
                                                                                                        
                                                                                                        
                                                                                                {!! Form::text('annualleave', $annualleave, array('placeholder' => 'Annual Leave','class' => 'form-control input-md','data-parsley-error-message'=>"Annual Leave is required",'data-parsley-required'=>"true")) !!}
                    
    													
                                                                                                   <div class="validation"></div>
    												</div>
    											</div>
    										</div>
                                                                
                                                                             <div class="row">
    											<div class="col-xs-6 col-sm-6 col-md-6">
    												<div class="form-group">
    													<label>Maximum Sick leave</label>
    																
							
                                                                                                        {!! Form::text('sickleave', $sickleave, array('placeholder' => 'Sick Leave','class' => 'form-control input-md','data-parsley-error-message'=>"Sick Leave is required",'data-parsley-required'=>"true")) !!}
				
                                                                                                        
                                                                                                        <div class="validation" > Error</div>
    												</div>
    											</div>
    											<div class="col-xs-6 col-sm-6 col-md-6">
    											
    											</div>
    										</div>
                                                                
                                                                
                                                                
                                                                
                                                                        
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group row col-sm-3">
    										      <button type="submit"  class="btn btn-skin btn-block btn-lg ">
                                                                                     Save
                                                                                    </button>
                                                                                  </div>
                                                    
                                                    
						</div>
						</div>
				              </div>
                                   
                                {!! Form::close() !!}
                                  
                                  
                              </div>
                              
                              
                              
                                </div>
                              
                              {{ Form::hidden('permission', '1', array('id' => 'permission')) }}    
                              
                              @endpermission
			</div>
		</div>		
    </section>
<script>   
    $(document).ready(function() { 
        var permission = $('#permission').val();
     if (permission == null){
        $.blockUI({message:'You are not allowed to view this page' , css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#fff', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#FF0000' 
        } }); 
       }
 
       // setTimeout($.unblockUI, 2000); 

    }); 
  </script>

 @endsection