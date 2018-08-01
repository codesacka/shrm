<div class="row">
    <h4 class="h-bold" style="font-weight: 15px;"><i class="fa fa-folder-open"></i> {{  $folder->name  }}</h4>
				<div class="col-sm-3 col-md-12">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
                                            
                                            
                                            <table  class="table table-bordered table-striped ">
                                                                             <thead>
                                                                                        <tr>
                                                                                                <th>Files</th>

                                                                                               
                                                                                                

                                                                                        </tr>
                                                                                        </thead>
                                                                                          <tbody>
						
                                                                                @foreach($files as $file)

                                                                                <tr>
                                                                                    <td><a href="{{ URL::asset('uploads'.$file->attachment) }}" target="blank">{{ $file->name }}</a></td>

                                                                                </tr>



                                                                                @endforeach


                                                                                       </tbody>
                                                                            <tfoot>
                                                                            <tr>
                                                                             
                                                                               
                                                                               
                                                                              <th>&nbsp;</th>
                                                                                              </tr>
                                                                            </tfoot>
                                                                          </table>
                                                
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            
					</div>
				</div>