<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Admin\Nationality;

class NationalityController extends Controller
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
          $nationality  =Nationality::orderBy('id','DESC')->get();
          
            $menu  = $this ->topAdmin();
        
          return view('admin.nationality.index',['sidemenu'=>$this->sidemenu('Nationality.index'),'title'=>'Nationality  List','nationality'=>$nationality,'menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
          $menu  = $this ->topAdmin();
        
        return view('admin.nationality.create',['sidemenu'=>$this->sidemenu('Nationality.index'),'menu'=>$menu,'title'=>'Add Nationality']);
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
             
         $row =new Nationality;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Nationality.index')
                        ->with('success','Nationality created successfully');
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
         $nationality =  Nationality::find($id);
         
           $menu  = $this ->topAdmin();
           
           $title ='Update Nationality';
           
           $sidemenu=$this->sidemenu('Nationality.index');
           
         return view('admin.nationality.edit',compact('nationality','menu','title','sidemenu'));
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
             
         $row =new Nationality;
         
         
         
         Nationality::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Nationality.index')
                        ->with('success','Nationality created successfully');
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
         /* $count =Matches::where('country_id', $id)->count();
         
         
        if($count > 0) {
            
            return redirect()->route('country.index')
                        ->with('error','Relationship constraint'); 
            
        }else{
         */
        
        Nationality::where('id',$id)->delete();
        return redirect()->route('Nationality.index')
                        ->with('success','nationality  deleted successfully');
      //  }
        
    }
}
