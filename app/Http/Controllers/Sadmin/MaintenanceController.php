<?php
namespace App\Http\Controllers\Sadmin;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Http\Controllers\Controller;
use App\Models\Main\SpiceTenant;
use App\User;
use Ntrust;
use Illuminate\Http\Request;
use App\Models\Main\TenantPayrollProcess;
use App\Models\Pim\SalaryUpload;
use Input;
use DB;
use App\Plugins\PayrollCalculator;

use App\Models\Pim\BenefitHolder;
use App\Models\Pim\DeductionHolder;
use App\Models\Admin\Bank;
use App\Models\Main\DisableReasons;


/**
 * Description of MaintenanceController
 *
 * @author koskei
 */
class MaintenanceController extends Controller{
    //put your code here
    
    
    public function __construct() {
        
         if(\Ntrust::hasRole('superadmin'))
            return  redirect("/accessrightserror");
        
    }
    
    
    public function dashboard(){
        
        
        $unprocessedsalary  = TenantPayrollProcess ::join('tenants','payrollprocessor.tenant','=','tenants.id')
                                ->where('payrollprocessor.status','=',0)
                                ->select('payrollprocessor.*','tenants.name')
                                ->get();
        
        
      return view('maintenance.tenant.dashboard',['title'=>'Dashboard','unprocessedsalary'=>$unprocessedsalary]);  
        
    }
    
    public function tenant(){
        
        
        $tenant =SpiceTenant::all();
        
      return  view ('maintenance.tenant.index',['tenant'=>$tenant,'title'=>'Tenant List','menu'=>'']);
    }
    
    public function edit($id){
       
        
      $tenant = SpiceTenant::find($id);
       
       
        
      return view('sadmin.tenant.edit',['title'=>'Edit Tenant','tenant'=>$tenant,'menu'=>'']);  
        
    }
    
    public function disableaccount($id){
        
        
        
         $tenant = SpiceTenant::find($id);
         
         
         $disablereason  =  DisableReasons::all();
       
       
        
      return view('sadmin.tenant.disableaccount',['disablereason'=>$disablereason,'title'=>'Disable  Tenant Account','tenant'=>$tenant,'menu'=>'']);  
        
        
        
    }
    
    public function tenantdisableupdate($id){
        
        
        SpiceTenant::where('id',$id)->update(['status'=>$request->disablereason]);
        
        
          return redirect()->route('Tenant.index')
                        ->with('success','Tenant Updated successfully');
        
        
    }
    
    
    
    public function update( Request $request, $id)
    {
        //
        
        
        
         $this->validate($request, [    'name'        => 'required',
                                        'identifier' =>  'required',
                                        'schema_server' =>  'required',  
                                        'schema_server_port' =>  'required',
                                        'schema_username' =>  'required', 
                                        'schema_name' =>  'required', 
                                        ]);
             
         $row =new SpiceTenant;
         
         
         
         SpiceTenant::where('id',$id)
                      ->update(['name' => $request->name,
                                'identifier' => $request->identifier,
                                'schema_server_port' => $request->identifier,
                                'schema_username' => $request->identifier,
                                'schema_password' => $request->schema_password,
                                'schema_name' => $request->schema_name,
                                'schema_server' =>$request->schema_server]);
         
         
         
         return redirect()->route('Tenant.index')
                        ->with('success','Tenant Updated successfully');
    }
    
    public function tenantusers(){
        
         // $users = User::where('tenant',Auth::user()->tenant)->orderBy('id','ASC')->get();
        
        $users  =User::join('tenants', 'users.tenant', '=', 'tenants.id')
                       ->select('users.*', 'tenants.identifier')
                       ->orderBy('users.id','DESC')->get();
        
        return view('sadmin.tenant.users.index',['title'=>'Users List','users'=>$users]);  
        
    }
    
    public function tenantsales(Request $request){
        
        
        
        return view('sadmin.tenant.sales.index',['title'=>'Sales List']);  
    }
    
