$(function () {

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.get('/admin-envio' +'/' + 1 , function (data) {
       $('#precio').val(data.precio_despacho);
       $('#monto').val(data.monto);
    })

    $('#envioBtn').click(function (e) {
        e.preventDefault();


        var input_categoria= document.getElementById('precio').value;
        var input_monto= document.getElementById('monto').value;

     
        if (input_categoria == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Precio!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_monto == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Un Monto!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        $.ajax({
            data: $('#productForm').serialize(),
            url: "/admin-envio",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                Swal.fire(
                    {
                        type: "success",
                        title: 'Guardado!',
                        confirmButtonClass: 'btn btn-success',
                    }
                )

            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Categoria Guardada');
            }
        });
    

    });
    

});
