<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Licenses;

use App\Models\Pim\Employee;

class LicenseController extends Controller
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
        $license = Licenses::orderBy('id','DESC')->paginate(5);
        
        $menu  = $this ->topAdmin();
              
              
        return view('admin.license.index',['license'=>$license,'title'=>'Licenses List','menu'=>$menu]);
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
                 
                 $license = Licenses::where('employee_id','=',$id)->paginate(5);
        
                 $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                 
                 
                return view('pim.license.create',['license'=>$license,'menu'=>$menu,'title'=>'New License', 'ntitle'=>'License List ','id'=>$id]);
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
                                       'issueddate'        => 'required',
                                       'renewdate'        => 'required',
                                       'description' =>  'required',
                                       'employee_id' =>  'required',                                          
                                        ]);
             
         $row =new Licenses;
         
         $row->name          =$request->name;
         
         $row->issueddate    =$request->issueddate;
          
         $row->renewdate     =$request->renewdate;
         
         $row->employee_id   =$request->employee_id;
         
         $row->description   =$request->description;
         
         $row->save();
             return redirect('License/'.$request->employee_id.'/create')
                        ->with('success','Licenses created successfully');
         
        // return redirect()->route('License/'.$request->employee_id.'/create')
          //              ->with('success','Licenses created successfully');
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
            
        $row = Licenses::find($id);
         
        $employee = Employee::find($row->employee_id);
         
       
                 
        $license = Licenses::where('employee_id','=',$row->employee_id)->paginate(15);
        
        $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);
         
        
         
         return view('pim.license.edit',['row'=>$row,'license'=>$license,'menu'=>$menu,'title'=>'Update License', 'ntitle'=>'License List ','id'=>$row->employee_id]);
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
                                                 'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Licenses;
         
         
         
         Licenses::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect('License/'.$request->employee_id.'/create')
                        ->with('success','Licenses created successfully');
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
        $row  =Licenses::find($id);
         
        Licenses::where('id',$id)->delete();
        
        return redirect('License/'.$row->employee_id.'/create')
                        ->with('success','Licenses  deleted successfully');
    }
}
