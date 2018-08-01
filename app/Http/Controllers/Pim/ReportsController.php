<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Plugins\PayrollCalculator;

use App\Models\Pim\SalaryPostings;

use App\Plugins\Pdf_Lib;


class ReportsController extends Controller
{
    //
    
    /**
     * Payroll Report
     * @return type
     */
    
    public function PayrollReport()
    {
        //
        
       /// $pcalc  =new PayrollCalculator();
        
        
       // $pcalc->calculatetaxforemployee(100000);
        
         $menu  = $this ->topPim();
        
         
         $salaryposting =SalaryPostings::join('employees','salary_postings.employee_id', '=', 'employees.id')
                                          ->select('employees.emp_firstname','employees.emp_middle_name','employees.emp_lastname',
                                                  'salary_postings.amount as amount','salary_postings.created_at','salary_postings.id as sid')
                                          ->orderBy('salary_postings.id','DESC')->paginate(25);
        
         return view('pim.reports.payrollreport',['menu'=>$menu,'ntitle'=>'Salary Posting','title'=>'Employee Salary Reports','salaryposting'=>$salaryposting]);
        
    }
    
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function PayrollReportSearch(Request $request){
        
        $this->validate($request, [    'startfrom'        => 'required',
                                       'endto'        => 'required']);
        
         
        
        return view('pim.reports.payrollreport',['menu'=>$menu,'title'=>'Employee Salary Reports']);
        
    }
    
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function ViewPaySlip($id){
        
        // create a PDF object
      
        
        
        $salaryposting =SalaryPostings::join('employees','salary_postings.employee_id', '=', 'employees.id')
                                          ->where('salary_postings.id',$id)
                                          ->select('employees.emp_firstname','employees.emp_middle_name','employees.emp_lastname',
                                                  'salary_postings.amount as amount','salary_postings.created_at','salary_postings.id as sid')->first();
        
        $pdf = new Pdf_Lib(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
               

        // set document (meta) information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Olaf Lederer');
        $pdf->SetTitle('TCPDF Example');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, tutorial');
        
        
                // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        

        // add a page
        
        $pdf->AddPage();
        $pdf->SetFont('times', 'BI', 12);
        $txt = <<<EOD
             Pay slip 
          Name   Company 
EOD;

// print a block of text using Write()
        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

        // create address box
        $pdf->CreateTextBox('Employee    :', 0, 25, 80, 10, 10, 'B');
        
        $pdf->CreateTextBox( $salaryposting->emp_firstname.'  '.$salaryposting->emp_middle_name.'  '.$salaryposting->emp_lastname, 30, 25, 80, 10, 10);
        
        
        $pdf->CreateTextBox('Period Ended :', 85, 25, 80, 10, 10, 'B');
        
        $pdf->CreateTextBox($salaryposting->created_at, 115, 25, 80, 10, 10);
        
        $pdf->CreateTextBox('Occupation :', 0, 35, 80, 10, 10,'B');
   

        // invoice title / number
        $pdf->CreateTextBox('PAYSLIP NO :', 85, 35, 120, 10, 10,'B');
        $pdf->CreateTextBox(str_pad($id,10,"0",STR_PAD_LEFT), 115, 35, 80, 10, 10);
        
        $pdf->Line(20, 45, 195, 45);
        
        
        
        $pdf->CreateTextBox('Wages', 0, 48, 20, 10, 10, 'I', '');
        
        $pdf->Line(20, 56, 35, 56);
        
        $pdf->CreateTextBox('Gross Pay', 0, 57, 20, 10, 10, 'I', '');
        
        $pdf->CreateTextBox($salaryposting->amount, 140, 57, 30, 10, 10, '', 'R');
         
        $taxableamount = $salaryposting->amount;
        
        $tax   =0;
         
        $pdf->CreateTextBox('Taxable Benefits', 20, 62, 20, 10, 10, 'I', '');
        
        $pdf->Line( 70, 70, 40, 70);

        // some example data
        $benefits[] = array('quant' => 5, 'descr' => '.com domain registration', 'price' => 9.95);
        $benefits[] = array('quant' => 3, 'descr' => '.net domain name renewal', 'price' => 11.95);
        $benefits[] = array('quant' => 1, 'descr' => 'SSL certificate 256-Byte encryption', 'price' => 99.95);
        $benefits[] = array('quant' => 1, 'descr' => '25GB VPS Hosting, 200GB Bandwidth', 'price' => 19.95);

        $currY = 70;
        $total = 0;
        foreach ($benefits as $row) {
               
                $pdf->CreateTextBox($row['descr'], 20, $currY, 90, 10, 10, '');
                $pdf->CreateTextBox($row['price'], 110, $currY, 30, 10, 10, '', 'R');
              
                $currY = $currY+5;
              
        }
        
        
        $pcalc  =new PayrollCalculator();
        
        
        
        $tax    = $pcalc->calculatetaxforemployee($taxableamount);
        
        
        $taxableamount-=$tax;
        
         $currY = $currY+5;
        
        $pdf->CreateTextBox('Deductions', 20, $currY, 20, 10, 10, 'I', '');
        
        $currY = $currY+8;
        
        $pdf->Line( 70, $currY, 40, $currY);
        
        
        
         foreach ($benefits as $row) {
               
                $pdf->CreateTextBox($row['descr'], 20, $currY, 90, 10, 10, '');
                $pdf->CreateTextBox($row['price'], 110, $currY, 30, 10, 10, '', 'R');
              
                $currY = $currY+5;
              
        }
        
        
        
        
        
        $pdf->Line(20, $currY+10, 195, $currY+10);
        
        
       $currY = $currY+10;
        

                // output the total row
        $pdf->CreateTextBox('PAYE', 10, $currY+5, 135, 10, 10, '', 'R');
        $pdf->CreateTextBox(number_format($tax, 2, '.', ''), 140, $currY+5, 30, 10, 10, '', 'R');

        $pdf->CreateTextBox('Total', 10, $currY+10, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox(number_format($taxableamount, 2, '.', ''), 140, $currY+10, 30, 10, 10, 'B', 'R');
        
        
        // some payment instructions or information
        $pdf->setXY(20, $currY+30);
        $pdf->SetFont(PDF_FONT_NAME_MAIN, '', 10);
        
        ob_clean();
        
        
        //Close and output PDF document
        $pdf->Output('Payslip.pdf');
        

        
    }
    
     public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		PDF::SetXY($x+20, $y); // 20 = margin left
		PDF::SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		PDF::Cell($width, $height, $textval, 0, false, $align);
     }
}
