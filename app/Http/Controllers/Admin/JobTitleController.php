<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\JobTitle;


class JobTitleController extends Controller
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
        
        $jobtitle = JobTitle::orderBy('id','DESC')->get();
        
        $menu  =  $this ->topAdmin();
              
              
        return view('admin.jobtitle.index',['sidemenu'=>$this->sidemenu('JobTitle.index'),'jobtitle'=>$jobtitle,'title'=>'Job Title List','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
                 $menu  =   $this ->topAdmin();
                return view('admin.jobtitle.create',['sidemenu'=>$this->sidemenu('JobTitle.index'),'menu'=>$menu,'title'=>'New Job Title']);
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
             
         $row =new JobTitle;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('JobTitle.index')
                        ->with('success','JobTitle created successfully');
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
         $jobtitle = JobTitle::find($id);
         
         
         $menu  =   $this ->topAdmin();
         
         $title ='Update Job title';
         
         $sidemenu=$this->sidemenu('JobTitle.index');
         
         return view('admin.jobtitle.edit',compact('sidemenu','jobtitle','menu','title'));
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
             
         $row =new JobTitle;
         
         
         
         JobTitle::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('JobTitle.index')
                        ->with('success','JobTitle created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
          $this->DBReconnect($request);
         
        JobTitle::where('id',$id)->delete();
        return redirect()->route('JobTitle.index')
                        ->with('success','JobTitle  deleted successfully');
    }
}
