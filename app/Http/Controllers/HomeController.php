<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ntrust;
use App\Models\Admin\Sysprefs;
use App\Models\Pim\Employee;
use Auth;
use App\Models\Pim\EmpSocialDetails;


use App\Models\Admin\MaritalStatus;
use App\Models\Admin\Locations;
use App\Models\Admin\Gender;
use App\Models\Admin\JobTitle;
use App\Models\Admin\Nationality;
use App\Models\Leave\AssignLeave;

use App\Models\Admin\Deductions;
use App\Models\Admin\Benefits;
use App\Models\Admin\Bank;
use App\Models\Leave\LeaveType;



class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if( \Ntrust::hasRole('employee'))
            return  redirect("/employeedashboard");

         if( \Ntrust::hasRole('superadmin'))
            return  redirect("/Tenant/dashboard");

       $this->DBReconnect($request);

        $dba ='';
        $legal_name='';
        $company_website='';

        $sysall = Sysprefs::all();

        foreach ($sysall as $row){

            if($row->name == 'dba'){
            $dba   =$row->value;
            }
            elseif($row->name == 'legal_name'){
            $legal_name   =$row->value;
            }
            elseif($row->name == 'company_website'){
            $company_website   =$row->value;
            }
            elseif($row->name == 'coy_logo'){
              $companylogo   =$row->value;
            }
          }


        //  $homemodule = \App\Models\Admin\Starter::where()->get()

          $employee  =Employee::offset(0)
                ->limit(5)
                ->get();
          $employeecount  = Employee::count();

         $month = date('m');
         
         
          $comingleave = AssignLeave::join('employees', 'assign_leaves.name', '=', 'employees.id')
                                     ->join('leave_types', 'assign_leaves.leavetype', '=', 'leave_types.id')
                                     ->join('leave_durations', 'assign_leaves.duration', '=', 'leave_durations.id')
                                     ->select('assign_leaves.*','employees.emp_lastname','employees.emp_middle_name',
                                             'employees.emp_lastname','employees.emp_lastname','employees.id as employee_id',
                                             'leave_types.name as leavetype_name','leave_durations.name as leave_durations')
                                     ->whereMonth('assign_leaves.fromdate','=',$month)
                                     ->orderBy('assign_leaves.fromdate','DESC')->get(6);

         
                 
          $birthdates = Employee::select('*')
                        ->whereMonth('emp_birthday','=',$month)
                        ->orderBy('emp_birthday','DESC')->get();


                 $month =array(1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');

                    $chart=array();

                 foreach($month as $k=>$v){

                        $employeeall =Employee::whereMonth('joined_date', $k)
                                              ->whereYear('joined_date', date('Y'))->count();

                      $chart[]=array("Month"=>$v, "Headcount"=>$employeeall);

                    }



                   $charts =json_encode($chart);

                   $locationcount   = Locations::count();  
                   
                   $jobtitlecount   = JobTitle::count();
                   
                   $deductioncount  = Deductions::count();
                   
                   $benefitcount    =Benefits::count();
                   
                   $bankcount       =Bank::count();
                   
                   $leavetypecount  =LeaveType::count();
                 
                   
                   
                   
               


        //return view('home');
        return view('dashboard.dashboard',[ 'companylogo'=>$companylogo,'comingleave'=>$comingleave,
             'locationcount'=>$locationcount, 'jobtitlecount'=> $jobtitlecount,'bankcount'=>$bankcount,
            'deductioncount'=>$deductioncount,'benefitcount'=>$benefitcount,'leavetypecount'=> $leavetypecount,
            'charts'=>$charts,'birthdates'=>$birthdates,'employee'=>$employee,
            'employeecount'=> $employeecount,'company_website'=>$company_website,
            'legal_name'=>$legal_name,'dba'=>$dba]);
    }

    public function employeedashboard(Request $request){

         if(! \Ntrust::hasRole('employee'))
            return  redirect("/home");




        $this->DBReconnect($request);

        $emp_row =Employee::where('userid','=',Auth::user()->id)->first();



        return redirect('Employee/'.$emp_row->id.'/edit');

       /* $gender_row =Employee::join('genders', 'employees.emp_gender', '=', 'genders.id')
                               ->where('employees.id',$emp_row->id)
                               ->select('employees.*','genders.name as gender')->first();

        $marital_row =Employee::join('marital_statuses', 'employees.emp_marital_status', '=', 'marital_statuses.id')
                               ->where('employees.id',$emp_row->id)
                               ->select('employees.*','marital_statuses.name as marital_status')->first();


        $location_row  =Employee::join('locations', 'employees.work_station', '=', 'locations.id')
                               ->where('employees.id',$emp_row->id)
                               ->select('employees.*','locations.name as workstation')->first();


        $jobtitle_row =Employee::join('job_titles', 'employees.job_title_code', '=', 'job_titles.id')
                               ->where('employees.id',$emp_row->id)
                               ->select('employees.*','job_titles.name as jobtitle')->first();
        $empsocial = EmpSocialDetails::where('employee_id','=',$emp_row->id)->get();

        $jobtitle =[''=>''] + JobTitle::pluck('name','id')->all();

        $location =[''=>''] + Locations::pluck('name','id')->all();

        $jobtitle =[''=>''] + JobTitle::pluck('name','id')->all();

        $gender   =[''=>''] + Gender::pluck('name','id')->all();

        $maritalstatus  = [''=>'']+MaritalStatus::pluck('name','id')->all();

        $nationality = ['' => ''] + Nationality::pluck('name', 'id')->all();

        $profmenu = $this->topProfilePim($emp_row->id);



       return view('pim.employee.emppersonalinfo',['profmenu'=>$profmenu,'nationality'=>$nationality,'maritalstatus'=>$maritalstatus, 'location'=>$location,'jobtitle'=>$jobtitle,'gender'=>$gender,'empsocial'=>$empsocial,'emp_row'=>$emp_row,'marital_row'=>$marital_row, 'gender_row'=>$gender_row,'jobtitle_row'=>$jobtitle_row, 'location_row'=>$location_row,]);

        */


    }

    public function ComingIndex(){



      return  view('errors.comingsoon');
    }

}
