<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\EmpLanguages;

use App\Models\Pim\Employee;

use App\Models\Admin\Languages;

use App\Models\Pim\LanguageFluencyLevel;

use App\Models\Pim\LanguageSkill;


class EmpLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //
        
         $this->DBReconnect($request);
        
                  $employee = Employee::find($id);
                 
         
                  $languages = ['' => ''] + Languages::pluck('name', 'id')->all();
                 
                  $languagefluencylevel = ['' => ''] + LanguageFluencyLevel::pluck('name', 'id')->all();
                  
                  $languageskill = ['' => ''] + LanguageSkill::pluck('name', 'id')->all();
        
                  $menu  = ''; /// $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                 
                 
                return view('pim.emplanguages.create',['languagefluencylevel'=>$languagefluencylevel,'languageskill'=>$languageskill,'languages'=>$languages,'menu'=>$menu,'title'=>'New Employee Languages', 'ntitle'=>'Employee Languages List ','id'=>$id]);
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
        
           $this->validate($request, [ 'skill'        => 'required',
                                       'language'        => 'required',
                                       'fluencylevel'        => 'required',  
                                       'description'        => 'required',
                                      
                                        ], 
                                   [

                                     'skills.required' => 'Skills details  required ',
                                     'experience.required' => 'Experience details required',
                                     'description.required' => 'Notes details required',
                                     
                                   ]);
             
         $row =new EmpLanguages;
         
         $row->skill =$request->skill;
         
         $row->language =$request->language;
         
          
         $row->fluencylevel =$request->fluencylevel;
                         
         $row->description   =$request->description;
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();
         
         
         return redirect('Employee/'.$request->employee_id.'/edit')
                        ->with('success','Employee Languages created successfully');
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
                  $row =EmpLanguages ::find($id);
               
                  $employee = Employee::find($row->employee_id);
                 
                  $emplanguages = EmpLanguages::join('languages', 'emp_languages.language', '=', 'languages.id')
                                               ->join('language_skills', 'emp_languages.skill', '=', 'language_skills.id')
                                               ->join('language_fluency_levels', 'emp_languages.fluencylevel', '=', 'language_fluency_levels.id')
                                               ->select('emp_languages.*','language_skills.name as lskills','language_fluency_levels.name as fluencylevels','languages.name as languagename')
                                               ->where('emp_languages.employee_id','=',$row->employee_id)
                                               ->orderBy('id','DESC')->paginate(25);
                   
                  
                
                   
                   
                 
                  $languages = ['' => ''] + Languages::pluck('name', 'id')->all();
                 
                  $languagefluencylevel = ['' => ''] + LanguageFluencyLevel::pluck('name', 'id')->all();
                  
                  $languageskill = ['' => ''] + LanguageSkill::pluck('name', 'id')->all();
        
                  $menu  = '';//$this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$row->employee_id);
                 
                 
                return view('pim.emplanguages.edit',['row'=>$row,'languagefluencylevel'=>$languagefluencylevel,'languageskill'=>$languageskill,'languages'=>$languages,'emplanguages'=>$emplanguages,'menu'=>$menu,'title'=>'New Employee Languages', 'ntitle'=>'Employee Languages List ','id'=>$id]);

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
        
           $this->validate($request, [ 'skill'        => 'required',
                                       'language'        => 'required',
                                       'fluencylevel'        => 'required',  
                                       'description'        => 'required',
                                      
                                        ], 
                                   [

                                     'skills.required' => 'Skills details  required ',
                                     'experience.required' => 'Experience details required',
                                     'description.required' => 'Notes details required',
                                     
                                   ]);
         
         $emplang = EmpLanguages::find($id);
         
         
          EmpLanguages::where('id',$id)->update([
           'skill' =>$request->skill,
           'language' =>$request->language,
           'fluencylevel' =>$request->fluencylevel,
           'description' =>$request->description]);
         
         
         return redirect('Employee/'.$emplang->employee_id.'/edit')
                        ->with('success','Employee Languages Skill Updated successfully');
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
        $row  =EmpLanguages::find($id);
         
        EmpLanguages::where('id',$id)->delete();
        
        return redirect('Employee/'.$row->employee_id.'/edit')
                        ->with('success','Employee Languages  deleted successfully');
    }
}
