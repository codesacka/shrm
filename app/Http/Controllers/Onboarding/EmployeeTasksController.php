<?php

namespace App\Http\Controllers\Onboarding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Onboarding\EmployeeTasking;

use App\Models\Onboarding\Priority;

use App\Models\Onboarding\Events;

use App\Models\Pim\Employee; 

use App\Models\Onboarding\Weekdays;

use DB;



class EmployeeTasksController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $employeetasking = EmployeeTasking::orderBy('id','DESC')->paginate(5);
        
        $menu  = $this ->topOnboarding();
              
              
        return view('onboarding.employeetasks.index',['employeetasking'=>$employeetasking,'title'=>'Employee Tasks','menu'=>$menu]);
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
                  
                $priority   = ['' => ''] +Priority::pluck('name', 'id')->all();
               
                $events   = ['' => ''] +Events::pluck('name', 'id')->all();
                
                $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
                
                $weekdays   = ['' => ''] +Weekdays::pluck('name', 'id')->all();
                  
                  
                  
                return view('onboarding.employeetasks.create',['weekdays'=> $weekdays,'priority'=>$priority,'employee'=>$employee,'events'=>$events,'priority'=>$priority,'menu'=>$menu,'title'=>'New Employee Tasks']);
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
                                       'description' =>  'required',
                                       'event'        => 'required',  
                                       'participant'        => 'required',
                                       'owner'        => 'required',
                                       'comment'        => 'required',
                                       'email'        => 'required|email',
                                       'priority'        => 'required',
                                       'dayweek'        => 'required',
                                       'notifiedbefore'        => 'required',
                                       'effectivedate'        => 'required',
                                        ]);
             
         $row =new EmployeeTasking;
         
         $row->name =$request->name;
         
         $row->event =$request->event;
          
         $row->participant =$request->participant;
           
         $row->owner =$request->owner;
            
         $row->description =$request->description;
        
         $row->email    =$request->email;
         
         $row->priority =$request->priority;
              
         $row->notifiedbefore =$request->notifiedbefore;    
         
         $row->dayweek =$request->dayweek; 
         
         $row->duedate =$request->duedate;    
         
         $row->effectivedate =$request->effectivedate;    
           
           
         $row->comment   =$request->comment;
         
         $row->save();
         
         
         return redirect()->route('EmployeeTasks.index')
                        ->with('success','Employee Tasks created successfully');
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
        
            
                $menu  = $$this ->topOnboarding();
                  
                $priority   = ['' => ''] +Priority::pluck('name', 'id')->all();
               
                $events   = ['' => ''] +Events::pluck('name', 'id')->all();
                
                $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
                
                $weekdays   = ['' => ''] +Weekdays::pluck('name', 'id')->all();
                  
                
                $row  =EmployeeTasking::find($id);
                  
                  
                return view('onboarding.employeetasks.edit',['row'=>$row,'weekdays'=> $weekdays,'priority'=>$priority,'employee'=>$employee,'events'=>$events,'priority'=>$priority,'menu'=>$menu,'title'=>'New Employee Tasks']);

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
                                       'description' =>  'required',
                                       'event'        => 'required',  
                                       'participant'        => 'required',
                                       'owner'        => 'required',
                                       'comment'        => 'required',
                                       'email'        => 'required|email',
                                       'priority'        => 'required',
                                       'dayweek'        => 'required',
                                       'notifiedbefore'        => 'required',
                                       'effectivedate'        => 'required',
                                        ]);
             
         EmployeeTasking::where('id',$id)->update([
         
                                    'name' =>$request->name,

                                    'event' =>$request->event,

                                    'participant' =>$request->participant,

                                    'owner' =>$request->owner,

                                    'description' =>$request->description,

                                    'email'    =>$request->email,

                                    'priority' =>$request->priority,

                                    'notifiedbefore' =>$request->notifiedbefore,   

                                    'dayweek' =>$request->dayweek,

                                    'duedate' =>$request->duedate,   

                                    'effectivedate' =>$request->effectivedate,    
                                    'comment'   =>$request->comment ]);
         
        
         
         
         return redirect()->route('EmployeeTasks.index')
                        ->with('success','Employee Tasks Updated successfully');
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
        
         
        JobTitle::where('id',$id)->delete();
        return redirect()->route('JobTitle.index')
                        ->with('success','JobTitle  deleted successfully');
    }
}
