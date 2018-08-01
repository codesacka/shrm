<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use DB;

class PermissionController extends Controller
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
         $perm = Permission::orderBy('id','DESC')->paginate(20);
         
         
         $menu = $this->topAdmin();
        
        
        return view('permission.index',['sidemenu'=>$this->sidemenu('permission.index'),'perms'=>$perm,'title'=>'Permissions List','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $permission = Permission::get();
        
        $menu = $this->Companysettings('User Permissions');
         
         
        return view('permission.create',['permission'=>$permission,'title'=>'Permission Details','menu'=>$menu]);
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
                                         'name'        => 'required|unique:permissions|max:255',
                                         'display_name'  =>  'required',
                                         'description' =>  'required',
                                         
                                        ]);
         
         
             $perm = new Permission;
             
             $perm->name = $request->name;
             
             $perm->display_name = $request->display_name;
                   
             $perm->description = $request->description;

             $perm->save();

             return  redirect('/permission/index')->with('success','Permission added successfully');
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
        
       
        $perm = Permission::where('id',$id)->first();
        
        $menu  = $this ->topAdmin();
        
        return view('permission.edit',['sidemenu'=>$this->sidemenu('permission.index'),'title'=>'Permission Form','perm'=>$perm,'menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        
        
          $this->validate($request, [
                                         'name'        => 'required|unique:permissions|max:255',
                                         'display_name'  =>  'required',
                                         'description' =>  'required',
                                         
                                        ]);
         
         
             
             
             Permission::where('id', $request->id)
                    
                    ->update(['name' => $request->name,'description'=>$request->description,'display_name'=>$request->display_name]);
     

             return  redirect('/permission/index')->with('success','Permission updated successfully');
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
    }
}
