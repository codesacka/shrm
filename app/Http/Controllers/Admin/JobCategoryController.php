<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\JobCategory;

class JobCategoryController extends Controller
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
         $jobcategory = JobCategory::orderBy('id','DESC')->paginate(5);
        
        $menu  =   $this ->topAdmin();;
              
              
        return view('admin.jobcategory.index',['sidemenu'=>$this->sidemenu('EmploymentStatus.index'),'jobcategory'=>$jobcategory,'title'=>'Department List','menu'=>$menu]);
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
              $menu  =  $this ->topAdmin();
                  
                  
                return view('admin.jobcategory.create',['sidemenu'=>$this->sidemenu('JobCategory.index'),'menu'=>$menu,'title'=>'New Department']);
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
             
         $row =new JobCategory;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('JobCategory.index')
                        ->with('success','Job Category created successfully');
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
            
         $jobcategory = JobCategory::find($id);
         
         
          $menu  =  $this->Companysettings('Job Category');
         
         return view('admin.jobcategory.edit',['sidemenu'=>$this->sidemenu('JobCategory.index'),'jobcategory'=>$jobcategory,'menu'=>$menu,'title'=>'Edit Department']);
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
             
         $row =new JobCategory;
         
         
         
         JobCategory::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('JobCategory.index')
                        ->with('success','Job Category created successfully');
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
         
        JobCategory::where('id',$id)->delete();
        return redirect()->route('JobCategory.index')
                        ->with('success','Job Category   deleted successfully');
    }
}
