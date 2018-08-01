<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Recruitment\StandardTests;

use App\Models\Recruitment\InterviewOutcome;

class StandardTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
                       
        $standardtest = StandardTests::join('interview_outcomes','standard_tests.testoutcome','=','interview_outcomes.id')
                                                 ->select('standard_tests.*')
                                                  ->orderBy('id','DESC')->paginate(50);
        
  
         
        $menu  = $this ->topRecuitment();
        
        
     
              
              
        return view('recruitment.standardtest.index',['standardtest'=>$standardtest,'title'=>'Standard Tests','menu'=>$menu]);
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
               
               return view('recruitment.standardtest.create',['interviewoutcome'=>$interviewoutcome,'menu'=>$menu,'title'=>'Interview Templates']);
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
                                       'testoutcome'        => 'required',
                                       'description' =>  'required',
                                                                                 
                                        ]);
             
         $row =new StandardTests;
         
         $row->name =$request->name;
         
         $row->testoutcome =$request->testoutcome;
         
          $row->maximumscore = ( ! empty($request->maximumscore)   ) ? $request->maximumscore : 0;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('StandardTest.index')
                        ->with('success','Standard Test created successfully');
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
               
               
               $row  = StandardTests::find($id);
               
               
               $interviewoutcome =['' => ''] +InterviewOutcome::pluck('name', 'id')->all();
               
               return view('recruitment.standardtest.edit',['row'=> $row,'interviewoutcome'=>$interviewoutcome,'menu'=>$menu,'title'=>'Interview Templates']);
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
             
        StandardTests::where('id',$id)
                           ->update(['name' =>$request->name,'testoutcome' =>$request->testoutcome,
                                    'maximumscore' => ( ! empty($request->maximumscore)   ) ? $request->maximumscore : 0,
                                    'description'   =>$request->description]);
         
      
         
         
         return redirect()->route('StandardTest.index')
                        ->with('success','Standard Test created successfully');
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
