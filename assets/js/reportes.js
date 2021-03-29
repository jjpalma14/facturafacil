$("#BtnConsultarDetalleVenta").click(function (){
  var inicio = $("#inicio").val();  
  var fin = $("#fin").val();
  $.ajax({
      url: base_url + 'index.php/reportes/detalleventa',
      type:"post",
      data:{inicio:inicio,fin:fin},
        beforeSend: function (data) {
          $("#icocargando").show(); 
        },
        success: function (data) {
            
           var msg = JSON.parse(data);
           if(msg[0] == 1){
               $("#icocargando").hide();
               Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: msg[1],

            })
            return false;
        }else{
            $("#icocargando").hide();
            var datos = JSON.parse(data);
             var frame = $('#frame');
             var url = 'RepDetalleVenta?inicio='+datos[0]+'&fin='+datos[1]+'';
             frame.attr('src',url).show();
        }
        }
        
  })


})

