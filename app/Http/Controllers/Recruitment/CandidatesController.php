<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Recruitment\RecruitmentCandidate;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $candidates = RecruitmentCandidate::all();
        
        $menu  = $this ->topRecuitment();
              
              
        return view('recruitment.candidates.index',['candidates'=>$candidates,'title'=>'Candidates','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
             $menu     = $this ->topRecuitment();
             
           
              
              
             return view('recruitment.candidates.create',[ 'menu'=>$menu,'title'=>'Add Candidate']);
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
        
     
        
         $this->validate($request, [    'resume'      => 'required',
                                       'firstname' =>  'required',
                                       'middlename'  =>  'required',
                                       'lastname'    =>  'required',
                                       'email'  =>  'required',
                                       'contactnumber'   =>  'required',
                                       'facebook'   =>  'required',
                                       'twitter'   =>  'required',
                                       'linkedin'   =>  'required',
                                        'vacancy'   =>  'required',
                                         'applicationdate'   =>  'required',
                                         'keywords'   =>  'required',  
                                        'notes'   =>  'required',        
                                  ]);
        
     
             
         $row =new RecruitmentCandidate;
         
         $row->firstname =$request->firstname;
         
         $row->middlename   =$request->middlename;
         
         $row->lastname   =$request->lastname;
          
         $row->email      =$request->email;
         
         $row->contactnumber   =$request->contactnumber;
         
         $row->facebook   =$request->facebook;
         
         $row->twitter   =$request->twitter;
         
         $row->linkedin   =$request->linkedin;
         
         $row->vacancy   =$request->vacancy;
         
         $row->applicationdate   =$request->applicationdate;
         
         $row->keywords   =$request->keywords;
         
         $row->notes   =$request->notes;
          
          
         $row->save();
         
         
         return redirect()->route('Candidates.index')
                        ->with('success','Candidates created successfully');
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
        
        $candidates = RecruitmentCandidate::find($id);
        
        $menu  = $this ->topRecuitment();
              
              
        return view('recruitment.candidates.edit',['candidates'=>$candidates,'title'=>'Candidates','menu'=>$menu]);
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
        
         $this->validate($request, [    'resume'      => 'required',
                                       'firstname' =>  'required',
                                       'middlename'  =>  'required',
                                       'lastname'    =>  'required',
                                       'email'  =>  'required',
                                       'contactnumber'   =>  'required',
                                       'facebook'   =>  'required',
                                       'twitter'   =>  'required',
                                       'linkedin'   =>  'required',
                                        'vacancy'   =>  'required',
                                         'applicationdate'   =>  'required',
                                         'keywords'   =>  'required',  
                                        'notes'   =>  'required',        
                                  ]);
        
     
             
       RecruitmentCandidate ::where('id',$id)->update([ 
         
         'firstname' =>$request->firstname,
         
         'middlename'   =>$request->middlename,
         'lastname'   =>$request->lastname,
         'email'      =>$request->email,
         
         'contactnumber'   =>$request->contactnumber,
         
         'facebook'   =>$request->facebook,
         
         'twitter'   =>$request->twitter,
         
         'linkedin'   =>$request->linkedin,
         
         'vacancy'    => $request->vacancy,
         
         'applicationdate'   =>$request->applicationdate,
         
         'keywords'   =>$request->keywords,
         
         'notes'   =>$request->notes]);
          
          
       
         
         
         return redirect()->route('Candidates.index')
                        ->with('success','Candidates updated successfully');
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
        
            RecruitmentCandidate::where('id',$id)->delete();
        return redirect()->route('Candidates.index')
                        ->with('success','Candidates  deleted successfully');
    }
}
