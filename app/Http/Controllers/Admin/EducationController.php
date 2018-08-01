<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Admin\Education;

class EducationController extends Controller
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
          $education  =Education::orderBy('id','DESC')->get();
          
           $menu  = $this ->topAdmin();
        
          return view('admin.education.index',['sidemenu'=>$this->sidemenu('Education.index'),'title'=>'Education  List','education'=>$education,'menu'=>$menu]);
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
                  
                  
                return view('admin.education.create',['sidemenu'=>$this->sidemenu('Benefits.index'),'menu'=>$menu , 'title'=>'New Education']);
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
             
         $row =new Education;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Education.index')
                        ->with('success','Education created successfully');
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
            
         $education = Education::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         return view('admin.education.edit',['sidemenu'=>$this->sidemenu('Education.index'),'education'=>$education,'menu'=>$menu, 'title'=>'Update Education']);
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
             
         $row =new Education;
         
         
         
         Education::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Education.index')
                        ->with('success','Education Updated successfully');
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
         
        Education::where('id',$id)->delete();
        return redirect()->route('Education.index')
                        ->with('success','Education   deleted successfully');
    }
}
