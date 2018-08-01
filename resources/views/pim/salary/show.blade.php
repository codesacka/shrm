@extends('dashboard.layouts.dashboard')


    <!-- Custom Theme Style -->

@section('content')


  <script src="{{ asset('assets/plugins/blockUI/jquery.blockUI.js') }}" type="text/javascript"></script>
  
  <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="{{ URL::asset('assets/plugins/d3/Donut3D.js') }}"></script>
    
    <style>

  
        path.slice{
                stroke-width:2px;
        }
        polyline{
                opacity: .3;
                stroke: black;
                stroke-width: 2px;
                fill: none;
        } 
        svg text.percent{
                fill:white;
                text-anchor:middle;
                font-size:12px;
        }


        
    </style>
 <div class="right_col" role="main">
     
               
  
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
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><b> Gross Pay</b></span>
              <div class="count blue">{{ $emp_data->salaryamount }}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><b> Benefits</b></span>
              <div class="count purple">{{ $benefits  }}</div>
              <span class="count_bottom"> </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><b>PAYE</b></span>
              <div class="count green">{{ $paye }}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><b> NHIF</b></span>
              <div class="count red">{{ $nhif }}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><b>NSSF</b></span>
              <div class="count blue"></div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><b>Deductions</b></span>
              <div class="count green">{{ $deduction  }}</div>
              <span class="count_bottom"></span>
            </div>
          </div>
          

  <div class="row">


          
      
        <div class="col-md-6 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
               
                <div class="x_content">
                  <div class="dashboard-widget-content">
                      <table   width="40%">
                    <tr>
                        <td><b> Gross pay </b> </td><td>  {{ $emp_data->salaryamount }} 
                        </td></tr>
                        <tr>
                        <td><b> Benefits </b> </td><td>  {{ $benefits }} 
                        </td></tr>
                      <tr>
                        <td><b> PAYE </b> </td><td>  {{ $paye }} 
                        </td></tr>
                      
                     <tr>
                        <td><b> NSSF  </b> </td><td>  {{ $nssf }} 
                        </td></tr>
                     
                      <tr>
                        <td><b> NhIF  </b> </td><td>  {{ $nhif }} 
                        </td></tr>
                      
                         <tr>
                        <td><b> Deduction </b> </td><td>  {{ $deduction }} 
                        </td></tr>
                         
                         
                    </table>

                      
                  </div>
                </div>
              </div>
            </div>
      
      
             <div class="col-md-6 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
               
                
                  
                      

                    
                      
                        <div id="chart2"></div>
                      
                    
                  
              
              </div>
            </div>
      
      
 
  </div>
 </div>



            <div class="box-header">
              <h3 class="box-title">Employee Compensation Information History</h3>
              <div class="box-tools">
                <a class="btn btn-primary editbasicinfo" id="" onclick="javascript:addemplcompensation({!! $id !!})">
                <i class="fa fa-plus editbasicinfo"></i>
              </a>
                  
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataspice table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Job title</th>
                  <th>Salary Type</th>
                  <th>Rates</th>
                  <th>Amount</th>
                  <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    
                   @foreach($empsal_row as $row)
                <tr>
                  <td>{{ $row->job_titlesname }}</td>
                  <td>{{ $row->salarytypes }}
                  </td>
                  <td>{{ $row->payrates }}</td>
                  <td>  {{ $row->amount }}</td>
                  <td>   @if($row->active == 1)
                    
                    <small class="label pull-left bg-green">Active </small>
                    
                   @else 
                   
                    <small class="label pull-left bg-red">InActive </small>
                   @endif</td>
                                <td>  <a  id="#"  onclick="javascript:editemplcompensation({!! $row->id !!})">
                     <i class="fa fa-edit" ></i> </td>
                </tr>
               
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>&nbsp;</th>
                 <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                 <th>&nbsp;</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-b -->

        
   
            
            <!-- /.box-body -->
      
        
      
            <!-- /.box-body -->
      
   
    <div class="box-header">
           <h3 class="box-title">Employee Benefits</h3>  
           
           <div class="box-tools">
                <a class="btn btn-primary editbasicinfo" id="" onclick="javascript:addbenefit({!! $id !!})">
                <i class="fa fa-plus editbasicinfo"></i> 
              </a>
                 
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="dataspice table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Tax</th>
                  <th>Amount</th>
                 <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($empben_row as $row)
                <tr>
                  <td>{{ $row->name }} </td>
                  <td>{{ $row->benefitsname }}</td>
                  <td>{{ $row->taxname }}</td>
                  <td> {{ $row->amount }}</td>
                  <td><a href="#" id=""  onclick="javascript:editbenefit({!! $row->id !!})">
                     <i class="fa fa-edit" ></i> 
                      </a></td>
                </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>&nbsp;</th>
                 <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                
                </tr>
                </tfoot>
              </table>
            </div>
    
          <div class="box-header">
               <h3 class="box-title">Employee Deductions</h3>
               
                <div class="box-tools">
                <a class="btn btn-primary editbasicinfo" id="" onclick="javascript:adddeduction({!! $id !!})">
                <i class="fa fa-plus editbasicinfo"></i>
              </a>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="dataspice table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Deduction Name</th>
                  <th>Amount</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                
               @foreach($empded_row as $row)
                <tr>
                  <td>{{ $row->name }} </td>
                  <td>{{ $row->deductionname }}</td>
                  <td> {{ $row->amount }}</td>
                  <td> <a href="#" id=""  onclick="javascript:editdeduction({!! $row->id !!})">
                     <i class="fa fa-edit" ></i> 
                      </a></td>
                </tr>
               @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                   <th>&nbsp;</th>
                 <th>&nbsp;</th>
                  <th>&nbsp;</th>
                   <th>&nbsp;</th>
                </tr>
                </tfoot>
              </table>
            </div>
    
