<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">


                                                    	<div class="profile-userpic">
                                                            
                                                  @if(isset($employee->emp_photo))
                                                  <img src="{{ URL::asset('uploads/'.$employee->emp_photo) }}" class="img-responsive" alt="">
                                                  @else
					           <img src="{{ URL::asset('img/photomale.png') }}" class="img-responsive" alt="">
                                                  @endif


				                  </div>
                                   <a class="btn btn-success btn-xs" onclick="javascript:addprofilephoto({!! $employee->id !!})"><i class="fa fa-pencil"></i>edit profile photo</a>



						<ul class="lead-list">
							<li> &nbsp;     </li>

						</ul>
						<div class=" wow bounceIn" data-wow-delay="0.4s">

							<div class="panel-heading-v2 overflow-h">
								<h2 class="heading-xs pull-left">   {{ $employee->emp_firstname.'    '.$employee->emp_middle_name.'  '.$employee->emp_lastname  }} </h2>

							</div>
                                                    	<!--Notification-->
					<div class="panel-heading-v2 overflow-h">
						<h2 class="heading-xs pull-left"><i class="fa fa-address-card-o"></i> Contacts </h2>

					</div>
					<ul class="list-unstyled  margin-bottom-20" data-mcs-theme="minimal-dark">
						<li class="notification">

							<div class="overflow-h">
								<span><i class="fa fa-mobile"></i> {{ $employee->emp_mobile }}</span>

							</div>
						</li>
                                                <li class="notification">

							<div class="overflow-h">
								<span><i class="fa fa-phone"></i> {{ $employee->emp_work_telephone }}</span>

							</div>
						</li>

                                                 <li class="notification">

							<div class="overflow-h">
								<span><i class="fa fa-phone"></i> {{ $employee->emp_hm_telephone }}</span>

							</div>
						</li>

					</ul>

					<!--End Notification-->

					<div class="margin-bottom-50"></div>
						</div>

                                             	<div class=" wow bounceIn" data-wow-delay="0.4s">

                                                    	<!--Notification-->
					<!--<div class="panel-heading-v2 overflow-h">
						<h2 class="heading-xs pull-left"><i class="fa fa-sitemap"></i> Direct Reports </h2>

					</div>-->
					<ul class="list-unstyled  margin-bottom-20" data-mcs-theme="minimal-dark">
						<li class="notification">

							<!--<div class="overflow-h">
								<span><strong>Albert Heller</strong> has sent you email.</span>
								<small>Two minutes ago</small>
							</div>-->
						</li>

					</ul>

					<!--End Notification-->

					<div class="margin-bottom-50"></div>
						</div>






                                                </div>
                                                </div>

																								<script>

									                                      function addprofilephoto(id){

																													var APP_URL = {!! json_encode(url('/')) !!}

																													 $.get( APP_URL+'/'+"Employee/"+id+"/editphoto", function( data ) {


																																$.blockUI({ message: data, css: {
																																			 border: 'none',
																																			 top: '20%',

																																			 '-webkit-border-radius': '10px',
																																			 '-moz-border-radius': '10px',

																																			 color: '#fff'
																																	 } });

																																//$.blockUI({ message: data, css: {  top: '20%', width: '700px;' } });

																													 });


																												}

																							 </script>
