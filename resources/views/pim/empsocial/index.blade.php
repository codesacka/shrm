
<div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Social Media  Contacts</h3>
                
                <div class="box-tools">
                 
                 <a class="btn btn-default addsocialmediacont">
                  <i class="fa fa-plus addsocialmediacont"></i> Add
                 </a>
                    
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            
            

            <div class="box-body">
              <dl class="dl-horizontal">
                  
                @foreach ($empsocial as  $obj)
                <dt>{{ $obj->type }}:</dt>
                <dd>{{ $obj->handle }}      <a class="btn btn-default btn-sm editsocialmediacont" onclick="javascript:editformsocial( {!! $obj->id !!} )">
                        <i class="fa fa-edit  editsocialmediacont" onclick="javascript:editformsocial( {!! $obj->id !!} )"></i> 
                 </a>
                </dd>
                
                  <dd>&nbsp;</dd>
                  
                <dt>&nbsp;</dt>
                    
                <dd>  <a href='{{ $obj->link }}' target="_blank">{{ $obj->link }}</a></dd>
            
                    <dd>&nbsp;</dd>
               @endforeach
                
                <dd>&nbsp;</dd>
               
              </dl>
            </div>
             
             
            <!-- /.box-body -->
          </div>






     @include('pim.empsocial.create')


  <script type="text/javascript"> 
      
      
        function editformsocial(id ){
           
        
             var APP_URL = {!! json_encode(url('/')) !!}
           
           
              $.get( APP_URL+"/SocialMediaDetails/"+id+"/edit", function( data ) {
                  
                 
                  $.blockUI({ message: data, css: {  top: '20%', width: '700px;' } }); 
            
                 });
                 
                //  $.blockUI({ message: $('#editsocialmediaform'), css: {  top: '20%', width: '700px;' } }); 

         }
      
       $(document).ready(function() {
           
           
          
           
                     
          $('.addsocialmediacont').click(function() { 
          
         
            
                $.blockUI({ message: $('#addsocialmediaform'), css: {  top: '20%', width: '700px;' } }); 
       
          }); 
          
          
          
          
          
          
          
          
      });
         
          
  </script>