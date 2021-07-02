$(function () {
     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin-carga",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'azul', name: 'azul', orderable: false, searchable: false},
            {data: 'verde', name: 'verde', orderable: false, searchable: false},
            {data: 'amarillo', name: 'amarillo', orderable: false, searchable: false},
            {data: 'rojo', name: 'rojo', orderable: false, searchable: false},
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


    $('body').on('change', '.azul', function (){
        var azul_id = $(this).data("id");
        var valor=document.getElementById('azul'+azul_id).value;
        
        $.ajax({
            data: {
                valor:valor,
                azul_id:azul_id
            },
            url: "/admin-carga",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                table.draw();
                Swal.fire({
                        type: "success",
                        title: 'Actualizado!',
                        confirmButtonClass: 'btn btn-success',
                })
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Guardado');
            }
        });

    });

    $('body').on('change', '.verde', function (){
        var verde_id = $(this).data("id");
        var valor=document.getElementById('verde'+verde_id).value;
        
        $.ajax({
            data: {
                valor:valor,
                verde_id:verde_id
            },
            url: "/admin-carga",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                table.draw();
                Swal.fire({
                        type: "success",
                        title: 'Actualizado!',
                        confirmButtonClass: 'btn btn-success',
                })
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Guardada');
            }
        });

    });


    $('body').on('change', '.amarillo', function (){
        var amarillo_id = $(this).data("id");
        var valor=document.getElementById('amarillo'+amarillo_id).value;
        
        $.ajax({
            data: {
                valor:valor,
                amarillo_id:amarillo_id
            },
            url: "/admin-carga",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                table.draw();
                Swal.fire({
                        type: "success",
                        title: 'Actualizado!',
                        confirmButtonClass: 'btn btn-success',
                })
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Guardada');
            }
        });

    });

    $('body').on('change', '.rojo', function (){
        var rojo_id = $(this).data("id");
        var valor=document.getElementById('rojo'+rojo_id).value;
        
        $.ajax({
            data: {
                valor:valor,
                rojo_id:rojo_id
            },
            url: "/admin-carga",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                table.draw();
                Swal.fire({
                        type: "success",
                        title: 'Actualizado!',
                        confirmButtonClass: 'btn btn-success',
                })
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Guardada');
            }
        });

    });


});
