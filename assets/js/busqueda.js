$("#BtnBuscar").click(function (){
   
    var txtbusqueda = $("#txtbusqueda").val();
    
    $.ajax({
        url: base_url + 'index.php/ControladorBusqueda/buscarmodulos',
        type:"post",
        data:{txtbusqueda:txtbusqueda},
        beforeSend: function (data) {
            
        },
        success: function (data) {
          var datos = JSON.parse(data);
          
          if(datos[0] == 1){
              $(".modulos").remove();
              $("#txtbusqueda").notify(
                        datos[1], "error",
                        {position: "right"}
                );
              return false;
          }
         if(datos.length == 0){
             $(".modulos").remove();
             $("#txtbusqueda").notify(
                        "No se encontro registros", "info",
                        {position: "right"}
                );
         }
          $(".modulos").remove();
          for(var j = 0;j < datos.length;j++){ 
            $("#contenido").append("<ul><li class='modulos'><a href='"+base_url+"index.php/"+datos[j]['ruta']+"'>"+datos[j]['modulo']+"</a></li><ul>");  
          }
          
          
          
          
        }
    })
    
    
    
    
    
})


