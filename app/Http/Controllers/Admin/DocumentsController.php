<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Documents;
use App\Models\Admin\DocFolder;

use App\Models\Pim\Employee;


class DocumentsController extends Controller
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
        
        $documents = Documents::orderBy('id','DESC')->get();
        
        $menu  = '';
        
        $docfolder =DocFolder::all();
        
        $docfirst = DocFolder::join('documents', 'doc_folders.id', '=', 'documents.folder')->first();
        
        
       $defaultfolder  =isset($docfirst->folder)  ? $docfirst->folder : '';
        
       
        
       
              
              
        return view('admin.documents.index',['documents'=>$documents,'defaultfolder'=>$defaultfolder ,'docfolder'=>$docfolder,'title'=>'Documents List','menu'=>$menu]);
        
    }
    
    
     public function Categorycreate(){
         
         
          return view('admin.documents.createcategory',['title'=>'Add folder']);
     }
     
     public function getFiles(Request $request,$id){
         
         
         $this->DBReconnect($request);
         
         $folder = DocFolder::find($id);
         
         $files  =Documents::where('folder',$id)->get();
         
         
       
         return view('admin.documents.getfiles',['folder'=>$folder,'files'=>$files]);
     }

    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function decision()
    {
        //
        
        
        
        
        return view('admin.documents.decision',['title'=>'Company Documents','menu'=>'']);
    }

    
    
    public function categorystore(Request $request)
    {
        //
        
        $this->DBReconnect($request);
        $this->validate($request, [    'name'        => 'required',
                                                                  
                                        ]);
        
        $row  =new DocFolder;
        $row->name=$request->name;
        
        $row->save();
        
         return redirect()->route('Documents.index')
                        ->with('success','Documents Category created successfully');
        
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
          $folder =['' => ''] +DocFolder::pluck('name', 'id')->all();
         
          return view('admin.documents.create',['title'=>'Company/Employee Documents','folder'=>$folder,'menu'=>'']);
    }
    
    
    public function  employeedocuments(Request $request,$id){
        
           $this->DBReconnect($request);
        
           $documents = Documents::where('type',2)->orderBy('id','DESC')->get();
           
           $profmenu = $this->topProfilePim($id);
        
           return view('admin.documents.employeedoc',['documents'=>$documents,'title'=>'Documents List','profmenu'=>$profmenu]);
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
        $this->validate($request, [    
                                       'attachment' =>  'required',
                                                                            
                                        ]);
        
        $attachment='';
      
        if ($request->hasFile('attachment')) {
        
        $attachment = md5(rand()) . '.' .$request->file('attachment')->getClientOriginalExtension();
        
        $request->file('attachment')->move(base_path().'/public/uploads', $attachment);
        
        }
                     
        $row =new Documents;
         
        $row->name         =$request->file('attachment')->getClientOriginalName();
         
        $row->attachment   =$attachment;
        
        $row->folder       =$request->folder;
        
        $row->type  =  $request->type ?  2  : 1 ;
         
        $row->notes        =$request->file('attachment')->getClientOriginalName();
         
        $row->save();
         
         
         return redirect('Documents/index')
                        ->with('success','Employee Documents created successfully');
         
         
    }
    
    public function empview(Request $request,$id){
        
         $this->DBReconnect($request);
         
         $empfiles  = DocFolder::join('documents', 'doc_folders.id', '=', 'documents.folder')
                                  ->where('documents.type',2)->get();
         
         $employee  = Employee::find($id);
         
        
         return view('pim.documents.empfile',['title'=>'Employee Documents','empfiles'=>$empfiles,'employee'=>$employee,'employeemenu'=>$this->topProfilePim($id,'EmergencyContacts.index')]);
        
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
                                       'notes' =>  'required',
                                       'attachment' =>  'required',
                                       'type'        => 'required',                                          
                                        ]);
        
        $attachment='';
      
        if ($request->hasFile('attachment')) {
        
        $attachment = md5(rand()) . '.' .$request->file('attachment')->getClientOriginalExtension();
        
        $request->file('attachment')->move( '/public/uploads', $attachment);
        
        }
                     
        Documents::where('id',$id)>(
                            ['name'=>$request->name,
                            'attachment'=>$attachment,
                            'type'  =>$request->type,
                            'notes' =>$request->notes]);
         
      
         
         
         return redirect('Documents/index')
                        ->with('success','Employee Documents created successfully');
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
