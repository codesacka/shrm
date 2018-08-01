<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\WorkShifts;

class WorkShiftController extends Controller
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
         $workshifts = WorkShifts::orderBy('id','DESC')->get();
        
         $menu  = $this ->topAdmin();
              
              
        return view('admin.workshift.index',['workshifts'=>$workshifts,'title'=>'Work Shifts List','menu'=>$menu]);
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
         $workshifts = WorkShifts::orderBy('id','DESC')->paginate(25);
        
         $menu  = $this ->topAdmin();
              
              
        return view('admin.workshift.create',['workshifts'=>$workshifts,'title'=>'Work Shifts List','menu'=>$menu]);
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
                                        'starttime' =>  'required',
                                         'endtime' =>  'required',                                         
                                        ]);
             
         $row =new WorkShifts;
         
         $row->name =$request->name;
         
         $row->starttime   =date("H:i", strtotime($request->starttime));
         
         $row->endtime   =date("H:i", strtotime($request->endtime));
         
         
         $row->save();
         
         
         return redirect()->route('WorkShift.index')
                        ->with('success','Work Shift created successfully');
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
          $workshift = WorkShifts::find($id);
         
         
          $menu  = $this ->topAdmin();
         
          $title='Update Work Shift';
         
         return view('admin.workshift.edit',compact('workshift','skills','menu','title'));
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
                                        'starttime' =>  'required',
                                         'endtime' =>  'required',                                         
                                        ]);
  
          
          WorkShifts::where('id',$id)->update(['name' => $request->name,
                                              'starttime' =>date("H:i", strtotime($request->starttime)),
                                              'endtime'=>date("H:i", strtotime($request->endtime))]);
         
         return redirect()->route('WorkShift.index')
                        ->with('success','Work Shift Updated successfully');
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
        
         WorkShifts::where('id',$id)->delete();
        return redirect()->route('WorkShifts.index')
                        ->with('success','WorkShifts  deleted successfully');
    }
}
