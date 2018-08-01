<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Deductions;

use App\Models\Pim\Employee;

use App\Models\Pim\SalaryDeductions;

use DB;


class SalaryDeductionController extends Controller
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


        $deductlist  = SalaryDeductions::join('deductions', 'salary_deductions.deduction', '=', 'deductions.id')
                                        ->join('employees','salary_deductions.employee_id','=','employees.id')
                                         ->where('salary_deductions.payto','>',date('Y-m-d'))
                                         ->select('salary_deductions.*','deductions.name as deductionname',
                                         'employees.emp_firstname','employees.emp_middle_name','employees.emp_lastname')->get();



      return view('pim.salarydeduction.index',['deductlist'=>$deductlist,'title'=>'Employee deduction List']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

          $this->DBReconnect($request);




        $deduction= ['' => ''] + Deductions::pluck('name', 'id')->all();

        $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                               ->orderBy('id','DESC')
                               ->pluck('name', 'id')
                                ->all();



       // $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);

        return view('pim.salarydeduction.create',[ 'deduction'=>$deduction,'employee'=>$employee,'title'=>'New Salary Employee  Deduction']);


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
        $this->validate($request, [    'name'          =>  'required',
                                       'deduction'       =>  'required',
                                       'amount'        =>  'required|numeric',
                                       'employee_id'   =>  'required',
                                       'payfrom'       =>  'required',
                                       'payto'         =>  'required',
                                        ]);


        $row =new SalaryDeductions;

         $row->name          =$request->name;

         $row->deduction    =$request->deduction;


         $row->employee_id   =$request->employee_id;

         $row->amount   =$request->amount;

         $row->payfrom   =$request->payfrom;

         $row->payto   =$request->payto;

         $row->save();
             return redirect()->route('SalaryDeduction.index')
                        ->with('success','Deductions created successfully');
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
    public function edit(Request $request,$id)
    {
        //
          $this->DBReconnect($request);
          $row = SalaryDeductions::find($id);


          $employee = Employee::find($row->employee_id);


          $deduction= ['' => ''] + Deductions::pluck('name', 'id')->all();


          $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                 ->orderBy('id','DESC')
                                 ->pluck('name', 'id')
                                  ->all();


          //$menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);

        return view('pim.salarydeduction.edit',['row'=>$row ,'deduction'=>$deduction,'title'=>'Edit Employee  Deductions','employee'=> $employee,'employee_id'=>$row->employee_id]);
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
         $this->DBReconnect($request);
         $this->validate($request, [   'name'          =>  'required',
                                       'deduction'       =>  'required',
                                       'amount'        =>  'required|numeric',
                                       'employee_id'   =>  'required',
                                       'payfrom'       =>  'required',
                                       'payto'         =>  'required',
                                        ]);




         SalaryDeductions::where('id',$id)
                   ->update([ 'name' =>$request->name,

                    'deduction'      =>$request->deduction,

                    'employee_id'  =>$request->employee_id,

                    'amount'       =>$request->amount,

                    'payfrom'      => $request->payfrom,

                    'payto'   =>$request->payto]);


             return redirect()->route('SalaryDeduction.index')
                        ->with('success','Deductions Updated successfully');
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
