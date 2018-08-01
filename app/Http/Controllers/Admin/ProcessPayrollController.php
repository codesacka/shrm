<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Employee;

use App\Models\Pim\PayeStructure;

use App\Models\Pim\NhifStructure;


use App\Plugins\PayrollCalculator;

use App\Plugins\PdFReport;

use App\Models\Pim\SalaryUpload;

use App\Models\Pim\PayeStructureHolder;

use App\Models\Pim\Nhif_Structureholders;

use App\Models\Pim\Nssf_Structure;

use App\Models\Pim\Nssf_Structureholders;

use App\Models\Pim\SalaryRelease;
use Auth;
use App\Models\Admin\JobTitle;
use App\Models\Pim\BenefitHolder;
use App\Models\Pim\DeductionHolder;
use App\Models\Pim\BenefitGroupEmployee;
use App\Models\Pim\SalaryDeductions;
use App\Models\Admin\Sysprefs;
use App\Models\Main\TenantPayrollProcess;


class ProcessPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $this->DBReconnect($request);

         $salaryreleased =array();

         $slrelease = SalaryRelease::whereYear('created_at', '=', date('Y'))
                      ->whereMonth('created_at', '=', date('m'))->get();

        foreach($slrelease as $obj){

          $salaryreleased[] = $obj->employeeid;
        }



         $employee  =  Employee::join('salaries', 'employees.id', '=', 'salaries.employee_id')
                                 ->where('salaries.active',1)
                                 ->whereNotIn('employees.id',$salaryreleased)
                                 ->select('employees.*')
                                 ->orderBy('employees.id','DESC')
                                 ->get();

         $wagebilltotal =$this->Totalwagebill($request,$data=array());

         $menu  = $this ->topAdmin();

         $empcount  =  Employee::count();

         return view('admin.payroll.index',['nhif'=>$wagebilltotal['nhif'],'paye'=>$wagebilltotal['paye'],'wagebilltotal'=>$wagebilltotal['total'],'employee'=>$employee,'empcount'=>$empcount,'title'=>'Organisation Wagebill Summary(KES)','menu'=>$menu]);


    }

    private function WagebillPdfPrinter($salary=array()){





       // Instanciation of inherited class
        $pdf = new Pdf_Lib('P','mm','A4');
        $pdf->AliasNbPages();
        //$pdf->SetMargins($pdf->left, $pdf->top, $pdf->right);
        for($i=0;$i<20; $i++){
        $columns =array();
        $pdf->AddPage();
        $col =array();
        $col[] = array('text' => '', 'width' => '3', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'PAYSLIP DATE: ', 'width' => '40', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'Date', 'width' => '40', 'height' => '3', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $columns[] = $col;


        $col =array();
        $col[] = array('text' => '', 'width' => '3', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'PAYROLL NO : ', 'width' => '40', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'payrollno', 'width' => '40', 'height' => '3', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $columns[] = $col;

        $col =array();
        $col[] = array('text' => '', 'width' => '3', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'NAME: : ', 'width' => '40', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'name', 'width' => '40', 'height' => '3', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $columns[] = $col;
        $col =array();
        $col[] = array('text' => '', 'width' => '3', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'DESIGNATION : ', 'width' => '40', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'jobtitle', 'width' => '40', 'height' => '3', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $columns[] = $col;

        $col =array();
        $col[] = array('text' => '', 'width' => '3', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'BASIC AMOUNT : ', 'width' => '40', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'monthsalary', 'width' => '40', 'height' => '3', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $columns[] = $col;

        $col =array();
        $col[] = array('text' => '', 'width' => '3', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => 'BENEFITS : ', 'width' => '40', 'height' => '3', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $col[] = array('text' => '', 'width' => '40', 'height' => '3', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '6', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.2', 'linearea' => 'LTBR');
        $columns[] = $col;



         $pdf->WriteTable($columns);


        }






        $pdf->Output();



        exit;


    }


    private function Totalwagebill($request,$data=array()){


        $total=0;
        $paye =0;

        $nhif =0;

        $this->DBReconnect($request);
        $pcalc  =new PayrollCalculator();




        $emp =  Employee::join('salaries', 'employees.id', '=', 'salaries.employee_id')
                                 ->where('salaries.active',1)
                                 ->select('employees.*','salaries.amount as salaryamount')
                                 ->orderBy('employees.id','DESC')
                                 ->get();

        foreach ($emp as $obj){

            $total +=$obj->salaryamount;

            $paye  += $pcalc->calculatetaxforemployee($obj->salaryamount);

            $nhif  += $pcalc->calculate_nhif_employee($obj->salaryamount);
        }

        return array ('total'=>$total,'paye'=>$paye,'nhif'=>$nhif);

    }



    public function PayrollNHIFStructures(){


               $n_struct   = NhifStructure::all();

               return view('admin.payroll.NHIFStructures',['title'=>'NHIF Structure','menu'=>'','n_struct'=>$n_struct]);

    }



    public function PayrollPayeSettings(){


               $p_struct   = PayeStructure::all();

               return view('admin.payroll.payrollpayesettings',['title'=>'Paye Structure','menu'=>'','p_struct'=>$p_struct]);

    }
    public function decision(){



        return view('admin.payroll.decision',['title'=>'Payroll Settings','menu'=>'']);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makedecision(Request $request)
    {
        //

       if($request->wagebillaction ==1){

                return redirect('ProcessPayroll/processSpiceHRPayroll')
                        ->with('success','Employee Documents created successfully');


       }else if($request->wagebillaction ==2){

                return redirect('ProcessPayroll/SelfprocessPayroll')
                        ->with('success','Employee Documents created successfully');


       }


    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function processSpiceHRPayroll(){




         return view('pim.payroll.processSpiceHRPayroll',['title'=>'Process Payroll with Spice HR','menu'=>'']);

    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function SelfprocessPayroll(){




         return view('pim.payroll.SelfprocessPayroll',['title'=>'Self Process Payroll with Spice HR','menu'=>'']);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          $this->DBReconnect($request);



        $sal_hash = md5(microtime(true).rand(1,100));


         $row =new SalaryUpload;

         $row->uploadid =$sal_hash;

         $row->datefrom =$request->datefrom;

         $row->dateto =$request->dateto;

         $row->creator = Auth::user()->id;

         $row->description   =$request->description;

         $row->processor   =$request->processor;

         $row->save();
         
         
         
         $tenantrow  =new TenantPayrollProcess;
         
         $tenantrow->tenant = Auth::user()->tenant;
         
         $tenantrow->uploadid = $row->id;
         
         $tenantrow->status = 0;
         
         $tenantrow->comment = $request->description;
        
         $tenantrow->save();
         
         
         
         
         


         $r_sal = SalaryUpload::where('uploadid',$sal_hash)->first();


         $p_struct    = PayeStructure::all();



         foreach ($p_struct as $struct){

                $p_str_hold  = new  PayeStructureHolder;
                $p_str_hold->low  =$struct->low;
                $p_str_hold->high =$struct->high;
                $p_str_hold->rate =$struct->rate;
                $p_str_hold->releaseid =$r_sal->id;
                $p_str_hold->save();

         }

           $nh_struct =  NhifStructure::all();


         foreach ($nh_struct as $struct){

                $nholder_struct = new Nhif_Structureholders;
                $nholder_struct->low  =$struct->low;
                $nholder_struct->high =$struct->high;
                $nholder_struct->deduction =$struct->deduction;
                $nholder_struct->releaseid =$r_sal->id;
                $nholder_struct->save();

         }

           $ns_struct =  Nssf_Structure::all();


         foreach ($ns_struct as $struct){

                $nsholder_struct = new Nssf_Structureholders;
                $nsholder_struct->low  =$struct->low;
                $nsholder_struct->high =$struct->high;
                $nsholder_struct->tier =$struct->tier;
                $nsholder_struct->releaseid =$r_sal->id;
                $nsholder_struct->save();
         }


        $emp_sal =   Employee::join('salaries', 'employees.id', '=', 'salaries.employee_id')
                                 ->where('salaries.active',1)
                                 ->select('employees.*','salaries.amount as salaryamount')
                                 ->orderBy('employees.id','DESC')
                                 ->get();



         foreach($emp_sal as $row){

          $salreal   =new SalaryRelease;
          $salreal->uploadid = $r_sal->id;
          $salreal->credit_ac =0;
          $salreal->debit_ac  =0;
          $salreal->amount    =$row->salaryamount;
          $salreal->approved  =0;
          $salreal->approvedby =0;
          $salreal->creator    =Auth::user()->id;
          $salreal->employeeid =$row->id;
          $salreal->save();
          
         

          $bgemp =BenefitGroupEmployee::join('salary_benefits','benefit_group_employees.benefitgroup','=','salary_benefits.id')
                                        ->where('salary_benefits.planend','>',date('Y-m-d'))
                                         ->where('employee',$row->id)->get();

           foreach($bgemp as  $bgeemprow){

               $bholder  =new BenefitHolder;

               $bholder->benefit =$bgeemprow->benefitgroup;

               $bholder->employee =$row->id;
               
               $bholder->taxrelief =$bgeemprow->taxrelief;

               $bholder->releaseid = $r_sal->id;

               $bholder->amount = $bgeemprow->amount;
               
               $bholder->save();


           }

          $bgdeduct =SalaryDeductions::join('deductions', 'salary_deductions.deduction', '=', 'deductions.id')
                                          ->join('employees','salary_deductions.employee_id','=','employees.id')
                                           ->where('salary_deductions.payto','>',date('Y-m-d'))
                                           ->where('employees.id',$row->id)
                                           ->select('salary_deductions.*','deductions.name as deductionname',
                                           'employees.emp_firstname','employees.emp_middle_name','employees.emp_lastname')->get();

           foreach($bgdeduct as  $deductrow){

               $dholder  =new DeductionHolder;

               $dholder->deduction =$deductrow->deduction;

               $dholder->employee =$row->id;

               $dholder->releaseid = $r_sal->id;

               $dholder->amount = $deductrow->amount;

               $dholder->save();
           }



         }


        return redirect('ProcessPayroll/'.$r_sal->id.'/ViewProcessedSalaries')
                        ->with('success','Employee Salaries been processed successfully');




    }
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ViewProcessedSalaries(Request $request,$id){

            $this->DBReconnect($request);

            $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->where('salary_releases.uploadid',$id)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid')
                                 ->orderBy('employees.id','DESC')
                                 ->get();


            $saldetrow  =SalaryUpload::find($id);


        return view('pim.payroll.ViewProcessedSalaries',['emp_data'=>$emp_data,'title'=>'Employee Processed Payroll for Period '.$saldetrow['datefrom'].'    to   '.$saldetrow['dateto'],'menu'=>'']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PrintPayslip(Request $request,$id)
    {
        //
        
        $this->DBReconnect($request);
        $salrel_row = SalaryRelease::find($id);

        // print_r($salrel_row);
         
         
        $emp_row   =Employee::find($salrel_row->employeeid);

        $jobtitle_row = JobTitle::find($emp_row->job_title_code);
        
        $pcalc  =new PayrollCalculator();

        $paye  = $pcalc->calculatetaxforemployee2($salrel_row->uploadid,$salrel_row->amount);

        $nhif  = $pcalc->calculate_nhif_employee2($salrel_row->uploadid,$salrel_row->amount);
        
        $nssf  = $pcalc->calculate_nssf_employee($salrel_row->uploadid);


        $sy_row  = \App\Models\Admin\Sysprefs::where('name','=','personalrelief')->first();
        
        $sysall = Sysprefs::all();
        
        
        $benefitdata =BenefitHolder::join('salary_benefits','benefit_holders.benefit','=','salary_benefits.id')
                                        ->where('benefit_holders.releaseid',$salrel_row->uploadid)
                                        ->where('benefit_holders.employee',$salrel_row->employeeid)
                                        ->select('salary_benefits.planname','benefit_holders.taxrelief','benefit_holders.amount')->get();   
        
        $deductiondata =DeductionHolder::join('deductions', 'deduction_holders.deduction', '=', 'deductions.id')
                                         ->where('deduction_holders.employee',$salrel_row->employeeid)
                                         ->where('deduction_holders.releaseid',$salrel_row->uploadid)
                                         ->select('deductions.name','deduction_holders.amount')
                                         ->get();
        
        $personal_relief =$sy_row->value;

        $netpaye  = $paye-$personal_relief;

        $netpay  = ($salrel_row->amount  - $netpaye -$nhif);
        
        $deductionamount=0;
        
        foreach ($sysall as $row){
            
            if($row->name == 'dba'){
            $dba   =$row->value;
            }
            elseif($row->name == 'legal_name'){
            $legal_name   =$row->value;
            }
            elseif($row->name == 'email'){
            $email_info   =$row->value;
            }
            elseif($row->name == 'company_website'){
            $company_website   =$row->value;
            } 
            elseif($row->name == 'primaryadmin'){
            $primaryadmin   =$row->value;
            } 
          
            elseif($row->name == 'hrcontact'){
            $hrcontact   =$row->value;
            } 
            elseif($row->name == 'kra_pin'){
            $kra_pin   =$row->value;
            } 
            elseif($row->name == 'telephone'){
            $telephone   =$row->value;
            } 
            elseif($row->name == 'postal_address'){
            $postal_address   =$row->value;
            } 
            elseif($row->name == 'mobilephone'){
            $mobilephone   =$row->value;
            } 
            
            elseif($row->name == 'personalrelief'){
            $personalrelief   =$row->value;
            } 
             elseif($row->name == 'currency'){
            $currency   =$row->value;
            } 
            elseif($row->name == 'coy_logo'){
              $companylogo   =$row->value;
            }
        }   
        
        //echo $salrel_row->created_at;
       // echo time();
        
       // exit;

        
        $payslip = new PdFReport('A4',$currency);
        /* Header Settings */
        $payslip->setLogo(public_path().'/uploads/nologo.jpg');
        $payslip->setColor("#65b037");
        $payslip->setType("PaySLip");
        $payslip->setReference($id);
        $payslip->setDate(date('M dS ,Y',strtotime($salrel_row->created_at)));
        $payslip->setTime(date('h:i:s A',strtotime($salrel_row->created_at)));
       //  $payslip->setDue(date('M dS ,Y',strtotime('+3 months')));
        $payslip->setFrom(array($legal_name,$postal_address,$telephone.','.$mobilephone,$hrcontact.','.$email_info,$company_website));
        $payslip->setTo(array($emp_row->emp_firstname.' '.$emp_row->emp_middle_name.' '.$emp_row->emp_lastname.'('.$emp_row->employee_id.')',$jobtitle_row->name
                ,$emp_row->emp_mobile,$emp_row->emp_work_email,$kra_pin));
        /* Adding Items in table */
        $payslip->addItem("BASIC AMOUNT","",'','','','',$salrel_row->amount);
        
        if(count($benefitdata)> 0){
            
        $payslip->addItem("BENEFIT","",'','','','','');
        
        foreach($benefitdata as $obj ){
            
          $payslip->addItem($obj->planname,"",'','','',$obj->amount,'');   
        
        
        }
        }
        
        if(count($deductiondata)> 0){
            
        $payslip->addItem("DEDUCTION","",'','','','','');
        
        foreach($deductiondata as $obj ){
            
          $payslip->addItem($obj->name,"",'','','',$obj->amount,'');   
        
          $deductionamount += $obj->amount;
        
        
        }
        }
        
        
        $payslip->addItem("PAYE","",'','','',$paye,'');
        $payslip->addItem("Personal Relief","",'','','',$personal_relief,'');
        $payslip->addItem("NHIF","",'','','',$nhif,'');
        $payslip->addItem("NSSF","",'','','',$nssf,'');
        $payslip->addItem("PAYE DUE","",'','','',$netpaye,'');
        
        /* Add totals */
        $payslip->addTotal("Net Pay",($netpay - $deductionamount),true);
       // $payslip->addTotal("VAT 21%",1986.6);
       // $payslip->addTotal("Total due",11446.6,true);
        /* Set badge */ 
        $payslip->addBadge("Payment Paid");
        /* Add title */
        //$payslip->addTitle("Important Notice");
        /* Add Paragraph */
       // $payslip->addParagraph("No item will be replaced or refunded if you don't have the invoice with you. You can refund within 2 days of purchase.");
        /* Set footer note */
        $payslip->setFooternote($legal_name);
        /* Render */
        $payslip->render('payslip.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */

  
  

 

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
