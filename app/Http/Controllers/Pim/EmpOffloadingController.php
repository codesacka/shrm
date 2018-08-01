<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Employee;
use App\Models\Pim\Terminationreason;



class EmpOffloadingController extends Controller
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

         $this->validate($request, [    'termination_id'        => 'required',
                                        'terminationdate'        => 'required',

                                        ]);

         Employee::where('id',$request->employee_id)->update(['termination_id' => $request->termination_id,'terminationdate' => $request->terminationdate]);


         return redirect()->route('EmployeeOffloading.edit',$request->employee_id)
                        ->with('success','Employee Offloading created successfully');
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

         $employee =Employee::find($id);


     

         $title ='OffBoarding Details';
         
         $employeemenu= $this->topProfilePim($id,'More');
         
         
         $terminationreason  = ['' => ''] + Terminationreason::pluck('name', 'id')->all();
         
         
         $empoffload = Terminationreason :: where('id', $employee->termination_id)->get();  
         
         

         return view('pim.offloading.edit',compact('employee','title','employeemenu','id','terminationreason','empoffload'));
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

         $this->validate($request, [    'termination_id'        => 'required',
                                        'terminationdate'        => 'required',

                                        ]);

         Employee::where('id',$request->employee_id)->update(['termination_id' => $request->termination_id,'terminationdate' => $request->terminationdate]);


         return redirect()->route('EmployeeOffloading.edit',$request->employee_id)
                        ->with('success','Employee Offloading created successfully');
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
