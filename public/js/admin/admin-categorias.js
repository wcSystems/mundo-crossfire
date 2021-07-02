$(function () {

    
    $.get('/api/list-categorias' , function (repos) {

        var list= repos.categoria
        list.sort()

        $.each(list,function(key,value){
            $("#categoriax1").append('<option value="'+value.id+'">'+value.nombre_categoria+'</option>');
        });

    })



     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/categorias",
        columns: [
            {data: 'nombre_categoria', name: 'nombre_categoria'},
            {data: 'nombre_subcategoria', name: 'nombre_subcategoria'},
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
        $('#categoria_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Crear Categoria");
        $('#ajaxModel').modal('show');
    });

    //ACTUALIZAR 
    $('body').on('click', '.editProduct', function () {
        var categoria_id = $(this).data('id');
        $.get('/categorias' +'/' + categoria_id +'/edit', function (data) {
            $('#modelHeading').html("Editar Categoria");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#categoria_id').val(data.id);
            $('#nombre_categoria').val(data.nombre_categoria);
        })
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Actualizando..');
        var input_categoria= document.getElementById('nombre_categoria').value;
     
        if (input_categoria == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Categoria!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }
    
        $.ajax({
            data: $('#productForm').serialize(),
            url: "/categorias",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();

                $('#categoriax1').empty();
                $.get('/api/list-categorias' , function (repos) {

                    var list= repos.categoria
                    list.sort()
            
                    $.each(list,function(key,value){
                        $("#categoriax1").append('<option value="'+value.id+'">'+value.nombre_categoria+'</option>');
                    });
            
                })
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Categoria Guardada');
            }
        });
    });


    //BORRAR CATEGORIA
    $('body').on('click', '.deleteProduct', function (){
        var categoria_id = $(this).data("id");

       
            Swal.fire({
            title: 'Esta Seguro?',
            text: "Si elimina la categoria se borraran los productos relacionados a esta categoria!",
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
                        url: "/categorias"+'/'+categoria_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire({
                                type: "success",
                                title: 'Eliminado!',
                                text: 'La categoria se elimino exitosamente',
                                confirmButtonClass: 'btn btn-success',
                            })
                            
                            $('#categoriax1').empty();
                            $.get('/api/list-categorias' , function (repos) {

                                var list= repos.categoria
                                list.sort()
                        
                                $.each(list,function(key,value){
                                    $("#categoriax1").append('<option value="'+value.id+'">'+value.nombre_categoria+'</option>');
                                });
                        
                            })
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })
    
    });

    /*-----------------------SUB CATEGORIA--------------------------*/
    $('#createNewProduct2').click(function () {
        $('#modelHeading2').html("Crear Sub-Categoria");
        $('#productForm2').trigger("reset");
        $('#ajaxModel2').modal('show');
    });


    $('#saveBtn2').click(function (e) {
        e.preventDefault();
        //$(this).html('Actualizando..');
        var input_categoria= document.getElementById('categoriax1').value;
     
        if (input_categoria == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Categoria!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }
    
        $.ajax({
            data: $('#productForm2').serialize(),
            url: "/admin-subcategorias",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm2').trigger("reset");
                $('#ajaxModel2').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('#createNewProduct2').click(function () {
        $('#modelHeading2').html("Crear Sub-Categoria");
        $('#productForm2').trigger("reset");
        $('#ajaxModel2').modal('show');
    });

    $('body').on('click', '.subcatex', function () {
        var categoria_id = $(this).data("id");
        $("#subcatego2z").empty()

        $.get(`/admin-subcategorias/${categoria_id}`, function (data) {

     
            data.forEach(function (element) {
                $("#subcatego2z").append(`<li class="list-group-item" data-id="${element.id}">
                                                <form id="productFormSub${element.id}" name="productFormSub${element.id}" class="form-horizontal">
                                                    <input type="text" class="form-control" value="${element.nombre_subcategoria}" disabled id="inputsubca${element.id}" name="nombre_subcategoria" />
                                                    <input type="hidden" value="${element.id}" name="valor_subca" />
                    
                                                    <a data-id="${element.id}" class="btn btn-danger btn-sm pull-right remove-item EliminarSubCategoria" style="color:white">
                                                        <span>x</span>
                                                    </a>
                                                    <a data-id="${element.id}" class="btn btn-success btn-sm pull-right EditarSubCategoria" style="color:white" id="subcateedit${element.id}">
                                                        <span>Editar</span>
                                                    </a>
                                                    <button data-id="${element.id}" class="btn btn-info btn-sm pull-right subcate-submit" style="color:white" id="subcaSave${element.id}">
                                                        <span>Guardar</span>
                                                    </button>
                                                </form>
                                          </li>`)

                $(`#subcaSave${element.id}`).hide()
            });

        })

        $('#SubCategoriasModel').modal('show');
    });



    $('body').on('click', '.EditarSubCategoria', function () {
        var subcategoria_id = $(this).data('id');
        $(`#inputsubca${subcategoria_id}`).prop( "disabled", false );
        $(`#subcaSave${subcategoria_id}`).show()
        $(`#subcateedit${subcategoria_id}`).hide()
    });

    $('body').on('click', '.subcate-submit', function (e) {
        e.preventDefault();
        var subcategoria_id = $(this).data('id');
        var input_categoria= document.getElementById(`inputsubca${subcategoria_id}`).value;
       
     
        if (input_categoria == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Sub-Categoria!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        $.ajax({
            data: $(`#productFormSub${subcategoria_id}`).serialize(),
            url: "/admin-subcategorias",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $(`#inputsubca${subcategoria_id}`).prop( "disabled", true );
                $(`#subcaSave${subcategoria_id}`).hide()
                $(`#subcateedit${subcategoria_id}`).show()
                table.draw()
                console.log(data)
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

        
    })


    $('body').on('click', '.EliminarSubCategoria', function (){
        var categoria_id = $(this).data("id");

        Swal.fire({
            title: 'Esta Seguro?',
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
                        url: "/admin-subcategorias"+'/'+categoria_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire({
                                type: "success",
                                title: 'Eliminado!',
                                text: 'La Sub-Categoria se elimino exitosamente',
                                confirmButtonClass: 'btn btn-success',
                            })
                            $('#SubCategoriasModel').modal('hide');
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })


    })



    

});
