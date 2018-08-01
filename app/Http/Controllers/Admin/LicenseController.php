<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Admin\Licenses;



class LicenseController extends Controller
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
          $license  =Licenses::orderBy('id','DESC')->get();
          
           $menu  = $this ->topAdmin();
        
          return view('admin.license.index',['sidemenu'=>$this->sidemenu('License.index'),'title'=>'Licenses  List','license'=>$license,'menu'=>$menu]);
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
                  
                  
                return view('admin.license.create',['sidemenu'=>$this->sidemenu('Language.index'),'menu'=>$menu , 'title'=>'New Licenses']);
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
             
         $row =new Licenses;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('License.index')
                        ->with('success','Licenses created successfully');
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
            
         $license = Licenses::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         return view('admin.license.edit',['sidemenu'=>$this->sidemenu('License.index'),'license'=>$license,'menu'=>$menu, 'title'=>'Update Licenses']);
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
             
         $row =new Licenses;
         
         
         
         Licenses::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('License.index')
                        ->with('success','Licenses Updated successfully');
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
         
        Licenses::where('id',$id)->delete();
        return redirect()->route('License.index')
                        ->with('success','License deleted successfully');
    }
}
