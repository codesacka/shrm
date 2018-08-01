<!DOCTYPE html>
<html lang="en">

@include('template.dashboard.partials.headerscripts')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


<div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left">   {{ \Config::get('constants.opentime') }}</p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">{{ \Config::get('constants.callnumber') }}</p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('home') }}">
                    <img src="{{ URL::asset('assets/img/logo.png') }}" alt="" width="150" height="40" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">

       @if(Auth::user()->hasRole('employee'))

       <ul class="nav navbar-nav">

      <li><a href="{{ route('Employee.edit',$employee->id) }}"><i class="fa fa-info-circle  icon-success"></i>My Info ({{ Auth::user()->name }})</a></li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-double-down  icon-success"></i>
                                     More <b class="caret"></b></a>
        <ul class="dropdown-menu">

          <li><a href="{{ route('Company.Profile') }}"><i class="fa fa-gear  icon-success"></i>Account </a></li>
         <li>
            <a href="{{ url('/logout') }}"  onclick="event.preventDefault();   document.getElementById('logout-form').submit();" >
          <i class="fa fa-fighter-jet  icon-success"></i>  Sign out</a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                       </form>


                                         </li>

        </ul>
      </li>
      </ul>



       @else
			  <ul class="nav navbar-nav">
				<li class="active"><a href="{{ url('home') }}"><i class="fa fa-bank  icon-success"></i>Home</a></li>
				<li><a href="{{ route('Employee.index') }}"><i class="fa fa-users  icon-success"></i>Employees</a></li>
				<li><a href="{{ route('ProcessPayroll.decision') }}"><i class="fa fa-balance-scale  icon-success"></i>Payroll</a></li>

				<li><a href="{{ route('LeaveType.Policyindex') }}"><i class="fa fa-calendar  icon-success"></i>Leave</a></li>
                                <li><a href="{{ route('Documents.index') }}"><i class="fa fa-folder-open-o  icon-success"></i>Documents</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-double-down  icon-success"></i>
                                      More <b class="caret"></b></a>
				  <ul class="dropdown-menu">
                                     <li><a href="{{ route('BiReport.index') }}"><i class="fa fa-bar-chart  icon-success"></i>Reports</a></li>
				    <li><a href="{{ route('Company.Profile') }}"><i class="fa fa-gear  icon-success"></i>Settings</a></li>
					<li>
                                             <a href="{{ url('/logout') }}"  onclick="event.preventDefault();   document.getElementById('logout-form').submit();" >
                                               <i class="fa fa-fighter-jet  icon-success"></i>  Sign out</a>

                                     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>


                                          </li>

				  </ul>
				</li>
			  </ul>
       @endif





            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>











    @yield('content')












    @include('template.dashboard.partials.footer')











</div>



@include('template.dashboard.partials.footerscripts')

</body>

</html>
