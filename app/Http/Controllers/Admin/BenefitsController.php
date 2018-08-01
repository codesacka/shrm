<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Benefits;

use App\Models\Pim\SalaryBenefits;

class BenefitsController extends Controller
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
        $benefits = Benefits::orderBy('id','DESC')->get();
        
        $menu  = $this ->topAdmin();
              
              
        return view('admin.benefits.index',['sidemenu'=>$this->sidemenu('Benefits.index'),'benefits'=>$benefits,'title'=>'Benefits List','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $this->DBReconnect($request);
        //
                  $menu  = $this ->topAdmin();
                return view('admin.benefits.create',['sidemenu'=>$this->sidemenu('Benefits.index'),'menu'=>$menu,'title'=>'New Benefits']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $this->DBReconnect($request);
        //
        
        
        $this->validate($request, [    'name'        => 'required',
                                                 'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Benefits;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Benefits.index')
                        ->with('success','Benefits created successfully');
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
         $this->DBReconnect($request);
        //
        
            
         $benefits = Benefits::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title ='Update Benefits';
         
         $sidemenu=$this->sidemenu('Benefits.index');
         
         return view('admin.benefits.edit',compact('sidemenu','benefits','menu','title'));
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
             
         $row =new Benefits;
         
         
         
         Benefits::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Benefits.index')
                        ->with('success','Benefits created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $this->DBReconnect($request); 
        
        $salarybenefit_count  =SalaryBenefits::where('benefit',$id) ->count();

        if($salarybenefit_count > 0){
            
           return redirect()->route('Benefits.index')
                        ->with('error','Benefits  has dependecies');
            
        }else{
           
         
        Benefits::where('id',$id)->delete();
        
        
        return redirect()->route('Benefits.index')
                        ->with('success','Benefits  deleted successfully');
        
        }
    }
}
