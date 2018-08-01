<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Account\EmployeeCount;
use DB;
use App\Maintenance\Maintenance;

use App\Models\Main\SpiceTenant;

use App\User;
use App\Role;
use App\Permission;
use Input;


class AccountDomainController extends Controller
{
    //



    public function domainselect(){

          return view('account.domainselect');
    }
    public function domainselectStore(Request $request){

          $this->validate($request, [ 'hostname'  => 'required',]);


          $count  = DB::table('tenants')
                     ->select(DB::raw('count(*) as user_count'))
                     ->where('identifier',$request->hostname)
                    ->count();


          if($count >0){

          //return redirect('http://'.$request->hostname.'.'.\Config::get('constants.hostname').'/login');

          return redirect('/login');

          }else{


            return redirect()->route('Domain.Login')
                        ->with('error','Error the url does not exist please register to continue');

          }

    }
    
    public function EmailConfirm(Request $request,$email,$url){
        
    
        
           $count  = DB::table('users')
                     ->select(DB::raw('count(*) as user_count'))
                     ->where('email',$email)
                    ->count();
           
           
           if($count ==0)
           {
           
           $urlcount =  DB::table('tenants')
                      ->select(DB::raw('count(*) as user_count'))
                      ->where('identifier',$email)
                      ->count();
           
              if($urlcount  ==0){
                 
                 
                 return 0;
                 
                 
                 
             }else{
                 
                 return 2;
                 
             }
           
           }else{
               
               return 1;
           }
           
       
        
    }
     public function FirstRegister(){




         $employeeccount = ['' => ''] + EmployeeCount::select(  DB::raw("CONCAT(low,' - ',high,'  ','Employees') AS name, id"))
                                      ->orderBy('id','ASC')
                                      ->pluck('name', 'id')
                                       ->all();
        return view('account.firstregister',['employeecount'=>$employeeccount]);

    }

    public function RegisterClientstore( Request $request){

              /*  $this->validate($request, ['firstname'      => 'required',
                                       'lastname' =>  'required',
                                       'email'  =>  'required|email|unique:users',
                                       'employeecount'    =>  'required',
                                       'key'  =>  'required',
                                       'confirmkey' => 'required|same:key',
                                       'url' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:tenants,identifier'

                                  ],[
                                    'firstname.required' => ' we need your first name',
                                    'lastname.required' => ' we need your first name',
                                    'email.required' => 'We need your email address also',
                                    'lastname.required'  => 'c\'mon, you want to contact me without saying anything?',
                                    'confirmkey.required'  => 'Confirm Password is required',
                                    'key.required'  => 'Password is required',
                                   ]);*/



        $row =new SpiceTenant;

        $db = Input::get('url');

        $row->identifier =$db;

        $row->name =$db;

        $row->schema_name ='spice_'.$db;

        $row->schema_server   ='localhost';

        $row->joined_date   =date('Y-m-d');

        $row->schema_username   =$db;

        $row->schema_password   =$db;

        $row->employeecount = Input::get('employeecount'); 

        $row->save();

        $tenant  = $row->id;



        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->tenant         = $tenant;
        $admin->save();

        $hrm = new Role();
        $hrm->name         = 'hrm';
        $hrm->display_name = 'Human Resource'; // optional
        $hrm->description  = 'User is the owner of a given Human Resource Management'; // optional
        $hrm->tenant         = $tenant;
        $hrm->save();

        $emp = new Role();
        $emp->name         = 'employee';
        $emp->display_name = 'Employee'; // optional
        $emp->description  = 'Employeee'; // optional
        $emp->tenant         = $tenant;
        $emp->save();



        $input['name'] =  Input::get('firstname') .'  '. Input::get('lastname');

        $input['email'] = Input::get('email');

        $input['tenant'] = $tenant;

        $input['password'] = bcrypt(Input::get('key'));

        $user = User::create($input);

        // role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id




        foreach(Permission::all()  as $obj){

             $admin->attachPermission($obj->id);

             if($obj->employee==1){

                $emp->attachPermission($obj->id);
             }
        }


        $maint   =new Maintenance();

        $db =Input::get('url');


        $maint->CreateDB($db);


        $this->welcome_email_body( Input::get('email') , Input::get('key'));
        
        
        
        return 1;

      /// return redirect()->route('Confirm.Login')
                       /// ->with('success','Email with Login Details Send to your Email');

    }

    public function ConfirmLogin(){

        $successmsg = Input::get('msg');
        
        
         return view('account.ConfirmLogin',['successmsg'=>$successmsg]);

    }
    
    public function  ForgotPassword(){
        
        
         return view('account.forgotpassword');
    }
}
