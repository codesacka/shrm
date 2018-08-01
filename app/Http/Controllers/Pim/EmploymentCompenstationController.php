<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Employee;

use App\Models\Pim\Salary;

use App\Models\Pim\SalaryBenefits;

use App\Models\Pim\SalaryDeductions;

class EmploymentCompenstationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        
        
            $emp_row  = Employee ::find($id);
            
            $menu ='';
            
            $empsal_row =Salary::join('employee_salary_pay_rates', 'salaries.salper', '=', 'employee_salary_pay_rates.id')
                                ->join('employee_salary_types', 'salaries.saltype', '=', 'employee_salary_types.id')
                                ->join('job_titles', 'salaries.jobtitle', '=', 'job_titles.id')
                                ->where('salaries.employee_id',$id)
                                ->select('salaries.*','employee_salary_pay_rates.name as payrates','employee_salary_types.name as salarytypes','job_titles.name as job_titlesname')->get();
            
            
            
            $empben_row =SalaryBenefits::join('taxables', 'salary_benefits.taxable', '=', 'taxables.id')
                                        ->join('benefits', 'salary_benefits.benefit', '=', 'benefits.id')
                                        ->where('salary_benefits.employee_id',$id)
                                        ->select('salary_benefits.*','taxables.name as taxname','benefits.name as benefitsname')->get();
            
            $empded_row =SalaryDeductions::join('deductions', 'salary_deductions.deduction', '=', 'deductions.id')
                                          ->where('salary_deductions.employee_id',$id)
                                          ->select('salary_deductions.*','deductions.name as deductionname')->get();
            
            
            return view('pim.employee.show',['empded_row'=>$empded_row,'empben_row'=>$empben_row,'menu'=>$menu,'emp_row'=>$emp_row,'id'=>$id,'view'=>'employeecompensation','empsal_row'=>$empsal_row]);
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
