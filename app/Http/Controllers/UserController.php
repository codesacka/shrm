<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Auth;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        
        
        $users = User::where('tenant',Auth::user()->tenant)->orderBy('id','ASC')->get();
         
         
        $menu =    $this ->topAdmin();
        
              
        return view('users.index',['sidemenu'=>$this->sidemenu('users.index'),'users'=>$users,'title'=>'Users List','menu'=>$menu]);
    }
    
    
    
    
    
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function decision()
    {
        //
        $users = User::orderBy('id','DESC')->paginate(5);
         
         
        $menu = $this->Companysettings('Users');
              
        return view('users.decision',['sidemenu'=>$this->sidemenu('users.index'),'users'=>$users,'title'=>'Users List','menu'=>$menu]);
    }
    
    
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::where('tenant',Auth::user()->tenant)->               
                pluck('display_name','id')->all();
        
        $menu = $this ->topAdmin();
        
        
        return view('users.create',['sidemenu'=>$this->sidemenu('users.index'),'roles'=>$roles,'title'=>'New User','menu'=>$menu]);
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
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
       // $input['password'] = Hash::make($input['password']);
        
         $input['password'] =bcrypt($request->password);
         
         $input['tenant']   =Auth::user()->tenant;

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect('users/index')
                        ->with('success','User created successfully');
        
        
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
        
         $user = User::find($id);
         
         $menu = $this ->topAdmin();
          
          
        return view('users.show',['user'=>$user],['title'=>'Show User Details','menu'=>$menu]);
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
        
        
        $user = User::find($id);
        $roles =  Role::where('tenant',Auth::user()->tenant)->               
                pluck('display_name','id')->all();
        $userRole = $user->roles->pluck('id','id')->toArray();
        
        $menu = $this ->topAdmin();
        

        return view('users.edit',['sidemenu'=>$this->sidemenu('users.index'),'user'=>$user,'roles'=>$roles,'userRole'=>$userRole,'title'=>'Edit Users details','menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
        $id = $request->userid;
        
        $this->validate($request, [
            'name' => 'required',
           // 'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
           // $input['password'] = Hash::make($input['password']);
            
           $input['password'] =bcrypt($password);
            
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect('users/index')
                        ->with('success','User updated successfully');
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
        
        User::find($id)->delete();
        return redirect('users/index')
                        ->with('success','User deleted successfully');
    }
}
