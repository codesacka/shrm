@extends('dashboard.companysettings')

@section('content')



<!--<script>tinymce.init({ selector:'textarea' });</script>-->

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Permission  Details</h3>

               
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
          {!! Form::open(array('url'=>'/permission/update','method'=>'POST', 'id'=>'PermForm','name'=>'PermForm','enctype'=>'multipart/form-data' )) !!}
                        {{ csrf_field() }}
                        
                        
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name :</label>
                <input type="text" class="form-control" id="name" name="name" value=" {{ $perm->name }}" />
              </div>
                
                
                 <div class="form-group">
                     
                     <label>Description :</label>
                     <textarea class="form-control" id="description" name="description" > {{ $perm->description }}</textarea>
                
              </div>
              <!-- /.form-group -->
              <!--<div class="form-group">
                <label>Password</label>
                   <input type="password" name="password" value=""  class="form-control" value="" />
              </div>-->
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             
              <!-- /.form-group -->
              <div class="form-group">
                <label>Display Name :</label>
                <input type="text" class="form-control" id="display_name" name="display_name" value="{{ $perm->display_name }}" />
              </div>
              <!-- /.form-group -->
            </div>
            
            
            
            
            
           <div class="col-md-6">
            
              <!-- /.form-group -->
             
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                
              </div>
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          
          
           <div class="box-footer">
               <input type="hidden"  name="id"  id="id"  value="{{ $perm->id }}">
               <button type="submit" class="btn btn-success"><b>Update</b></button>
               
                
              </div>
          
          
          {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->


      
      
      
      
@endsection