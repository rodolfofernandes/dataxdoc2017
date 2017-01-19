

$(document).ready(function(){
    $('#todos').click(function(){

        if($( '#mycheckbox' ).prop( "checked" ) == true){
        
               $( '#mycheckbox' ).prop( "checked" , false)
        } else {
           
             $( '#mycheckbox' ).prop( "checked" , true)
        }
    })
    
})


