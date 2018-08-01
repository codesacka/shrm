@extends('layouts.adminlayout')
 
@section('content')


<div class="fw-body">
			<div class="content">
                            
                            <div class="col-md-11">
				<h1 class="page_title">{{ $title }}</h1>
				
                                
				<table id="" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Identifier</th>
							<th>Name</th>
							<th>Database</th>
                                                        <th>Database Server</th>
							<th>Register Date</th>
                                                        <th>Status</th>
							
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Identifier</th>
							<th>Name</th>
							<th>Database</th>
                                                        <th>Database Server</th>
							<th>Register Date</th>
							<th>Status</th>
						</tr>
					</tfoot>
					<tbody>
                                            @foreach($tenant as $obj)
						<tr>
                                                    <td><a href="{{ route('Tenant.edit',$obj->id) }}">{{ $obj->identifier }}</a></td>
							<td>{{ $obj->name }}</td>
							<td>{{ $obj->schema_name }}</td>
							<td>{{ $obj->schema_server }}</td>
							<td>{{ $obj->joined_date }}</td>
                                                        
                                                        
                                                        <td> 
                                                            
                                                            @if($obj->status  == 0)
                                                            <span class="label label-success">Active</span>
                                                           @else
                                                           
                                                           <span class="label label-warning">Disable</span>
                                                           @endif 
                                                        
                                                        </td>
							
						</tr>
                                             @endforeach
						
					</tbody>
				</table>
                                </div>
                                
                        </div>
</div>

@endsection