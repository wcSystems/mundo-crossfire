$(function () {

    ///PARA LISTAR LOS PAQUETES
    fetch('/api/list-paquete')
    .then(response => response.json())
    .then(repos => {
        var list= repos.paquete
        list.sort()

        $.each(list,function(key,value){
            $("#paquete_id").append('<option value="'+value.id+'">'+value.nombre_paquete+'</option>');
        });

    })
    .catch(err => console.log(err))


    ///PARA LISTAR KITS
    /*fetch('/api/list-kits')
    .then(response => response.json())
    .then(repos => {
        var list= repos.kit
        list.sort()

        $.each(list,function(key,value){
            $("#kit_id").append('<option value="'+value.id+'">'+value.nombre_kit+'</option>');
        });

    })
    .catch(err => console.log(err))*/
     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin-no-pagados",
        columns: [
            {data: 'nro_suscripcion', name: 'nro_suscripcion'},
            // {data: 'estado', name: 'estado'},
            {data: 'name', name: 'name'},
            {data: 'nombre_paquete', name: 'nombre_paquete'},
            {data: 'tiempo', name: 'tiempo'},
            //{data: 'nombre_kit', name: 'nombre_kit'},
            //{data: 'precio_suscripcion', name: 'precio_suscripcion'},
            {data: 'dia_visita', name: 'dia_visita'},
            {data: 'semana_visita', name: 'semana_visita'},
            {data: 'mascotas', name: 'mascotas'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "language":{
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio"
                        },
                        "moment": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No vacio"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "not": "No",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": "."
            } 
    });


   

    //ACTUALIZAR 
    $('body').on('click', '.editProduct', function () {
        var suscripto_id = $(this).data('id');
        $.get('/admin-no-pagados' +'/' + suscripto_id +'/edit', function (data) {
            $('#modelHeading').html("Editar Suscripcion");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#suscripto_id').val(data.id);
            $('#dia_visita').val(data.dia_visita);
            $('#semana_visita').val(data.semana_visita);
            $('#paquete_id').val(data.paquete_id);
            //$('#kit_id').val(data.kit_id);
    
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Actualizando..');
        var input_dia_visita= document.getElementById('dia_visita').value;
        var input_semana_visita= document.getElementById('semana_visita').value;

     
        if (input_dia_visita == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Dia de Visita!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        if (input_semana_visita == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Semana de Visita!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }
    
        $.ajax({
            data: $('#productForm').serialize(),
            url: "/admin-no-pagados",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                

            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Suscripcion Guardada');
            }
        });
    });


    //BORRAR CATEGORIA
    $('body').on('click', '.deleteProduct', function (){
        var suscripto_id = $(this).data("id");

       
            Swal.fire({
            title: 'Esta Seguro?',
            text: "Si elimina la suscripcion borrara toda la informacion referente pero se conserva la informacion del cliente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
            }).then(function (result) {
            if (result.value) {

                    $.ajax({
                        type: "DELETE",
                        url: "/admin-no-pagados"+'/'+suscripto_id,
                        success: function (data) {
                            table.draw();
                            
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'La suscripcion se elimino exitosamente',
                                confirmButtonClass: 'btn btn-success',
                            }
                            )
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })
    
    });


    $('body').on('click', '.ver', function (){
        var suscrip_id = $(this).data('id');
        $('#ver').modal('show');
      
        $.get('/admin-no-pagados' +'/' + suscrip_id , function (data) {
            var datos=data
            const lista2=document.getElementById('lista-ventas')

            const ventasRender = datos.map((dato)=>
                `<tr>
                    <td>${dato.region}</td>
                    <td>${dato.comuna}</td>
                    <td>${dato.telefono}</td>
                    <td>${dato.calle_avenida}</td>
                    <td>${dato.numero}</td>
                    <td>${dato.nrocasa}</td>
                    <td>${dato.referencia}</td>
                </tr>`
            ).join("")

            var numero =datos.map(function(obj){
                var nro=obj.nro_suscripcion
                return nro
            })

            lista2.innerHTML= ventasRender
            document.getElementById("modal-titulo").innerHTML =`#`+numero[0];
          
        })

    });


    $('body').on('click', '.ver-kits', function (){
        var suscrip_id = $(this).data('id');
        $('#ver-kits').modal('show');
      
        $.get('/api/sendKits' +'/' + suscrip_id , function (data) {
            var datos=data
            const lista2=document.getElementById('lista-kits')

            const listaRender = datos.map((dato)=>
                `<tr>
                    <td>${dato.nombre_kit}</td>
                    <td>$${dato.precio}</td>
                </tr>`
            ).join("")

            lista2.innerHTML= listaRender

          
        })

    });

    $('body').on('click', '.mascotas', function (){
        var suscrip_id = $(this).data('id');
        $('#mascotas').modal('show');
      
        $.get('/api/sendMascotas' +'/' + suscrip_id , function (data) {
            var datos=data
            const lista2=document.getElementById('lista-mascotas')

            const listaRender = datos.map((dato)=>
                `<tr>
                    <td>${dato.titulo}</td>
                    <td>${dato.cantidad}</td>
                    <td>${dato.tipo}</td>
                </tr>`
            ).join("")
            
            lista2.innerHTML= listaRender
            
          
        })

    });

    $('body').on('click', '.fechas', function (){
        var suscrip_id = $(this).data('id');

        $.get('/admin-no-pagados' +'/' + suscrip_id , function (data) {
            var paquete=data[0].paquete_id
            var tiempo=data[0].tiempo
            var id_sus=data[0].id
           

            $('#id_suscripcion').val(data[0].id)

            //PLAN 30 y 3 MESES
            if((paquete==2)&&(tiempo==3)){
                document.getElementById("paquetef").innerHTML =
                `<div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 1
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 1
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_1" id="fecha_1" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 2
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 2
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_2" id="fecha_2" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 3
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 3
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_3" id="fecha_3" class="form-control">
                     </div>
                </div>`
            }
            //PLAN 30 Y 6 MESES
            if((paquete==2)&&(tiempo==6)){
                document.getElementById("paquetef").innerHTML =
                `<div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 1
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 1
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_1" id="fecha_1" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 2
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 2
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_2" id="fecha_2" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 3
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 3
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_3" id="fecha_3" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 4
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 4
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_4" id="fecha_4" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 5
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 5
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_5" id="fecha_5" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 6
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 6
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="fecha_6" id="fecha_6" class="form-control">
                     </div>
                </div>`
            }
            //PLAN 30 Y 12 MESES
            if((paquete==2)&&(tiempo==12)){
                document.getElementById("paquetef").innerHTML =
                `<div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 1
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 1
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_1" name="fecha_1" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 2
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 2
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_2" name="fecha_2" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 3
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 3
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_3" name="fecha_3" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 4
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 4
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_4" name="fecha_4" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 5
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 5
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_5" name="fecha_5" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 6
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 6
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_6" name="fecha_6" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 7
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 7
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_7" name="fecha_7" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 8
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 8
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_8" name="fecha_8" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 9
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 9
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_9" name="fecha_9" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 10
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 10
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_10" name="fecha_10" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 11
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 11
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_11" name="fecha_11" class="form-control">
                     </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6 text-center">
                        Fecha 12
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-4">
                            Mes 12
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="fecha_12" name="fecha_12" class="form-control">
                     </div>
                </div>`
            }

            //PLAN 15 Y 3 MESES
            if((paquete==1)&&(tiempo==3)){
                document.getElementById("paquetef").innerHTML =
                `<div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 1
                    </div>
                    <div class="col-sm-5">
                        Fecha 2
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 1
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_1" id="fecha_1" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_2" id="fecha_2" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 3
                    </div>
                    <div class="col-sm-5">
                        Fecha 4
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 2
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_3" id="fecha_3" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_4" id="fecha_4" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 5
                    </div>
                    <div class="col-sm-5">
                        Fecha 6
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 3
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_5" id="fecha_5" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_6" id="fecha_6" class="form-control">
                    </div>
                </div>`
            }
            //PLAN 15 Y 6 MESES
            if((paquete==1)&&(tiempo==6)){
                document.getElementById("paquetef").innerHTML =
                `<div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 1
                    </div>
                    <div class="col-sm-5">
                        Fecha 2
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 1
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_1" id="fecha_1" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_2" id="fecha_2" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 3
                    </div>
                    <div class="col-sm-5">
                        Fecha 4
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 2
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_3" id="fecha_3" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_4" id="fecha_4" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 5
                    </div>
                    <div class="col-sm-5">
                        Fecha 6
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 3
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_5" id="fecha_5" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_6" id="fecha_6" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 7
                    </div>
                    <div class="col-sm-5">
                        Fecha 8
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 4
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_7" id="fecha_7" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_8" id="fecha_8" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 9
                    </div>
                    <div class="col-sm-5">
                        Fecha 10
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 5
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_9" id="fecha_9" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_10" id="fecha_10" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 11
                    </div>
                    <div class="col-sm-5">
                        Fecha 12
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 6
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_11" id="fecha_11" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_12" id="fecha_12" class="form-control">
                    </div>
                </div>`    
            }
            //PLAN 15 Y 12 MESES
            if((paquete==1)&&(tiempo==12)){
                document.getElementById("paquetef").innerHTML =
                `<div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 1
                    </div>
                    <div class="col-sm-5">
                        Fecha 2
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 1
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_1" id="fecha_1" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_2" id="fecha_2" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 3
                    </div>
                    <div class="col-sm-5">
                        Fecha 4
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 2
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_3" id="fecha_3" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_4" id="fecha_4" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 5
                    </div>
                    <div class="col-sm-5">
                        Fecha 6
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 3
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_5" id="fecha_5" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_6" id="fecha_6" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 7
                    </div>
                    <div class="col-sm-5">
                        Fecha 8
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 4
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_7" id="fecha_7" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_8" id="fecha_8" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 9
                    </div>
                    <div class="col-sm-5">
                        Fecha 10
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 5
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_9" id="fecha_9" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_10" id="fecha_10" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 11
                    </div>
                    <div class="col-sm-5">
                        Fecha 12
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 6
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_11" id="fecha_11" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_12" id="fecha_12" class="form-control">
                    </div>
                </div>    

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 13
                    </div>
                    <div class="col-sm-5">
                        Fecha 14
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 7
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_13" id="fecha_13" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_14" id="fecha_14" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 15
                    </div>
                    <div class="col-sm-5">
                        Fecha 16
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 8
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_15" id="fecha_15" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_16" id="fecha_16" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 17
                    </div>
                    <div class="col-sm-5">
                        Fecha 18
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 9
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_17" id="fecha_17" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_18" id="fecha_18" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 19
                    </div>
                    <div class="col-sm-5">
                        Fecha 20
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 10
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_19" id="fecha_19" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_20" id="fecha_20" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 21
                    </div>
                    <div class="col-sm-5">
                        Fecha 22
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 11
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_21" id="fecha_21" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_22" id="fecha_22" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-5">
                        Fecha 23
                    </div>
                    <div class="col-sm-5">
                        Fecha 24
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-2">
                        Mes 12
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_23" id="fecha_23" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="fecha_24" id="fecha_24" class="form-control">
                    </div>
                </div>`        
            }    

            $.get('/api/fechas-admin-suscripciones' +'/' + id_sus , function (data) {
                var fechas =data[0]
                var array=Object.values(fechas)
            
                for(let i=1; i<=array.length-1; i++){

                    if(array[i]!=null){
                        $(`#fecha_${i}`).val($.trim(array[i]));
                        
                    }
                    
                }
            
            })
            
           
        })

       
        

        $('#fechas').modal('show');
        
    });


    $('#savefechas').click(function (e) {
        e.preventDefault();

        $.ajax({
            data: $('#fechasForm').serialize(),
            url: "/api/saveFechas",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#fechasForm').trigger("reset");
                $('#fechas').modal('hide');
                console.log(data)

                Swal.fire({
                        type: "success",
                        title: 'Guardado!',
                        text: 'Las Fechas se guardaron exitosamente',
                        confirmButtonClass: 'btn btn-success',
                })
                
            },
            error: function (data) {
                console.log('Error:', data);
                $('#savefechas').html('Fecha Guardada');
            }
        });

    
    });

});
