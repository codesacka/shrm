<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Passport;

use App\Models\Pim\Employee;

class PassportController extends Controller
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
    public function create($id)
    {
        //
        
                 $employee = Employee::find($id);
                 
                 $passport = Passport::where('employee_id','=',$id)->paginate(5);
        
                 $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                 
                 
                return view('pim.passport.create',['passport'=>$passport,'menu'=>$menu,'title'=>'New Passport/Visa', 'ntitle'=>'Passport List ','id'=>$id]);
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
        
         
        $this->validate($request, [    'name'        => 'required',
                                       'issueddate'        => 'required',
                                       'renewdate'        => 'required',
                                       'description' =>  'required',
                                       'employee_id' =>  'required', 
                                       'issued_by' =>  'required',
                                       'eligible_status' =>  'required',   
                                       'number' =>  'required',  
                                        ]);
             
         $row =new Passport;
         
         $row->name          =$request->name;
         
         $row->issueddate    =$request->issueddate;
          
         $row->renewdate     =$request->renewdate;
         
         $row->issueddate    =$request->issueddate;
          
         $row->issued_by     =$request->issued_by;
         
         $row->eligible_status   =$request->eligible_status;
         
         $row->number        =$request->number;
         
         $row->description   =$request->description;
         
         $row->save();
             return redirect('Passport/'.$request->employee_id.'/create')
                        ->with('success','Membership created successfully');
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
