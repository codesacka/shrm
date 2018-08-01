<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pim\Employee;
use App\Models\Admin\OnboardingReason;


class EmpOnboardingController extends Controller
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
        
        
         $this->DBReconnect($request);

         $this->validate($request, [    'onboarding'        => 'required',
                                        'onboardingdate'        => 'required',

                                        ]);

         Employee::where('id',$request->employee_id)->update(['onboarding' => $request->onboarding,'onboardingdate' => $request->onboardingdate]);


         return redirect()->route('EmployeeOnboarding.edit',$request->employee_id)
                        ->with('success','Employee Onboarding created successfully');
         
         
         
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
    public function edit(Request $request, $id)
    {
        //
        
         $this->DBReconnect($request);

         $employee =Employee::find($id);


     

          $title ='OnBoarding Details';
         
         
          $employeemenu= $this->topProfilePim($id,'More');
          
          
         $onboardingreasons  =['' => ''] +OnboardingReason::pluck('name', 'id')->all();
         
         
         $emponboard = OnboardingReason :: where('id', $employee->onboarding)->get();  
          
          

         return view('pim.onboarding.edit',compact('employee','emponboard','title','onboardingreasons','employeemenu','id'));
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

         $this->validate($request, [    'onboarding'        => 'required',
                                        'onboardingdate'        => 'required',

                                        ]);

         Employee::where('id',$request->employee_id)->update(['onboarding' => $request->onboarding,'onboardingdate' => $request->onboardingdate]);


         return redirect()->route('EmployeeOnboarding.edit',$request->employee_id)
                        ->with('success','Employee Onboarding created successfully');
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
