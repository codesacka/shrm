<?php

namespace App\Http\Controllers\BI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pim\Employee;
use DB;
use Input;
use PHPExcel; 
use PHPExcel_IOFactory;
use App\Models\Admin\Sysprefs;

use App\Plugins\PayrollCalculator;
use App\Models\Pim\BenefitHolder;
use App\Models\Pim\DeductionHolder;

use App\Models\Leave\AssignLeave;

use  App\Models\Admin\Bank;

use App\Models\Pim\SalaryUpload;


class BiController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('reports.reportlist',['title'=>'Report List','menu'=>'']);
    }

    
      /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function BIEmployeePayslips(Request $request)
    {
        //
           $this->DBReconnect($request); 
        
            $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
            
            
            
        return view('reports.payslip.paysliplist',['title'=>'Report List','menu'=>'','emp_data'=>$emp_data,]);
    }
      /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    
    public function PayslipBIEmployeePayslip(Request $request){
        
        
            $this->DBReconnect($request); 
        
           $employee = ['' => ''] +  Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name,  employees.id"))
                                 ->orderBy('employees.id','DESC')
                                 ->pluck('name', 'id')
                                 ->all();
            
                     /* $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();*/
            
            
            
        return view('reports.payslip.payslipfilter',['title'=>'Report List','menu'=>'','employee'=>$employee,]);
        
        
    }
    
    public function NhifBIEmployeePayslip(Request $request){
        
        
            $this->DBReconnect($request); 
        
           $employee = ['' => ''] +  Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name,  employees.id"))
                                 ->orderBy('employees.id','DESC')
                                 ->pluck('name', 'id')
                                 ->all();
            
                     /* $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();*/
            
            
            
        return view('reports.payslip.nhiffilter',['title'=>'Report List','menu'=>'','employee'=>$employee,]);
        
        
    }
    
    public function NSSfBIEmployeePayslip(Request $request){
        
        
            $this->DBReconnect($request); 
        
           $employee = ['' => ''] +  Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name,  employees.id"))
                                 ->orderBy('employees.id','DESC')
                                 ->pluck('name', 'id')
                                 ->all();
            
                     /* $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();*/
            
            
            
        return view('reports.payslip.nssffilter',['title'=>'Report List','menu'=>'','employee'=>$employee,]);
        
        
    }
    
    
      public function KRAP10report(Request $request){
        
        
            $this->DBReconnect($request); 
        
          
            
            
            
        return view('reports.payslip.krap10filter',['title'=>'KRA p10 Report List']);
        
        
    }
    
    
    public function PayslipKRAP10Report(Request $request){
        
        
        
         $this->DBReconnect($request);
         
         $datefrom =Input::get('datefrom');
        
         $dateto =Input::get('dateto');
         
         $datedata = explode('-',$datefrom);
         
         
          // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("Spice HRM")
                                                                         ->setLastModifiedBy("Spice HRM")
                                                                         ->setTitle("Office 2007 XLSX P10_return Report Download")
                                                                         ->setSubject("Office 2007 XLSX P10_return Report Download")
                                                                         ->setDescription(" Office 2007 XLSX")
                                                                         ->setKeywords("office 2007 openxml php")
                                                                         ->setCategory("P10_return Report Download");
  
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'EMPLOYER CODE')
                            ->setCellValue('A2', 'EMPLOYER NAME')
                            ->setCellValue('A3', 'MONTH OF CONTRIBUTION');
                
          
                


                
                 $sysall = Sysprefs::all();
                 
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
                        elseif($row->name == 'nhifpin'){
                          $nhifpin   =$row->value;
                        }
                        elseif($row->name == 'nssfpin'){
                          $nssfpin   =$row->value;
                        }
                    } 
                    
                                 
                
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('B1',$nhifpin)
                            ->setCellValue('B2', $legal_name)
                            ->setCellValue('B3',$datedata[0].'-'.$datedata[1]);
                           
               				

               
               
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A5', 'Kra pin')
                            ->setCellValue('B5', 'First Name')
                            ->setCellValue('C5', 'Middle Name')
                            ->setCellValue('D5', 'Last Name')
                            ->setCellValue('E5', 'Id Number')
                          
                            ->setCellValue('G5', 'GrossPay')
                            ->setCellValue('H5', 'Benefits')
                            ->setCellValue('I5', 'Tax relief')
                            ->setCellValue('J5', 'Paye')
                            ->setCellValue('K5', 'Paye after Relief');
                
                
                
                
                
                
                $i=6;
                   
                $pcalc  =new PayrollCalculator();
                
                $sy_row  = \App\Models\Admin\Sysprefs::where('name','=','personalrelief')->first();
                
                $personal_relief =$sy_row->value;
                 
                 
                
                $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->whereDate('salary_releases.created_at','>=',$datefrom)
                                 ->whereDate('salary_releases.created_at','<=',$dateto)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.employeeid as employeeid','salary_releases.id as salaryid','salary_releases.uploadid as 	uploadid')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
                
                foreach($emp_data as $obj){
                    
                  
                  $benefitdata =BenefitHolder::join('salary_benefits','benefit_holders.benefit','=','salary_benefits.id')
                                        ->where('benefit_holders.releaseid',$obj->uploadid)
                                        ->where('benefit_holders.employee', $obj->employeeid)
                                        ->select('salary_benefits.planname','benefit_holders.taxrelief','benefit_holders.amount')->get(); 
                  
                  
                  $benefitamount=0;
                  
                  foreach($benefitdata as $bobj ){
                      
                      $benefitamount +=$bobj->amount;
                  }
                

                $paye  = $pcalc->calculatetaxforemployee2($obj->uploadid,$obj->salaryamount);
                 
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i, $obj->krataxPin)
                            ->setCellValue('B'.$i, $obj->emp_firstname)
                            ->setCellValue('C'.$i, $obj->emp_middle_name)
                            ->setCellValue('D'.$i, $obj->emp_lastname)
                            ->setCellValue('E'.$i, $obj->employee_id)
                            
                            ->setCellValue('G'.$i, $obj->salaryamount)
                            ->setCellValue('H'.$i, $benefitamount)
                            ->setCellValue('I'.$i, $personal_relief)
                            ->setCellValue('J'.$i, $paye) 
                            ->setCellValue('K'.$i, ($paye-$personal_relief));
                $i++;
                
                }
                
                
         
                // Rename worksheet
                $objPHPExcel->getActiveSheet()->setTitle('Payments Download');


                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $objPHPExcel->setActiveSheetIndex(0);


                // Redirect output to a client’s web browser (Excel5)
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="P10_return.xls"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');
                exit;
        
    }
    
    
      
    public function PayslipMonthlyPayrollSummaryReport(Request $request){
        
        $this->DBReconnect($request);
         
         $datefrom =Input::get('datefrom');
        
         $dateto =Input::get('dateto');
         
         $datedata = explode('-',$datefrom);
         
         
          // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("Spice HRM")
                                                                         ->setLastModifiedBy("Spice HRM")
                                                                         ->setTitle("Office 2007 XLSX P10_return Report Download")
                                                                         ->setSubject("Office 2007 XLSX P10_return Report Download")
                                                                         ->setDescription(" Office 2007 XLSX")
                                                                         ->setKeywords("office 2007 openxml php")
                                                                         ->setCategory("P10_return Report Download");
  
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'EMPLOYER CODE')
                            ->setCellValue('A2', 'EMPLOYER NAME')
                            ->setCellValue('A3', 'MONTH OF CONTRIBUTION');
                
          
                


                
                 $sysall = Sysprefs::all();
                 
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
                        elseif($row->name == 'nhifpin'){
                          $nhifpin   =$row->value;
                        }
                        elseif($row->name == 'nssfpin'){
                          $nssfpin   =$row->value;
                        }
                    } 
                    
                                 
                
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('B1',$nhifpin)
                            ->setCellValue('B2', $legal_name)
                            ->setCellValue('B3',$datedata[0].'-'.$datedata[1]);
                           
               				

               
               
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A5', 'Kra pin')
                            ->setCellValue('B5', 'First Name')
                            ->setCellValue('C5', 'Middle Name')
                            ->setCellValue('D5', 'Last Name')
                            ->setCellValue('E5', 'Id Number')
                          
                            ->setCellValue('G5', 'BasicPay')
                            ->setCellValue('H5', 'GrossPay')
                            ->setCellValue('I5', 'Benefits')
                            ->setCellValue('J5', 'Taxable Pay')
                            ->setCellValue('K5', 'Allowed Deductions')
                            ->setCellValue('L5', 'Net Taxable Pay')
                            ->setCellValue('M5', 'Personal Relief')
                            ->setCellValue('N5', 'PAYE')
                            ->setCellValue('O5', 'NSSF')
                            ->setCellValue('P5', 'NHIF')
                            ->setCellValue('Q5', 'Other Dedcutions')
                            ->setCellValue('R5', 'Net Pay');
                
                
                
                
                
                
                $i=6;
                   
                $pcalc  =new PayrollCalculator();
                
                $sy_row  = \App\Models\Admin\Sysprefs::where('name','=','personalrelief')->first();
                
                $personal_relief =$sy_row->value;
                 
                 
                
                $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->whereDate('salary_releases.created_at','>=',$datefrom)
                                 ->whereDate('salary_releases.created_at','<=',$dateto)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.employeeid as employeeid','salary_releases.id as salaryid','salary_releases.uploadid as 	uploadid')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
                
                
                
                
                foreach($emp_data as $obj){
                    
                  
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
                  
                  
                $nettaxablepay = $obj->salaryamount - $alloweddeductions;
                
                $paye  = $pcalc->calculatetaxforemployee2($obj->uploadid,$obj->salaryamount);
                
                $nhif  = $pcalc->calculate_nhif_employee2($obj->uploadid,$obj->salaryamount);
        
                $nssf  = $pcalc->calculate_nssf_employee($obj->uploadid);
                
                
                $netpaye  = $paye-$personal_relief;

                $netpay  = ($obj->salaryamount  - $netpaye -$nhif - $nssf -$deductionamount);
        
        
                 
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i, $obj->krataxPin)
                            ->setCellValue('B'.$i, $obj->emp_firstname)
                            ->setCellValue('C'.$i, $obj->emp_middle_name)
                            ->setCellValue('D'.$i, $obj->emp_lastname)
                            ->setCellValue('E'.$i, $obj->employee_id)
                            
                            ->setCellValue('G'.$i, $obj->salaryamount)
                            ->setCellValue('H'.$i, $obj->salaryamount)
                            ->setCellValue('I'.$i, $benefitamount)
                            ->setCellValue('J'.$i, $obj->salaryamount)
                            ->setCellValue('K'.$i, $alloweddeductions)
                            ->setCellValue('L'.$i, $nettaxablepay)
                            ->setCellValue('M'.$i, $personal_relief)
                            ->setCellValue('N'.$i, $paye)
                            ->setCellValue('O'.$i, $nssf)
                            ->setCellValue('P'.$i, $nhif)
                            ->setCellValue('Q'.$i, $deductionamount)
                            ->setCellValue('R'.$i, $netpay);
                $i++;
                
                }
                
                
         
                // Rename worksheet
                $objPHPExcel->getActiveSheet()->setTitle('Payments Download');


                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $objPHPExcel->setActiveSheetIndex(0);


                // Redirect output to a client’s web browser (Excel5)
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="P10_return.xls"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');
                exit;

        
    }
    
    
    public function BiLeaveChart(Request $request){
        
        
           $this->DBReconnect($request); 
           
           
           $events = array();

           $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name',
                                            'employees.emp_lastname','employees.emp_lastname','assign_leaves.id',
                                            'leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();

            foreach ($assignleave as $obj){
                $e = array();
                $e['id'] = $obj->id;
                $e['title'] = $obj->emp_firstname.'  '. $obj->emp_middle_name;
                $e['start'] = $obj->fromdate;
                $e['end'] = $obj->todate;
                $allday = ($obj->duration == 1) ? true : false;
                $e['allDay'] = $allday;

                $e[' backgroundColor']= "#f56954"; //red
                $e[' borderColor']=  "#f56954"; //red
                array_push($events, $e);
             }
        
       //  print_r($events);
         
      //   echo json_encode($events);
         
        // exit;
         
         
        return view('reports.leave.leavechart',['title'=>'Leave Calendar','events'=>json_encode($events)]);
        
    }
    
    
    public function MonthlyPayrollSummaryReports(Request $request){
        
        
        
           $this->DBReconnect($request); 
        
          
            
            
            
        return view('reports.payslip.monthlypayrollsummary',['title'=>'Monthly Payroll Summary  Report List']);
        
    }
    
    public function NetPayBankRegisterreport(Request  $request){
        
        
        
        $this->DBReconnect($request); 
        
          
            
            
            
        return view('reports.payslip.netpaybankregisterreportfilter',['title'=>'Net PayBank Register  Report List']);
        
    }
 
    public function BiLeaveReports(Request $request){
        
        
        
            $this->DBReconnect($request); 
        
           /*$employee = ['' => ''] +  Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name,  employees.id"))
                                 ->orderBy('employees.id','DESC')
                                 ->pluck('name', 'id')
                                 ->all();*/
            
           $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
        
        return view('reports.leave.leavereportfilter',['title'=>'Employee Leave Individual Filter Reports','employee'=>$employee]);
    }
    
    
    public function LeaveIndividualReport(Request $request){
        
           $this->DBReconnect($request);
           
          
           $events = array();
           
           $datefrom =Input::get('datefrom');
        
           $dateto   =Input::get('dateto');
           
           $employee =Input::get('employee');

           $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                    ->where('employees.id','=',$employee)
                                    ->whereDate('assign_leaves.fromdate', '>', $datefrom)
                                    ->whereDate('assign_leaves.todate', '<', $dateto)
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name',
                                            'employees.emp_lastname','employees.emp_lastname','assign_leaves.id',
                                            'leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();

            foreach ($assignleave as $obj){
                $e = array();
                $e['id'] = $obj->id;
                $e['title'] = $obj->emp_firstname.'  '. $obj->emp_middle_name;
                $e['start'] = $obj->fromdate;
                $e['end'] = $obj->todate;
                $allday = ($obj->duration == 1) ? true : false;
                $e['allDay'] = $allday;
                $e['reasons'] = $obj->comment;
                $e[' backgroundColor']= "#f56954"; //red
                $e[' borderColor']=  "#f56954"; //red
                array_push($events, $e);
             }
             
            // print_r($events);
             
             
          return view('reports.leave.leavereports',['title'=>'Leave Reports','events'=>$events]);
        
        
    }
    
    public function PayslipNetBankRegisterReport(Request $request){
        
       
        
           $this->DBReconnect($request);
         
         $datefrom =Input::get('datefrom');
        
         $dateto =Input::get('dateto');
         
         $datedata = explode('-',$datefrom);
         
         
          // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("Spice HRM")
                                                                         ->setLastModifiedBy("Spice HRM")
                                                                         ->setTitle("Office 2007 XLSX Net Pay Bank Register Report Download")
                                                                         ->setSubject("Office 2007 XLSX Net Pay Bank Register Report Download")
                                                                         ->setDescription(" Office 2007 XLSX")
                                                                         ->setKeywords("office 2007 openxml php")
                                                                         ->setCategory("NHIF Report Download");
  
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'EMPLOYER CODE')
                            ->setCellValue('A2', 'EMPLOYER NAME')
                            ->setCellValue('A3', 'MONTH OF PAYMENT');
                
          
                


                
                 $sysall = Sysprefs::all();
                 
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
                        elseif($row->name == 'nhifpin'){
                          $nhifpin   =$row->value;
                        }
                        elseif($row->name == 'nssfpin'){
                          $nssfpin   =$row->value;
                        }
                    } 
                    
                                 
                
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('B1',$nhifpin)
                            ->setCellValue('B2', $legal_name)
                            ->setCellValue('B3',$datedata[0].'-'.$datedata[1]);
                           
               				

               
               
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A5', 'PAYROLL NO')
                           
                            ->setCellValue('B5', 'FIRST NAME')
                            ->setCellValue('C5', 'MIDDLE NAME')
                            ->setCellValue('D5', 'LAST NAME')
                            ->setCellValue('E5', 'ID NO')
                            ->setCellValue('F5', 'BANK NAME')
                            ->setCellValue('G5', 'BANK BRANCH')
                            ->setCellValue('H5', 'ACCOUNT NO')
                            ->setCellValue('I5', 'AMOUNT');
                
                
                
                
                
                
                $i=6;
                
                $pcalc  =new PayrollCalculator();
                
                $sy_row  = \App\Models\Admin\Sysprefs::where('name','=','personalrelief')->first();
                
                $personal_relief =$sy_row->value;
                
                
                $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->whereDate('salary_releases.created_at','>=',$datefrom)
                                 ->whereDate('salary_releases.created_at','<=',$dateto)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid','salary_releases.uploadid as uploadid')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
                
                foreach($emp_data as $obj){
                    
                    
                    
                    
                         
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
                  
                  
                $nettaxablepay = $obj->salaryamount - $alloweddeductions;
                
                $paye  = $pcalc->calculatetaxforemployee2($obj->uploadid,$obj->salaryamount);
                
                $nhif  = $pcalc->calculate_nhif_employee2($obj->uploadid,$obj->salaryamount);
        
                $nssf  = $pcalc->calculate_nssf_employee($obj->uploadid);
                
                
                $netpaye  = $paye-$personal_relief;

                $netpay  = ($obj->salaryamount  - $netpaye -$nhif - $nssf -$deductionamount);
                
                
                
                    
                    
                $bankrow  = Bank::find($obj->bank);
                 
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i, $obj->salaryid)
                           
                            ->setCellValue('B'.$i, $obj->emp_firstname)
                            ->setCellValue('C'.$i, $obj->emp_middle_name)
                            ->setCellValue('D'.$i, $obj->emp_lastname)
                            ->setCellValue('E'.$i, $obj->employee_id)
                            ->setCellValue('F'.$i, isset($bankrow->name)  ? $bankrow->name : '')
                            ->setCellValue('G'.$i, $obj->bankbranch)
                            ->setCellValue('H'.$i, $obj->bankaccount)
                            ->setCellValue('I'.$i, round($netpay));
                $i++;
                
                }
                
                
               
                // Rename worksheet
                $objPHPExcel->getActiveSheet()->setTitle('Net Pay Bank Register Download');


                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $objPHPExcel->setActiveSheetIndex(0);


                // Redirect output to a client’s web browser (Excel5)
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="NetPayBankRegister.xls"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');
                exit;

                
                
        
        
    }
    
    public function PayslipNhifReport(Request $request){
        
         $this->DBReconnect($request);
         
         $datefrom =Input::get('datefrom');
        
         $dateto =Input::get('dateto');
         
         $datedata = explode('-',$datefrom);
         
         
          // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("Spice HRM")
                                                                         ->setLastModifiedBy("Spice HRM")
                                                                         ->setTitle("Office 2007 XLSX NHIF Report Download")
                                                                         ->setSubject("Office 2007 XLSX NHIF Report Download")
                                                                         ->setDescription(" Office 2007 XLSX")
                                                                         ->setKeywords("office 2007 openxml php")
                                                                         ->setCategory("NHIF Report Download");
  
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'EMPLOYER CODE')
                            ->setCellValue('A2', 'EMPLOYER NAME')
                            ->setCellValue('A3', 'MONTH OF CONTRIBUTION');
                
          
                


                
                 $sysall = Sysprefs::all();
                 
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
                        elseif($row->name == 'nhifpin'){
                          $nhifpin   =$row->value;
                        }
                        elseif($row->name == 'nssfpin'){
                          $nssfpin   =$row->value;
                        }
                    } 
                    
                                 
                
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('B1',$nhifpin)
                            ->setCellValue('B2', $legal_name)
                            ->setCellValue('B3',$datedata[0].'-'.$datedata[1]);
                           
               				

               
               
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A5', 'PAYROLL NO')
                           
                            ->setCellValue('B5', 'FIRST NAME')
                            ->setCellValue('C5', 'MIDDLE NAME')
                            ->setCellValue('D5', 'LAST NAME')
                            ->setCellValue('E5', 'ID NO')
                            ->setCellValue('F5', 'NHIF NO')
                            ->setCellValue('G5', 'AMOUNT');
                
                
                
                
                
                
                $i=6;
                
                
                $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->whereDate('salary_releases.created_at','>=',$datefrom)
                                 ->whereDate('salary_releases.created_at','<=',$dateto)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
                
                foreach($emp_data as $obj){
                 
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i, $obj->salaryid)
                           
                            ->setCellValue('B'.$i, $obj->emp_firstname)
                            ->setCellValue('C'.$i, $obj->emp_middle_name)
                            ->setCellValue('D'.$i, $obj->emp_lastname)
                            ->setCellValue('E'.$i, $obj->employee_id)
                            ->setCellValue('F'.$i, 'NHIF NO')
                            ->setCellValue('G'.$i, 'AMOUNT');
                $i++;
                
                }
                
                
               /* $paymentdet =DB::table('paymentdetails')
                             ->where('paymentid', $id)
                             ->get();
                
                
                
                
                // Miscellaneous glyphs, UTF-8
                $i=2;
                
                foreach($paymentdet as $pdet){
                    
                    
                $objPHPExcel->setActiveSheetIndex(0)
                        
                            ->setCellValue('A'.$i, $pdet->number)
                            ->setCellValue('B'.$i, $pdet->name)
                            ->setCellValue('C'.$i, $pdet->amount)
                            ->setCellValue('D'.$i, $pdet->description);
                $i++;
                
                }*/

                // Rename worksheet
                $objPHPExcel->getActiveSheet()->setTitle('Payments Download');


                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $objPHPExcel->setActiveSheetIndex(0);


                // Redirect output to a client’s web browser (Excel5)
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="NHIFReport.xls"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');
                exit;

         

        
    }
    
    public function PayslipNssfReport(Request $request){
        
         $this->DBReconnect($request);
         
         $datefrom =Input::get('datefrom');
        
         $dateto =Input::get('dateto');
         
         $datedata = explode('-',$datefrom);
         
         
         $pcalc  =new PayrollCalculator();
         
          // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("Spice HRM")
                                                                         ->setLastModifiedBy("Spice HRM")
                                                                         ->setTitle("Office 2007 XLSX NSSF Report Download")
                                                                         ->setSubject("Office 2007 XLSX NSSF Report  Download")
                                                                         ->setDescription(" Office 2007 XLSX")
                                                                         ->setKeywords("office 2007 openxml php")
                                                                         ->setCategory("NSSF Report  Download");
  
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'EMPLOYER CODE')
                            ->setCellValue('A2', 'EMPLOYER NAME')
                            ->setCellValue('A3', 'MONTH OF CONTRIBUTION');
                
          
                


                
                 $sysall = Sysprefs::all();
                 
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
                        elseif($row->name == 'nhifpin'){
                          $nhifpin   =$row->value;
                        }
                        elseif($row->name == 'nssfpin'){
                          $nssfpin   =$row->value;
                        }
                    } 
                    
                                 
                
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('B1',$nhifpin)
                            ->setCellValue('B2', $legal_name)
                            ->setCellValue('B3',$datedata[0].'-'.$datedata[1]);
                           
               				

               
               
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A5', 'PAYROLL NO')
                           
                            ->setCellValue('B5', 'FIRST NAME')
                            ->setCellValue('C5', 'MIDDLE NAME')
                            ->setCellValue('D5', 'LAST NAME')
                            ->setCellValue('E5', 'ID NO')
                            ->setCellValue('F5', 'NSSF NO')
                            ->setCellValue('G5', 'AMOUNT');
                
                
                
                
                
                
                $i=6;
                
                
                $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->whereDate('salary_releases.created_at','>=',$datefrom)
                                 ->whereDate('salary_releases.created_at','<=',$dateto)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid','salary_releases.uploadid as uploadid')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
                
                foreach($emp_data as $obj){
                    
                     $nssfamount  = $pcalc->calculate_nssf_employee($obj->uploadid);
                 
                     $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i, $obj->salaryid)
                           
                            ->setCellValue('B'.$i, $obj->emp_firstname)
                            ->setCellValue('C'.$i, $obj->emp_middle_name)
                            ->setCellValue('D'.$i, $obj->emp_lastname)
                            ->setCellValue('E'.$i, $obj->employee_id)
                            ->setCellValue('F'.$i, $obj->nssf)
                            ->setCellValue('G'.$i, $nssfamount);
                $i++;
                
                }
                
                
               /* $paymentdet =DB::table('paymentdetails')
                             ->where('paymentid', $id)
                             ->get();
                
                
                
                
                // Miscellaneous glyphs, UTF-8
                $i=2;
                
                foreach($paymentdet as $pdet){
                    
                    
                $objPHPExcel->setActiveSheetIndex(0)
                        
                            ->setCellValue('A'.$i, $pdet->number)
                            ->setCellValue('B'.$i, $pdet->name)
                            ->setCellValue('C'.$i, $pdet->amount)
                            ->setCellValue('D'.$i, $pdet->description);
                $i++;
                
                }*/

                // Rename worksheet
                $objPHPExcel->getActiveSheet()->setTitle('Payments Download');


                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $objPHPExcel->setActiveSheetIndex(0);


                // Redirect output to a client’s web browser (Excel5)
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="NSSFReport .xls"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');
                exit;

         

        
    }
    
    
          /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    
    public function PayslipIndividualReport(Request $request){
          
        $this->DBReconnect($request);
        
        $datefrom =Input::get('datefrom');
        
        
        $dateto =Input::get('dateto');
        
        $employee =Input::get('employee');
        
        
        $emp_row  = Employee ::find($employee);
        
        
        $emp_data= Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->where('employees.id',$employee)
                                 ->whereDate('salary_releases.created_at', '>=', $datefrom)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid','salary_releases.created_at as salarydate')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
        
        
        
        
        return view('reports.payslip.payslipindividual',['title'=>'Report List',
                                                         'menu'=>'','employee',
                                                         'datefrom'=>$datefrom,
                                                         'employee'=>$employee,
                                                         'dateto'=>$dateto,
                                                         'emp_data'=>$emp_data,
                                                         'emp_row'=>$emp_row]);
        
        
    }

    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function ProcessedSalariesReport(Request $request){
        
        
        
       return view('reports.payslip.processedsalariesreportfilter',[]); 
    } 
    
    
    
    public function ProcessedPayslipSelect(Request $request){
        
        $this->DBReconnect($request);
        
        
        $datefrom =Input::get('datefrom');
        
        $dateto =Input::get('dateto');
        
        
        $procesedsalary  =SalaryUpload::whereDate('created_at', '>', $datefrom)
                                       ->whereDate('created_at', '<', $dateto)
                                       ->get();
        
        
        
        
         return view('reports.payslip.processedsalariesreportreport',['procesedsalary'=>$procesedsalary,'title'=>'Processed  Payroll '.$datefrom.'>>>>>>'.$dateto]); 
        
    }
    
    public function PrintPayslips(Request $request,$id){
        
        $this->DBReconnect($request);
        
        
        $salaryupload_row  = SalaryUpload::find($id);
        
           
        $emp_data= Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->where('salary_releases.uploadid',$id)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid','salary_releases.created_at as salarydate')
                                 ->orderBy('employees.id','DESC')
                                 ->get();
        
        
        
        
        return view('reports.payslip.payslipindividuals',['title'=>'Report List',
                                                         'menu'=>'','employee',
                                                         'salaryupload_row'=>$salaryupload_row,
                                                        
                                                         'emp_data'=>$emp_data,
                                                        ]);
        
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
