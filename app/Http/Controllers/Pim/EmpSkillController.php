<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Empskill;

use App\Models\Admin\Skills;

use App\Models\Pim\Employee;

class EmpSkillController extends Controller
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
    public function create(Request $request,$id)
    {
        //
                $this->DBReconnect($request);
                 $employee = Employee::find($id);
                 
                 
                 $empskill = Empskill::join('skills', 'empskills.skills', '=', 'skills.id')
                           ->select('empskills.*', 'skills.name')
                           ->where('employee_id','=',$id)
                           ->orderBy('id','DESC')->paginate(20);
                 
               //  $empskill = Empskill::where('employee_id','=',$id)->paginate(15);
                 
                 $skill = ['' => ''] + Skills::pluck('name', 'id')->all();
        
              
                 
                 
                return view('pim.empskill.create',['skill'=>$skill,'empskill'=>$empskill,'title'=>'New  Work Skills', 'ntitle'=>'Work Skills List ','id'=>$id]);
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
        
         $this->validate($request, [   'skills'        => 'required',
                                       'experience'        => 'required',  
                                       
                                       'description'        => 'required',
                                      
                                        ], 
                                   [

                                     'skills.required' => 'Skills details  required ',
                                     'experience.required' => 'Experience details required',
                                     'description.required' => 'Notes details required',
                                     
                                   ]);
             
         $row =new Empskill;
         
         $row->skills =$request->skills;
         
         $row->experience =$request->experience;
                         
         $row->description   =$request->description;
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();
         
         
         return redirect('Employee/'.$request->employee_id.'/edit')
                        ->with('success','Employee Work Skill created successfully');
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
                $row = Empskill::find($id);
               
                $employee = Employee::find($row->employee_id);
                 
                 
                $empskill = Empskill::join('skills', 'empskills.skills', '=', 'skills.id')
                           ->select('empskills.*', 'skills.name')
                           ->where('employee_id','=',$row->employee_id)
                           ->orderBy('id','DESC')->paginate(20);
                 
               //  $empskill = Empskill::where('employee_id','=',$id)->paginate(15);
                 
                 $skill = ['' => ''] + Skills::pluck('name', 'id')->all();
        
           //      $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);
                 
                 
                return view('pim.empskill.edit',['row'=>$row,'skill'=>$skill,'empskill'=>$empskill,'title'=>'Update  Work Skills', 'ntitle'=>'Work Skills List ','id'=>$row->employee_id]);
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
          $this->validate($request, [   'skills'        => 'required',
                                       'experience'        => 'required',  
                                       
                                       'description'        => 'required',
                                      
                                        ], 
                                   [

                                     'skills.required' => 'Skills details  required ',
                                     'experience.required' => 'Experience details required',
                                     'description.required' => 'Notes details required',
                                     
                                   ]);
             
         /*$row =new Empskill;
         
         $row->skills =$request->skills;
         
         $row->experience =$request->experience;
                         
         $row->description   =$request->description;
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();*/
         
           Empskill::where('id',$id)->update([ 'skills' =>$request->skills,
                                               'experience'  =>$request->experience,
                                               'description'   =>$request->description
                                                ]);
             
         
         
         return redirect('Employee/'.$request->employee_id.'/edit')
                        ->with('success','Employee Work Skill updated successfully');
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
        
        $row  =Empskill::find($id);
         
        Empskill::where('id',$id)->delete();
        
        return redirect('Employee/'.$row->employee_id.'/edit')
                        ->with('success','Employee Skills  deleted successfully');
    }
}
