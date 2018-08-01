<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

@extends('template.dashboard.layouts')
 
@section('content')

    @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	      @endif
              
              @if ($message = Session::get('error'))
		<div class="alert alert-danger">
			<p>{{ $message }}</p>
		</div>
	      @endif
              
          <div class="row">
          <!--Responsive table-->
          <div class="col-sm-12">
         
              <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">{{ $title }}<span class="panel-subtitle">&nbsp;</span></div>
              <div class="panel-body">
                <div id="list1" class="dd">
                  <ol class="dd-list">
                  @foreach($competency as $obj)
                  
                   @if($obj->parent ==0 )
                   
                
                        <li data-id="3" class="dd-item">
                           <div class="dd-handle"><b>{{ $obj->name }}</b></div>
                           
                         <ol class="dd-list">
                       
                           
                           @foreach(App\Models\Admin\Competency::where('parent', $obj->id)->get()   as $row)

                           <li data-id="4" class="dd-item">
                             <div class="dd-handle"> {{ $row->name }}</div>
                           </li>
                            @endforeach
                          
                           
                         </ol>
                        </li>
                        
                        
                    @endif
                    
                    
                   @endforeach
                  </ol>
                </div>
                <div class="mt-5">
                 
                  <pre><code id="out1"></code></pre>
                </div>
              </div>
            </div>
              
              
              
              
              
          </div>
        </div>


 <script src="{{ URL::asset('assets/lib/jquery.nestable/jquery.nestable.js') }}" type="text/javascript"></script>
 <script src="{{ URL::asset('assets/js/app-ui-nestable-lists.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	App.uiNestableLists();
      });
    </script>


@endsection
