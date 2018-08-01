<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Competency;

class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $competency = Competency::orderBy('id','DESC')->paginate(50);
        
        $menu  = $this ->topAdmin();
              
              
        return view('admin.competency.index',['competency'=>$competency,'title'=>'Competency List','menu'=>$menu]);
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
                
                $competency = Competency::all();
                
                return view('admin.competency.create',['competency'=>$competency,'menu'=>$menu,'title'=>'Competency']);
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
        
        
        $this->validate($request, [    'name'        => 'required',
                                       'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Competency;
         
         $row->name =$request->name;
         
         $row->parent  = $request->parent ;
          
          
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Competency.index')
                        ->with('success','Competency created successfully');
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
        
            
         $row = Competency::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title ='Update Competency';
         
         return view('admin.competency.edit',compact('row','menu','title'));
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
        
        
        
         $this->validate($request, [    'name'        => 'required',
                                        'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Competency;
         
         
         
         Competency::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Competency.index')
                        ->with('success','Competency created successfully');
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
        
         
        Competency::where('id',$id)->delete();
        return redirect()->route('Competency.index')
                        ->with('success','Competency  deleted successfully');
    }
}
