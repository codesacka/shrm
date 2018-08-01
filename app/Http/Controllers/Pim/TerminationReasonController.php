<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Terminationreason;

class TerminationReasonController extends Controller
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
        $terminationreason = Terminationreason::orderBy('id','DESC')->paginate(25);
        
        $menu  = $this ->topAdmin();
              
              
        return view('pim.terminationreason.index',['terminationreason'=>$terminationreason,'title'=>'Termination Reason list','menu'=>$menu]);
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
                $menu  = $this ->topAdmin();
                return view('pim.terminationreason.create',['menu'=>$menu,'title'=>'New Termination Reason']);
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
                                                 'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Terminationreason;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('TerminationReason.index')
                        ->with('success','Termination Reason created successfully');
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
            
         $terminationreason = Terminationreason::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title ='Update Termination Reason';
         
         return view('pim.terminationreason.edit',compact('terminationreason','menu','title'));
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
        
         $this->validate($request, [    'name'        => 'required',
                                        'description' =>  'required',
                                                                                 
                                        ]);
             
         //$row =Terminationreason;
                
         
         Terminationreason::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
        
         return redirect()->route('TerminationReason.index')
                        ->with('success','Termination Reason created successfully');
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
         
        Terminationreason::where('id',$id)->delete();
        return redirect()->route('TerminationReason.index')
                        ->with('success','Termination Reason  deleted successfully');
    }
}
