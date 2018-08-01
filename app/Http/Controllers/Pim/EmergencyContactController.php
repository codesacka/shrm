<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\EmpEmergencyContactDetails;

use App\Models\Pim\Employee;

use Auth;



class EmergencyContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        //
          $this->DBReconnect($request);


          if(Auth::user()->hasRole('employee')){

               $emp_row =Employee::where('userid','=',Auth::user()->id)->first();

             if ( $id!=$emp_row->id){

                 return redirect('Employee/'.$emp_row->id.'/edit');
             }

          }

          $empemergent = EmpEmergencyContactDetails::where('employee_id','=',$id)->get();

          $employee  = Employee::find($id);

      return view('pim.empemergent.index',['id'=>$id,'empemergent'=>$empemergent, 'title'=>'Emergency Contact','employee'=>$employee,'employeemenu'=>$this->topProfilePim($id,'EmergencyContacts.index')]);


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
                 $employee = Employee::find($id);

                 $empemergent = EmpEmergencyContactDetails::where('employee_id','=',$id)->paginate(15);


                return view('pim.empemergent.create',['empemergent'=>$empemergent,'title'=>'New  Employee  Contact', 'ntitle'=>'Employee  Emergency Contact List ','id'=>$id]);

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
         $this->validate($request, [   'name'        => 'required',
                                       'relationship'        => 'required',
                                       'mobile'        => 'required',
                                       'worktelephone'        => 'required',
                                       'hometelephone'  =>'required'
                                        ]);



         $row =new EmpEmergencyContactDetails;

         $row->name          =$request->name;

         $row->relationship  =$request->relationship;

         $row->mobile          =$request->mobile;

         $row->hometelephone          =$request->hometelephone;


         $row->worktelephone          =$request->worktelephone;

         $row->employee_id   =$request->employee_id;

         $row->save();
             return redirect('EmergencyContacts/'.$request->employee_id.'/index')
                        ->with('success','New  Employee Emergency  Contact Details  created successfully');
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
                 $r = EmpEmergencyContactDetails::find($id);

                 $employee = Employee::find($r->employee_id);

                 $empemergent = EmpEmergencyContactDetails::where('employee_id','=',$id)->paginate(15);

                   $profmenu = $this->topProfilePim($employee->id);


                return view('pim.empemergent.edit',['r'=>$r,'empemergent'=>$empemergent,'profmenu'=>$profmenu,'title'=>'Employee Emergency Contact', 'ntitle'=>'Employee  Emergency Contact List ','id'=>$r->employee_id]);
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
          $this->validate($request, [  'name'        => 'required',
                                       'relationship'        => 'required',
                                       'mobile'        => 'required',
                                       'worktelephone'        => 'required',
                                        'hometelephone'        => 'required',
                                        ]);





          EmpEmergencyContactDetails::where('id',$id)
                  ->update(['name' => $request->name,
                           'relationship' => $request->relationship,
                           'mobile' => $request->mobile,

                           'hometelephone' =>$request->hometelephone,
                           'worktelephone' => $request->worktelephone]);

             return redirect('Employee/'.$request->employee_id.'/show')
                        ->with('success','New  Employee Emergency Contact Details  created successfully');
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

          $row = EmpEmergencyContactDetails::find($id);
         EmpEmergencyContactDetails::where('id',$id)->delete();
        return redirect('Employee/'.$row->employee_id.'/show')
                        ->with('success','Employee Contact  deleted successfully');
    }
}
