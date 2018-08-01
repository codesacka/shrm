<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pim\Dependents;
use App\Models\Pim\Employee;

class DependentsController extends Controller
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
    public function create($id)
    {
        //
            $employee = Employee::find($id);
        
            $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
            
            $dependent = Dependents::where('employee_id', '=', $id)->get();
            
            
            return view('pim.dependents.create',['menu'=>$menu,'ntitle'=>'Dependents List' ,'title'=>'New Dependents','id'=>$id,'dependent'=>$dependent]);
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
        
          $this->validate($request, [  'firstname'        => 'required',
                                       'lastname'        => 'required',  
                                       'relationship'        => 'required',
                                       'telephone'        => 'required',
                                       'notes'        => 'required',
                                       'contacts'        => 'required',
                                        ], 
                                   [

                                     'firstname.required' => 'First Name  required ',
                                     'lastname.required' => 'Last Name required',
                                     'relationship.required' => 'Relationship details required',
                                     'telephone.required' => 'Telephone details required',
                                     'notes.required' => 'Notes details required',
                                     'employee_id.required' => 'Employee ID details required',
                                   ]);
             
         $row =new Dependents;
         
         $row->firstname =$request->firstname;
         
         $row->lastname =$request->lastname;
         
         $row->relationship =$request->relationship;
         
         $row->telephone =$request->telephone;
          
         $row->contacts =$request->contacts;
          
         $row->notes   =$request->notes;
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();
         
         
         return redirect('Dependents/'.$request->employee_id.'/create')
                        ->with('success','Membership created successfully');
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
            $row =  Dependents::find($id);
        
            $employee = Employee::find($row->employee_id);
        
            $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
            
            $dependent = Dependents::where('employee_id', '=', $row->employee_id)->get();
            
            
            return view('pim.dependents.edit',['row'=>$row,'menu'=>$menu,'ntitle'=>'Dependents List' ,'title'=>'New Dependents','id'=>$row->employee_id,'dependent'=>$dependent]);
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
        
        $this->validate($request, [  'firstname'        => 'required',
                                       'lastname'        => 'required',  
                                       'relationship'        => 'required',
                                       'telephone'        => 'required',
                                       'notes'        => 'required',
                                       'contacts'        => 'required',
                                        ], 
                                   [

                                     'firstname.required' => 'First Name  required ',
                                     'lastname.required' => 'Last Name required',
                                     'relationship.required' => 'Relationship details required',
                                     'telephone.required' => 'Telephone details required',
                                     'notes.required' => 'Notes details required',
                                     'employee_id.required' => 'Employee ID details required',
                                   ]);
             
     
        
         Dependents::where('id',$id)
                  ->update(['firstname' => $request->firstname,
                            'lastname' => $request->lastname,
                            'relationship' => $request->relationship,
                            'telephone' =>$request->telephone,
                            'contacts' =>$request->contacts,
                            'notes' =>$request->notes]);
         
         
         return redirect('Dependents/'.$request->employee_id.'/create')
                        ->with('success','Membership created successfully');
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
         $social_row = Dependents::find($id);
         Dependents::where('id',$id)->delete();
        return redirect('Dependents/'.$social_row->employee_id.'/create')
                        ->with('success','Employee Contact  deleted successfully');
    }
}
