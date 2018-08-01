<?php

namespace App\Http\Controllers\Onboarding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Onboarding\TaskTypes;

use App\Models\Onboarding\Weekdays;

use App\Models\Pim\Employee;

use DB;

class TaskTypesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $tasktypes = TaskTypes::orderBy('id','DESC')->paginate(5);
        
        $menu  = $this ->topOnboarding();
              
              
        return view('onboarding.tasktypes.index',['tasktypes'=>$tasktypes,'title'=>'Task Types','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                $menu  = $this ->topOnboarding();
                $notifiedweeks_days =[''=>''] +  Weekdays::pluck('name','id')->all();
                
                $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
               
                  
                return view('onboarding.tasktypes.create',['menu'=>$menu,'employee'=>$employee,'notifiedweeks_days'=>$notifiedweeks_days,'title'=>'New Task Types']);
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
                                       'notifiedbefore'        => 'required|numeric',
                                       'notifiedweeks_days'        => 'required',
                                       'email'        => 'required|email',
                                       'employee_id'        => 'required',
                                       'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new TaskTypes;
         
         $row->name =$request->name;
         $row->notifiedbefore =$request->notifiedbefore;
         $row->notifiedweeks_days =$request->notifiedweeks_days;
         $row->email =$request->email;
         $row->employee_id =$request->employee_id;
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('TaskTypes.index')
                        ->with('success','Task Types created successfully');
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
        
            
                $menu  = $this ->topOnboarding();
                $notifiedweeks_days =[''=>''] +  Weekdays::pluck('name','id')->all();
                
                $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
                
                $row   = TaskTypes::find($id);
                  
                return view('onboarding.tasktypes.edit',['row'=>$row,'menu'=>$menu,'employee'=>$employee,'notifiedweeks_days'=>$notifiedweeks_days,'title'=>'New Task Types']);
                
                
                
                
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
                                       'notifiedbefore'        => 'required|numeric',
                                       'notifiedweeks_days'        => 'required',
                                       'email'        => 'required|email',
                                       'employee_id'        => 'required',
                                       'description' =>  'required',
                                                                                 
                                        ]);
             
         TaskTypes::where('id',$id)->update(['name' =>$request->name,
                                                'notifiedbefore' =>$request->notifiedbefore ,
                                                'notifiedweeks_days' =>$request->notifiedweeks_days,
                                                'email' =>$request->email,
                                                'employee_id' =>$request->employee_id,
                                                'description'   =>$request->description]);
    
         
         return redirect()->route('TaskTypes.index')
                        ->with('success','Task Types created successfully');
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
        
         
        TaskTypes::where('id',$id)->delete();
        return redirect()->route('TaskTypes.index')
                        ->with('success','Task Types  deleted successfully');
    }
}
