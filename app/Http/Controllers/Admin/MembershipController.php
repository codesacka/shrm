<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Membership;

class MembershipController extends Controller
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
         
        $membership = Membership::orderBy('id','DESC')->get();
        
        $menu  = $this ->topAdmin();
        
        
              
              
        return view('admin.membership.index',['sidemenu'=>$this->sidemenu('Membership.index'),'membership'=>$membership,'title'=>'Membership List','menu'=>$menu]);
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
         
         return view('admin.membership.create',['sidemenu'=>$this->sidemenu('Membership.index'),'menu'=>$menu, 'title'=>'New Membership']);
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
             
         $row =new Membership;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Membership.index')
                        ->with('success','Membership created successfully');
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
            
        $membership = Membership::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title= 'Update Membership';
         
         $sidemenu=$this->sidemenu('Membership.index');
         
         return view('admin.membership.edit',compact('sidemenu','membership','menu','title'));
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
             
         $row =new Membership;
         
         
         
         Membership::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Membership.index')
                        ->with('success','Membership updated successfully');
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
        
         
        Membership::where('id',$id)->delete();
        return redirect()->route('Membership.index')
                        ->with('success','Membership  deleted successfully');
    }
}
