<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use  App\Models\Admin\PlanCoverage;

use App\Models\Pim\BenefitsPlanCoverage;

class PlanCoverageController extends Controller
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
        
        $plancoverages = PlanCoverage::orderBy('id','DESC')->get();
        
        $menu  =  $this ->topAdmin();
              
              
        return view('admin.plancoverages.index',['sidemenu'=>$this->sidemenu('BenefitsPlanCoverage.index'),'plancoverages'=>$plancoverages,'title'=>'Plan Coverage List','menu'=>$menu]);
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
            return view('admin.plancoverages.create',['sidemenu'=>$this->sidemenu('BenefitsPlanCoverage.index'),'menu'=>$menu,'title'=>'New Plan Coverage']);
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
             
         $row =new PlanCoverage;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('BenefitsPlanCoverage.index')
                        ->with('success','Plan Coverage created successfully');
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
         $plancoverage = PlanCoverage::find($id);
         
         
         $menu  =   $this ->topAdmin();
         
         $title ='Update Plan Coverage';
         
         $sidemenu=$this->sidemenu('BenefitsPlanCoverage.index');
                 
                 
         return view('admin.plancoverages.edit',compact('sidemenu','plancoverage','menu','title'));
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
             
         $row =new PlanCoverage;
         
         
         
         PlanCoverage::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('BenefitsPlanCoverage.index')
                        ->with('success','Plan Coverage updated successfully');
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
         
         $plancoverage_count  =BenefitsPlanCoverage::where('plan',$id) ->count();

        if($plancoverage_count > 0){
            
           return redirect()->route('BenefitsPlanCoverage.index')
                        ->with('error','Deductions  has dependecies');
            
        }else{
         
        PlanCoverage::where('id',$id)->delete();
        return redirect()->route('BenefitsPlanCoverage.index')
                        ->with('success','Plan Coverage  deleted successfully');
        
        }
    }
}
