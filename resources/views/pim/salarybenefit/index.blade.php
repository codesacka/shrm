@extends('template.dashboard.layouts')

@section('content')


    	<!-- Section: intro -->
    <section id="intro" class="intro" >

		<div class="intro-content" >



			<div class="container custom-container">
                              @permission('salarybenefit-plan-view')
                           	<div class="row">


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


                              <div class="col-md-12">




                                         <div class="row">




                                             <div class="container">
                                                                <div class="row">
                                                                        <div class="col-sm-12 col-md-12">
                                                                                <div class="wow fadeInUp" data-wow-delay="0.2s">

									<div class="panel-body">

                                                                                  @permission('salarybenefit-plan-add')
    					                                           <div class="panel-heading right col-md-4" style="float:left;">
                                                                                       <div class="tools">
                                                                                           <div class="dropdown">
                                                                                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                                                                          <i class="fa fa-plus"></i>  New Plan
                                                                                        <span class="caret"></span></button>
                                                                                        <ul class="dropdown-menu">
                                                                                              @foreach ($benefits as  $obj)
                                                                                          <li><a href="{{ route('SalaryBenefit.create',$obj->id) }}">{{ $obj->name }}</a></li>
                                                                                             @endforeach
                                                                                        </ul>
                                                                                      </div>

                                                                                   </div>
                                                                                 </div>
    										@endpermission


                                                                                 @permission('salarybenefit-plan-new')
                                                                                 <div class="panel-heading " style="float:right;">
                                                                                       <div class="tools">
                                                                                           <div class="dropdown">
                                                                                               <a class="btn btn-success "  href="{{ route('SalaryBenefit.index') }}" >
                                                                                          <i class="fa fa-gear"></i> Benefit Groups
                                                                                        </a>

                                                                                      </div>

                                                                                   </div>
                                                                                 </div>
    										@endpermission

                                                                          <table  class="table table-bordered table-striped ">
                                                                             <thead>
                                                                                        <tr>
                                                                                                <th>Plan Name</th>

                                                                                                <th></th>


                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @foreach ($benefits as  $obj)
                                                                                                 <tr>
                                                                                                <th>{{ $obj->name }}</th>


                                                                                                <th></th>

                                                                                              </tr>


                                                                                          @foreach($salbenefit as $row)

                                                                                          @if ($row->benefit ==$obj->id)
                                                                                              <tr>
                                                                                                <td>
                                                                                                    <a href="{{ route('SalaryBenefit.edit',$row->id) }}">  {{ $row->planname }}</a>
                                                                                                </td>


                                                                                                <td class="cell-detail">

                                                                                                      @permission('salarybenefit-plan-edit')
                                                                                                <a class="btn btn-xs" href="{{ route('SalaryBenefit.edit',$row->id) }}"><i class="fa fa-pencil icon-success"></i></a>
                                                                                                      @endpermission
                                                                                                      @permission('salarybenefit-plan-delete')
                                                                                                {!! Form::open(['method' => 'DELETE','route' => ['SalaryBenefit.destroy', $row->id],'style'=>'display:inline']) !!}
                                                                                                <button type="submit" class="btn  btn-custom btn-xs" ><i class="fa fa-trash icon-success"></i></button>

                                                                                               {!! Form::close() !!}
                                                                                                 @endpermission

                                                                                                </td>

                                                                                                </tr>
                                                                                             @endif


                                                                                             @endforeach




                                                                                     @endforeach



                                                                            </tbody>
                                                                            <tfoot>
                                                                            <tr>
                                                                               <th>&nbsp;</th>


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
