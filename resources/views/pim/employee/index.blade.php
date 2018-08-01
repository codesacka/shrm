@extends('template.dashboard.layouts')

@section('content')
    <script src="{{ URL::asset('assets/plugins/initial/initial.min.js') }}"></script>
<script>
    $(document).ready(function(){
  $('.profile-pic').initial({width:46,height:46,fontSize:20,fontWeight:400 });
  $('.initial-logo').initial({width:80,height:80});
  })
</script>

    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('employee-view')
                           	<div class="row">




                              <div class="col-md-12">




                                         <div class="row">

						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
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
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-database"></span> {{ $title}} </h3>
									</div>
									<div class="panel-body">

                                                                                     @permission('employee-add')
    					                                           <div class="panel-heading right">
                                                                                       <div class="tools">  <a class="btn btn-success" href="{{ route('Employee.create') }}"> <i class="fa fa-plus"></i></a>

                                                                                   </div>
                                                                        </div>
    										@endpermission

                                                                          <table  class="table borderless table-striped datatable">
                                                                             <thead>
                                                                                       <tr>
                                                                                         <th></th>
                                                                                            <th>First Name</th>
                                                                                            <th>Middle Name</th>
                                                                                            <th>Last Name</th>
                                                                                            <th>Employee ID</th>
                                                                                            <th></th>

                                                                                    </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                               @foreach ($employee as  $obj)
                                                                                                    <tr>
                                                                                                      <td><img class="profile-pic media-object pull-left img-rounded" data-name="{!! $obj->emp_firstname !!}"></td>
                                                                                                      <td>
                                                                                                       <a  href="{{ route('Employee.edit',$obj->id) }}">{{ $obj->emp_firstname }} </a>
                                                                                                      </td>

                                                                                                      <td>
                                                                                                      <a  href="{{ route('Employee.edit',$obj->id) }}">    {{ $obj->emp_middle_name }} </a>
                                                                                                      </td>

                                                                                                      <td>
                                                                                                          {{ $obj->emp_lastname }}
                                                                                                      </td>

                                                                                                      <td>
                                                                                                          {{ $obj->employee_id }}
                                                                                                      </td>
                                                                                    <td class="cell-detail">

                                                                                          @permission('employee-edit')
                                                                                    <a class="btn btn-xs" href="{{ route('Employee.edit',$obj->id) }}"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('employee-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['Employee.destroy', $obj->id],'style'=>'display:inline']) !!}
                                                                                    <button type="submit" class="btn  btn-custom btn-xs" ><i class="fa fa-trash icon-success"></i></button>

                                                                                   {!! Form::close() !!}
                                                                                     @endpermission

                                                                                    </td>

                                                                                  </tr>
                                                                                     @endforeach



                                                                            </tbody>
                                                                            <tfoot>
                                                                            <tr>
                                                                               <th>&nbsp;</th>   <th>&nbsp;</th>
                                                                               <th>&nbsp;</th>

                                                                              <th>&nbsp;</th><th>&nbsp;</th>

                                                                              <th>&nbsp;</th>
                                                                                              </tr>
                                                                            </tfoot>
                                                                          </table>












								</div>
							</div>






						</div>
						</div>
				              </div>




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
