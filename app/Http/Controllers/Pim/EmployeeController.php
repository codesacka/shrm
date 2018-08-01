<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Employee;

use App\Models\Admin\Locations;

use App\Models\Admin\JobTitle;

use App\Models\Admin\Gender;

use App\Models\Pim\EmpSocialDetails;

use App\Models\Pim\EmpContactDetails;


use App\Models\Admin\MaritalStatus;

use App\Models\Pim\EmpEmergencyContactDetails;

use App\Models\Pim\EmployeeSalaryPayRate;

use App\Models\Pim\EmployeeSalaryType;

use App\Models\Pim\Salary;


use App\Models\Pim\EmpBankInfo;

use App\Models\Pim\Empskill;

use App\Models\Pim\Terminationreason;

use App\Models\Pim\EmpEducation;

use App\Models\Pim\EmployeeDocuments;
use App\Models\Admin\Bank;
use App\User;
use App\Role;
use App\Permission;
use DB;
use Hash;
use Auth;
use App\Models\Admin\Nationality;
use App\Models\Pim\EmpLanguages;
use App\Models\Pim\EmpJobDetails;
use App\Models\Admin\Sysprefs;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

         


          /* $admin =\App\Role::find(5);

           $createPost = new \App\Permission();
           $createPost->name         = 'reporting-to-edit';
           $createPost->display_name = 'Edit Reporting to'; // optional
           // Allow a user to...
           $createPost->description  = 'Edit Reporting To'; // optional
           $createPost->save();
           
           
           $admin->attachPermission($createPost);*/

           $this->DBReconnect($request);

            $menu  = ''; //$this ->topPim();

            $employee =  Employee::orderBy('id','DESC')->get();

            return view('pim.employee.index',['menu'=>$menu,'title'=>'Employee List','employee'=>$employee]);
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

                $menu  = $this ->topPim('Personal  Information',$id='');

                $location =[''=>''] + Locations::pluck('name','id')->all();

                $jobtitle =[''=>''] + JobTitle::pluck('name','id')->all();

                $gender   =[''=>''] + Gender::pluck('name','id')->all();

                $maritalstatus  = [''=>'']+MaritalStatus::pluck('name','id')->all();


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

                    $emp_payrate =  [''=>''] +EmployeeSalaryPayRate::pluck('name','id')->all();

                    $emp_saltype = [''=>''] +EmployeeSalaryType::pluck('name','id')->all();


                return view('pim.employee.create',[ 'companylogo'=>$companylogo,'emp_payrate'=>$emp_payrate,
                          'emp_saltype'=>$emp_saltype,'maritalstatus'=>$maritalstatus,
                           'jobtitle'=>$jobtitle,'gender'=>$gender,'id'=>0,
                          'location'=>$location,'menu'=>$menu,'title'=>'New Employee','personaltitle'=>'Personal Details',
                          'compensationtitle'=>'Compensation Details','contacttitle'=>'Contact Details']);
    }

    
    
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account(Request $request)
    {
           
         $this->DBReconnect($request);
         
         
        $employee =Employee::where('userid',Auth::user()->id)->first();
        
        
        return view('pim.employee.account',['employee'=>$employee,'title'=>'Update Account']);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  accountstore(Request $request){
        
         $this->DBReconnect($request);
         
         
          $this->validate($request, [
        
            'password' => 'required|same:confirm-password'
        ]);
          
          
          
          $password  =$request->password;
          
          
          
         
          User::where('id',Auth::user()->id)->update(['password' => $request->password]);
          
          
           $employee =Employee::where('userid',Auth::user()->id)->first();
        
          
          
           return redirect()->route('Employee.edit',$employee->id)
                        ->with('success','Employees Account Updated  successfully');
          
          
          
          
        
        
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

        $this->validate($request, [    'emp_firstname'        => 'required',
                                       'emp_lastname' =>  'required',
                                       'emp_middle_name' =>  'required',
                                       'employee_id' =>  'required|unique:tenant.employees',
                                      // 'emp_photo' =>  'required',
                                       'joined_date' =>  'required',
                                       'work_station' =>  'required',
                                       'job_title_code' =>  'required',
                                       'email' =>  'required|email|unique:main.users',
                                       'emp_gender' =>  'required',
                                       'emp_marital_status' =>  'required',
                                       'emp_birthday' =>  'required',
                                        ]);

      //  $emp_photo = md5(rand().$request->emp_work_email) . '.' .$request->file('emp_photo')->getClientOriginalExtension();

        $hash_code =md5(rand().$request->email);

        //$request->file('emp_photo')->move(  base_path() .'/public/uploads/', $emp_photo);

         $row =new Employee;

         $row->emp_lastname =$request->emp_lastname;

         $row->emp_firstname =$request->emp_firstname;

         $row->emp_middle_name =$request->emp_middle_name;

         $row->employee_id   =$request->employee_id;

       //  $row->emp_photo   =$emp_photo;

         $row->joined_date   =$request->joined_date;

         $row->work_station   =$request->work_station;

         $row->job_title_code   =$request->job_title_code;

         $row->emp_work_email   =$email=$request->email;

         $row->emp_gender   =$request->emp_gender;

         $row->emp_marital_status   =$request->emp_marital_status;

         $row->hash_code   = $hash_code;

         $row->emp_birthday =$request->emp_birthday;

         $row->emp_hm_telephone =$request->emp_hm_telephone;

         $row->emp_work_telephone =$request->emp_work_telephone;

         $row->emp_mobile =$request->emp_mobile;

         $row->save();




          $salrow  =new Salary;


          $salrow->amount =$request->amount;

          $salrow->saltype =$request->saltype;

          $salrow->salper =$request->salper;

          $salrow->employee_id =$row->id;

          $salrow->jobtitle =$request->job_title_code;


         $salrow->payfrom =$request->joined_date;

         $salrow->payto   =date('Y-m-d', strtotime('+4 years', strtotime($request->joined_date)));

         $salrow->active =1;

         $salrow->save();



         $jobrow =new EmpJobDetails;

         $jobrow->joineddate =$request->joined_date;

         $jobrow->probationdate =$request->joined_date;

         $jobrow->location   =$request->work_station;

         $jobrow->permanencydate =$request->joined_date;

         $jobrow->jobtitle   =$request->job_title_code;

         $jobrow->employee_id   =$row->id;

         $jobrow->status  =1;

         $jobrow->save();




        $upassword = $this->randomPassword();
        $password  = bcrypt($upassword);







         $html = $this->welcome_email_body($email , $upassword);

         $role= Role::where('tenant',Auth::user()->tenant)->where('name', 'like', 'employee')->first();

         $subject =\Config::get('constants.welcome_spicehrm');

         $nameto  = $request->emp_firstname.'  '.$request->emp_middle_name.'  '.$request->emp_lastname;

         $emailto =$email;


         $input['name'] = $nameto;

         $input['email'] = $emailto;

         $input['password'] = $password;

         $input['tenant']  =Auth::user()->tenant;

         $user = User::create($input);

         Employee::where('id',$row->id)->update(['userid'=>$user->id]);

         $user->attachRole($role->id);

         $this->new_email($subject,$nameto,$emailto,$html);





         return redirect()->route('Employee.index')
                        ->with('success','Employee created successfully and Employeee Login Details Send to employee');
    }

   public function editphoto(Request $request ,$id){


     return view('pim.employee.employeephoto',['id'=>$id]);
   }


         /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function photostore(Request $request){


        $this->DBReconnect($request);
          $employeeid= $request->employee_id;
         
       

       /// echo $employeeid.'   '.$jobtitle;

         $emp_photo = md5(rand()) . '.' .$request->file('emp_photo')->getClientOriginalExtension();

         $hash_code =md5(rand());

         $request->file('emp_photo')->move(  base_path() .'/public/uploads/', $emp_photo);


            try {

                Employee::where('id',$employeeid)->update(['emp_photo' => $emp_photo]);

            //   echo 1;

              }catch(\Illuminate\Database\QueryException $ex){

                  echo $ex->getMessage();
                // Note any method of class PDOException can be called on $ex.
              }
  
         
           return redirect('Employee/'.$employeeid.'/edit')
                        ->with('success','Employee created successfully');
       }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
         $this->DBReconnect($request);

        $emp_row  = Employee ::find($id);



        $location =[''=>''] + Locations::pluck('name','id')->all();

        $jobtitle =[''=>''] + JobTitle::pluck('name','id')->all();

        $gender   =[''=>''] + Gender::pluck('name','id')->all();

        $maritalstatus  = [''=>'']+MaritalStatus::pluck('name','id')->all();




        $location_row  =Employee::join('locations', 'employees.work_station', '=', 'locations.id')
                               ->where('employees.id',$id)
                               ->select('employees.*','locations.name as workstation')->first();


        $jobtitle_row =Employee::join('job_titles', 'employees.job_title_code', '=', 'job_titles.id')
                               ->where('employees.id',$id)
                               ->select('employees.*','job_titles.name as jobtitle')->first();



        $jobtitle =[''=>''] + JobTitle::pluck('name','id')->all();


        $gender_row =Employee::join('genders', 'employees.emp_gender', '=', 'genders.id')
                               ->where('employees.id',$id)
                               ->select('employees.*','genders.name as gender')->first();



        $marital_row =Employee::join('marital_statuses', 'employees.emp_marital_status', '=', 'marital_statuses.id')
                               ->where('employees.id',$id)
                               ->select('employees.*','marital_statuses.name as marital_status')->first();


        $empsocial = EmpSocialDetails::where('employee_id','=',$id)->get();


        $empcontact = EmpContactDetails::where('employee_id','=',$id)->get();


         $empemergent = EmpEmergencyContactDetails::where('employee_id','=',$id)->get();


         $profmenu  =$this->topProfilePim($id);

         $nationality = ['' => ''] + Nationality::pluck('name', 'id')->all();

        $empeducation = EmpEducation::where('employee_id','=',$id)->get();

        $empskills =   $empskill = Empskill::join('skills', 'empskills.skills', '=', 'skills.id')
                           ->select('empskills.*', 'skills.name')
                           ->where('employee_id','=',$id)
                           ->orderBy('id','DESC')->get();

        return view('pim.employee.emppersonalinfo',['empeducation'=>$empeducation,'empskills'=>$empskills,'nationality'=>$nationality,'maritalstatus'=>$maritalstatus,'jobtitle'=>$jobtitle,'gender'=>$gender,'empsocial'=>$empsocial,
                          'location'=>$location,'marital_row'=>$marital_row, 'gender_row'=>$gender_row,'empcontact'=>$empcontact,
                          'empemergent'=>$empemergent,'pinfo'=>true,'emp_row'=>$emp_row,'jobtitle' =>$jobtitle,'jobtitle_row'=>$jobtitle_row,
                                            'location_row'=>$location_row,'id'=>$id,'profmenu'=>$profmenu]);
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


            /*    $admin =\App\Role::find(7);

                $createPost = new \App\Permission();
                $createPost->name         = 'employee-show';
                $createPost->display_name = 'Employee Show'; // optional

                $createPost->employee = 1; // optional
                // Allow a user to...
                $createPost->description  = 'Employee Show'; // optional
                $createPost->save();
                $admin->attachPermission($createPost);*/

         $this->DBReconnect($request);

         if(Auth::user()->hasRole('employee')){

              $emp_row =Employee::where('userid','=',Auth::user()->id)->first();

            if ( $id!=$emp_row->id){

                return redirect('Employee/'.$emp_row->id.'/edit');
            }

         }

         $employee = Employee::find($id);

          $menu  = $this ->topPim2('Edit Personal  Information',$id);


                $location =[''=>''] + Locations::pluck('name','id')->all();

                $jobtitle =[''=>''] + JobTitle::pluck('name','id')->all();

                $gender   =[''=>''] + Gender::pluck('name','id')->all();

                $maritalstatus  = [''=>'']+MaritalStatus::pluck('name','id')->all();
                
                $bank =[''=>''] + Bank::pluck('name','id')->all();


                $empeducation = EmpEducation::join('education','emp_educations.level', '=' , 'education.id')
                                               ->select('emp_educations.*', 'education.name')
                                               ->where('employee_id','=',$id)
                                               ->orderBy('id','DESC')->get();

                 $empskills =   $empskill = Empskill::join('skills', 'empskills.skills', '=', 'skills.id')
                           ->select('empskills.*', 'skills.name')
                           ->where('employee_id','=',$id)
                           ->orderBy('id','DESC')->get();


                $emplanguages = EmpLanguages::join('languages', 'emp_languages.language', '=', 'languages.id')
                                               ->join('language_skills', 'emp_languages.skill', '=', 'language_skills.id')
                                               ->join('language_fluency_levels', 'emp_languages.fluencylevel', '=', 'language_fluency_levels.id')
                                               ->select('emp_languages.*','language_skills.name as lskills','language_fluency_levels.name as fluencylevels','languages.name as languagename')
                                               ->where('emp_languages.employee_id','=',$id)
                                               ->orderBy('id','DESC')->get();


         return view('pim.employee.edit',['employeemenu'=>$this->topProfilePim($id,'Employee.edit'),'emplanguages'=>$emplanguages,'banktitle'=>'Bank Details',
         'empskills'=>$empskills,'empeducation'=>$empeducation,'emplangtitle'=>'Language Skills for the Employee','payrolltitle'=>'Payroll Details',
             'empskilltitle'=>'Employee Skill Details','empeducationtitle'=>'Employee Education Details','contacttitle'=>'Contact Details',
             'personaltitle'=>'Personal Details','title'=>'Update Employee','employee'=>$employee,'empid'=>$id,
             'maritalstatus'=>$maritalstatus,'jobtitle'=>$jobtitle,'gender'=>$gender,'location'=>$location,'bank'=>$bank]);

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


        if($request->action=='salary'){

              $this->validate($request, [  'saltype'        => 'required',
                                       'salper' =>  'required',
                                       'amount' =>  'required|numeric',
                                       'employee_id'=>'required',],

                                     [

                                     'saltype.required' => 'Employee Salary Type  required ',
                                     'emp_payrate.required' => 'Employee Pay Rate required',
                                     ]);

          $emp_r  = Employee::find($request->employee_id);




         Salary::where('employee_id',$id)->where('active',1)
                     ->update(['amount' =>$request->amount,
                            'saltype' =>$request->saltype,
                             'salper' =>$request->salper]);






         return redirect('EmploymentCompensationedit/'.$emp_r->id.'/edit')
                        ->with('success','Employee updated successfully');



        }  elseif($request->action=='bank'){




              $this->validate($request, [  'bank'        => 'required',
                                       'branch' =>  'required',
                                       'account' =>  'required|numeric',
                                       'employee_id'=>'required']);

          $emp_r  = Employee::find($request->employee_id);




           EmpBankInfo::where('employee_id',$id)->update

                        (['bank' =>$request->bank,

                        'branch' =>$request->branch,

                         'account' =>$request->account]);






               return redirect('EditBankInformation/'.$emp_r->id.'/edit')
                        ->with('success','Employee updated successfully');

        }else{

          $this->validate($request, [    'emp_firstname'        => 'required',
                                       'emp_lastname' =>  'required',
                                       'emp_middle_name' =>  'required',
                                      // 'employee_id' =>  'required|unique:tenant.employees',
                                      // 'emp_photo' =>  'required',
                                       'joined_date' =>  'required',
                                       'work_station' =>  'required',
                                       'job_title_code' =>  'required',
                                       'emp_work_email' =>  'required|email',
                                       'emp_gender' =>  'required',
                                       'emp_marital_status' =>  'required',
                                       'emp_birthday' =>  'required',
                                        ]);





         Employee::where('id',$id)->update(['emp_lastname' => $request->emp_lastname,
                                            'emp_firstname' => $request->emp_firstname,
                                            'emp_middle_name' =>$request->emp_middle_name,
                                            'joined_date'   =>$request->joined_date,
                                            'work_station'  =>$request->work_station,
                                            'job_title_code'   =>$request->job_title_code,
                                            'emp_work_email'   =>$request->emp_work_email,
                                            'employee_id' =>$request->employee_id,
                                            'emp_birthday' => $request->emp_birthday,
                                            'emp_marital_status' => $request->emp_marital_status,
                                            'emp_gender' =>$request->emp_gender,
                                            'krataxPin' => $request->krataxPin,
                                            'nhif' => $request->nhif,
                                            'nssf' =>$request->nssf,
                                            'bank' => $request->bank,
                                            'bankbranch' => $request->bankbranch,
                                            'bankaccount' =>$request->bankaccount
                                             ]);




         return redirect('Employee/'.$id.'/edit')
                        ->with('success','Employee details updated successfully');
        }
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
        
        $employee_count  =Salary::where('employee_id',$id) ->count();

        if($employee_count > 0){
            
           return redirect()->route('Employee.index')
                        ->with('error','Employee details  has dependecies');
            
        }else{
           
           Employee::where('id',$id)->delete();
           
           return redirect()->route('Employee.index')
                        ->with('success','Employee details  deleted successfully');
        
        }
      
    }
}
