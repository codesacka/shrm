<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\PayGrade;

class PayGradeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $this->DBReconnect($request);
        $paygrade = PayGrade::orderBy('id','DESC')->paginate(5);
        
        $menu  = $this ->topAdmin();
              
              
        return view('admin.paygrade.index',['paygrade'=>$paygrade,'title'=>'PayGrade List','menu'=>$menu]);
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
                  $menu  = $this ->topAdmin();
                return view('admin.paygrade.create',['menu'=>$menu,'title'=>'New PayGrade']);
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
        
        $this->validate($request, [    'name'        => 'required',
                                                 'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new PayGrade;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('PayGrade.index')
                        ->with('success','PayGrade created successfully');
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
            
         $paygrade = PayGrade::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title='Update  PayGrade';
         
         return view('admin.paygrade.edit',compact('paygrade','menu','title'));
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
                                                                                 
                                        ]);
             
         $row =new PayGrade;
         
         
         
         PayGrade::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('PayGrade.index')
                        ->with('success','PayGrade created successfully');
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
        
         
        PayGrade::where('id',$id)->delete();
        return redirect()->route('PayGrade.index')
                        ->with('success','PayGrade  deleted successfully');
    }
}
