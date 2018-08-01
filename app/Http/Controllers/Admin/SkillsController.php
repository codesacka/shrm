<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Skills;



class SkillsController extends Controller
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
        $skills = Skills::orderBy('id','DESC')->get();
        
         $menu  =  $this ->topAdmin();
              
              
        return view('admin.skills.index',['sidemenu'=>$this->sidemenu('Skill.index'),'skills'=>$skills,'title'=>'Skill List','menu'=>$menu]);
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
                return view('admin.skills.create',['sidemenu'=>$this->sidemenu('Skill.index'),'menu'=>$menu, 'title'=>'New Skill',]);
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
             
         $row =new Skills;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Skill.index')
                        ->with('success','Skill created successfully');
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
         
         
         $skills = Skills::find($id);
         
         
         $menu  =  $this ->topAdmin();
         
         $title='Update Skill';
         
         $sidemenu=$this->sidemenu('Skill.index');
         
         return view('admin.skills.edit',compact('skills','menu','title','sidemenu'));
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
        $this->DBReconnect($request);
        //
        
        
        
         $this->validate($request, [    'name'        => 'required',
                                        'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new Skills;
         
         
         
         Skills::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Skill.index')
                        ->with('success','Skill updated successfully');
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
         
        Skills::where('id',$id)->delete();
        return redirect()->route('Skill.index')
                        ->with('success','Skill  deleted successfully');
    }
}
