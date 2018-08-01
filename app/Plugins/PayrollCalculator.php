<?php
namespace App\Plugins;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Models\Pim\PayeStructure;

use App\Models\Pim\NhifStructure;


use App\Models\Pim\PayeStructureHolder;

use App\Models\Pim\Nhif_Structureholders;

use App\Models\Pim\Nssf_Structureholders;

class PayrollCalculator {
    
    
public function calculatetaxforemployee2($id,$newamount)
{
    
        $totalamount=0;

        $paye_all =PayeStructureHolder::where('releaseid','=',$id)->get();
        $count=0;
        
        
        $paye_total=0;
        
        $tax_amount =0;
        
        $paye_total=0;
       
        $numrows   = PayeStructureHolder::count();
     
        foreach($paye_all  as $row)
        {
             
            $count++;
      
            if($row->low ==0){
                
                $totalamount = $row->high * $row->rate/100;
                
              //  echo $totalamount;
                
              //  echo "<br>";
               $paye_total +=$totalamount;
                
             }elseif(($row->low > 0)   && ($row->high > 0)){
                
                $amount  =$row->high - ($row->low-1);
                
                
                
                $totalamount = $amount * $row->rate/100;
                
             //   echo $totalamount;
                
               // echo "<br>";
               $paye_total +=$totalamount;
                
            }elseif($row->high ==0){
                
                $amount  =$newamount - ($row->low-1);
                
                
                
                $totalamount = $amount * $row->rate/100;
                
              //  echo $totalamount;
                
             //   echo "<br>";
               $paye_total +=$totalamount;
                
            }
            

        }
        

        return $paye_total;
}     
    

  
public function calculate_nhif_employee2($id,$newamount)
{
    
        $totalamount=0;

        $nhif_all =Nhif_Structureholders::where('releaseid','=',$id)->get();
        $count=0;
        
        
      
       
        $numrows   = Nhif_Structureholders::count();
     
        foreach($nhif_all  as $row)
        {
             
            $count++;
      
            if($row->high !=0){
                
            
            if( $newamount >= $row->low  &&  $newamount <=$row->high ) {
                
           
                return $row->deduction;
                
             }
            }else{
               if( $newamount >= $row->low ){
                   
                    
                return $row->deduction;
                   
                   
               }
                
              
                                
            }
            

        }
        

} 


public function calculate_nssf_employee($id){
    
    $totalamount =0;
    
    $nssf_all  =Nssf_Structureholders::where('releaseid','=',$id)->first();
     
     
    $totalamount =$nssf_all->high;
    
    
    return $totalamount;    
    
}



public function calculatetaxforemployee($newamount)
{
    
        $totalamount=0;

        $paye_all =PayeStructure::all();
        $count=0;
        
        
        $paye_total=0;
        
        $tax_amount =0;
        
        $paye_total=0;
       
        $numrows   = PayeStructure::count();
     
        foreach($paye_all  as $row)
        {
             
            $count++;
      
            if($row->low ==0){
                
                $totalamount = $row->high * $row->rate/100;
                
              //  echo $totalamount;
                
              //  echo "<br>";
               $paye_total +=$totalamount;
                
             }elseif(($row->low > 0)   && ($row->high > 0)){
                
                $amount  =$row->high - ($row->low-1);
                
                
                
                $totalamount = $amount * $row->rate/100;
                
             //   echo $totalamount;
                
               // echo "<br>";
               $paye_total +=$totalamount;
                
            }elseif($row->high ==0){
                
                $amount  =$newamount - ($row->low-1);
                
                
                
                $totalamount = $amount * $row->rate/100;
                
              //  echo $totalamount;
                
             //   echo "<br>";
               $paye_total +=$totalamount;
                
            }
            

        }
        

        return $paye_total;
} 
    
    
public function calculate_nhif_employee($newamount)
{
    
      
        $totalamount=0;

        $nhif_all =NhifStructure::all();
        $count=0;
        
        
      
       
        $numrows   = NhifStructure::count();
     
        foreach($nhif_all  as $row)
        {
             
            $count++;
      
            if($row->high !=0){
                
            
            if( $newamount >= $row->low  &&  $newamount <=$row->high ) {
                
           
                return $row->deduction;
                
             }
            }else{
               if( $newamount >= $row->low ){
                   
                    
                return $row->deduction;
                   
                   
               }
                
              
                                
            }
            

        }
        

} 
    
}