<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Employee;

use App\Models\Admin\EmployeeReporting;

use App\Models\Pim\Supervisors;

class SupervisorsController extends Controller
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
                 
                // $empreportto = EmpEmergencyContactDetails::where('employee_id','=',$id)->paginate(15);
               
               $reportto  =  ['' => ''] + EmployeeReporting::pluck('name', 'id')->all();
        
               $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                  
               $employee_id =$id;
                
              return view('pim.supervisor.create',['reportto'=>$reportto,'menu'=>$menu,'title'=>'New Supervisor','employee_id'=>$employee_id]);
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
                                       'reporting' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Supervisors;
         
         $row->name =$request->name;
         
         $row->reporting   =$request->reporting;
         
         $row->save();
         
         
         return redirect('EmpReportTo/'.$request->employee_id.'/create')
                        ->with('success','Supervisor  created successfully');
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
        
            
         $sup = Supervisors::find($id);
         
         
         $employee = Employee::find($sup->employee_id);
                 
                // $empreportto = EmpEmergencyContactDetails::where('employee_id','=',$id)->paginate(15);
               
         $reportto  =  ['' => ''] + EmployeeReporting::pluck('name', 'id')->all();
        
         $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$sup->employee_id);
         
         $employee_id  =$sup->employee_id;
         
         $title ='Update Supervisor';
         
         return view('admin.jobtitle.edit',compact('sup','menu','title','employee_id','reportto'));
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
        
        
        
         $this->validate($request, [    'name'        => 'required',
                                         'reporting' =>  'required',
                                                                                 
                                        ]);
             
       
         
         
         
         Supervisors::where('id',$id)->update(['name' => $request->name,'reporting' =>$request->reporting]);
         
         
         
         return redirect('EmpReportTo/'.$request->employee_id.'/create')
                        ->with('success','Supervisor created successfully');
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
        $row = Supervisors ::find();
         
        Supervisors::where('id',$id)->delete();
        return redirect('EmpReportTo/'.$row->employee_id.'/create')
                        ->with('success','Supervisor  deleted successfully');
    }
}
