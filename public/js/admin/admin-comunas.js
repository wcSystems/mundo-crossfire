$(function () {

    // Add a 'custom-color' option to the the color tool
       

    var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons

            ['blockquote','code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values

            [{ 'list': 'ordered'}, { 'list': 'bullet' }],

            ['link'],
            
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        
            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [ 'link', 'image', ], 
        
            // [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{'color': ["#000000", "#51b6b2", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff", "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff", "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff", "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2", "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466"]}],
            [{'background': ["#000000", "#51b6b2", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff", "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff", "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff", "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2", "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466"]}],
            
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
        ajax: "/admin-comunas",
        columns: [
            {data: 'updated_at', name: 'updated_at'},
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
        $('#modelHeading').html("Agregar Texto");
        $('#ajaxModel').modal('show');
        //$('#create_edit').val(0);
        quill.setText('');
    });


    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $('#id_description').val($('#description_editor .ql-editor').html());

        var form_data = new FormData(document.getElementById("productForm"));
        var input_descripcion= document.getElementById('id_description').value;
    
      

        if ((input_descripcion == "") || (input_descripcion=='<p><br></p>')) {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Descripcion!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        $.ajax({
            data: form_data,
            url: "/admin-comunas",
            type: "POST",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                $('#botoncrear').hide()
                console.log(data)
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Seccion Guardado');
            }
        });
    });

    $('body').on('click', '.editProduct', function () {
        var comunas_id = $(this).data('id');
        $.get('/admin-comunas' +'/' + comunas_id +'/edit', function (data) {
            $('#modelHeading').html("Editar Texto");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#comunas_id').val(data.id);
            
            //------EDICION PARA EDITOR DE TEXTO
            var htmlToInsert = data.comunas;
            var editor = document.getElementsByClassName('ql-editor')
            editor[0].innerHTML = htmlToInsert
           
            //------
           
        })
    });

    //BORRAR SECCION
    $('body').on('click', '.deleteProduct', function (){
        var comunas_id = $(this).data("id");

            Swal.fire({
            title: 'Esta Seguro?',
            text: "Desea eliminar la informacion mostrada acerca de las comunas?",
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
                        url: "/admin-comunas"+'/'+comunas_id,
                        success: function (data) {
                            table.draw();
                            
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'La Seccion se elimino exitosamente',
                                confirmButtonClass: 'btn btn-success',
                            }
                            )
                            $('#botoncrear').show()
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })
    
    });


    $('body').on('click', '.ver', function (){
        var comunas_id = $(this).data('id');
      
        $.get('/admin-comunas' +'/' + comunas_id , function (data) {
            $('#ver').modal('show');
           
            var text=data.comunas

            document.getElementById("seccion").innerHTML =`
            <div>
                ${text} 
            </div>
            `
            
        })

    });

  







});
