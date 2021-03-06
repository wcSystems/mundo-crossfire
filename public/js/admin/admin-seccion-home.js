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
        
            // [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{'color': ["#000000", "var(--global-tercer)", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff", "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff", "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff", "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2", "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466"]}],
            [{'background': ["#000000", "var(--global-tercer)", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff", "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff", "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff", "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2", "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466"]}],
            
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
        ajax: "/admin-seccion-home",
        columns: [
            {data: 'image', name: 'image'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "language":{
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ning??n dato disponible en esta tabla",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "??ltimo",
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
                    "collection": "Colecci??n",
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
                    "add": "A??adir condici??n",
                    "button": {
                        "0": "Constructor de b??squeda",
                        "_": "Constructor de b??squeda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condici??n",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vac??o",
                            "equals": "Igual a",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio"
                        },
                        "moment": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vac??o",
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
                            "notEmpty": "No vac??o"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vac??o",
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
                    "rightTitle": "Criterios de sangr??a",
                    "title": {
                        "0": "Constructor de b??squeda",
                        "_": "Constructor de b??squeda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de b??squeda",
                        "_": "Paneles de b??squeda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de b??squeda",
                    "loadMessage": "Cargando paneles de b??squeda",
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
        $('#modelHeading').html("Crear Seccion");
        $('#ajaxModel').modal('show');
        $('#create_edit').val(0);
        quill.setText('');
    });


    $('body').on('click', '.editProduct', function () {
        var kit_id = $(this).data('id');
        $.get('/admin-seccion-home' +'/' + kit_id +'/edit', function (data) {
            $('#modelHeading').html("Editar Seccion");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#seccion_id').val(data.id);
            $('#link').val(data.link);
            
            //------EDICION PARA EDITOR DE TEXTO
            var htmlToInsert = data.texto;
            var editor = document.getElementsByClassName('ql-editor')
            editor[0].innerHTML = htmlToInsert
           
            //------
            $('#create_edit').val(1);
           
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $('#id_description').val($('#description_editor .ql-editor').html());

        var form_data = new FormData(document.getElementById("productForm"));
    
        var input_descripcion= document.getElementById('id_description').value;
    
        var input_imagen= document.getElementById('img_seccion')
        var imagen=input_imagen.value;
        var extPermitidas = /(.png|.jpeg|.jpg)$/i;

        var create_edit= document.getElementById('create_edit').value;


        if ((input_descripcion == "") || (input_descripcion=='<p><br></p>')) {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Una Descripcion!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

    
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
            url: "/admin-seccion-home",
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


    //BORRAR SECCION
    $('body').on('click', '.deleteProduct', function (){
        var seccion_id = $(this).data("id");

            Swal.fire({
            title: 'Esta Seguro?',
            text: "Si elimina la seccion borrara toda la informacion referente al mismo!",
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
                        url: "/admin-seccion-home"+'/'+seccion_id,
                        success: function (data) {
                            table.draw();
                            $('#botoncrear').show()
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'La Seccion se elimino exitosamente',
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
        var kit_id = $(this).data('id');
      
        $.get('/admin-seccion-home' +'/' + kit_id , function (data) {
            $('#ver').modal('show');
            var imagen=data.img
            var text=data.texto
            var link=data.link
            document.getElementById("seccion").innerHTML =`
            <div align="center">
                <img width="512" height="121" alt="" src="${imagen}">
            </div>
            
                ${text}
            
            <div>
                <b>Link:</b> ${link}
            </div>
            `
            
        })

    });







});
