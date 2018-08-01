<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Leave\LeaveType;

use App\Models\Leave\LeaveDuration;

use App\Models\Leave\AssignLeave;

use App\Models\Pim\Employee;
use App\Models\Pim\LeaveEarned;
use App\Models\Leave\AnnualPolicy;
use DB;
use Auth;
use App\Models\Admin\Sysprefs;
use Input;


class AssignLeaveController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        //
         $this->DBReconnect($request);

         if(Auth::user()->hasRole('employee')){

              $emp_row =Employee::where('userid','=',Auth::user()->id)->first();

            if ( $id!=$emp_row->id){

                return redirect('Employee/'.$emp_row->id.'/edit');
            }

         }

         $annualamount =0;
         
         $maternityamount =0;
         
         $sickamount =0;
         
         
         $sysall = Sysprefs::all();
         
         
           foreach ($sysall as $row){
                  
                        if($row->name == 'annualleave'){
                         $annualamount   =$row->value;
                        }
                        elseif($row->name == 'maternityleave'){
                        $maternityamount   =$row->value;
                        }
                        elseif($row->name == 'sickleave'){
                        $sickamount   =$row->value;
                        }
                  
              }
         
         
         $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                    ->where('employees.id',$id)
                                    ->select('assign_leaves.*','employees.emp_lastname','employees.emp_middle_name',
                                            'employees.emp_firstname','leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();
         
         
         
         
         
         
         


        $employee =Employee::find($id);

    //    $menu  = $this ->topLeave();


        return view('leave.assignleave.index',['sickamount'=>$sickamount,'maternityamount'=>$maternityamount,'annualamount'=>$annualamount,
            'assignleave'=>$assignleave,'employee'=>$employee,'titledays'=>'Number Leave Days Remainings',
            'title'=>'Leave  List','employeemenu'=>$this->topProfilePim($id,'AssignLeave.index')]);
    }


    public function request(Request $request,$id){


          $this->DBReconnect($request);
        $profmenu =$this->topProfilePim($id);

         $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                    ->where('employees.id','=',$id)
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name',
                                            'employees.emp_lastname','employees.emp_lastname',
                                            'leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();


       return view('leave.assignleave.request',['id'=>$id,'assignleave'=>$assignleave,'profmenu'=>$profmenu]);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function leaverequestcreate(Request $request,$id)
    {
        //
             //  $menu  = $this ->topLeave();
                $this->DBReconnect($request);
               $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();

               $leavetype = ['' => ''] + LeaveType::pluck('name', 'id')->all();

               $duration = ['' => ''] + LeaveDuration::pluck('name', 'id')->all();




               return view('leave.assignleave.leaverequestcreate',['id'=>$id,'duration'=>$duration,'leavetype'=>$leavetype,'employee'=>$employee,'menu'=>'','title'=>'Request  Leave Details']);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function LeaveCalendar(Request $request){

        $menu  = $this ->topLeave();
         $this->DBReconnect($request);

         $events = array();

         $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name',
                                            'employees.emp_lastname','employees.emp_lastname','assign_leaves.id',
                                            'leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();

         foreach ($assignleave as $obj){
             $e = array();
                $e['id'] = $obj->id;
                $e['title'] = $obj->emp_firstname.'  '. $obj->emp_middle_name;
                $e['start'] = $obj->fromdate;
                $e['end'] = $obj->todate;
                $allday = ($obj->duration == 1) ? true : false;
                $e['allDay'] = $allday;

                $e[' backgroundColor']= "#f56954"; //red
                $e[' borderColor']=  "#f56954"; //red
                array_push($events, $e);
         }

       //echo json_encode($events);


        return view('leave.leavecalendar.index',['title'=>'Leave Calendar','events'=>json_encode($events),'menu'=>$menu]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
               $menu  = $this ->topLeave();

               $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();

               $leavetype = ['' => ''] + LeaveType::pluck('name', 'id')->all();

               $duration = ['' => ''] + LeaveDuration::pluck('name', 'id')->all();




               return view('leave.assignleave.create',['duration'=>$duration,'leavetype'=>$leavetype,'employee'=>$employee,'menu'=>$menu,'title'=>'Assign  Leave']);
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
       // print_r($request);

        // echo $request->name;


           $this->DBReconnect($request);
        $this->validate($request, [    'employee_id'      => 'required',
                                       'leavetype' =>  'required',
                                       'fromdate'  =>  'required',
                                       'todate'    =>  'required',
                                       'duration'  =>  'required',
                                       'comment'   =>  'required',

                                  ]);

         $row =new AssignLeave;

         $row->name =$request->employee_id;

         $row->leavetype   =$request->leavetype;

         $row->fromdate   =$request->fromdate;

         $row->todate   =$request->todate;

         $row->duration   =$request->duration;

         $row->comment   =$request->comment;

         $row->save();


         return redirect()->route('AssignLeave.request',$request->employee_id)
                        ->with('success','AssignLeave created successfully');
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
               $assignleave  =AssignLeave::find($id);

               $menu  = $this ->topLeave();

              $employee = ['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();

               $emp_row  = Employee::find($assignleave->name);

               $emp_name  = $emp_row->emp_lastname.'    '.$emp_row->emp_firstname.'    '.$emp_row->emp_middle_name;

               $leavetype = ['' => ''] + LeaveType::pluck('name', 'id')->all();

               $duration = ['' => ''] + LeaveDuration::pluck('name', 'id')->all();


               return view('leave.assignleave.edit',['emp_name'=> $emp_name,'assignleave'=> $assignleave,'duration'=>$duration,'leavetype'=>$leavetype,'employee'=>$employee,'menu'=>$menu,'title'=>'Update Assign  Leave']);
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


        $this->validate($request, [    'name'      => 'required',
                                       'leavetype' =>  'required',
                                       'fromdate'  =>  'required',
                                       'todate'    =>  'required',
                                       'duration'  =>  'required',
                                       'comment'   =>  'required',

                                  ]);


           AssignLeave::where('id',$id)->update(['name' => $request->name,
                                                'leavetype'   =>$request->leavetype,
                                                 'fromdate'   =>$request->fromdate,
                                                 'todate'   =>$request->todate,
                                                 'duration'   =>$request->duration,
                                                 'comment'   =>$request->comment]);







         return redirect()->route('AssignLeave.index')
                          ->with('success','Assign Leave created successfully');
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


        AssignLeave::where('id',$id)->delete();
        return redirect()->route('AssignLeave.index')
                        ->with('success','Assign Leave  deleted successfully');
    }




     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decision(Request $request)
    {
        //

         $this->DBReconnect($request);
         $ap_array =array();

         $count_row  = LeaveType::count();

         $emp_all    = LeaveType::all();


         $annual_policy  =AnnualPolicy::all();


         foreach($annual_policy as $k)
         {
             $ap_array[$k->leavetype] = $k->id;

         }
         $leaveearned = ['' => ''] + LeaveEarned::pluck('name', 'id')->all();

         $menu  = $this ->topLeave();

         if($count_row > 0){

                return view('leave.assignleave.leavedecision',['title'=>'Time Off','emp_all'=>$emp_all,'leaveearned'=> $leaveearned,'menu'=>$menu,'ap_array'=>$ap_array]);
         }else{

                return view('leave.leavetype.leavetypedecision',['menu'=>$menu]);

         }

    }
    
    
    public function Approvals(Request $request){
        
          $this->DBReconnect($request); 
         
         
           $events = array();
           
           $datefrom =Input::get('datefrom');
        
           $dateto   =Input::get('dateto');
           
          // $employee =Input::get('employee');
           
           
           if(! empty($datefrom)){

           $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                   // ->where('employees.id','=',$employee)
                                    ->whereDate('assign_leaves.fromdate', '>', $datefrom)
                                    ->whereDate('assign_leaves.todate', '<', $dateto)
                                    ->where('assign_leaves.status',0)
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name',
                                            'employees.emp_lastname','employees.emp_lastname','assign_leaves.id',
                                            'leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();

            foreach ($assignleave as $obj){
                $e = array();
                $e['id'] = $obj->id;
                $e['title'] = $obj->emp_firstname.'  '. $obj->emp_middle_name;
                $e['start'] = $obj->fromdate;
                $e['end'] = $obj->todate;
                $allday = ($obj->duration == 1) ? true : false;
                $e['allDay'] = $allday;
                $e['reasons'] = $obj->comment;
                $e[' backgroundColor']= "#f56954"; //red
                $e[' borderColor']=  "#f56954"; //red
                array_push($events, $e);
             }
           }else{
               
               
                 $month = date('m');
               
               
                $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                  //  ->where('employees.id','=',$employee)
                                   // ->whereDate('assign_leaves.fromdate', '>', $datefrom)
                                    //->whereDate('assign_leaves.todate', '<', $dateto)
                                    ->whereMonth('assign_leaves.fromdate','=',$month)
                                    ->where('assign_leaves.status',0)
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name',
                                            'employees.emp_lastname','employees.emp_lastname','assign_leaves.id',
                                            'leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();

            foreach ($assignleave as $obj){
                $e = array();
                $e['id'] = $obj->id;
                $e['title'] = $obj->emp_firstname.'  '. $obj->emp_middle_name;
                $e['start'] = $obj->fromdate;
                $e['end'] = $obj->todate;
                $allday = ($obj->duration == 1) ? true : false;
                $e['allDay'] = $allday;
                $e['reasons'] = $obj->comment;
                $e[' backgroundColor']= "#f56954"; //red
                $e[' borderColor']=  "#f56954"; //red
                array_push($events, $e);
             }
               
               
           }
             
         
        return view('leave.assignleave.approvals',['events'=>$events,'title'=>'Leaves to be Approved']);
     
    }
    
    public function ApproveNow(Request $request ,$id){
        
           $this->DBReconnect($request); 
        
           
            $events =array();
            
            
            $holidays =array();
            
            $year =date('Y');
            
            
           
            
            
            
          
            
            
            
            
            
           
            $assignleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                  //  ->where('employees.id','=',$employee)
                                   // ->whereDate('assign_leaves.fromdate', '>', $datefrom)
                                    //->whereDate('assign_leaves.todate', '<', $dateto)
                                   ->where('assign_leaves.id',$id)
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name','employees.id as employeeid',
                                            'employees.emp_lastname','employees.emp_lastname','assign_leaves.id',
                                            'leave_types.name as leavetype_name', 'leave_types.leaveduration as leavedurationname','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();

            foreach ($assignleave as $obj){
                
                
                 $totalleaveusage =0;
            
                  $maxday  =0;
            
            
                  $assignleaves2 = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                    ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                    ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                  //  ->where('employees.id','=',$employee)
                                   // ->whereDate('assign_leaves.fromdate', '>', $datefrom)
                                    //->whereDate('assign_leaves.todate', '<', $dateto)
                                    ->where('assign_leaves.status',1)
                                    ->where('employees.id',$obj->employeeid)
                                    ->where('leave_types.leaveduration',$obj->leavedurationname)
                                    ->whereYear('assign_leaves.fromdate','=',$year)
                                    ->select('assign_leaves.*','employees.emp_firstname','employees.emp_middle_name',
                                            'employees.emp_lastname','employees.emp_lastname','assign_leaves.id',
                                            'leave_types.name as leavetype_name','leave_types.leaveduration as leavedurationname','leave_durations.name as leave_durations')
                                    ->orderBy('assign_leaves.id','DESC')->get();
            
            
            foreach($assignleaves2 as $obj2){
                
                
                $totalleaveusage +=$this->DateDifferenceNotWeekend($obj2->fromdate,$obj2->todate);
                
                
                
                
            }
            
               $sysall = Sysprefs::where('name',$obj->leavedurationname)->first();
               
                $maxday  =$sysall->value;
                $e = array();
                $e['id'] = $obj->id;
                $e['title'] = $obj->emp_firstname.'  '. $obj->emp_middle_name;
                $e['start'] = $obj->fromdate;
                $e['end'] = $obj->todate;
                $allday = ($obj->duration == 1) ? true : false;
                $e['allDay'] = $allday;
                $e['reasons'] = $obj->comment;
                
                $e['maxday'] = $maxday;
                 $e['totalleaveusage'] = $totalleaveusage;
                
                $e['leavedurationname'] =$obj->leavedurationname;
                $e['leavetypename']  =$obj->leavetype_name;
                
                $e['daycount'] = $this->DateDifferenceNotWeekend($obj->fromdate,$obj->todate);
                $e[' backgroundColor']= "#f56954"; //red
                $e[' borderColor']=  "#f56954"; //red
                array_push($events, $e);
             }
             
             
             
             
             
             
               
        
        return  view('leave.assignleave.approvenow',['events'=>$events,'title'=>'Approve Leave','id'=>$id]);
    }

    public function AssignleaveApprovalsstore(Request $request){
        
           $this->DBReconnect($request); 
        
          AssignLeave::where('id',$request->id)->update(['status'=>$request->status]);
        
       
         return redirect()->route('Assignleave.Approvals')
                          ->with('success','Leave has been Approved');
    }
}
