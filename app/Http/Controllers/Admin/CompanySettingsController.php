<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\Sysprefs;

use App\Support\TenantConnector;
use App\Models\Main\SpiceTenant;



class CompanySettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $this->DBReconnect($request);
        $dba ='';
        $legal_name='';
        $company_website='';
        $primaryadmin='';
        $hrcontact ='';
        $kra_pin ='';
        $telephone='';
        $postal_address='';
        $mobilephone ='';
        $personalrelief='';
        $currency='';
        
        $annualleave ='';
        $maternityleave='';
        $sickleave='';
        
        
        $sysall = Sysprefs::all();
        
        
        foreach ($sysall as $row){
            
            if($row->name == 'dba'){
            $dba   =$row->value;
            }
            elseif($row->name == 'legal_name'){
            $legal_name   =$row->value;
            }
            elseif($row->name == 'company_website'){
            $company_website   =$row->value;
            } 
            elseif($row->name == 'primaryadmin'){
            $primaryadmin   =$row->value;
            } 
          
            elseif($row->name == 'hrcontact'){
            $hrcontact   =$row->value;
            } 
            elseif($row->name == 'kra_pin'){
            $kra_pin   =$row->value;
            } 
            
            elseif($row->name == 'nhifpin'){
            $nhifpin   =$row->value;
            } 
            
             elseif($row->name == 'nssfpin'){
            $nssfpin   =$row->value;
            } 
            
            elseif($row->name == 'telephone'){
            $telephone   =$row->value;
            } 
            elseif($row->name == 'postal_address'){
            $postal_address   =$row->value;
            } 
            elseif($row->name == 'mobilephone'){
            $mobilephone   =$row->value;
            } 
            elseif($row->name == 'personalrelief'){
            $personalrelief   =$row->value;
            } 
            
           
            elseif($row->name == 'annualleave'){
            $annualleave   =$row->value;
            } 
            
             elseif($row->name == 'maternityleave'){
            $maternityleave   =$row->value;
            }
            
            
            elseif($row->name == 'sickleave'){
            $sickleave   =$row->value;
            }
            
            
             elseif($row->name == 'currency'){
            $currency   =$row->value;
            } 
            elseif($row->name == 'coy_logo'){
              $companylogo   =$row->value;
            }
        }   
          
         
        
          return view('admin.companysettings.index',['sidemenu'=>$this->sidemenu('Company.Profile'),'leavetitle'=>'Leave Settings','sickleave'=>$sickleave,'maternityleave'=>$maternityleave,'annualleave'=>$annualleave,'nssfpin'=>$nssfpin,'nhifpin'=>$nhifpin,'taxtitle'=>'Tax Profile','companylogo'=>$companylogo,'currency'=>$currency,'personalrelief'=>$personalrelief,'mobilephone'=>$mobilephone,'postal_address'=>$postal_address,'telephone'=>$telephone,'kra_pin'=>$kra_pin,'hrcontact'=>$hrcontact,'primaryadmin'=>$primaryadmin,'company_website'=>$company_website,'legal_name'=>$legal_name,'dba'=>$dba,'title'=>'Company Profile','id'=>0,'companydet'=>'','menu'=>$this->Companysettings('Company Overview')]);
    }
    
    public function taxinfo(Request $request){
         $this->DBReconnect($request);
         
         $kra_pin ='';
         $personalrelief='';
         $currency='';
          
         $sysall = Sysprefs::all();
         foreach ($sysall as $row){
            
             if($row->name == 'kra_pin'){
            $kra_pin   =$row->value;
            } 
           
            elseif($row->name == 'personalrelief'){
            $personalrelief   =$row->value;
            } 
            elseif($row->name == 'currency'){
            $currency   =$row->value;
            } 
            
         }
          return view('admin.companysettings.taxinfo',['title'=>'Tax Information','currency'=>$currency,'kra_pin'=>$kra_pin,'personalrelief'=>$personalrelief,'id'=>0,'jobtitle'=>'','menu'=>$this->Companysettings('Tax Info')]);
        
    }

    
    public function BillingPayments(){
        
        
        
         return view('admin.companysettings.billingpayments',['title'=>'Billing Payments','id'=>0,'jobtitle'=>'','menu'=>'']);
        
    }
    
    
    public function Addresses(){
        
        
        return view('admin.companysettings.addresses',['title'=>'Addresses /Departments','id'=>0,'jobtitle'=>'','menu'=>'']); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
     public function store2(Request $request)
    {
        
          $this->DBReconnect($request);
           
           
          $sysall = Sysprefs::all();
       
          foreach ($sysall as $row){
            
            if($row->name == 'dba'){
              $dba   =$row->value;
            
              Sysprefs::where('name','dba')->update(['value'=>$request->dba]);
            
            }
            elseif($row->name == 'legal_name'){
              $legal_name   =$row->value;
            
             Sysprefs::where('name','legal_name')->update(['value'=>$request->legal_name]);
            }
            elseif($row->name == 'company_website'){
            $company_website   =$row->value;
            
             Sysprefs::where('name','company_website')->update(['value'=>$request->company_website]);
            } 
          }
          
            return redirect('home');
    }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taxstore(Request $request)
    {
          $this->DBReconnect($request);
        
          $sysall = Sysprefs::all();
       
          foreach ($sysall as $row){
              
            if($row->name == 'kra_pin'){
                  $kra_pin   =$row->value;
            
                Sysprefs::where('name','kra_pin')->update(['value'=>$request->kra_pin]);
            } 
			
			 elseif($row->name == 'personalrelief'){
                 $personalrelief   =$row->value;
            
              Sysprefs::where('name','personalrelief')->update(['value'=>$request->personalrelief]);
            } 
            
             elseif($row->name == 'currency'){
                 $currency   =$row->value;
            
              Sysprefs::where('name','currency')->update(['value'=>$request->currency]);
            } 
              
              
          }
            
         return redirect()->route('Company.TaxInfo')
                          ->with('success','Company Profile updated successfully');
    }
    
    
    public function storelogo(Request $request){
        
        
         $this->validate($request, ['company_logo'=>'required' ]);
         
         
         $this->DBReconnect($request);
        
      
        $company_logo = md5(rand().$request->emp_work_email) . '.' .$request->file('company_logo')->getClientOriginalExtension();
        
        $request->file('company_logo')->move(  base_path() .'/public/uploads/', $company_logo);
        
        $sysall = Sysprefs::all();
        
         foreach ($sysall as $row){
            
            if($row->name == 'coy_logo'){
              $dba   =$row->value;
            
              Sysprefs::where('name','coy_logo')->update(['value'=>$company_logo]);
            
            }
         }
         
         
             
           return redirect()->route('Company.Profile')
                          ->with('success','Company Profile updated successfully');
        
        
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
        
          $sysall = Sysprefs::all();
       
          foreach ($sysall as $row){
            
            if($row->name == 'dba'){
           
            
              Sysprefs::where('name','dba')->update(['value'=>$request->dba]);
            
            }
            elseif($row->name == 'legal_name'){
           
            
             Sysprefs::where('name','legal_name')->update(['value'=>$request->legal_name]);
            }
            elseif($row->name == 'company_website'){
          
            
             Sysprefs::where('name','company_website')->update(['value'=>$request->company_website]);
            } 
            elseif($row->name == 'primaryadmin'){
         
            
               Sysprefs::where('name','primaryadmin')->update(['value'=>$request->primaryadmin]);
            } 
          
            elseif($row->name == 'hrcontact'){
              
            
               Sysprefs::where('name','hrcontact')->update(['value'=>$request->hrcontact]);
            } 
           
            elseif($row->name == 'telephone'){
           
            
                Sysprefs::where('name','telephone')->update(['value'=>$request->telephone]);
            } 
            elseif($row->name == 'postal_address'){
             
            
                Sysprefs::where('name','postal_address')->update(['value'=>$request->postal_address]);
            } 
            elseif($row->name == 'mobilephone'){
               
            
              Sysprefs::where('name','mobilephone')->update(['value'=>$request->mobilephone]);
            }      
            elseif($row->name == 'kra_pin'){
           
            
             Sysprefs::where('name','kra_pin')->update(['value'=>$request->kra_pin]);
            } 
           
            elseif($row->name == 'personalrelief'){
            
            
               Sysprefs::where('name','personalrelief')->update(['value'=>$request->personalrelief]);
            } 
            elseif($row->name == 'currency'){
           
                 Sysprefs::where('name','currency')->update(['value'=>$request->currency]);
            } 
            
            elseif($row->name == 'nhifpin'){
           
            
              Sysprefs::where('name','nhifpin')->update(['value'=>$request->nhifpin]);
            } 
            
            elseif($row->name == 'nssfpin'){
            
             Sysprefs::where('name','nssfpin')->update(['value'=>$request->nssfpin]);
            } 
            
            
             elseif($row->name == 'annualleave'){
          
                 Sysprefs::where('name','annualleave')->update(['value'=>$request->annualleave]);
            } 
            
            elseif($row->name == 'maternityleave'){
                       
              Sysprefs::where('name','maternityleave')->update(['value'=>$request->maternityleave]);
            } 
            
            elseif($row->name == 'sickleave'){
           
             Sysprefs::where('name','sickleave')->update(['value'=>$request->sickleave]);
            } 
            
        }
        
           return redirect()->route('Company.Profile')
                          ->with('success','Company Profile updated successfully');
        
        
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
