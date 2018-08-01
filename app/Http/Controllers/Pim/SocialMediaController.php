<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\EmpSocialDetails;

use App\Models\Pim\Employee;

class SocialMediaController extends Controller
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
                 
                 $empsocial = EmpSocialDetails::where('employee_id','=',$id)->paginate(15);
        
                 $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                 
                 
                return view('pim.empsocial.create',['empsocial'=>$empsocial,'menu'=>$menu,'title'=>'New  Employee  Contact', 'ntitle'=>'Employee  Contact List ','id'=>$id]);

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
        
        $this->validate($request, [   'type'        => 'required',
                                       'handle'        => 'required',
                                       'link'        => 'required',
                                      
                                        
                                        ]);
        
      
                 
         $row =new EmpSocialDetails;
         
         $row->type         =$request->type;
 
         $row->handle       =$request->handle;
         
         $row->link         =$request->link;
          
         
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();
             return redirect('Employee/'.$request->employee_id.'/show')
                        ->with('success','New  Employee Social Media Details  created successfully');
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
        
        $social_row = EmpSocialDetails::find($id);
        
        $employee = Employee::find($social_row->employee_id);
        
        $empsocial = EmpSocialDetails::where('employee_id','=',$social_row->employee_id)->paginate(15);
         
        $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$social_row->employee_id);
        
        
        return view('pim.empsocial.edit',['social_row'=>$social_row,'empsocial'=>$empsocial,'menu'=>$menu,'title'=>'New  Employee  Contact', 'ntitle'=>'Employee  Contact List ','id'=>$social_row->employee_id]);
        
        
        
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
        
            $this->validate($request, [   'type'        => 'required',
                                       'handle'        => 'required',
                                       'link'        => 'required',
                                      
                                        
                                        ]);
        
      
                 
  
         
          EmpSocialDetails::where('id',$id)
                  ->update(['type' => $request->type,'handle' => $request->handle,'link' => $request->link]);
          
          
          
             return redirect('Employee/'.$request->employee_id.'/show')
                        ->with('success','Update  Employee Social Media Details  created successfully');
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
        
         $social_row = EmpSocialDetails::find($id);
         EmpSocialDetails::where('id',$id)->delete();
        return redirect('SocialMediaDetails/'.$social_row->employee_id.'/create')
                        ->with('success','Employee Contact  deleted successfully');
    }
}
