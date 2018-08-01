<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>{{ config('app.name', 'SpiceHRM') }}</title>
	
    <!-- css -->
     <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}">
    
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/cubeportfolio/css/cubeportfolio.min.css') }}">
    <link href="{{ URL::asset('assets/css/nivo-lightbox.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" />
    
    
    
    <link href="{{ URL::asset('assets/css/owl.carousel.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ URL::asset('assets/css/owl.theme.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/profile.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dist/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}">

	<!-- boxed bg -->
    <link id="bodybg" href="{{ URL::asset('assets/bodybg/bg1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">
    
    
    
    
	<!-- template skin -->
    <link id="t-colors" href="{{ URL::asset('assets/color/green.css') }}" rel="stylesheet">
    <link id="t-colors" href="{{ URL::asset('assets/plugins/parsley/parsley.css') }}" rel="stylesheet">
       
       
       
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>	 
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    
    
    
    <script src="{{ URL::asset('assets/plugins/blockUI/jquery.blockUI.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/parsley/parsley.min.js') }}"></script>
    
    
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/accordion/css/accordionmenu.css') }}" type="text/css" media="screen" />
    
    
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datepicker/datepicker3.css') }}">
    <style type="text/css">
        .profile-userpic img {
          float: none;
          margin: 0 auto;
          width: 50%;
          height: 50%;
          -webkit-border-radius: 50% !important;
          -moz-border-radius: 50% !important;
          border-radius: 50% !important;
        }
        .CustomScrollbar {
	height: 320px; 
     
    overflow: scroll;

    }
    .validation{
        
        color:red;
        font-size:13px;
    }
    .box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}


#cssmenu > ul,
#cssmenu > ul li,
#cssmenu > ul ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
#cssmenu > ul {
  position: relative;
  z-index: 597;
}
#cssmenu > ul li {
  float: left;
  min-height: 1px;
  line-height: 1.3em;
  vertical-align: middle;
}
#cssmenu > ul li.hover,
#cssmenu > ul li:hover {
  position: relative;
  z-index: 599;
  cursor: default;
}
#cssmenu > ul ul {
  visibility: hidden;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 598;
  width: 100%;
}
#cssmenu > ul ul li {
  float: none;
}
#cssmenu > ul ul ul {
  top: 1px;
  left: 99%;
}
#cssmenu > ul li:hover > ul {
  visibility: visible;
}
/* Align last drop down RTL */
#cssmenu > ul > li.last ul ul {
  left: auto !important;
  right: 99%;
}
#cssmenu > ul > li.last ul {
  left: auto;
  right: 0;
}
#cssmenu > ul > li.last {
  text-align: right;
}
#cssmenu.align-center > ul > li {
  float: none;
  display: inline-block;
}
#cssmenu.align-center > ul {
  text-align: center;
  font-size: 0;
}
#cssmenu > ul > li {
  font-size: 14px;
  display: block;
}
#cssmenu ul ul {
  text-align: left;
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu.align-right > ul ul ul {
  top: 1px;
  left: auto;
  right: 99%;
}
/* Theme Styles */
#cssmenu > ul {
  border-top: 4px solid #65b037;
  font-family: Calibri, Tahoma, Arial, sans-serif;
  background: #1e1e1e;
  background: -moz-linear-gradient(top, #1e1e1e 0%, #040404 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #1e1e1e), color-stop(100%, #040404));
  background: -webkit-linear-gradient(top, #1e1e1e 0%, #040404 100%);
  background: linear-gradient(top, #1e1e1e 0%, #040404 100%);
  width: auto;
  zoom: 1;
}
#cssmenu > ul:before {
  content: '';
  display: block;
}
#cssmenu > ul:after {
  content: '';
  display: table;
  clear: both;
}
#cssmenu > ul li a {
  display: inline-block;
  padding: 10px 22px;
}
#cssmenu > ul > li.active,
#cssmenu > ul > li.active:hover {
  background-color: #65b037;
}
#cssmenu > ul > li > a:link,
#cssmenu > ul > li > a:active,
#cssmenu > ul > li > a:visited {
  color: white;
}
#cssmenu > ul > li > a:hover {
  color: white;
}
#cssmenu > ul ul ul {
  top: 0;
}
#cssmenu > ul li li {
  background-color: white;
  border-bottom: 1px solid #EBEBEB;
  font-size: 13px;
  font-weight: bold;
}
#cssmenu > ul li.hover,
#cssmenu > ul li:hover {
  background-color: #F5F5F5;
}
#cssmenu > ul > li.hover,
#cssmenu > ul > li:hover {
  background-color: #65b037;
  -webkit-box-shadow: inset 0 -3px 0 rgba(0, 0, 0, 0.15);
  -moz-box-shadow: inset 0 -3px 0 rgba(0, 0, 0, 0.15);
  box-shadow: inset 0 -3px 0 rgba(0, 0, 0, 0.15);
}
#cssmenu > ul a:link,
#cssmenu > ul a:visited {
  color: #9A9A9A;
  text-decoration: none;
}
#cssmenu > ul a:hover {
  color: #9A9A9A;
}
#cssmenu > ul a:active {
  color: #9A9A9A;
}
#cssmenu > ul > li > a {
  font-size: 14px;
}
#cssmenu > ul ul {
  border: 1px solid #CCC \9;
  -webkit-box-shadow: 0 0px 2px 1px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 2px 1px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0px 2px 1px rgba(0, 0, 0, 0.15);
  width: 150px;
}
label{
    
    font-weight:bold;
    color:#555; 
}
</style>
  
</head>