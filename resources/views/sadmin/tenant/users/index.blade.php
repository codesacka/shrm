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
                                                        <th>Email</th>
                                                       
                                                        <th></th>
							
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Identifier</th>
						        <th>Name</th>
                                                        <th>Email</th>
                                                       
                                                        <th></th>
							
						</tr>
					</tfoot>
					<tbody>
                                            @foreach($users as $obj)
						<tr>
                                                    <td><a href="{{ route('Tenant.edit',$obj->id) }}">{{ $obj->identifier }}</a></td>
							<td>{{ $obj->name }}</td>
							<td>{{ $obj->email }}</td>
							
							<td></td>
							
						</tr>
                                             @endforeach
						
					</tbody>
				</table>
                                </div>
                                
                        </div>
</div>

@endsection