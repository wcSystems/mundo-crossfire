
var venta = localStorage.getItem('venta');
var cliente = localStorage.getItem('clienteN');
var suscripcion = localStorage.getItem('sus_n');
var mensaje = localStorage.getItem('mens');
var cliente_no=localStorage.getItem('cliente_no_re');




$.ajax({
    url: "api/notificacion-admin",
    type: "GET",
    dataType: 'json',
    success: function (data) {
        
        if(data.venta>0){
            $("#venta_n").html('<span class="badge badge badge-pill badge-info float-right mr-2">'+data.venta+'</span>')
        }
        if(data.cliente_registrados>0){
            $("#cliente_n").html('<span class="badge badge badge-pill badge-info float-right mr-2">!</span>')
            $("#cli_r_n").html('<span class="badge badge badge-pill badge-info float-right mr-2">'+data.cliente_registrados+'</span>')
        }
        if(data.suscripciones>0){
            $("#sus_n").html('<span class="badge badge badge-pill badge-info float-right mr-2">'+data.suscripciones+'</span>')
        }
        if(data.mensajes>0){
            $("#mensaje_n").html('<span class="badge badge badge-pill badge-info float-right mr-2">'+data.mensajes+'</span>')
        }
        if(data.cliente_no>0){
            $("#cliente_n").html('<span class="badge badge badge-pill badge-info float-right mr-2">!</span>')
            $("#cli_n_n").html('<span class="badge badge badge-pill badge-info float-right mr-2">'+data.cliente_no+'</span>')
        }

    },
    error: function (data) {
        console.log('Error:', data);
    }
});


if(venta==1){
    $("#venta_n").hide()
}
if(cliente==1){
    $("#cliente_n").hide()
}
if(suscripcion==1){
    $("#sus_n").hide()
}
if(mensaje==1){
    $("#mensaje_n").hide()
}
if(cliente_no==1){
    $("#cli_n_n").hide()
}

if((cliente_no==1)&&(cliente==1)){
    $("#cliente_n").hide()
}

$("#venta_n").click(function(){
    localStorage.setItem('venta', 1);
});

$("#clienteN").click(function(){
    localStorage.setItem('clienteN', 1);
});

$("#sus_n").click(function(){
    localStorage.setItem('sus_n', 1);
});

$("#mens").click(function(){
    localStorage.setItem('mens', 1);
});

$("#cliente_no_re").click(function(){
    localStorage.setItem('cliente_no_re', 1);
});


$("#salir").click(function(){
    $.ajax({
        url: "api/log-admin",
        type: "GET",
        dataType: 'json',
        success: function (data) {    
           console.log(data)
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
    localStorage.removeItem('cliente_no_re');
    localStorage.removeItem('mens');
    localStorage.removeItem('sus_n');
    localStorage.removeItem('clienteN');
    localStorage.removeItem('venta');

});

