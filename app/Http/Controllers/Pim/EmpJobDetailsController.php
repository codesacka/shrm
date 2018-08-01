<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\EmpJobDetails;

use App\Models\Pim\Employee;

use App\Models\Admin\WorkShifts;

use App\Models\Admin\JobTitle;

use App\Models\Admin\JobCategory;

use App\Models\Admin\EmploymentStatus;

use App\Models\Admin\Locations;

use DB;
use Auth;

class EmpJobDetailsController extends Controller
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

        $empjobdetails = EmpJobDetails::where('employee_id','=',$id)->get();

        $employee = Employee::find($id);

        $activejob  =  EmpJobDetails::join('employment_statuses', 'emp_job_details.employmentstatus', '=', 'employment_statuses.id')
                                      ->join('job_titles', 'emp_job_details.jobtitle', '=', 'job_titles.id')
                                      ->select('emp_job_details.*','job_titles.name as jobname','employment_statuses.name as  empstatus')
                                      ->where('emp_job_details.status',1)
                                      ->where('emp_job_details.jobtitle',$employee->job_title_code)
                                      ->where('employee_id','=',$id)->get();

         $allempjobdetails  =  EmpJobDetails::join('employment_statuses', 'emp_job_details.employmentstatus', '=', 'employment_statuses.id')
                                      ->join('job_titles', 'emp_job_details.jobtitle', '=', 'job_titles.id')
                                      ->select('emp_job_details.*','job_titles.name as jobname','employment_statuses.name as  empstatus')
                                      ->where('employee_id','=',$id)->get();



        return view('pim.empjobdetails.index',['title'=>'Job','activejob'=>$activejob,'id'=>$id,'allempjobdetails'=>$allempjobdetails,'empjobdetails'=>$empjobdetails,'employee'=>$employee,'employeemenu'=>$this->topProfilePim($id,'EmpJobDetails.index')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //
                 $this->DBReconnect($request);

                 $employee = Employee::find($id);

                 $empjobdetails = EmpJobDetails::where('employee_id','=',$id)->paginate(15);

                 $reportto = ['' => ''] + Employee::
                                           select(  DB::raw("CONCAT(emp_firstname,'       ',emp_middle_name,'        ', emp_lastname) AS name,id"))
                                            ->where('id','!=',$id)
                                            ->orderBy('id','DESC')
                                            ->pluck('name', 'id')
                                            ->all();

                 $jobtitle = ['' => ''] + JobTitle::pluck('name', 'id')->all();

                 $jobcategory = ['' => ''] + JobCategory::pluck('name', 'id')->all();



                 $employmentstatus = ['' => ''] + EmploymentStatus::pluck('name', 'id')->all();

                 $active           =  ['' => ''] +array(0=>'Past Job',1=>'Current');

                   $location    = ['' => ''] + Locations::pluck('name', 'id')->all();

                 $profmenu  =   $this->topProfilePim($id);


           return view('pim.empjobdetails.create',['profmenu' =>$profmenu,'employmentstatus'=>$employmentstatus,'location'=>$location,'active'=>$active,'jobcategory'=> $jobcategory,'jobtitle'=> $jobtitle,'reportto'=>$reportto ,'empjobdetails'=>$empjobdetails,'title'=>'Employment Details', 'ntitle'=>'Job History','id'=>$id]);

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

           $this->validate($request, [ 'joineddate'        => 'required',
                                       'probationdate'        => 'required',
                                       'employmentstatus'        => 'required',
                                       'jobspecification'        => 'required',

                                        ],
                                   [

                                     'joineddate.required' => 'Joined Date  required ',
                                     'probationdate.required' => 'Probation date details required',
                                     'employmentstatus.required' => 'Employment status details required',
                                     'jobspecification.required' => 'Job Specifications details required',
                                   ]);

         $row =new EmpJobDetails;

         $row->joineddate =$request->joineddate;

         $row->probationdate =$request->probationdate;

         $row->employmentstatus   =$request->employmentstatus;

         $row->jobspecification   =$request->jobspecification;

         $row->location   =$request->location;

         $row->reportto   =$request->reportto;

         $row->jobcategory   =$request->jobcategory;

         $row->permanencydate =$request->permanencydate;

         $row->jobtitle   =$request->jobtitle;

         $row->status   =$request->status;

         $row->employee_id   =$request->employee_id;

         $row->save();

         if($request->status ==1){

             Employee::where('id',$request->employee_id)->update(['job_title_code'=>$request->jobtitle]);

         }


         return redirect('EmpJobDetails/'.$request->employee_id.'/index')
                        ->with('success','Employee Job Details created successfully');
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
    public function edit($id)
    {
        //
                 $row = EmpJobDetails::find($id);

                 $employee = Employee::find($row->employee_id);

                 $empjobdetails = EmpJobDetails::where('employee_id','=',$row->employee_id)->paginate(15);

                 $workshifts = ['' => ''] + WorkShifts::pluck('name', 'id')->all();

                 $jobtitle = ['' => ''] + JobTitle::pluck('name', 'id')->all();

                 $jobcategory = ['' => ''] + JobCategory::pluck('name', 'id')->all();

                 $employmentstatus = ['' => ''] + EmploymentStatus::pluck('name', 'id')->all();

                 $menu  =''; //$this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);


                  $reportto = ['' => ''] + Employee::
                                           select(  DB::raw("CONCAT(emp_firstname,'       ',emp_middle_name,'        ', emp_lastname) AS name,id"))
                                            ->where('id','!=',$id)
                                            ->orderBy('id','DESC')
                                            ->pluck('name', 'id')
                                            ->all();

                 $active           =  ['' => ''] +array(0=>'Past Job',1=>'Current');

                 $location    = ['' => ''] + Locations::pluck('name', 'id')->all();


                return view('pim.empjobdetails.edit',['row'=>$row,'employmentstatus'=>$employmentstatus,'location'=>$location,'reportto'=>$reportto ,'active'=>$active,'jobcategory'=> $jobcategory,'jobtitle'=> $jobtitle,'workshifts'=>$workshifts ,'empjobdetails'=>$empjobdetails,'menu'=>$menu,'title'=>'Employment Details', 'ntitle'=>'Job History','id'=>$row->employee_id]);

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

         $this->validate($request, [ 'joineddate'        => 'required',
                                       'probationdate'        => 'required',
                                       'employmentstatus'        => 'required',
                                       'jobspecification'        => 'required',

                                        ],
                                   [

                                     'joineddate.required' => 'Joined Date  required ',
                                     'probationdate.required' => 'Probation date details required',
                                     'employmentstatus.required' => 'Employment status details required',
                                     'jobspecification.required' => 'Job Specifications details required',
                                   ]);

         $row =new EmpJobDetails;



         $row->save();

         EmpJobDetails::where('id',$id)->update([ 'joineddate' =>$request->joineddate,
                                                  'probationdate' =>$request->probationdat,
                                                  'employmentstatus'   =>$request->employmentstatus,
                                                  'jobspecification'   => $request->jobspecification,

                                                    'location'   =>$request->location,

                                                   'workshift'   =>$request->workshift,

                                                    'jobcategory'   =>$request->jobcategory,

                                                    'permanencydate' =>$request->permanencydate,

                                                    'jobtitle'   =>$request->jobtitle
                                                   ]);


         return redirect('EmpJobDetails/'.$request->employee_id.'/create')
                        ->with('success','Employee job Details updated successfully');
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

        $empcont_row = EmpJobDetails::find($id);
         EmpJobDetails::where('id',$id)->delete();
        return redirect('EmpJobDetails/'.$empcont_row->employee_id.'/create')
                        ->with('success','Employee job Details  deleted successfully');
    }
}
