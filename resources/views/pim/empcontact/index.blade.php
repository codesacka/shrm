
<ul>
<li class="color-3">
<i class="fa fa-info" aria-hidden="true"></i>
<h4>Address  Contacts</h4>
 @foreach ($empcontact as  $obj)
 <p><b>{{ $obj->city  }}</b>  &nbsp; &nbsp;<span  class="fa  fa-edit" onclick="javascript:editemployeecontact( {!! $obj->id !!} )"></span>&nbsp;&nbsp;
     <span class="fa  fa-trash" onclick="javascript:deleteemployeecontact( {!! $obj->id !!} )"></span></p>
 <p>{{ $obj->streetaddress1 }} <span></span></p>

 @endforeach
</li>
</ul>
    



  <script type="text/javascript"> 
      
      
      
         function addformcontact( id ){
             
               
             
               var APP_URL = {!! json_encode(url('/')) !!}
                        
                $.get( APP_URL+"/ContactDetails/"+id+"/create", function( data ) {
                    
                 
                     $.blockUI({ message: data, css: {  top: '20%', width: '700px;' } }); 
                    
                });
             
             
         }
        function editemployeecontact(id ){
           
        
             var APP_URL = {!! json_encode(url('/')) !!}
           
           
              $.get( APP_URL+"/ContactDetails/"+id+"/edit", function( data ) {
                  
                  
                 
                 
                 var modal = new tingle.modal({
                        footer: true,
                        stickyFooter: false,
                        closeMethods: ['overlay', 'button', 'escape'],
                        closeLabel: "Close",
                        cssClass: ['custom-class-1', 'custom-class-2'],
                        onOpen: function() {
                            console.log('modal open');
                        },
                        onClose: function() {
                            console.log('modal closed');
                        },
                        beforeClose: function() {
                            // here's goes some logic
                            // e.g. save content before closing the modal
                            return true; // close the modal
                            return false; // nothing happens
                        }
                    });

                    // set content
                    modal.setContent(data);
                  
                    modal.open();
            
                 });
                 
             

         }
      
       
         
          
  </script>