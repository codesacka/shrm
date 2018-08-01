<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Support\TenantConnector;
use App\Models\Main\SpiceTenant;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use TenantConnector;
    
    public function DBReconnect($request){
        $tenant  = Auth::user()->tenant;
        $this->reconnect(SpiceTenant::findOrFail($tenant)); 
        $request->session()->put('tenant', $tenant);
        return redirect('/');
       
    }
    
    public function DateDifferenceNotWeekend($datefrom,$dateto,$holiday=array()){
        
            $start = new \DateTime($datefrom);
            $end = new \DateTime($dateto);
            // otherwise the  end date is excluded (bug?)
            $end->modify('+1 day');

            $interval = $end->diff($start);

            // total days
            $days = $interval->days;

            // create an iterateable period of date (P1D equates to 1 day)
            $period = new \DatePeriod($start, new \DateInterval('P1D'), $end);

            // best stored as array, so you can add more than one
            $holidays = $holiday;

            foreach($period as $dt) {
                $curr = $dt->format('D');

                // substract if Saturday or Sunday
                if ($curr == 'Sat' || $curr == 'Sun') {
                    $days--;
                }

                // (optional) for the updated question
                elseif (in_array($dt->format('Y-m-d'), $holidays)) {
                    $days--;
                }
            }
        return $days;
    }
    
    public function DBReconnect2($request,$tenant){
       // $tenant  = Auth::user()->tenant;
              
        
        $this->reconnect(SpiceTenant::findOrFail($tenant)); 
        $request->session()->put('tenant', $tenant);
        return redirect('/');
       
    }
    
    
    
    public function Companysettings($active =''){
       
       $html='';
        
       foreach (\Config::get('constants.companysettingsmenu') as $module=>$submod) 
      {
        $activ = ($submod ==$active) ? 'active' : '';
       $html.='<a  href="'.route($module).'" class="z-sidebar-nav-link ember-view '.$activ.'">'.$submod.'</a>';
      }
      
     return $html;
    }
    public function topPim($active ='',$id=''){
         $html='';
        
         
       if($id >0){
       foreach (\Config::get('constants.employeemenu') as $module=>$submod) 
      {
        $activ = ($submod ==$active) ? 'active' : '';
        
      
           
       
       $html.='<a  href="'.route($module,$id).'" class="z-sidebar-nav-link ember-view '.$activ.'">'.$submod.'</a>';
        
       
      }
       }else{
           
             foreach (\Config::get('constants.employeemenu2') as $module=>$submod) 
              {
                $activ = ($submod ==$active) ? 'active' : '';

                  if($module ==''){
                       $html.='<a  class="disabled z-sidebar-nav-link ember-view '.$activ.'">'.$submod.'</a>';
                  }else{
                 

               $html.='<a  href="'.route($module).'" class="z-sidebar-nav-link ember-view '.$activ.'">'.$submod.'</a>';
                  }

              } 
           
           
           
       }
     return $html;
        
    }
    
    public function topPim2($active ='',$id=''){
         $html='';
        
         

           
             foreach (\Config::get('constants.employeemenu3') as $module=>$submod) 
              {
                $activ = ($submod ==$active) ? 'active' : '';

              
                 

               $html.='<a  href="'.route($module,$id).'" class="z-sidebar-nav-link ember-view '.$activ.'">'.$submod.'</a>';
               
              }
     return $html;
        
    }
    
      public function topProfilePim($id='',$active =''){
          
          
          
          
          /*
           * 
           *     <div id="cssmenu">
                                                        <ul>
                                                           <li class="active"><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-home"></i> Personal</a></li>
                                                             <li><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-file-text-o"></i>Job</a></li>
                                                             <li><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-calendar"></i>Leave</a></li>
                                                             <li><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-phone"></i> Emergency</a></li>
                                                            <li><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-folder-o"></i> Documents</a></li>
                                                            <li><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-balance-scale"></i>Pay Info</a></li>
                                                              <li><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-cog"></i>Training</a></li>
                                                           <li><a href="https://app.cssmenumaker.com/#"><i class="fa fa-fw fa-bars"></i>More</a>
                                                              <ul>
                                                                 <li><a href="https://app.cssmenumaker.com/#">Assets</a>                                    
                                                                 </li>
                                                                 <li><a href="https://app.cssmenumaker.com/#">Onboarding</a></li>
                                                                 <li><a href="https://app.cssmenumaker.com/#">Offloading</a></li>
                                                                
                                                              </ul>
                                                           </li>
                                                          
                                                        
                                                        </ul>
                                                      </div>
           */


            $html ="";
            $html .='<div id="cssmenu">';
            $html.='<ul>';
        
            //$iconarray =\Config::get('constants.employeeprofinfo');
            
            foreach (\Config::get('constants.employeeprofinfo') as $module=>$submod) 
            {
                     $activ = ($module ==$active) ? 'active' : '';
                     
                     if($module =='More'){
                        
                         $html.=' <li><a href="#"><i class="fa fa-fw fa-bars"></i>'.$module.'</a>';
                         
                         $html.="<ul>";
                         foreach ($submod as $k =>$v){
                             
                          $html.='  <li><a href="'.route($k,$id).'"><i class="fa fa-fw '.$v['icon'].'"></i>'.$v['name'].'</a></li>';
                         }
                         
                         
                         $html.="</ul>";
                         
                         
                         
                         
                     }else{
                    
                         $html.='<li  class="'.$activ.'"><a href="'.route($module,$id).'"><i class="fa fa-fw '.$submod['icon'].'"></i>'.$submod['name'].'</a></li>';

                    
                     }
            }
                   
                   
            $html .="</ul>";
            $html .="</div>";
            
            
            return $html;
          
          
          
      }
    
    
    
    /*
     * 
     * send new email function 
     */
    
    public function new_email($subject,$nameto,$emailto,$html,$attachment="") 
    {
        
           $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
            try {
                $mail->isSMTP(); // tell to use smtp
                $mail->CharSet = "utf-8"; // set charset to utf8
                $mail->SMTPAuth = true;  // use smpt auth
                $mail->SMTPSecure = "tls"; // or ssl
                $mail->Host = \Config::get('constants.emails.host');
                $mail->Port = 587; // most likely something different for you. This is the mailtrap.io port i use for testing. 
                $mail->Username = \Config::get('constants.emails.username');
                $mail->Password = \Config::get('constants.emails.password');
                $mail->setFrom( \Config::get('constants.emails.emailfrom'),  \Config::get('constants.emails.namefrom'));
                $mail->Subject = $subject;
               // $mail->MsgHTML("This is a test");
                $mail->MsgHTML($html);
                // $mail->addAddress($emailto, $nameto);
                $mail->addAddress('klunwebale@gmail.com','Name');
               
                if ($attachment){
                    
                     $mail->AddAttachment($attachment);
                }
                
                $mail->send();
            } catch (phpmailerException $e) {
                dd($e);
            } catch (Exception $e) {
                dd($e);
            }
        
    }
    
        
    /**
     * welcome email body
     */
    public function welcome_email_body($email , $password){
        
        $html='';
        
        $html .="<html>";
        $html.="<head><title>Welcome to Spice HRM system !</title></head>";
        $html.='<body>
                <div style="max-width: 800px; margin: 0; padding: 30px 0;">
                <table width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                <td width="5%"></td>
                <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                <h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Welcome to SpiceHRM</h2>
                Thanks for joining SpiceHRM. We listed your sign in details below, make sure you keep them safe.<br />
                To open your SpiceHRM homepage, please follow this link:<br />
                <br />
                <big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="'.url('/').'" style="color: #3366cc;">Go to SpiceHrm now!</a></b></big><br />
                <br />';
        
        $html.=" Link doesn't work? Copy the following link to your browser address bar:<br />";
        $html.='<nobr><a href="'.url('/').'" style="color: #3366cc;">Login</a></nobr><br />';
        $html.='<br />
                <br />
                Your email address: '.$email.'<br />
                Your password: '.$password.'<br /> 
                <br />
                <br />
                Have fun!<br />
                The Laboratory reporting system Team
                </td>
                </tr>
                </table>
                </div>
                </body>
                </html>';
        
        return $html;
    }
    
    public function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
   }
   
   public function Maintenance(){
       
       
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $user = User::where('username', '=', 'michele')->first();

        // role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id

        // or eloquent's original technique
        $user->roles()->attach($admin->id); // id only
        
        
        $createPost = new Permission();
        $createPost->name         = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description  = 'create new blog posts'; // optional
        $createPost->save();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($createPost);
        // equivalent to $admin->perms()->sync(array($createPost->id));

        $owner->attachPermissions(array($createPost, $editUser));
        // equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));
        
        
           
        $admin =\App\Role::find(1);
            
        $createPost = new \App\Permission();
        $createPost->name         = 'assignleave-decision';
        $createPost->display_name = 'Assignleave decision'; // optional
        // Allow a user to...
        $createPost->description  = 'Assignleave decision'; // optional
        $createPost->save();

        

        $admin->attachPermission($createPost);
       
   }
   
   
    public function sidemenu($activemenu=""){
        
        $menu='';
        
        $menu .=' <div id="support-side"><div class="content">';
        
         foreach (\Config::get('constants.sidemenu') as $module=>$submod) 
          {
          
             $menu .='<a><em><i class="fa '.$submod['icon'].'"></i></em><strong>'.$module.'</strong></a>';
             
             $menu.='<ul>';
             
             foreach($submod['submodule'] as $k=>$v){
                 
                $menu.='<li>';
                 
                $active =($k==$activemenu) ? 'active' : '';
                         
                         
                $menu.='<a href="'.route($k).'"  class="'.$active.'">'.$v['name'].'</a>';
                                                    
                $menu.='</li>';
                 
             }
             
             $menu.='</ul>';
             
          }
          
          $menu .="</div></div>";
        
         return $menu;
        
    } 
   
    public function topLeave()
    {
            $html ='';
           
            
            
           $html.='  <ul class="nav navbar-nav">
             <li class="active"><a href="'.url('home').'">Home</a></li>
         
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configure <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="'.url('LeaveType/index').'" class="dropdown-item">Leave Types </a></li>
                  <li><a href="'.url('WorkWeek/index').'" class="dropdown-item">Work Week </a></li>
                  <li><a href="'.url('Holidays/index').'" class="dropdown-item">Holidays </a></li>
                  
                </ul>
              </li>
              
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Leave <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="'.url('AssignLeave/index').'" class="dropdown-item">Assign Leave</a></li>
                  <li><a href="'.url('LeaveCalendar/index').'" class="dropdown-item">Leave Calendar </a></li>
                                   
                </ul>
              </li>
            </ul>';
            
           
            
            
     
        
        return $html;
    }
    
    public function topAdmin()
    {
            $html ='';
               $html.=' <ul class="nav navbar-nav">';
             $html.='   <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management <span class="caret"></span></a>
                <ul class="dropdown-menu"><li
                  <li><a href="'.url('Users/index').'">Users</a></li>
                  
                  <li><a href="'.url('Roles/index').'">Roles</a></li>
                  <li><a href="'.url('Permission/index') .'">Permision</a></li>
                 
                </ul>
              </li>';
             
            
          
             $html.='                 
              
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Job Settings<span class="caret"></span></a>
                <ul class="dropdown-menu"><li
                  <li><a href="'.url('JobTitle/index').'" class="dropdown-item">Job Title</a></li>
                  
                  <li><a href="'.url('JobCategory/index').'" class="dropdown-item">Job Category</a></li>
                  <li><a href="'.url('PayGrade/index').'" class="dropdown-item">Pay Grade</a></li>
                
                  <li><a href="'.url('WorkShift/index').'" class="dropdown-item">Work Shift</a></li>                        
                  
                </ul>
              </li>
             
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Qualifications <span class="caret"></span></a>
                 <ul class="dropdown-menu"><li
                  <li><a href="'.url('Skill/index').'" class="dropdown-item">Skills</a></li>
                  
                  <li><a href="'.url('Education/index').'" class="dropdown-item">Educations</a></li>
                  <li><a href="'.url('Language/index').'" class="dropdown-item">Languages</a></li>
                  <li><a href="'.url('Membership/index').'" class="dropdown-item">Memberships</a></li>                        
               
                </ul>
              </li>
              


                 <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Organizations Settings<span class="caret"></span></a>
                <ul class="dropdown-menu"><li
                  <li><a href="'.url('Locations/index').'" class="dropdown-item">Locations</a></li>
                  <li><a href="'.url('Nationality/index').'" class="dropdown-item">Nationality</a></li>   
                  <li><a href="'.url('Competency/index').'" class="dropdown-item">Competency</a></li>
                  <li><a href="'.url('Structure/index').'" class="dropdown-item">Structure</a></li>
                  <li><a href="'.url('EmploymentStatus/index').'" class="dropdown-item">Employment Status</a></li>
                 <li>    <a href="'.url('TerminationReason/index').'" class="dropdown-item">Termination Reasons</a></li>
                 <li><a href="'.url('EmployeeReporting/index').'" class="dropdown-item">Reporting To</a></li>  
               
                </ul>
              </li>
             
              


                   <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payroll Settings<span class="caret"></span></a>
                <ul class="dropdown-menu"><li
                  <li><a <a href="'.url('Benefits/index').'" class="dropdown-item">Benefits</a></li>
                  <li><a href="'.url('Deductions/index').'" class="dropdown-item">Deductions</a></li>   
                   <li><a href="'.url('BankDetails/index').'" class="dropdown-item">Banks</a></li>  
               
                </ul>
              </li>
             

            </ul>';

            
       
        
        
        
        
     
        
        return $html;
    }
    
   
}
