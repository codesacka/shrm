<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Recruitment\InterviewTemplates;

use App\Models\Recruitment\InterviewOutcome;

class InterviewTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
                       
        $interviewtemplates = InterviewTemplates::join('interview_outcomes','interview_templates.interviewoutcome','=','interview_outcomes.id')
                                                 ->select('interview_templates.*')
                                                  ->orderBy('id','DESC')->paginate(50);
        
  
         
        $menu  = $this ->topRecuitment();
        
        
     
              
              
        return view('recruitment.interviewtemplate.index',['interviewtemplates'=>$interviewtemplates,'title'=>'Interview Templates','menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
               $menu  = $this ->topRecuitment();
               
               
               $interviewoutcome =['' => ''] +InterviewOutcome::pluck('name', 'id')->all();
               
               return view('recruitment.interviewtemplate.create',['interviewoutcome'=>$interviewoutcome,'menu'=>$menu,'title'=>'Interview Templates']);
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
                                       'interviewoutcome'        => 'required',
                                       'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new InterviewTemplates;
         
         $row->name =$request->name;
         
         $row->interviewoutcome =$request->interviewoutcome;
         
          $row->maximumscore = ( ! empty($request->maximumscore)   ) ? $request->maximumscore : 0;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('InterviewTemplates.index')
                        ->with('success','Interview Templates created successfully');
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
           
        
               $menu  = $this ->topRecuitment();
               
               
               $row  = InterviewTemplates::find($id);
               
               
               $interviewoutcome =['' => ''] +InterviewOutcome::pluck('name', 'id')->all();
               
               return view('recruitment.interviewtemplate.edit',['row'=> $row,'interviewoutcome'=>$interviewoutcome,'menu'=>$menu,'title'=>'Interview Templates']);
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
                                       'interviewoutcome'        => 'required',
                                       'description' =>  'required',
                                                                                 
                                        ]);
             
        InterviewTemplates::where('id',$id)
                           ->update(['name' =>$request->name,'interviewoutcome' =>$request->interviewoutcome,
                                    'maximumscore' => ( ! empty($request->maximumscore)   ) ? $request->maximumscore : 0,
                                    'description'   =>$request->description]);
         
      
         
         
         return redirect()->route('InterviewTemplates.index')
                        ->with('success','Interview Templates created successfully');
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
