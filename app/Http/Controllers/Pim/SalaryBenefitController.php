<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Benefits;

use App\Models\Pim\Employee;


use App\Models\Pim\Taxable;

use App\Models\Pim\SalaryBenefits;

use  App\Models\Admin\PlanCoverage;

use  App\Models\Pim\BenefitsPlanCoverage;
use App\Models\Pim\BenefitGroupEmployee;

use DB;


class SalaryBenefitController extends Controller
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


        $benefits =  Benefits::all();

        $salbenefit  =SalaryBenefits::all();

         return view('pim.salarybenefit.index',['benefits'=>$benefits,'salbenefit'=> $salbenefit,'title'=>'Employee  Benefits']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //

          $this->DBReconnect($request);




        $benefits = ['' => ''] + Benefits::pluck('name', 'id')->all();


        $taxable = ['' => ''] + Taxable::pluck('name', 'id')->all();

        $plancoverage  = PlanCoverage::orderBy('id','DESC')->get();

          $employee  =Employee::all();


       // $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);

       // return view('pim.salarybenefit.create',[ 'taxable'=>$taxable,'benefits'=>$benefits,'title'=>'Employee  Benefits','employee_id'=>$id]);

        return view('pim.salarybenefit.create',['plancoverage'=>$plancoverage , 'employee'=>$employee, 'id'=>$id]);


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
        $this->validate($request, [    'planname'          =>  'required',
                                       'benefit'       =>  'required',
                                       'taxrelief'     =>  'required|numeric',
                                       'amount'        =>  'required|numeric',
                                       'planstart'       =>  'required',
                                       'planend'         =>  'required',
                                        ]);


        $row =new SalaryBenefits;

         $row->planname          =$request->planname;

         $row->benefit    =$request->benefit;

         $row->taxrelief     =$request->taxrelief;

         $row->amount   =$request->amount;

         $row->planstart   =$request->planstart;

         $row->planend   =$request->planend;

         $row->description = $request->description;

         $row->deductemployee  = $request->deductemployee ?   1 : 0;

         $row->save();



          foreach ($request->input('plancoverage') as $key => $value) {

              $brow  =new BenefitsPlanCoverage;

              $brow->plan = $value;

              $brow->benefitplan = $row->id;

              $brow->save();

         }







              foreach ($request->input('employee') as $key => $value) {
                  $bgrow  =new BenefitGroupEmployee;

                  $bgrow->benefitgroup =$row->id;

                  $bgrow->employee =$value;

                  $bgrow->save();
                }




             return redirect()->route('SalaryBenefit.index')
                        ->with('success','Benefits created successfully');
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

          $row = SalaryBenefits::find($id);






          $plancoverage  = PlanCoverage::orderBy('id','DESC')->get();


          $br = BenefitsPlanCoverage::where("benefitplan",$id)->get();

          foreach($br as $obj){

            $benefits_plan_coverages[] = $obj->plan;

          }

          $employee  =Employee::all();


          $bg =BenefitGroupEmployee::where("benefitgroup",$id)->get();

          $employee_group =array();

          foreach($bg as $r){

            $employee_group[] = $r->employee;

          }





        //  $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);

        return view('pim.salarybenefit.edit',['row'=>$row ,'employee_group'=>$employee_group,'plancoverage'=>$plancoverage,'employee'=>$employee ,'benefits_plan_coverages'=> $benefits_plan_coverages,'title'=>'Employee  Benefits']);
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
          $this->validate($request, [  'planname'          =>  'required',
                                       'taxrelief'     =>  'required|numeric',
                                       'amount'        =>  'required|numeric',
                                       'planstart'       =>  'required',
                                       'planend'         =>  'required',
                                        ]);




         SalaryBenefits::where('id',$id)
                                    ->update([ 'planname' =>$request->planname,


                                    'taxrelief'  =>$request->taxrelief,

                                     'amount'   =>$request->amount,

                                     'planstart'   =>$request->planstart,

                                     'planend'   =>$request->planend,

                                     'description' => $request->description]);

           BenefitsPlanCoverage::where('benefitplan',$id)->delete();

           foreach ($request->input('plancoverage') as $key => $value) {

              $brow  =new BenefitsPlanCoverage;

              $brow->plan = $value;

              $brow->benefitplan = $id;

              $brow->save();

         }


         BenefitGroupEmployee::where('id',$id)->delete();


     foreach ($request->input('employee') as $key => $value) {
         $bgrow  =new BenefitGroupEmployee;

         $bgrow->benefitgroup =$id;

         $bgrow->employee =$value;

         $bgrow->save();
       }




           return redirect()->route('SalaryBenefit.index')
                        ->with('success','Benefits Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //

         $this->DBReconnect($request);

        $row = BenefitGroupEmployee::where('benefitgroup',$id)->count();

        if($row >0){

          return  redirect()->route('SalaryBenefit.index')
                          ->with('error','SalaryBenefit  has dependencies');

        }else{


        SalaryBenefits::where('id',$id)->delete();
        BenefitsPlanCoverage::where('benefitplan',$id)->delete();
        return  redirect()->route('SalaryBenefit.index')
                        ->with('success','SalaryBenefit  deleted successfully');

       }

    }
}
