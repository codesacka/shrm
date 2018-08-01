<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Recruitment\QuestionPool;

use App\Models\Recruitment\QuestionDirectedTo;

use App\Models\Recruitment\Difficulty;

use App\Models\Admin\Competency;


class QuestionPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $questionpool = QuestionPool::join('competencies','question_pools.competency','=','competencies.id')
                                          ->orderBy('competencies.id','DESC')->paginate(50);
         
        $menu  = $this ->topRecuitment();
        
        
        
              
              
        return view('recruitment.questionpool.index',['questionpool'=>$questionpool,'title'=>'Question Pool','menu'=>$menu]);
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
               
             
               
               $competency = ['' => ''] + Competency::where('parent','>',0)
                                                  ->select('competencies.*')
                                                ->orderBy('id','DESC')
                                                  ->pluck('name', 'id')->all();
               
               $questiondirectto   = ['' => ''] +QuestionDirectedTo::pluck('name', 'id')->all();
               
               $difficulty   = ['' => ''] +Difficulty::pluck('name', 'id')->all();
               
               
               return view('recruitment.questionpool.create',['difficulty'=>$difficulty,'questiondirectto' =>$questiondirectto,'competency'=>$competency,'menu'=>$menu,'title'=>'New Question Pool']);
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
        
         
        
        
        $this->validate($request, [    'competency'        => 'required',
                                       'question'        => 'required',
                                       'answer'        => 'required',
                                       'difficulty' =>  'required',
                                       'directedto' =>  'required',                                          
                                  ]);
             
         $row =new QuestionPool;
         
         $row->competency =$request->competency;
         
         $row->question =$request->question;
         
         $row->answer =$request->answer;
         
         $row->difficulty   =$request->difficulty;
         
         $row->directedto   =$request->directedto;
         
         $row->save();
         
        
        return redirect()->route('QuestionPool.index')
                        ->with('success','QuestionPool created successfully');
      
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
               
             
               
               $competency = ['' => ''] + Competency::where('parent','>',0)
                                                  ->select('competencies.*')
                                                ->orderBy('id','DESC')
                                                  ->pluck('name', 'id')->all();
               
               $questiondirectto   = ['' => ''] +QuestionDirectedTo::pluck('name', 'id')->all();
               
               $difficulty   = ['' => ''] +Difficulty::pluck('name', 'id')->all();
               
               
               $row  =QuestionPool::find($id);
               
               
               return view('recruitment.questionpool.edit',['row'=>$row,'difficulty'=>$difficulty,'questiondirectto' =>$questiondirectto,'competency'=>$competency,'menu'=>$menu,'title'=>'New Question Pool']);

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
        
        
         
        $this->validate($request, [    'competency'        => 'required',
                                       'question'        => 'required',
                                       'answer'        => 'required',
                                       'difficulty' =>  'required',
                                       'directedto' =>  'required',                                          
                                  ]);
             
         QuestionPool::where('id',$id)
                        ->update(['competency' =>$request->competency,
                                'question' =>$request->question,
                                'answer' =>$request->answer,
                                'difficulty'   =>$request->difficulty,
                                'directedto'   =>$request->directedto]);
         
   
         
        
        return redirect()->route('QuestionPool.index')
                        ->with('success','QuestionPool created successfully');
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
