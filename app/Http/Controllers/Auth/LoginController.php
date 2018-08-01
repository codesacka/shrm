<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Session;
use App\Role;
use App\Permission;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function showLoginForm()
    {
 
     
        /*$env = (explode(".",$_SERVER['HTTP_HOST']));
        

       //DatabaseCart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);
        
         $count   =DB::connection('main')->table('tenants') ->select(DB::raw('count(*) as user_count'))
                     ->where('identifier',$env[0])
                     ->count();
          
          
          if($count >0){
         
          
           }else{
          
          
            return redirect()->route('Login')
                        ->with('error','Error the url does not exist please register to continue');
            
          }*/
          
          
        return view('auth.login');
    }
}
