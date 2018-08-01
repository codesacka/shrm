<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\EmployeeReporting;

use App\Models\Pim\Employee;

use App\Models\Pim\EmpReportTo;

use DB;

class EmployeeReportingController extends Controller
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
        $employeereporting = EmployeeReporting::orderBy('id','DESC')->paginate(5);

        $menu  = $this ->topAdmin();


        return view('admin.empreporting.index',['employeereporting'=>$employeereporting,'title'=>'Reporting Methods','menu'=>$menu]);
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
                  $menu  = $this ->topAdmin();


                return view('admin.empreporting.create',['menu'=>$menu,'title'=>'Reporting Methods']);
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

        $this->validate($request, [    'name'        => 'required',


                                        ]);

         $row =new EmployeeReporting;

         $row->name =$request->name;


         $row->save();


         return redirect()->route('EmployeeReporting.index')
                        ->with('success','JobTitle created successfully');
    }
    
    
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function EmployeeReportingTostore(Request $request)
    {
        //
          $this->DBReconnect($request);

        $this->validate($request, [    'reportto'        => 'required',


                                        ]);

         $row =new EmpReportTo;

         $row->reportto =$request->reportto;

         $row->employee_id =$request->employee_id;
         
         

         $row->save();


         return redirect()->route('EmployeeReporting.edit',$request->employee_id)
                        ->with('success','Employee Reporting created successfully');
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


     

         $title ='Update Employee Reporting To';
         
         $employeemenu= $this->topProfilePim($id,'More');
         
         $empreportingto_row  =EmpReportTo::join('employees','emp_report_tos.reportto','=','employees.id')
                                            ->where('emp_report_tos.employee_id',$id)
                                            ->select('employees.*','emp_report_tos.employee_id')->get();
         
         
         $reportto  =['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->where('id','!=',$id)
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
         
         
         $empreport = EmpReportTo :: where('employee_id', $id)->first();        
         
         
        
         
         

         return view('pim.empreporting.edit',compact('employee','title','employeemenu','empreportingto_row','id','reportto','empreport'));
    }

    
    
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EmployeeReportingToupdate(Request $request, $id)
    {
        //
          $this->DBReconnect($request);


         $this->validate($request, [    'reportto'        => 'required',


                                        ]);

       


         EmpReportTo::where('employee_id',$id)->update(['reportto' => $request->reportto]);



         return redirect()->route('EmployeeReporting.edit',$request->employee_id)
                        ->with('success','Employee Reporting updated successfully');
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


         $this->validate($request, [    'name'        => 'required',


                                        ]);

         $row =new EmployeeReporting;



         EmployeeReporting::where('id',$id)->update(['name' => $request->name]);



         return redirect()->route('EmployeeReporting.index')
                        ->with('success','Employee Reporting updated successfully');
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

        EmployeeReporting::where('id',$id)->delete();
        return redirect()->route('EmployeeReporting.index')
                        ->with('success','EmployeeReporting  deleted successfully');
    }
}
