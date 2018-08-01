<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Admin\EmploymentStatus;

class EmploymentStatusController extends Controller
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
        $employmentstatus = EmploymentStatus::orderBy('id','DESC')->paginate(5);
        
        $menu  = $this ->topAdmin();
              
              
        return view('admin.employmentstatus.index',['sidemenu'=>$this->sidemenu('EmploymentStatus.index'),'employmentstatus'=>$employmentstatus,'title'=>'Employment Status List','menu'=>$menu]);
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
                  
                  
                return view('admin.employmentstatus.create',['sidemenu'=>$this->sidemenu('EmploymentStatus.index'),'menu'=>$menu,  'title'=>'New Employment Status']);
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
             
         $row =new EmploymentStatus;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('EmploymentStatus.index')
                        ->with('success','Employment Status created successfully');
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
            
         $employmentstatus = EmploymentStatus::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         return view('admin.employmentstatus.edit',['sidemenu'=>$this->sidemenu('EmploymentStatus.index'),'employmentstatus'=>$employmentstatus,'menu'=>$menu, 'title'=>'Update  Employment Status']);
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
                                                                                 
                                        ]);
             
         $row =new EmploymentStatus;
         
         
         
         EmploymentStatus::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('EmploymentStatus.index')
                        ->with('success','Employment Status created successfully');
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
        
         
        EmploymentStatus::where('id',$id)->delete();
        return redirect()->route('EmploymentStatus.index')
                        ->with('success','Employment Status  deleted successfully');
    }
}
