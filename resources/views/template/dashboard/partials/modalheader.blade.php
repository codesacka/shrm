<script src="{{ URL::asset('assets/plugins/parsley/parsley.min.js') }}"></script>
 <link  href="{{ URL::asset('assets/plugins/parsley/parsley.css') }}" rel="stylesheet">
  <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
   <script src="{{ URL::asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datepicker/datepicker3.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/css/normalize.css') }}" />
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/css/demo.css') }}" />
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/css/component.css') }}" />

<style>

    select ,label{

        color: #666;
    }
        input[type=file] {

       color:#000;
     }

</style>


 <script>
  $(function () {

        $('.datepicker').datepicker({
           autoclose: true
          });
  });
</script>
