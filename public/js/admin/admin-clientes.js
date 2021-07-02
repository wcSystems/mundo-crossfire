$(function () {
     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin-clientes",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
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

    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#cliente_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Crear Cliente");
        $('#ajaxModel').modal('show');
        $('#create_edit').val(1);
        $('#cont').show();

    });

     //ACTUALIZAR 
     $('body').on('click', '.editProduct', function () {
        var cliente_id = $(this).data('id');
        $.get('/admin-clientes' +'/' + cliente_id +'/edit', function (data) {
            $('#modelHeading').html("Editar Cliente");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#cliente_id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#create_edit').val(0);
            $('#cont').hide();

        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Actualizando..');
        var input_name= document.getElementById('name').value;
        var input_email= document.getElementById('email').value;
        var input_password= document.getElementById('password').value;
        var create_edit=document.getElementById('create_edit').value
     
        if (input_name == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Nombre y Apellido!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_email == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese un Email!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if(create_edit==1){
            if (input_password == "") {
            
                Swal.fire({
                    type: 'error',
                    text: 'Por Favor Ingrese una Clave!',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                return false;
            }
        }
        
    
        $.ajax({
            data: $('#productForm').serialize(),
            url: "/admin-clientes",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Cliente Guardado');
            }
        });
    });



    //BORRAR CLIENTE
    $('body').on('click', '.deleteProduct', function (){
        var cliente_id = $(this).data("id");

       
            Swal.fire({
            title: 'Esta Seguro?',
            text: "Si elimina el cliente se borraran toda la informacion referente a este cliente!",
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
                        url: "/admin-clientes"+'/'+cliente_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'El Cliente se elimino exitosamente',
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


    //MODAL RECICLAJE
    $('body').on('click', '.reciclaje', function (){
        var user_id = $(this).data('id');
        
        $.get('/admin-clientes' +'/' + user_id +'/edit', function (data) {
            $('#azul').val(data.azul);
            $('#amarillo').val(data.amarillo);
            $('#verde').val(data.verde);
            $('#rojo').val(data.rojo);
            $('#user_id').val(data.id);
            $('#reciclaje').modal('show');

        })

    });

    //MODAL DIRECCION
    $('body').on('click', '.direccion', function (){
        var user_id = $(this).data('id');
        
        $.get('/admin-clientes' +'/' + user_id, function (data) {
          $('#direccion').modal('show');

          if(data!='[]'){
            var datos=data
            const lista2=document.getElementById('lista-ventas')

            const listaRender = datos.map((dato)=>
                `<tr>
                    <td>${dato.region}</td>
                    <td>${dato.comuna}</td>
                    <td>${dato.calle_avenida}</td>
                    <td>${dato.numero}</td>
                </tr>`
            ).join("")
            
            lista2.innerHTML= listaRender

          }  

        })

    });



    $('#reciclajebtn').click(function (e) {
        e.preventDefault();

        $.ajax({
            data: $('#reciclajeForm').serialize(),
            url: '/api/reciclaje/',
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#reciclajeForm').trigger("reset");
                $('#reciclaje').modal('hide');
                table.draw();
                Swal.fire(
                    {
                        type: "success",
                        title: 'Informacion Guardada!',
                        confirmButtonClass: 'btn btn-success',
                    }
                )
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }); 
});
