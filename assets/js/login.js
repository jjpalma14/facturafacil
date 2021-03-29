$("#login").click(function () {
    var usuario = $("#user").val();
    var password = $("#password").val();
    $.ajax({

        url: base_url + 'index.php/ControladorLogin/Ingreso',
        type: "post",
        data: {
            usuario: usuario,
            password: password
        },
        beforeSend: function (data) {
         Swal.fire({
                type: 'info',
                title: 'Verificando',
                

            })
     
        
        },
        success: function (data) {
            
       
            
            if(data == 1){
                
             Swal.fire({
                type: 'success',
                title: 'Verificando',
                text: "Credenciales validas",

            })
            setInterval(function(){ 
                   window.location.href = '' + base_url + 'index.php/home';
            }, 1000);    
                
             return false;  
         
            }

         

            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: data,

            })
        }








    })


})






