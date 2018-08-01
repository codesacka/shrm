<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Leave\WorkWeek;

use App\Models\Leave\DayState;

class WorkWeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
       $menu  = $this ->topLeave();
       
       $rowcount =0;
       
       
       if(WorkWeek::count() >0){
       
            $row_week  =WorkWeek::where('id','>', 0)->first();

            $row = WorkWeek::find($row_week->id);
            $rowcount =WorkWeek::count();
            
       
       }else{
           
        ///   $row_week  =WorkWeek::where('id','>', 0)->first();

           $row       = 0;
       }
       
      
       
      
              
       $daystate  =  ['' => ''] +DayState::pluck('name', 'id')->all();



        return view('leave.workweek.index',['rowcount'=>$rowcount,'row'=>$row,'daystate'=>$daystate,'title'=>'Work Week','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        
         
        $this->validate($request, [    'monday'        => 'required',
                                       'tuesday'        => 'required',
                                       'wednesday'        => 'required',
                                       'thursday' =>  'required',
                                       'friday' =>  'required',    
                                       'saturday' =>  'required',  
                                       'sunday' =>  'required',  
                                  ]);
             
         $row =new WorkWeek;
         
         $row->monday =$request->monday;
         
         $row->tuesday =$request->tuesday;
         
         $row->wednesday =$request->wednesday;
         
         $row->thursday   =$request->thursday;
         
         $row->friday   =$request->friday;
         
         $row->saturday   =$request->saturday;
         
         $row->sunday   =$request->sunday;
         
         $row->save();
        
           return redirect()->route('WorkWeek.index')
                        ->with('success','Work Week updated successfully');
       
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
        
        
          
        $this->validate($request, [    'monday'        => 'required',
                                       'tuesday'        => 'required',
                                       'wednesday'        => 'required',
                                       'thursday' =>  'required',
                                       'friday' =>  'required',    
                                       'saturday' =>  'required',  
                                       'sunday' =>  'required',  
                                  ]);
             
         WorkWeek::where('id',$id)->update(['monday' =>$request->monday,
         
         'tuesday' =>$request->tuesday,
         
         'wednesday' =>$request->wednesday,
         
         'thursday'   =>$request->thursday,
         
         'friday'   =>$request->friday,
         
         'saturday'   =>$request->saturday,
         
         'sunday'   =>$request->sunday]);
         
          return redirect()->route('WorkWeek.index')
                        ->with('success','Work Week updated successfully');
         
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
    }
}
