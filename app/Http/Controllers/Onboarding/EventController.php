<?php

namespace App\Http\Controllers\Onboarding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Onboarding\Events;

use App\Models\Admin\Locations;

class EventController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $events = Events::orderBy('id','DESC')->paginate(25);
        
        $menu  = $this ->topOnboarding();
              
              
        return view('onboarding.events.index',['events'=>$events,'title'=>'Events List','menu'=>$menu]);
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
                  
                  $location =['' =>'']+ Locations::pluck('name','id')->all();
                  
                return view('onboarding.events.create',['location'=>$location,'menu'=>$menu,'title'=>'Events']);
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
                                       'locations'        => 'required',
                                       'duedate'        => 'required', 
                                       'participant' =>  'required',
                                       'owners' =>  'required',                                           
                                        ]);
             
         $row =new Events;
         
         $row->name =$request->name;
         
         $row->locations =$request->locations;
         
         $row->duedate =$request->duedate;
         
         $row->participant   =$request->participant;
         
         $row->owners   =$request->owners;
         
         $row->save();
         
         
         return redirect()->route('Events.index')
                        ->with('success','Events created successfully');
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
                $row  =Events::find($id);
            
                $menu  = $this ->topOnboarding();
                  
                $location =['' =>'']+ Locations::pluck('name','id')->all();
                
                
                  
                return view('onboarding.events.edit',['row'=>$row,'location'=>$location,'menu'=>$menu,'title'=>'Events']);
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
                                       'locations'        => 'required',
                                       'duedate'        => 'required', 
                                       'participant' =>  'required',
                                       'owners' =>  'required',                                           
                                        ]);
             
         Events::where('id',$id)->update([       
                            'name' =>$request->name,

                            'locations' =>$request->locations,

                            'duedate' =>$request->duedate,

                            'participant'   =>$request->participant,

                            'owners'   =>$request->owners]);
         
         
         return redirect()->route('Events.index')
                        ->with('success','Events created successfully');
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
        
         
        Events::where('id',$id)->delete();
        return redirect()->route('Events.index')
                        ->with('success','Events  deleted successfully');
    }
}
