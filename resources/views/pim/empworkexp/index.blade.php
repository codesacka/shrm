<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

@extends('layouts.dashboard')
 
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
            <div class="panel panel-default panel-table">
              <div class="panel-heading">{{ $title }}
                <div class="tools"><a class="btn btn-success" href="{{ url('/') }}/TerminationReason/create"> New</a></div>
              </div>
              <div class="panel-body">
                <div class="table-responsive noSwipe">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                    
                        <th style="width:20%;">Name</th>
                        <th style="width:17%;">Description</th>
                       
                        <th style="width:10%;"></th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($jobtitle as  $obj)
                      <tr>
                        <td>
                         {{ $obj->name }}
                        </td>
                      
                        <td class="cell-detail">
                            {{ $obj->description }}
                        </td>
                        
                        <td class="cell-detail"> <a class="btn btn-info" href="{{ route('JobTitle.edit',$obj->id) }}">Edit</a>
                             
                        {!! Form::open(['method' => 'DELETE','route' => ['JobTitle.destroy', $obj->id],'style'=>'display:inline']) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
        	{!! Form::close() !!}
                        </td>
                      
                      </tr>
                         @endforeach
                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>





@endsection
