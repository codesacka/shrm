@extends('layouts.adminlayout')
 
@section('content')



<div class="fw-body">
			<div class="content">
                            
                            <div class="col-md-11">
				<h1 class="page_title">{{ $title }}</h1>
                                
                                {!! Form::model($tenant, ['method' => 'PATCH','data-parsley-validate','route' => ['Tenantdisable.update', $tenant->id]]) !!}
                               
                            
                                @foreach($disablereason as $obj)
                                <div class="radio">
                                        <label>
                                            <input type="radio" name="disablereason"  value="{{ $obj->id  }}" data-parsley-error-message="Disable  Reason  is required" data-parsley-required="true">{{ $obj->name }}
                                        </label>
                                      </div>
                                
                                @endforeach
                                
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    
                                    <button type="submit" class="btn btn-success">Update</button>
                                    
                                    
                               
                                    
                                   
                                </div>
                                
                                
                                {!! Form::close() !!}

                                
                            </div>
                        </div>
</div>

@endsection