    public function tenantpayroll(Request $request){
        
         $tenantselect = ['' => '']+SpiceTenant::orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
         
         
         $datefrom = Input::get('datefrom');
         
         $dateto   = Input::get('dateto');
         
         $tenant   = Input::get('tenant');
         
         
         $paymentstatus   = Input::get('paymentstatus');
         
              
         
         
         $salaryrow =array();
         
         
         if(!empty($tenant)){
      
             
           $this->DBReconnect2($request,$tenant);
         
         
           $salaryrow  = DB::connection('tenant')->select( DB::raw("SELECT * FROM salary_uploads WHERE date(created_at) >= '$datefrom' and date(created_at) <= '$dateto'") );
                   
                                //select()->where('created_at','>=' ,"'".$datefrom."'")
                                  //    ->where('created_at','<=' ,"'".$dateto."'")
                                    // ->get();
           
        //   print_r($salaryrow);
         
         }
         
         
       
         
         
         
         
         
         
         
        
         return view('sadmin.tenant.payroll.index',['title'=>'Process Payroll','tenant'=> $tenant,'salaryrow'=> $salaryrow,'tenantselect'=>$tenantselect,'paymentstatus'=>array(''=>'',0=>'Unprocessed',1=>'Processed')]);  
        
    }
    
    
    public function tenantpayrollview(Request $request,$tenant,$id){
        
        
        
        $this->DBReconnect2($request,$tenant);
        
        
        
         $emp_data = DB::connection('tenant')
                               ->select( DB::raw("SELECT salary_releases.*,employees.bank,employees.bankbranch,employees.bankaccount, "
                                       . "   employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name "
                                       . "   FROM salary_releases,employees  WHERE uploadid='$id'  and salary_releases.status =0"
                                       . "   and  employees.id = salary_releases.employeeid") );
         
          $salary_data=array();
         
         
          $pcalc  =new PayrollCalculator();
                
          $sy_row  = \App\Models\Admin\Sysprefs::where('name','=','personalrelief')->first();
                
          $personal_relief =$sy_row->value;
                
                
                
         
         foreach($emp_data as $obj){
             
             $salaryemployeeview['id'] = $obj->id;
             
             $salaryemployeeview['name'] = $obj->emp_firstname.'  '.$obj->emp_middle_name.'  '.$obj->emp_lastname;
              
             $salaryemployeeview['amount'] = $obj->amount; 
             
             
             
                     
                  $benefitdata =BenefitHolder::join('salary_benefits','benefit_holders.benefit','=','salary_benefits.id')
                                        ->where('benefit_holders.releaseid',$obj->uploadid)
                                        ->where('benefit_holders.employee', $obj->employeeid)
                                        ->select('salary_benefits.planname','benefit_holders.taxrelief','benefit_holders.amount')->get(); 
                  
                 $deductiondata =DeductionHolder::join('deductions', 'deduction_holders.deduction', '=', 'deductions.id')
                                         ->where('deduction_holders.employee',$obj->employeeid)
                                         ->where('deduction_holders.releaseid',$obj->uploadid)
                                         ->select('deductions.name','deduction_holders.amount')
                                         ->get();
                 
                  
                  $netpay =0;
                  
                  $benefitamount=0;
                  
                  $deductionamount=0;
                  
                  
                  $alloweddeductions=0;
                  
                  $nettaxablepay  =0;
                  
                  $nssf  =0;
                  
                  $nhif =0;
                  $helb=0;
                  
                  
                  foreach($benefitdata as $bobj ){
                      
                      $benefitamount +=$bobj->amount;
                  }
                
                  
                   foreach($deductiondata as $dedobj ){
            
                        $deductionamount +=$dedobj->amount;   


                      }
                  
                  
                $nettaxablepay = $obj->amount - $alloweddeductions;
                
                $paye  = $pcalc->calculatetaxforemployee2($obj->uploadid,$obj->amount);
                
                $nhif  = $pcalc->calculate_nhif_employee2($obj->uploadid,$obj->amount);
        
                $nssf  = $pcalc->calculate_nssf_employee($obj->uploadid);
                
                
                $netpaye  = $paye-$personal_relief;

                $netpay  = ($obj->amount  - $netpaye -$nhif - $nssf -$deductionamount);
                
                
                
                    
                    
                $bankrow  = Bank::find($obj->bank);
                
                
                
                
                 $salaryemployeeview['bankname'] = isset($bankrow->name)  ? $bankrow->name : '';
                 
                 $salaryemployeeview['bankbranch'] = $obj->bankbranch;
                 
                 $salaryemployeeview['bankaccount'] = $obj->bankaccount;
                  
                 $salaryemployeeview['netpay'] = round($netpay);  
                  
             
             array_push($salary_data, $salaryemployeeview);
             
         }
         
        
        
           
         
        
        
       return view('sadmin.tenant.payroll.tenantpayrollview',['title'=>'Process Payroll','tenant'=> $tenant,'id'=>$id,'salary_data'=> $salary_data]);  
        
        
        
    }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ProcesspayrollViewStore(Request $request)
    {
        
        $tenant  = $request->tenant;
        
        $id      = $request->id;
        
        TenantPayrollProcess::where('tenant',$tenant)
                             ->where('uploadid',$id) ->update(['status'=>1]);
        
        
        
        $this->DBReconnect2($request,$tenant);
        
        
          DB::connection('tenant')->select(DB::raw("Update salary_uploads set status=1  where id='$id'"));
        
        
          DB::connection('tenant')->select(DB::raw("Update salary_releases set status=1  where uploadid='$id'"));
          
          
        return redirect()->route('Tenant.payroll')
                        ->with('success','Tenant payroll created successfully');  
        
        
    }
        
        
    
    
}
