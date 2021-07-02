Dropzone.options.dropzone =
{
    maxFiles: 1,
    renameFile: function(file) {    
        var dt = new Date();
        var time = dt.getTime();
        return time+file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    timeout: 50000,
    autoProcessQueue: false,
    init: function() {
                var submitBtn = document.querySelector("#btnIMG");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    Swal.fire(
                        {
                            type: "success",
                            title: 'Archivo Subido!',
                            confirmButtonClass: 'btn btn-success',
                        })
                });

                this.on("Completo", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("Proceso exitoso",
                    myDropzone.processQueue.bind(myDropzone)
                );
    },
    
    success: function(file, response) 
    {
        this.removeAllFiles();
        $('#ajaxModel').modal('hide');
        table.draw();
        console.log(response);
    },
    error: function(file, response)
    {
        console.log('fallo')
        return false;
    }

};

     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin-marcas",
        columns: [
            {data: 'img_marcas', name: 'img_marcas'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'image', name: 'image'},
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
        $('#marcas_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Crear marcas");
        $('#ajaxModel').modal('show');
        $('#create_edit').val(0);
    });

    //ACTUALIZAR 
    $('body').on('click', '.editProduct', function () {
        var marcas_id = $(this).data('id');
        $.get('/admin-marcas' +'/' + marcas_id +'/edit', function (data) {
            console.log(data)
            $('#modelHeading').html("Editar Marca");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#marcas_id').val(data.id);
            $('#create_edit').val(1);
        })
    });


    $('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Actualizando..');
        var input_marcas= document.getElementById('nombre_marcas').value;
     
        if (input_marcas == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Nombre!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }
    
        $.ajax({
            data: $('#productForm').serialize(),
            url: "/admin-marcas",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('marcas Guardado');
            }
        });
    });


    //BORRAR marcas
    $('body').on('click', '.deleteProduct', function (){
        var marcas_id = $(this).data("id");

       
            Swal.fire({
            title: 'Esta Seguro?',
            text: "Eliminara la imagen!",
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
                        url: "/admin-marcas"+'/'+marcas_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'La Marca se elimino exitosamente',
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


     //MOSTRAR PRODUCTO
     /*$('body').on('click', '.ver', function (){
        var banner_id = $(this).data('id');
      
        $.get('/admin-banner' +'/' + banner_id , function (data) {
            $('#ver').modal('show');
            $('#banner_img').attr('src', data.img_banner);
        })

    });*/