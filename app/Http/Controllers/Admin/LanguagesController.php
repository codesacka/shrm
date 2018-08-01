<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Languages;


class LanguagesController extends Controller
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
        
        $language = Languages::orderBy('id','DESC')->get();
        
        $menu  = $this ->topAdmin();
              
              
        return view('admin.languages.index',['sidemenu'=>$this->sidemenu('Language.index'),'language'=>$language,'title'=>'Languages List','menu'=>$menu]);
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
                return view('admin.languages.create',['sidemenu'=>$this->sidemenu('Language.index'),'menu'=>$menu, 'title'=>'New Language']);
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
             
         $row =new Languages;
         
         $row->name =$request->name;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Language.index')
                        ->with('success','Languages created successfully');
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
         $language = Languages::find($id);
         
         
         $menu  = $this ->topAdmin();
         
         $title  = 'Update Language';
         
         $sidemenu=$this->sidemenu('Language.index');
         
         return view('admin.languages.edit',compact('sidemenu','language','menu','title'));
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
             
         $row =new Languages;
         
         
         
         Languages::where('id',$id)->update(['name' => $request->name,'description' =>$request->description]);
         
         
         
         return redirect()->route('Language.index')
                        ->with('success','Languages created successfully');
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
        
         
        Languages::where('id',$id)->delete();
        return redirect()->route('Language.index')
                        ->with('success','Languages  deleted successfully');
    }
}
