<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bank;
use App\Models\Pim\Employee;



class BankController extends Controller
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
        
        $menu  = $this ->topAdmin();
        $bank = Bank::orderBy('id','DESC')->get();
        
              
              
        return view('admin.bank.index',['sidemenu'=>$this->sidemenu('BankDetails.index'),'bank'=>$bank,'title'=>'Bank List','menu'=>$menu]);
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
                return view('admin.bank.create',['sidemenu'=>$this->sidemenu('BankDetails.index'),'menu'=>$menu,'title'=>'New Bank Details']);
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
             
         $row =new Bank;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('BankDetails.index')
                        ->with('success','Bank created successfully');
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
            
         $bank = Bank::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title ='Update Bank Details';
         
         $sidemenu=$this->sidemenu('BankDetails.index');
         
         return view('admin.bank.edit',compact('sidemenu','bank','menu','title'));
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
             
         $row =new Bank;
         
         
         
         Bank::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('BankDetails.index')
                        ->with('success','Bank updated successfully');
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
         
        
        $bank_count  =Employee::where('bank',$id) ->count();

        if($bank_count > 0){
            
           return redirect()->route('BankDetails.index')
                        ->with('error','BankDetails  has dependecies');
            
        }else{
           
         
        Bank::where('id',$id)->delete();
        return redirect()->route('BankDetails.index')
                        ->with('success','Bank  deleted successfully');
        
        }
    }
}
