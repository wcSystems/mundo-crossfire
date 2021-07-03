function dataTable(){
    let table = $('#basic-datatable').DataTable({
        searching: true,
        responsive: true,
        processing: true,
        serverSide: true,
        lengthChange: true,
        columns: [
            {data: 'titulo', name: 'titulo'},
            {data: 'cantidad', name: 'cantidad'},
            {data: 'precio_no_afiliados', name: 'precio_no_afiliados'},
            { 
                render: function ( data,type, row  ) {
                    let  row_item = (row.visible === 1) ? 'Si' : 'No'
                    return row_item
                }
            },
            { 
                render: function ( data,type, row  ) {
                    return `
                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="${row.id}" class="ver btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="${row.id}" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="fa fa-pencil-square"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="${row.id}" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-times"></i></a>
                    `;
                }
            },
        ],
        ajax: {
            "url": "/productos",
            "data": function (d) {[ 
                console.log('search',d)
            ]},
        },
        columnDefs: [
            { 
                orderable: false, 
                targets: 1 
            }
        ],
        language:{
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
    }).on( 'processing.dt', function ( e, settings, processing ) {
        if(processing){ }else{ }
    });
}
$(document).ready(function() {
    dataTable()
    /* REVISAR */
    $("#submitImg").hide();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#producto_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Crear Producto");
        $('#ajaxModel').modal('show');
        $('#create_edit').val(0);
        $('#create_edit2').val(0);

    });
    $('body').on('click', '.editProduct', function () {
        var producto_id = $(this).data('id');

        $('input[name="categoria[]"]').each(function() { 
            this.checked = false; 
        });

        $("#subcategory").empty()

        $.get('/productos' +'/' + producto_id +'/edit', function (data) {
            console.log(data)
            $('#modelHeading').html("Editar Producto");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#producto_id').val(data.id);
            $('#titulo').val(data.titulo);
            $('#descripcion').val(data.descripcion);
            $('#categoria').val(data.categoria_id);
            $('#cantidad').val(data.cantidad);
            $('#precio_no_afiliados').val(data.precio_no_afiliados);
            $('#precio_afiliados').val(data.precio_afiliados);
            $('#precio_promocion').val(data.precio_promocion);
            $('#indicador_promocion').val(data.indicador_promocion);
            $('#create_edit').val(1);
            $('#valor_producto').val(data.id);
            $('#destacado').val(data.destacado);
            $('#visible').val(data.visible);
            $('#ordenados').val(data.ordenados);
            $('#precio_envio').val(data.precio_envio);
            $('#create_edit2').val(1);

            //CATEGORIAS
            $.get(`api/enviarSubcategory/${data.id}`, function (data) {
                $.each(data.cate,function(key,value){
                    $(`#custom${value.categoria_id}`).click()
                });

                var input_categoria=$('input[name="categoria[]"]:checked').length;

                if (input_categoria == 0) {
                    $.each(data.cate,function(key,value){
                        $(`#custom${value.categoria_id}`).click()
                    });
                }
            })
        })

        //SUBCATEGORIAS
        setTimeout(function () {

                $.ajax({
                    url: `api/enviarSubcategory/${producto_id}`,
                    type:'GET',
                    error: function(err){
                        console.log('Error:', err);
                    },
                    success: function(data){
                        $.each(data.subcat,function(key,value){
                            $(`#customCheckesub${value.subcategoria_id}`).attr('checked', true);
                            
                        });
                    }
                }); 
        }, 2000);
        

    });
    $('#imagen').change(function(){
        var fp = $("#imagen");
        var lg = fp[0].files.length; // get length
        var items = fp[0].files;
        var fileSize = 0;
        
        if (lg > 0) {
            for (var i = 0; i < lg; i++) {
                fileSize = fileSize+items[i].size; // get file size
            }
            if(fileSize > 2097152) {
                Swal.fire({
                    type: 'error',
                    text: 'Por Favor Ingrese un archivos menores a 2MB',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                $('#imagen').val('');
            }
        }
    });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Actualizando..');
        var input_titulo= document.getElementById('titulo').value;
        var input_descripcion= document.getElementById('descripcion').value;
        var input_cantidad= document.getElementById('cantidad').value;
        var input_categoria=$('input[name="categoria[]"]:checked').length;
        var input_precio_no_afiliados= document.getElementById('precio_no_afiliados').value;
        var input_precio_afiliados= document.getElementById('precio_afiliados').value;


        var input_imagen= document.getElementById('imagen')
        var imagen=input_imagen.value;
        var extPermitidas = /(.png|.jpeg|.jpg)$/i;

        if(imagen!=''){

            if(!extPermitidas.exec(imagen)){

                Swal.fire({
                    type: 'error',
                    text: 'Solo se Permite Archivos con Extension .png / .jpeg / .jpg',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                
                input_imagen.value= '';
                return false;
            }     

        }
        
        
        if (input_titulo == "") { 
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Titulo!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_categoria == 0) { 
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese una Categoria!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_descripcion == "") { 
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Descripcion!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_cantidad == "") { 
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Cantidad!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_precio_no_afiliados == "") { 
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Precio no asociados!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_precio_afiliados == "") { 
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Precio para socios!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        

        $.ajax({
            data: $('#productForm').serialize(),
            url: "/productos",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $("#submitImg").trigger("click");
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                console.log(data)
                
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Producto Guardado');
            }
        });

            
            
    });
    $('body').on('click', '.deleteProduct', function (){
        var producto_id = $(this).data("id");
            Swal.fire({
            title: 'Esta Seguro?',
            text: "Si elimina el producto perdera toda la informacion referente al mismo!",
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
                        url: "/productos"+'/'+producto_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'El producto se elimino exitosamente',
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
        var producto_id = $(this).data('id');
        
        $.get('/productos' +'/' + producto_id , function (data) {
            $('#ver').modal('show');
            document.getElementById("modal-titulo").innerHTML =data.producto.titulo
            document.getElementById("modal-categoria").innerHTML =data.categoria
            document.getElementById("modal-cantidad").innerHTML =data.producto.cantidad
            document.getElementById("modal-precio-no-afiliados").innerHTML =data.producto.precio_no_afiliados
            document.getElementById("modal-precio-afiliados").innerHTML =data.producto.precio_afiliados
            document.getElementById("modal-precio-promocion").innerHTML =data.producto.precio_promocion
            document.getElementById("modal-promocion").innerHTML =data.producto.promo
            document.getElementById("modal-descripcion").innerHTML =data.producto.descripcion

        })

    });
    $('body').on('click', '#clearButton', function (){
        var input_imagen= document.getElementById('imagen')
        input_imagen.value= '';
    });
    $('body').on('change', '#ordenados', function (){

        var order=document.getElementById('ordenados').value;
        $.ajax({
            data: order,
            url: "/api/validateOrder",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                if(data!='Ok'){
                    order.value= '';

                    Swal.fire({
                        type: 'error',
                        text: data,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })

                    return false;
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('change', '#categoria', function (){
        var categoria=document.getElementById('categoria').value;
        $.ajax({
            url: `/admin-subcategorias/${categoria}`,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                
                $("#subcategory").empty()


                $.each(data,function(key,value){
                    $("#subcategory").append(`<li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input subcategoria" name="subcategoria[]" value="${value.id}" id="customCheckesub${value.id}">
                                                        <label class="custom-control-label" for="customCheckesub${value.id}">${value.nombre_subcategoria}</label>
                                                    </div>
                                                </fieldset>
                                                </li>`)
                }); 

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });


    })
})
function MostrarSub(valor){

    if ($(`#custom${valor}`).is(':checked') == true){

        $.ajax({
            url: `/admin-subcategorias/${valor}`,
            type: "GET",
            dataType: 'json',
            success: function (data) {

                $.each(data,function(key,value){
                    $("#subcategory").append(`<div class="sub${valor}"><li class="d-inline-block mr-2 ">
                                                <fieldset>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input subcategoria" name="subcategoria[]" value="${value.id}" id="customCheckesub${value.id}">
                                                        <label class="custom-control-label" for="customCheckesub${value.id}">${value.nombre_subcategoria}</label>
                                                    </div>
                                                </fieldset>
                                            </li></div>`)
                }); 

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    }else{
        $(`.sub${valor}`).empty()
    }
}




    
