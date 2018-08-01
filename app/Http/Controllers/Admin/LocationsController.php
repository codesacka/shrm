<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Locations;

use App\Models\Admin\Nationality;

use Datatables;

use Form;

class LocationsController extends Controller
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
    public function index(Request $request)
    {
        //
            //$menu  = $this ->topAdmin();
        
         $this->DBReconnect($request);
         
         $locations =  Locations::join('nationalities', 'locations.country', '=', 'nationalities.id')
                                ->select('locations.*','nationalities.name as countryname')
                               ->orderBy('id','ASC')->get();
       
              
        return view('admin.locations.index',['sidemenu'=>$this->sidemenu('Locations.index'),'title'=>'Company Station Locations', 'locations'=>$locations,'menu'=>$this ->topAdmin()]);
    }
    
    
    public function locationData(Request $request)
    {
        
         $this->DBReconnect($request);
         
         $locations =  Locations::join('nationalities', 'locations.country', '=', 'nationalities.id')
                                ->select('locations.*','nationalities.name as countryname')
                               ->orderBy('id','ASC');

        return Datatables::of($locations)
            ->addColumn('action', function ($locations) {
                return '<a href="'.route('Locations.edit',$locations->id).'"><span class="glyphicon glyphicon-pencil"></span></a>'
                .Form::open(['method' => 'DELETE','route' => ['Locations.destroy', $locations->id],'style'=>'display:inline']).'' 
                        
                .'<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" type="submit" ><span class="glyphicon glyphicon-trash"></span></button>'
                   . ''.Form::close();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
         
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
        
             $menu=$this ->topAdmin();
             
             $nationality =  ['' => ''] + Nationality::pluck('name', 'id')->all();
             
             
              
              
             return view('admin.locations.create',[ 'sidemenu'=>$this->sidemenu('Language.index'),'nationality'=>$nationality,'menu'=>$menu,'title'=>'Add Location']);
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

        
        $this->validate($request, [    'name'      => 'required',
                                       'country' =>  'required',
                                       'state'  =>  'required',
                                       'city'    =>  'required',
                                       'phone'  =>  'required',
                                       'address'  =>  'required',
                                       'notes'   =>  'required',
                                                                                 
                                  ]);
        
      
        
         $this->DBReconnect($request);
             
         $row =new Locations;
         
         $row->name =$request->name;
         
         $row->country   =$request->country;
         
         $row->state   =$request->state;
          
         $row->city   =$request->city;
          
         $row->postalcode   =$request->postalcode;
          
         $row->phone   =$request->phone;
         
         $row->address   =$request->address;
         
         $row->notes   =$request->notes;
         
         $row->save();
         
         
         return redirect()->route('Locations.index')
                        ->with('success','Locations created successfully');
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
        
             $menu     = $this ->topAdmin();
             
             $nationality =  ['' => ''] + Nationality::pluck('name', 'id')->all();
             
             $row  =Locations::find($id);
              
              
             return view('admin.locations.edit',['sidemenu'=>$this->sidemenu('Locations.index'),'row'=>$row,'nationality'=>$nationality,'menu'=>$menu,'title'=>'Update  Location']);
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
        
         $this->validate($request, [    'name'      => 'required',
                                       'country' =>  'required',
                                       'state'  =>  'required',
                                       'city'    =>  'required',
                                       'phone'  =>  'required',
                                       'address'  =>  'required',
                                       'notes'   =>  'required',
                                                                                 
                                  ]);
       $this->DBReconnect($request);
            
       Locations::where('id',$id)->update(
         
        [ 'name' =>$request->name,   
          'country'   =>$request->country,
          'state'    =>$request->state,
          'city'     =>$request->city,
          'postalcode'   =>$request->postalcode,
          'phone'       =>$request->phone,
          'address'   =>$request->address,
          'notes'   =>$request->notes]);
         
        
         
         
         return redirect()->route('Locations.index')
                        ->with('success','Locations updated successfully');
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
           Locations::where('id',$id)->delete();
        
           return redirect()->route('Locations.index')
                        ->with('success','Locations  deleted successfully');
    }
}
