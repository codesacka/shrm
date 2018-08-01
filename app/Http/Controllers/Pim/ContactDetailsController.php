<?php

namespace App\Http\Controllers\Pim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Pim\EmpContactDetails;

use App\Models\Pim\Employee;

use App\Models\Admin\Nationality;

class ContactDetailsController extends Controller
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
                 
                 $empcontact = EmpContactDetails::where('employee_id','=',$id)->paginate(15);
                 
                 $nationality = ['' => ''] + Nationality::pluck('name', 'id')->all();
                 
                
        
                 $menu  = $this ->topEmployee($employee->emp_firstname.'  '.$employee->emp_middle_name.'  '.$employee->emp_lastname,$id);
                 
                 
                return view('pim.empcontact.create',[ 'nationality'=>$nationality,'empcontact'=>$empcontact,'menu'=>$menu,'title'=>'New  Employee  Contact', 'ntitle'=>'Employee  Contact List ','id'=>$id]);
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
          
          
         $this->validate($request, [   'streetaddress1'        => 'required',
                                       'streetaddress2'        => 'required',
                                       'city'        => 'required',
                                       'country' =>  'required',
                                       'employee_id' =>  'required', 
                                       'county' =>  'required',
                                       'postalcode' =>  'required',   
                                       'hometelephone' =>  'required',   
                                       'mobile' =>  'required',   
                                       'worktelephone' =>  'required',   
                                       'workemail' =>  'required',   
                                       'otheremail' =>  'required',   
                                        
                                        ]);
        
      
                 
         $row =new EmpContactDetails;
         
         $row->streetaddress1          =$request->streetaddress1;
 
         $row->streetaddress2     =$request->streetaddress2;
         
         $row->city    =$request->city;
          
         $row->country     =$request->country;
         
         $row->county   =$request->county;
         
         $row->postalcode        =$request->postalcode;
         
         $row->hometelephone   =$request->hometelephone;
         
         $row->mobile   =$request->mobile;
         
         $row->worktelephone   =$request->worktelephone;
          
         $row->workemail   =$request->workemail;
         
         $row->otheremail   =$request->otheremail;
         
         $row->employee_id   =$request->employee_id;
         
         $row->save();
             return redirect('Employee/'.$request->employee_id.'/show')
                        ->with('success','New  Employee Contact Details created successfully');
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
        $empcont_row = EmpContactDetails::find($id);
        
        
        $employee = Employee::find($empcont_row->employee_id);
         
         
        $nationality = ['' => ''] + Nationality::pluck('name', 'id')->all();
        
        $empcontact = EmpContactDetails::where('employee_id','=',$empcont_row->employee_id)->paginate(15);
         
        $profmenu = $this->topProfilePim($employee->id);
        
        return view('pim.empcontact.edit',['empcont_row'=>$empcont_row,'nationality'=>$nationality,'empcontact'=>$empcontact,'profmenu'=>$profmenu,'title'=>'New  Employee  Contact', 'ntitle'=>'Employee  Contact List ','id'=>$empcont_row->employee_id]);
        
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
        
         $this->validate($request, [   'streetaddress1'        => 'required',
                                       'streetaddress2'        => 'required',
                                       'city'        => 'required',
                                       'country' =>  'required',
                                       'employee_id' =>  'required', 
                                       'county' =>  'required',
                                       'postalcode' =>  'required',   
                                       'hometelephone' =>  'required',   
                                       'mobile' =>  'required',   
                                       'worktelephone' =>  'required',   
                                       'workemail' =>  'required',   
                                       'otheremail' =>  'required',   
                                        
                                        ]);
        
      
                 
       
         
          EmpContactDetails::where('id',$id)->
                        update(['streetaddress1' => $request->streetaddress1,
                               'streetaddress2' =>$request->streetaddress2,
                               'city' =>$request->city,
                               'country' =>$request->country,
                               'county' =>$request->county,
                               'postalcode' =>$request->postalcode,
                               'hometelephone' =>$request->hometelephone,
                               'mobile' =>$request->mobile,
                               'worktelephone' =>$request->worktelephone,
                               'workemail' =>$request->workemail,
                               'otheremail' =>$request->otheremail
                               ]);
             return redirect('Employee/'.$request->employee_id.'/show')
                        ->with('success','Update  Employee Contact Details created successfully');
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
         $empcont_row = EmpContactDetails::find($id);
         EmpContactDetails::where('id',$id)->delete();
        return redirect('ContactDetails/'.$empcont_row->employee_id.'/create')
                        ->with('success','Employee Contact  deleted successfully');
    }
}
