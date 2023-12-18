$(document).ready(function() {
    $('#btn-enviar').click(function() {  
            $.ajax({
                type: "POST",    
                url: "../db/insert.php", 
                data: $("#formulario").serialize(),          
                success: function(data) {

                    console.log(data);
                    // alert(data);
                    // showMessage(data.message);
                    borrarInputs();
                }
            });
        });
    });
    
