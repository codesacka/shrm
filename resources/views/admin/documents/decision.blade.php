<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
@extends('template.decision.layouts')

@section('content')

 @permission('documents-decision')
      <div class="main-content container">
          
          
       <div class="jumbotron hero-spacer">
            <h2 style="text-align: center;font-weight: bold;">Document Management</h2>
            <p class="expl">
                Managing employee records can be a never-ending process of updating, uploading, and filing away documents for safekeeping. The SpiceHRM Documents app makes it easy for administrators to manage all of this online, in one place, while helping maintain these records over the entire duration of an employee’s time with your company—including post-employment
            </p>
            <p>
                <a href="{{ route('Documents.index') }}"><span class="btn btn-danger btn-large">Get Started</span></a>
            </p>
        </div>
  
        <!-- Default Pricint Tables-->
        <div class="row pricing-tables">
          <div class="col-md-3">
            <div class="pricing-table">
              <div class="pricing-table-title">Basic</div>
              <div class="pricing-table-price"><span class="currency">us</span><span class="value">$8</span></div>
              <div class="pricing-table-frecuency">month</div>
              <div class="panel-divider panel-divider-xl"></div>
              <ul class="pricing-table-features">
                <li><b>50M</b> ipsum dolor sit amet</li>
                <li><b>600</b> tesque sit amet odio elit</li>
                <li><b>Unlimited</b> Integer felis odio</li>
              </ul><a href="#" class="btn btn-primary">Upgrade Plan</a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="pricing-table">
              <div class="pricing-table-title">Premium</div>
              <div class="pricing-table-price"><span class="currency">us</span><span class="value">$12</span></div>
              <div class="pricing-table-frecuency">month</div>
              <div class="panel-divider panel-divider-xl"></div>
              <ul class="pricing-table-features">
                <li><b>50M</b> ipsum dolor sit amet</li>
                <li><b>600</b> tesque sit amet odio elit</li>
                <li><b>Unlimited</b> Integer felis odio</li>
              </ul><a href="#" class="btn btn-primary">Upgrade Plan</a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="pricing-table">
              <div class="pricing-table-title">Pro</div>
              <div class="pricing-table-price"><span class="currency">us</span><span class="value">$18</span></div>
              <div class="pricing-table-frecuency">month</div>
              <div class="panel-divider panel-divider-xl"></div>
              <ul class="pricing-table-features">
                <li><b>50M</b> ipsum dolor sit amet</li>
                <li><b>600</b> tesque sit amet odio elit</li>
                <li><b>Unlimited</b> Integer felis odio</li>
              </ul><a href="#" class="btn btn-primary">Upgrade Plan</a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="pricing-table">
              <div class="pricing-table-title">Team</div>
              <div class="pricing-table-price"><span class="currency">us</span><span class="value">$25</span></div>
              <div class="pricing-table-frecuency">month</div>
              <div class="panel-divider panel-divider-xl"></div>
              <ul class="pricing-table-features">
                <li><b>50M</b> ipsum dolor sit amet</li>
                <li><b>600</b> tesque sit amet odio elit</li>
                <li><b>Unlimited</b> Integer felis odio</li>
              </ul><a href="#" class="btn btn-primary">Upgrade Plan</a>
            </div>
          </div>
        </div>
        <!-- Dark Pricing Tables-->
       
        <!--Primary Pricing Tables-->
        
        
        
    
      </div>
        
        @endpermission
        
        

@endsection


