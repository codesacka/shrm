<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Pim\EmpEducation;

use App\Models\Admin\Education;

use App\Models\Pim\Employee;

class EmpEducationController extends Controller
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
                 
                 
        
                 $profmenu  =$this->topProfilePim($id);
                 
                 $education = [''=>''] + Education::pluck('name','id')->all();
                 
                 
                return view('pim.empeducation.create',['education'=>$education,'profmenu'=>$profmenu,'title'=>'New  Employee Education', 'ntitle'=>'Employee Education List ','id'=>$id]);
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
        $this->validate($request, [    'level'        => 'required',
                                       'college'        => 'required',
                                       'specialization'        => 'required',
                                       'score' =>  'required',
                                       'employee_id' =>  'required', 
                                       'startdate' =>  'required',
                                       'enddate' =>  'required',   
                                       'description' =>  'required',  
                                        ]);
             
         $row =new EmpEducation;
         
         $row->level          =$request->level;
 
         $row->college     =$request->college;
         
         $row->specialization    =$request->specialization;
          
         $row->score     =$request->score;
         
         $row->startdate   =$request->startdate;
         
         $row->enddate        =$request->enddate;
         
         $row->description   =$request->description;
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();
             return redirect('Employee/'.$request->employee_id.'/edit')
                        ->with('success','New  Employee Education created successfully');
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
                 $row  =EmpEducation::find($id);
        
                 $employee = Employee::find($row->employee_id);
                 
                 $education = [''=>''] + Education::pluck('name','id')->all();
        
            
                 
                 
                return view('pim.empeducation.edit',['row'=>$row,'education'=>$education,'title'=>'Edit  Employee Education', 'ntitle'=>'Employee Education List ','id'=>$row->employee_id]);
 
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
         
        $this->validate($request, [    'level'        => 'required',
                                       'college'        => 'required',
                                       'specialization'        => 'required',
                                       'score' =>  'required',
                                       'employee_id' =>  'required', 
                                       'startdate' =>  'required',
                                       'enddate' =>  'required',   
                                       'description' =>  'required',  
                                        ]);
             
     
         
             EmpEducation::where('id',$id)->update([ 'level'          =>$request->level,
 
                                                    'college'     =>$request->college,

                                                     'specialization'   =>$request->specialization,

                                                     'score'     =>$request->score,

                                                     'startdate'   =>$request->startdate,

                                                     'enddate'        =>$request->enddate,

                                                     'description'  =>$request->description]);
             
             
             
             
             return redirect('Employee/'.$request->employee_id.'/edit')
                        ->with('success','  Employee Education updated successfully');
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
        $row  =EmpEducation::find($id);
         
        EmpEducation::where('id',$id)->delete();
        
        return redirect('EmpEducation/'.$row->employee_id.'/edit')
                        ->with('success','Employee Education  deleted successfully');
    }
}
