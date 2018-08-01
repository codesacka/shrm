<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\ActiveSetting;

use App\Models\Pim\Employee;

use App\Models\Pim\Salary;

use App\Models\Pim\EmployeeSalaryPayRate;

use App\Models\Pim\EmployeeSalaryType;

use App\Models\Admin\JobTitle;
use App\Models\Pim\SalaryBenefits;

use App\Models\Pim\SalaryDeductions;
use App\Plugins\PayrollCalculator;
use App\Models\Pim\SalaryRelease;
use Auth;

class SalaryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,$id)
    {
        //

           $this->DBReconnect($request);

           if(Auth::user()->hasRole('employee')){

                $emp_row =Employee::where('userid','=',Auth::user()->id)->first();

              if ( $id!=$emp_row->id){

                  return redirect('Employee/'.$emp_row->id.'/edit');
              }

           }

           $profmenu = $this->topProfilePim($id);


            $benefits =0;

            $deduction=0;

            $nssf =0;

            $employee  = Employee::find($id);

            $cempsal_row =Salary::join('employee_salary_pay_rates', 'salaries.salper', '=', 'employee_salary_pay_rates.id')
                                ->join('employee_salary_types', 'salaries.saltype', '=', 'employee_salary_types.id')
                                ->join('job_titles', 'salaries.jobtitle', '=', 'job_titles.id')
                                ->where('salaries.employee_id',$id)
                                ->where('salaries.active',1)
                                ->select('salaries.*','employee_salary_pay_rates.name as payrates',
                                        'employee_salary_types.name as salarytypes',

                                        'job_titles.name as job_titlesname')->get();


             $empsal_row =Salary::join('employee_salary_pay_rates', 'salaries.salper', '=', 'employee_salary_pay_rates.id')
                                ->join('employee_salary_types', 'salaries.saltype', '=', 'employee_salary_types.id')
                                ->join('job_titles', 'salaries.jobtitle', '=', 'job_titles.id')
                                ->where('salaries.employee_id',$id)
                                ->select('salaries.*','employee_salary_pay_rates.name as payrates',
                                        'employee_salary_types.name as salarytypes',
                                        'job_titles.name as job_titlesname')->get();



            $empded_row  = SalaryDeductions::join('deductions', 'salary_deductions.deduction', '=', 'deductions.id')
                                  ->join('employees','salary_deductions.employee_id','=','employees.id')
                                  ->where('salary_deductions.payto','>',date('Y-m-d'))
                                  ->where('salary_deductions.employee_id',$id)
                                  ->select('salary_deductions.*','deductions.name as deductionname','employees.emp_firstname','employees.emp_middle_name','employees.emp_lastname')->get();


          $empben_row =SalaryBenefits::join('benefit_group_employees', 'salary_benefits.id', '=', 'benefit_group_employees.benefitgroup')
                                       ->join('benefits', 'salary_benefits.benefit', '=', 'benefits.id')
                                         ->where('benefit_group_employees.employee',$id)
                                          ->where('salary_benefits.planend','>',date('Y-m-d'))
                                        ->select('salary_benefits.*','benefits.name as benefitname')->get();






            /*$empben_row =SalaryBenefits::join('taxables', 'salary_benefits.taxable', '=', 'taxables.id')
                                        ->join('benefits', 'salary_benefits.benefit', '=', 'benefits.id')
                                        ->where('salary_benefits.employee_id',$id)
                                        ->select('salary_benefits.*','taxables.name as taxname','benefits.name as benefitsname')->get();

            $empded_row =SalaryDeductions::join('deductions', 'salary_deductions.deduction', '=', 'deductions.id')
                                          ->where('salary_deductions.employee_id',$id)
                                          ->select('salary_deductions.*','deductions.name as deductionname')->get();




                $emp_data = Employee::join('salary_releases', 'employees.id', '=', 'salary_releases.employeeid')
                                 ->where('employees.id',$id)
                                 ->select('employees.*','salary_releases.amount as salaryamount','salary_releases.id as salaryid')
                                 ->orderBy('employees.id','DESC')
                                 ->first();

               $pcalc  =new PayrollCalculator();

               $salrel_row = SalaryRelease::find($emp_data->salaryid);

               $nhif  = $pcalc->calculate_nhif_employee2($salrel_row->uploadid,$salrel_row->amount);
               $paye  = $pcalc->calculatetaxforemployee2($salrel_row->uploadid,$salrel_row->amount);


               $netpay  =$emp_data->salaryamount + $benefits + 1280 - ($paye+$deduction +$nhif+$nssf) ; */


        return view('pim.salary.index',['id'=>$id,'empsal_row'=>$empsal_row,'empben_row'=>$empben_row,'empded_row'=>$empded_row,'cempsal_row'=>$cempsal_row,'employee'=>$employee,'title'=>'Employee Compensation','employeemenu'=>$this->topProfilePim($id,'SalaryDetails.index')]);


      //  return view('pim.salary.index',['profmenu'=>$profmenu,'id'=>$id,'nssf'=>$nssf , 'netpay'=> $netpay,'deduction' =>$deduction,'benefits'=> $benefits,'paye'=> $paye,'nhif'=> $nhif,'emp_data'=>$emp_data,'empded_row'=>$empded_row,'empben_row'=>$empben_row,'empsal_row'=>$empsal_row]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request ,$id)
    {
        //
        $this->DBReconnect($request);
        $employee = Employee::find($id);

        $active_setting = ['' => ''] + ActiveSetting::pluck('name', 'id')->all();


       // $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);


        $emp_payrate =  [''=>''] +EmployeeSalaryPayRate::pluck('name','id')->all();

        $emp_saltype = [''=>''] +EmployeeSalaryType::pluck('name','id')->all();

        $jobtitle = [''=>''] + JobTitle::pluck('name','id')->all();

      //  return view('pim.employee.editemplcompensation',['jobtitle'=>$jobtitle,'title'=>'Employee Compensation','row'=>$sal_row,'emp_payrate'=>$emp_payrate,'emp_saltype'=>$emp_saltype]);


        return view('pim.salary.create',[ 'active_setting'=>$active_setting,'emp_payrate'=>$emp_payrate,'emp_saltype'=>$emp_saltype,'jobtitle'=>$jobtitle,
                                         'title'=>'Employee  Salary Details','id'=>$id]);


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

        $this->validate($request, [    'saltype'        => 'required',
                                       'salper' =>  'required',
                                       'jobtitle' =>  'required',
                                       'active'       =>  'required',
                                       'amount'        =>  'required|numeric',
                                       'employee_id'   =>  'required',
                                       'payfrom'       =>  'required',
                                       'payto'         =>  'required',
                                        ]);


        $row =new Salary;

         $row->jobtitle          =$request->jobtitle;

         $row->saltype          =$request->saltype;

         $row->salper           =$request->salper;

         $row->active           =$request->active;

         $row->employee_id     =$request->employee_id;

         $row->amount          =$request->amount;

         $row->payfrom          =$request->payfrom;

         $row->payto          =$request->payto;

         $row->save();
             return redirect('SalaryDetails/'.$request->employee_id.'/index')
                        ->with('success','Salaries created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //

           $this->DBReconnect($request);

          $row = Salary::find($id);


          $employee = Employee::find($row->employee_id);


          $active_setting = ['' => ''] + ActiveSetting::pluck('name', 'id')->all();


        $emp_payrate =  [''=>''] +EmployeeSalaryPayRate::pluck('name','id')->all();

        $emp_saltype = [''=>''] +EmployeeSalaryType::pluck('name','id')->all();

        $jobtitle = [''=>''] + JobTitle::pluck('name','id')->all();

         // $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);

        return view('pim.salary.edit',['row'=>$row ,'active_setting'=>$active_setting,'title'=>'Edit Employee Salaries','id'=>$row->employee_id,
                                      'emp_payrate'=>$emp_payrate,'emp_saltype'=>$emp_saltype,'jobtitle'=>$jobtitle]);
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

             $this->validate($request, ['saltype'        => 'required',
                                       'salper' =>  'required',
                                       'jobtitle' =>  'required',
                                       'active'       =>  'required',
                                       'amount'        =>  'required|numeric',
                                       'payfrom'       =>  'required',
                                       'payto'         =>  'required',
                                        ]);




         Salary::where('id',$id)
         ->update([ 'jobtitle' =>$request->name,

                    'active'    =>$request->active,

                    'amount'       =>$request->amount,

                    'payfrom'      => $request->payfrom,

                    'payto'   =>$request->payto,

                    'jobtitle' =>$request->jobtitle,

                    'saltype' =>$request->saltype,

                     'salper' =>$request->salper,

                     ]);




             return redirect('SalaryDetails/'.$request->employee_id.'/index')
                        ->with('success','Salaries  Updated successfully');
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
