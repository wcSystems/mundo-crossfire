$(function () {
    
    //MOSTRAR INFO DE TICKET
    $('body').on('click', '.ver', function (){
        var ticket = $(this).data('id');
        
        $.get('/api/sendInfoTicket' +'/' + ticket, function (data) {
        
            var datos=data
            document.getElementById("modal-titulo").innerHTML =ticket
            const lista=document.getElementById('lista-ventas')

            const ventasRender = datos.map((dato)=>
                `<tr>
                    <td>${dato.titulo}</td>
                    <td>${dato.cantidad}</td>
                    <td>$${dato.precio_no_afiliados}</td>
                    <td>$${dato.sub_total}</td>

                </tr>`
            ).join("")

            var total =datos.map(function(obj){
                var totales=obj.total
                return totales
            })

            var fecha =datos.map(function(obj){
                var fechas=obj.Fecha
                return fechas
            })

            lista.innerHTML= ventasRender
            document.getElementById('precio_prod').innerHTML=total[0];
            document.getElementById('fecha').innerHTML=fecha[0];

        })

    });


    //MOSTRAR INFO DE SUSCRIPCION
    $('body').on('click', '.ver-suscripcion', function (){
        var nro_suscripcion = $(this).data('id');
        
        $.get('/api/sendInfoSuscripcion' +'/' + nro_suscripcion, function (data) {
            var datos =data.info_suscrip
            var kits =data.name_kits
            const lista=document.getElementById('lista-suscripcion')
            const lista2=document.getElementById('lista-suscripcion-kits')

            const ventasRender = datos.map((dato)=>
                `<tr>
                    <td>${dato.nombre_paquete}</td>
                    <td>${dato.region}</td>
                    <td>${dato.comuna}</td>
                    <td>${dato.calle_avenida}</td>
                    <td>${dato.numero}</td>
                </tr>`
            ).join("")


            const kitsRender = kits.map((datos)=>
                `<tr>
                    <td>${datos.nombre_kit}</td>
                    <td>$ ${datos.precio}</td>
                </tr>`
            ).join("")

            
            lista.innerHTML= ventasRender
            lista2.innerHTML= kitsRender

        })


    });

});