<script>
   
   
var salesData=[
	{label:"Paye", value: {!! $paye !!} ,color:"#3366CC"},
	{label:"Deductions",value: {!! $deduction !!}, color:"#DC3912"},
        {label:"NHIF",value: {!! $nhif !!}, color:"#990099"},
	{label:"NetPay",value: {!! $netpay !!}, color:"#FF9900"},
	
];

var svg = d3.select("#chart2").append("svg").attr("width",700).attr("height",300);

svg.append("g").attr("id","salesDonut");


Donut3D.draw("salesDonut", salesData, 150, 150, 130, 100, 30, 0.4);

	
function changeData(){
	Donut3D.transition("salesDonut", randomData(), 130, 100, 30, 0.4);
	
}

function randomData(){
	return salesData.map(function(d){ 
		return {label:d.label, value:1000*Math.random(), color:d.color};});
}








    function adddeduction(id){
              var APP_URL = {!! json_encode(url('/')) !!}
               
                        
                $.get( APP_URL+'/'+'SalaryDeduction/'+id+'/create', function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: {   border: 'none', 
                            top: '20%',
                            
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                           
                            color: '#fff'  }  }); 
                    
                });
             
  
        
    }
    function editdeduction(id){
              var APP_URL = {!! json_encode(url('/')) !!}
               
                        
                $.get( APP_URL+'/'+'SalaryDeduction/'+id+'/edit', function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: { width: '600px',  padding: '10px',top:'10%' } }); 
                    
                });
             
  
        
    }
    
    
     
    function addbenefit(id){
              var APP_URL = {!! json_encode(url('/')) !!}
               
                        
                $.get( APP_URL+'/'+'SalaryBenefit/'+id+'/create', function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: {   border: 'none', 
                            top: '20%',
                            
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                           
                            color: '#fff'  }  }); 
                    
                });
             
  
        
    }
    function editbenefit(id){
              var APP_URL = {!! json_encode(url('/')) !!}
               
                        
                $.get( APP_URL+'/'+'SalaryBenefit/'+id+'/edit', function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: {   border: 'none', 
                            top: '20%',
                            
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                           
                            color: '#fff'  }  }); 
                    
                });
             
  
        
    }
    
    
    
    
    
   function addemplcompensation(id){
              var APP_URL = {!! json_encode(url('/')) !!}
               
                       
                $.get( APP_URL+'/'+'SalaryDetails/'+id+'/create', function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: {   border: 'none', 
                            top: '20%',
                            
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                           
                            color: '#fff'  } }); 
                    
                });
             
  
        
    }
    
    
    function editemplcompensation(id){
        

             
               
             
               var APP_URL = {!! json_encode(url('/')) !!}
                        
                $.get( APP_URL+"/"+"SalaryDetails/"+id+"/edit", function( data ) {
                    
                 
                     $.blockUI({ message: data,centerX: true, centerY: true, css: {   border: 'none', 
                            top: '20%',
                            
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                           
                            color: '#fff'  }  }); 
                    
                });
             
  
        
    }
 </script>

@endsection
