$(function () {

    /*///PARA LISTAR LOS PAQUETES
    fetch('/api/list-paquete')
    .then(response => response.json())
    .then(repos => {
        var list= repos.paquete
        list.sort()

        $.each(list,function(key,value){
            $("#paquete_id").append('<option value="'+value.id+'">'+value.nombre_paquete+'</option>');
        });

    })
    .catch(err => console.log(err))*/

   var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }]
    ]

    var quill = new Quill('#description_editor', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
    })
     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin-kits",
        columns: [
            {data: 'nombre_kit', name: 'nombre_kit'},
            {data: 'precio', name: 'precio'},
            {data: 'descripcion', name: 'descripcion'},
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
        $('#kit_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Crear Kit");
        $('#ajaxModel').modal('show');
        $('#create_edit').val(0);
        quill.setText('');
       
    });


    //ACTUALIZAR 
    $('body').on('click', '.editProduct', function () {
        var kit_id = $(this).data('id');
        $.get('/admin-kits' +'/' + kit_id +'/edit', function (data) {
            $('#modelHeading').html("Editar Kit");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#kit_id').val(data.id);
            $('#nombre_kit').val(data.nombre_kit);
            
            //------EDICION PARA EDITOR DE TEXTO
            var htmlToInsert = data.descripcion_kit;
            var editor = document.getElementsByClassName('ql-editor')
            editor[0].innerHTML = htmlToInsert
           
            //------
            $('#precio').val(data.precio);
            //$('#precio_suscripcion').val(data.precio_suscripcion);
            $('#create_edit').val(1);
           
        })
    });


    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $('#id_description').val($('#description_editor .ql-editor').html());

        var form_data = new FormData(document.getElementById("productForm"));
        
        //$(this).html('Actualizando..');
        var input_nombre= document.getElementById('nombre_kit').value;
        var input_descripcion= document.getElementById('id_description').value;
        var input_precio= document.getElementById('precio').value;
       // var input_suscripcion= document.getElementById('precio_suscripcion').value;
        
        var input_imagen= document.getElementById('img_kit')
        var imagen=input_imagen.value;
        var extPermitidas = /(.png|.jpeg|.jpg)$/i;

        var create_edit= document.getElementById('create_edit').value;

        if (input_nombre == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Nombre!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if ((input_descripcion == "") || (input_descripcion=='<p><br></p>')) {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Descripcion!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_precio == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Precio!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        /**if (input_suscripcion == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Precio de Suscripcion!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }*/


        if(create_edit==1){
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
        }

        if(create_edit==0){

            if(imagen==''){

                Swal.fire({
                    type: 'error',
                    text: 'Por Favor Ingrese Un Archivo!',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                return false;
            }
            else{
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
        }
        

        $.ajax({
            data: form_data,
            url: "/admin-kits",
            type: "POST",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                console.log(data)
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Kit Guardado');
            }
        });
    });

    //BORRAR KIT
    $('body').on('click', '.deleteProduct', function (){
        var kit_id = $(this).data("id");

       
            Swal.fire({
            title: 'Esta Seguro?',
            text: "Si elimina el kit borrara toda la informacion referente al mismo!",
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
                        url: "/admin-kits"+'/'+kit_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'El Kit se elimino exitosamente',
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

     //MOSTRAR DESCRIPCION
    $('body').on('click', '.ver', function (){
        var kit_id = $(this).data('id');
      
        $.get('/admin-kits' +'/' + kit_id , function (data) {
            $('#ver').modal('show');
            document.getElementById("modal-titulo").innerHTML =data.nombre_kit
            document.getElementById("modal-descripcion").innerHTML =data.descripcion_kit
        })

    });


});
