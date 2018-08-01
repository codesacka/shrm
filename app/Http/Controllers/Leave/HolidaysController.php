<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Leave\Holidays;

use App\Models\Leave\Recurrent;



class HolidaysController extends Controller
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
        
        
        $holiday = Holidays::orderBy('id','DESC')->get();
        
        $menu  = $this ->topLeave();
        
      
              
              
        return view('leave.holidays.index',['sidemenu'=>$this->sidemenu('Holidays.index'),'holiday'=>$holiday,'title'=>'Holidays  List','menu'=>$menu]);
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
                $menu  = $this ->topLeave();
                  
                $recurrent = ['' => ''] + Recurrent::pluck('name', 'id')->all();
                
                return view('leave.holidays.create',['recurrent'=>$recurrent,'menu'=>$menu,'title'=>'New Holidays']);
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
                                       'holiday_date'        => 'required',
                                       'recurrent'        => 'required',
                                       'description' =>  'required',
                                                                                 
                                  ]);
             
         $row =new Holidays;
         
         $row->name =$request->name;
         
         $row->holiday_date =$request->holiday_date;
         
         $row->recurrent =$request->recurrent;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Holidays.index')
                        ->with('success','Holidays created successfully');
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
            
         $holiday = Holidays::find($id);
         
         
         $menu  = $this ->topLeave();
         
         $title ='Update Holidays ';
         
         $recurrent = ['' => ''] + Recurrent::pluck('name', 'id')->all();
         
         $sidemenu=$this->sidemenu('Holidays.index');
        
         return view('leave.holidays.edit',compact('sidemenu','recurrent','holiday','menu','title'));
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
                                        'holiday_date' => 'required',
                                        'recurrent'        => 'required',
                                        'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Holidays;
         
         
         
         Holidays::where('id',$id)->update(['recurrent' =>$request->recurrent,'name' => $request->name,'holiday_date' => $request->holiday_date,'description' =>$request->description]);
         
         
         
         return redirect()->route('Holidays.index')
                          ->with('success','Holidays updated successfully');
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
         
        Holidays::where('id',$id)->delete();
        return redirect()->route('Holidays.index')
                        ->with('success','Holidays  deleted successfully');
    }
}
