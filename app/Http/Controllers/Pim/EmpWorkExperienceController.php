<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\EmpWorkExperience;

use App\Models\Pim\Employee;


class EmpWorkExperienceController extends Controller
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
                 
                 $empworkexp = EmpWorkExperience::where('employee_id','=',$id)->paginate(5);
        
                 $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                 
                 
                return view('pim.empworkexp.create',['empworkexp'=>$empworkexp,'menu'=>$menu,'title'=>'New  Work Experience', 'ntitle'=>'Work Experience List ','id'=>$id]);
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
        
                
          $this->validate($request, [  'company'        => 'required',
                                       'jobtitle'        => 'required',  
                                       'startdate'        => 'required',
                                       'enddate'        => 'required',
                                       'description'        => 'required',
                                      
                                        ], 
                                   [

                                     'company.required' => 'Company details  required ',
                                     'jobtitle.required' => 'Job Title details required',
                                     'startdate.required' => 'Start Date details required',
                                     'enddate.required' => 'End Date details required',
                                     'description.required' => 'Notes details required',
                                     
                                   ]);
             
         $row =new EmpWorkExperience;
         
         $row->company =$request->company;
         
         $row->jobtitle =$request->jobtitle;
         
         $row->startdate =$request->startdate;
         
         $row->enddate   =$request->enddate;
                   
         $row->description   =$request->description;
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();
         
         
         return redirect('EmpWorkExperience/'.$request->employee_id.'/create')
                        ->with('success','Employee Work Experience created successfully');
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
                 $row  =EmpWorkExperience::find($id);
        
                 $employee = Employee::find($row->employee_id);
                 
                 $empworkexp = EmpWorkExperience::where('employee_id','=',$row->employee_id)->paginate(5);
        
                 $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);
                 
                 
                return view('pim.empworkexp.edit',[ 'row'=>$row,'empworkexp'=>$empworkexp,'menu'=>$menu,'title'=>'Update  Work Experience', 'ntitle'=>'Work Experience List ','id'=>$row->employee_id]);
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
        
              
          $this->validate($request, [  'company'        => 'required',
                                       'jobtitle'        => 'required',  
                                       'startdate'        => 'required',
                                       'enddate'        => 'required',
                                       'description'        => 'required',
                                      
                                        ], 
                                   [

                                     'company.required' => 'Company details  required ',
                                     'jobtitle.required' => 'Job Title details required',
                                     'startdate.required' => 'Start Date details required',
                                     'enddate.required' => 'End Date details required',
                                     'description.required' => 'Notes details required',
                                     
                                   ]);
             
   
         
         
         EmpWorkExperience::where('id',$id)->update(['company' =>$request->company,
         
         'jobtitle' => $request->jobtitle,
         
         'startdate' =>$request->startdate,
         
         'enddate'   => $request->enddate,
                   
         'description' =>$request->description
          ]);
         
         return redirect('EmpWorkExperience/'.$request->employee_id.'/create')
                        ->with('success','Employee Work Experience created successfully');
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
        
        $row  =EmpWorkExperience::find($id);
         
        EmpWorkExperience::where('id',$id)->delete();
        
        return redirect('EmpWorkExperience/'.$row->employee_id.'/create')
                        ->with('success','Licenses  deleted successfully');
    }
}
