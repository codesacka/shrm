<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Deductions; 

use App\Models\Pim\SalaryDeductions;

class DeductionController extends Controller
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
        $deductions = Deductions::orderBy('id','DESC')->get();
        
        $menu  = $this ->topAdmin();
              
              
        return view('admin.deductions.index',['sidemenu'=>$this->sidemenu('Deductions.index'),'deductions'=>$deductions,'title'=>'Deductions List','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                  $menu  = $this ->topAdmin();
                return view('admin.deductions.create',['sidemenu'=>$this->sidemenu('Benefits.index'),'menu'=>$menu,'title'=>'New Deductions']);
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
             
         $row =new Deductions;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Deductions.index')
                        ->with('success','Deductions created successfully');
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
    public function edit(Request $request, $id)
    {
        //
        
         
         $this->DBReconnect($request);
            
         $deductions = Deductions::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title ='Update Deductions';
         
         $sidemenu=$this->sidemenu('Deductions.index');
         
         return view('admin.deductions.edit',compact('sidemenu','deductions','menu','title'));
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
             
        
         
         
         
         Deductions::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Deductions.index')
                        ->with('success','Deductions Updated successfully');
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
         
         
        $salarydeduction_count  =SalaryDeductions::where('deduction',$id) ->count();

        if($salarydeduction_count > 0){
            
           return redirect()->route('Deductions.index')
                        ->with('error','Deductions  has dependecies');
            
        }else{
           
         
        Deductions::where('id',$id)->delete();
        return redirect()->route('Deductions.index')
                        ->with('success','Deductions  deleted successfully');
        
        }
    }
}
