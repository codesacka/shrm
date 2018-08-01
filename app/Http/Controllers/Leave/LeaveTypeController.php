<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Leave\LeaveType;

use App\Models\Leave\HourPolicy;
use App\Models\Pim\LeaveEarned;
use App\Models\Leave\AnnualPolicy;
use App\Models\Admin\DaySetting;
use App\Models\Admin\AccrualSetting;

use App\Models\Admin\CaryOVerSetting;

use App\Models\Admin\FirstAccrual;

use App\Models\Admin\Sysprefs;



class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
            if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
        
         $this->DBReconnect($request);
        
        $leavetype = LeaveType::orderBy('id','DESC')->get();
        
        $menu  = $this ->topLeave();
              
              
        return view('leave.leavetype.index',['sidemenu'=>$this->sidemenu('LeaveType.index'),'leavetype'=>$leavetype,'title'=>'Leave Type List','menu'=>$menu]);
    }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Policyindex(Request $request)
    {
        //
        
            if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
        
         $this->DBReconnect($request);
        
        $leavetype = LeaveType::orderBy('id','DESC')->get();
        
        $annualpolicy  = AnnualPolicy::all();
        
        $menu  = $this ->topLeave();
              
              
        return view('leave.leavetype.policyindex',['leavetype'=>$leavetype,'annualpolicy'=>$annualpolicy,'title'=>'Leave Type List','menu'=>$menu]);
    }
    
    
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createleavepolicy(Request $request)
    {
        //
        
            if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
         $this->DBReconnect($request);
        
         $leavetype = ['' => ''] + LeaveType::pluck('name', 'id')->all();
        
         $menu  = $this ->topLeave();
        
        
         $daysetting =  DaySetting::pluck('name', 'id')->all();
          
         $accrualsetting =  AccrualSetting::pluck('name', 'id')->all();
         
         $caryoversetting =  CaryOVerSetting::pluck('name', 'id')->all();
         
         
         $firstaccrual  =FirstAccrual::where('id','<',3)->pluck('name', 'id')->all();
         
         $accrualshappen  =FirstAccrual::where('id','>',2)->where('id','<',5)->pluck('name', 'id')->all();
         
         $carryoverdate  =FirstAccrual::where('id','>',4)->pluck('name', 'id')->all();
         
         
         
         for($i=1; $i < 16 ; $i++){
             
             $first[$i] =$i;
         }
              
         
          for($i=15; $i < 28; $i++){
             
             $second[$i] =$i;
         }
              
        return view('leave.leavetype.createleavepolicy',['leavetype'=>$leavetype,'first'=> $first,'second'=> $second,'carryoverdate' =>$carryoverdate,'accrualshappen'=>$accrualshappen,'firstaccrual'=>$firstaccrual,'caryoversetting'=>$caryoversetting,'accrualsetting'=> $accrualsetting,'daysetting'=>$daysetting,'title'=>'Add Time Off Policy','menu'=>$menu]);
    }
    
    
    
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editleavepolicy(Request $request,$id)
    {
        //
        
        
            if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
        
         $this->DBReconnect($request);
        
         $leavetype = ['' => ''] + LeaveType::pluck('name', 'id')->all();
        
         $menu  = $this ->topLeave();
        
        
         $daysetting =  DaySetting::pluck('name', 'id')->all();
          
         $accrualsetting =  AccrualSetting::pluck('name', 'id')->all();
         
         $caryoversetting =  CaryOVerSetting::pluck('name', 'id')->all();
         
         
         $firstaccrual  =FirstAccrual::where('id','<',3)->pluck('name', 'id')->all();
         
         $accrualshappen  =FirstAccrual::where('id','>',2)->where('id','<',5)->pluck('name', 'id')->all();
         
         $carryoverdate  =FirstAccrual::where('id','>',4)->pluck('name', 'id')->all();
         
         
         
         for($i=1; $i < 16 ; $i++){
             
             $first[$i] =$i;
         }
              
         
          for($i=15; $i < 28; $i++){
             
             $second[$i] =$i;
         }
              
        return view('leave.leavetype.editleavepolicy',['row'=>AnnualPolicy::find($id),'leavetype'=>$leavetype,'first'=> $first,'second'=> $second,'carryoverdate' =>$carryoverdate,'accrualshappen'=>$accrualshappen,'firstaccrual'=>$firstaccrual,'caryoversetting'=>$caryoversetting,'accrualsetting'=> $accrualsetting,'daysetting'=>$daysetting,'title'=>'Add Time Off Policy','menu'=>$menu]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        
        
            if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
                
                
               $this->DBReconnect($request);
               $menu  = $this ->topLeave();
               
               
               $sysall = Sysprefs::all();
               
               $annualleave  ='';
               
               $maternityleave  ='';
               
               $sickleave  ='';
                
                
               
              foreach ($sysall as $row){
                  
                        if($row->name == 'annualleave'){
                         $annualleave   =$row->value;
                        }
                        elseif($row->name == 'maternityleave'){
                        $maternityleave   =$row->value;
                        }
                        elseif($row->name == 'sickleave'){
                        $sickleave   =$row->value;
                        }
                  
              }
                
               
               
                return view('leave.leavetype.create',['sidemenu'=>$this->sidemenu('LeaveType.index'),'sickleave'=>$sickleave,'maternityleave'=>$maternityleave,'annualleave'=>$annualleave,'menu'=>$menu,'title'=>'New Leave Type']);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SetupPolicystore(Request $request)
    {
        //
        
        
            if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
              
              
        
            $this->DBReconnect($request);
 
            $row = new AnnualPolicy;
            
            $row->policyname =$request->policyname;
            $row->start  =$request->start;
            $row->daysetting  =$request->daysetting;
            $row->leavetype   =$request->leavetype;
            $row->amounthouraccrued   =$request->amounthouraccrued;
            $row->accruedamountfrom   =$request->accruedamountfrom;
            $row->accruedamountto   =$request->accruedamountto;
            $row->maxaccrual    =$request->maxaccrual;
            $row->firstaccrual   =$request->firstaccrual;
            $row->carryoverdate   =$request->carryoverdate;
            $row->accrualshappen  =$request->accrualshappen;
             
            $row->save();
             
            
                    
            
       
        
   
        
      
         
         return redirect()->route('LeaveType.Policyindex')
                        ->with('success','LeaveType Policy  updated successfully');
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
        
        if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
        
        $this->DBReconnect($request);
        $this->validate($request, [    'name'        => 'required',
                                       'description' =>  'required',
                                       'leaveduration' =>  'required',                                       
                                  ]);
             
         $row =new LeaveType;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->leaveduration   =$request->leaveduration;
         
         $row->save();
         
         
         return redirect()->route('LeaveType.index')
                        ->with('success','LeaveType created successfully');
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
        
        
         if( \Ntrust::hasRole('employee'))
         return  redirect("/employeedashboard");
        
         $this->DBReconnect($request);
             
             
         $leavetype = LeaveType::find($id);
         
         
         $menu  = $this ->topLeave();
         
         $title ='Update Leave Type ';
         
         $sysall = Sysprefs::all();
               
               $annualleave  ='';
               
               $maternityleave  ='';
               
               $sickleave  ='';
                
                
               
              foreach ($sysall as $row){
                  
                        if($row->name == 'annualleave'){
                         $annualleave   =$row->value;
                        }
                        elseif($row->name == 'maternityleave'){
                        $maternityleave   =$row->value;
                        }
                        elseif($row->name == 'sickleave'){
                        $sickleave   =$row->value;
                        }
                  
              }
                
               $sidemenu=$this->sidemenu('LeaveType.index');
         
         return view('leave.leavetype.edit',compact('sidemenu','leavetype','menu','title','annualleave','maternityleave','sickleave'));
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
                                        'leaveduration' =>  'required',                                                 
                                        ]);
             
         $row =new LeaveType;
         
         
         
         LeaveType::where('id',$id)->update(['name' => $request->name,
                                             'description' =>$request->description,
                                             'leaveduration'=>$request->leaveduration]);
         
         
         
         return redirect()->route('LeaveType.index')
                          ->with('success','LeaveType created successfully');
    }
    
   
      public function updateleavepolicy(Request $request, $id)
    {
        //
            if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");
        
        $this->DBReconnect($request);
             
    
         
         
         
         AnnualPolicy::where('leavetype',$id)
                       ->update([
                            'policyname' =>$request->policyname,
                             'start'  =>$request->start,
                             'daysetting'  =>$request->daysetting,
                             'leavetype'   =>$request->leavetype,
                             'amounthouraccrued'   =>$request->amounthouraccrued,
                             'accruedamountfrom'   =>$request->accruedamountfrom,
                             'accruedamountto'   =>$request->accruedamountto,
                             'maxaccrual'    =>$request->maxaccrual,
                             'firstaccrual'   =>$request->firstaccrual,
                             'carryoverdate'   =>$request->carryoverdate,
                             'accrualshappen'  =>$request->accrualshappen,
                         
                       ]);
         
         
     
            
            
             
         
         
         
         return redirect()->route('LeaveType.Policyindex')
                          ->with('success','LeaveType Policy updated successfully');
    }

    
    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       /* public function editleavepolicy(Request $request,$id)
        {
            //
            
            
              $this->DBReconnect($request);
             

             $policy = AnnualPolicy::where('leavetype','=',$id)->first();

             $state=0;
             
             
             $menu  = $this ->topLeave();
             
             $leaveearned = ['' => ''] + LeaveEarned::pluck('name', 'id')->all();
             
             
             if($policy->hourrate > 0){
             
             $state =1;
             }else{
                 
              $state=0;
             }

             $title ='Update Leave Type ';

            return view('leave.leavetype.editpolicy',['policy'=>$policy,'title'=>'Time Off','leaveearned'=> $leaveearned,'state'=>$state]); ;
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
        
        $leave_count  =AnnualPolicy::where('leavetype',$id) ->count();

        if($leave_count > 0){
            
           return redirect()->route('LeaveType.index')
                        ->with('error','LeaveType  has dependecies');
            
        }else{
           
           LeaveType::where('id',$id)->delete();
           
           return redirect()->route('LeaveType.index')
                        ->with('success','LeaveType  deleted successfully');
        
        }
    }
    
    
    
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteleavepolicy(Request $request,$id)
    {
        //
        
        $this->DBReconnect($request);
        
        $leave_count  =AnnualPolicy::where('leavetype',$id) ->count();

        if($leave_count > 0){
            
           return redirect()->route('LeaveType.Policyindex')
                        ->with('error','Leave Policy  has dependecies');
            
        }else{
           
           LeaveType::where('id',$id)->delete();
           
           return redirect()->route('LeaveType.Policyindex')
                        ->with('success','Leave Policy deleted successfully');
        
        }
    }
}
