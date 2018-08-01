<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Recruitment\Vacancy;

use App\Models\Pim\Employee;

use App\Models\Admin\JobTitle;


use App\Models\Admin\Locations;

use App\Models\Admin\Structure;

use App\Models\Recruitment\VacancyTemplate;

use DB;

class VacancyTemplateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         
        $vacancytemplate = VacancyTemplate::orderBy('id','DESC')->paginate(5);
        
        $menu  = $this ->topRecuitment();
        
        
              
              
        return view('recruitment.vacancytemplate.index',['vacancytemplate'=>$vacancytemplate,'title'=>'Vacancy Template List','menu'=>$menu]);
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
             
               
             $employee =['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
             
             
             $location = ['' => ''] + Locations::pluck('name', 'id')->all();
              
             $jobtitle = ['' => ''] + JobTitle::pluck('name', 'id')->all();
             
             $subunit   = ['' => ''] + Structure::pluck('name', 'id')->all();
              
             $vacancy   = ['' => ''] + Vacancy::pluck('vacancy', 'id')->all(); 
            
            return view('recruitment.vacancytemplate.create',['employee'=>$employee,'vacancy'=>$vacancy,'subunit'=>$subunit,'location'=>$location ,'jobtitle'=>$jobtitle ,'employee'=>$employee,'menu'=>$menu,'title'=>'Add Job Vacancy Template']);
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
        
            
        $this->validate($request, [    'templatename'=> 'required',
                                       'vacancy'      => 'required',
                                       'jobtitle' =>  'required',
                                       'location'  =>  'required',
                                       'subunit'    =>  'required',
                                       'hiringmanager'  =>  'required',
                                       'number_of_positions'   =>  'required',
                                       'description'   =>  'required',
                                                                                 
                                  ]);
        
     
             
         $row =new VacancyTemplate;
         
          
         $row->templatename =$request->templatename;
         
         
         $row->vacancy =$request->vacancy;
         
         $row->jobtitle   =$request->jobtitle;
         
         $row->location   =$request->location;
          
         $row->subunit   =$request->subunit;
         
         $row->hiringmanager   =$request->hiringmanager;
         
         $row->number_of_positions   =$request->number_of_positions;
         
         $row->description   =$request->description;
         
         $row->save();
         
         
         return redirect()->route('Vacancy.index')
                        ->with('success','Vacancy created successfully');
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
        
            $menu     = $this ->topRecuitment();
             
                
             $employee =['' => ''] + Employee::select(  DB::raw("CONCAT(emp_firstname,'     ',emp_middle_name,'            ',emp_lastname) AS name, id"))
                                      ->orderBy('id','DESC')
                                      ->pluck('name', 'id')
                                       ->all();
              
            $row      = VacancyTemplate::find($id);
            
             $location = ['' => ''] + Locations::pluck('name', 'id')->all();
              
             $jobtitle = ['' => ''] + JobTitle::pluck('name', 'id')->all();
             
             $subunit   = ['' => ''] + Structure::pluck('name', 'id')->all();
             
             $vacancy   = ['' => ''] + Vacancy::pluck('vacancy', 'id')->all(); 
              
            return view('recruitment.vacancytemplate.edit',['employee'=>$employee,'vacancy'=>$vacancy,'subunit'=>$subunit,'location'=>$location ,'jobtitle'=>$jobtitle ,'row'=>$row,'employee'=>$employee,'menu'=>$menu,'title'=>'Update Job Vacancy']);
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
        
         $this->validate($request, [   'vacancy'      => 'required',
                                       'jobtitle' =>  'required',
                                       'location'  =>  'required',
                                       'subunit'    =>  'required',
                                       'hiringmanager'  =>  'required',
                                       'number_of_positions'   =>  'required',
                                       'description'   =>  'required',
                                                                                 
                                  ]);
        
             

           Vacancy::where('id',$id)->update([   'vacancy' => $request->vacancy,
                                                'jobtitle'   =>$request->jobtitle,
                                                'location'   =>$request->location,
                                                'subunit'   =>$request->subunit,
                                                'hiringmanager'   =>$request->hiringmanager,
                                                'number_of_positions'   =>$request->number_of_positions,
                                                'description'   =>$request->description]);
         
         
         
         
        
          
         
         return redirect()->route('Vacancy.index')
                          ->with('success','Vacancy updated successfully');
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
        
           Vacancy::where('id',$id)->delete();
        return redirect()->route('Vacancy.index')
                        ->with('success','Assign Leave  deleted successfully');
    }
}
