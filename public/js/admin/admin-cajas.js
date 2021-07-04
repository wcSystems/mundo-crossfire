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


    $('body').on('click', '.add', function () {
        var cajas_id = $(this).data('id');
   
        $.get('/admin-cajas' +'/' + cajas_id +'/edit', function (data) {
            $('#ajaxModel').modal('show');
            $('#modelHeading').html(`Descripcion`);
            $('#saveBtn').val("edit-user");
            $('#cajas_id').val(cajas_id);
            quill.setText('');
            
            //------EDICION PARA EDITOR DE TEXTO
            /*var htmlToInsert = data.contenido;
            if(htmlToInsert===undefined){
                htmlToInsert="No hay Informacion Agregada"
            }
            var editor = document.getElementsByClassName('ql-editor')
            editor[0].innerHTML = htmlToInsert*/
           
            //------
           
        })


        
    });

    $('body').on('click', '.editar', function () {
        var cajas_id = $(this).data('id');

        $.get(`/api/show-info-cajas/${cajas_id}`, function (data) {
            $('#ajaxModel').modal('show');
            $('#modelHeading').html(`Descripcion`);
            $('#saveBtn').val("edit-user");
            $('#cajas_id').val(cajas_id);

            var html=data.contenido[0].contenido


            quill.root.innerHTML = `${html}`;
       
        
        })

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
            url: "/admin-cajas",
            type: "POST",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                Swal.fire({
                        type: "success",
                        title: 'Guardado!',
                        text: data.success,
                        confirmButtonClass: 'btn btn-success',
                })
                location.reload()
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('body').on('click', '.clear', function (){
        var cajas_id = $(this).data("id");

            Swal.fire({
            title: 'Esta Seguro?',
            text: `Desea eliminar la informacion contenida en la caja ${cajas_id}?`,
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
                        url: "/admin-cajas"+'/'+cajas_id,
                        success: function (data) {
                            
                            Swal.fire(
                            {
                                type: "success",
                                title: 'Eliminado!',
                                text: 'La Seccion se elimino exitosamente',
                                confirmButtonClass: 'btn btn-success',
                            }
                            )
                            location.reload()
                           
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })
    
    });


});
