                                                                    @permission('empsalary-view')
                                                                          <div class="panel-body">
                                                                              @permission('empsalary-add')
                                                                        <div class="box-header">
                                                                            <h3 class="box-title">Compensation    <a class="btn btn-success" onclick="javascript:addjobdetails({!! $id !!})"> <i class="fa fa-plus"></i></a></h3> 
                                                                        </div>
                                                                              @endpermission
                                                                      
                                                                        <!-- /.box-header -->
                                                                        <div class="box-body">
                                                                          <table  class="table table-bordered table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                              <th>Effective Date</th>
                                                                              <th>Job Title</th>
                                                                              <th>Employment Status</th>
                                                                              <th>Active</th>
                                                                              
                                                                               <th> </th>
                                                                            
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                
                                                                            @foreach($allempjobdetails  as $obj)
                                                                            <tr>
                                                                              <td>{{ $obj->joineddate }}</td>
                                                                              <td>{{ $obj->jobname }}
                                                                               </td>
                                                                              <td>{{ $obj->empstatus }}</td>
                                                                              
                                                                               <td> @if( $obj->status ==1) 
                                                                                     <span class="label label-success">Active</span>
                                                                                    @else
                                                                                      <span class="label label-danger">Inactive</span>
                                                                                    @endif
                                                                               
                                                                               </td>
                                                                               <td>
                                                                                   
                                                                                          @permission('empsalary-edit')
                                                                                    <a class="btn btn-xs" onclick="javascript:editempslanguages({!! $obj->id !!})"><i class="fa fa-pencil icon-success"></i></a>
                                                                                          @endpermission
                                                                                          @permission('empsalary-delete')
                                                                                    {!! Form::open(['method' => 'DELETE','route' => ['EmpLanguage.destroy', $obj->id],'style'=>'display:inline']) !!}
                                                                                    <button type="submit" class="btn  btn-custom btn-xs" ><i class="fa fa-trash icon-success"></i></button>
                                                                                  
                                                                                   {!! Form::close() !!}
                                                                                     @endpermission
                                                                                   
                                                                                   
                                                                               </td>
                                                                             
                                                                            </tr>
                                                                           @endforeach
                                                                               
                                                                                      </tbody>
                                                                                      <tfoot>
                                                                                      <tr>
                                                                                       
                                                                                         <th>&nbsp;</th>
                                                                                          <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                      </tr>
                                                                                      </tfoot>
                                                                                    </table>
                                                                                  </div>
                                                                                  <!-- /.box-body -->
                                                                                </div>
                                                                                <!-- /.box -->
                                                                                
                                                                 
                                                                                
                                                              @endpermission