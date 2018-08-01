<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Employee;

use App\Models\Pim\EmployeeDocuments;


class EmployeeDocumentsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $employee = Employee::find($id);
         
         
         
        $employeedoc = EmployeeDocuments::where('employee_id',$id)->select('employee_documents.*')->orderBy('id','DESC')->paginate(5);
        
        $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
              
              
        return view('pim.employeedocuments.index',['employeedoc'=>$employeedoc,'title'=>'Employee Documents','menu'=>$menu,'employee_id'=>$id]);
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
                 
                $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                 
                 
                return view('pim.employeedocuments.create',['menu'=>$menu,'title'=>'New Employee Documents','employee_id'=>$id]);
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
                                       'notes' =>  'required',
                                       'attachment' =>  'required'
                                                                                 
                                        ]);
        
        $attachment='';
      
        if ($request->hasFile('attachment')) {
        
        $attachment = md5(rand()) . '.' .$request->file('attachment')->getClientOriginalExtension();
        
        $request->file('attachment')->move( '/uploads', $attachment);
        
        }
                     
        $row =new EmployeeDocuments;
         
        $row->name         =$request->name;
         
        $row->attachment   =$attachment;
        
        $row->employee_id  =$request->employee_id;
         
        $row->notes        =$request->notes;
         
        $row->save();
         
         
         return redirect('EmployeeDocuments/'.$request->employee_id.'/show')
                        ->with('success','Employee Documents created successfully');
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
        
            
         $row = EmployeeDocuments::find($id);
         
         $employee = Employee::find($row->employee_id);
         
         $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
         
         $title ='Update Employee Documents';
         
         return view('pim.employeedocuments.edit',compact('row','menu','title'));
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
                                       'notes' =>  'required',
                                       'attachment' =>  'required'
                                                                                 
                                        ]);
        
        $attachment='';
      
        if ($request->hasFile('attachment')) {
        
        $attachment = md5(rand()) . '.' .$request->file('attachment')->getClientOriginalExtension();
        
        $request->file('attachment')->move( '/uploads', $attachment);
        
        }
                     
        EmployeeDocuments::where('id',$id)->update([
         
        'name'         =>$request->name,
         
        'attachment'   =>$attachment,
        
        'employee_id'  =>$request->employee_id,
         
        'notes'        =>$request->notes]);
         
    
         
         
         return redirect('EmployeeDocuments/'.$request->employee_id.'/show')
                        ->with('success','Employee Documents created successfully');
         
         
         
         
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
         $row = EmployeeDocuments::find($id);
         
         
         
        EmployeeDocuments::where('id',$id)->delete();
        return redirect('EmployeeDocuments/'.$row->employee_id.'/index')
                        ->with('success','Employee Documents  deleted successfully');
    }
}
