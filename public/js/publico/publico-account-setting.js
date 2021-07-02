$(function () {

    $('#btnPassword').click(function (e) {
        e.preventDefault();
        var input_email= document.getElementById('username').value;
        var input_password= document.getElementById('password').value;

        if (input_email == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese su Email!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_password == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese su Clave!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        $.ajax({
            data: $('#formPassword').serialize(),
            url: '/api/updatePassword',
            type: "POST",
            dataType: 'json',
            success: function (data) {
                console.log(data)
                Swal.fire(
                    {
                        type: "success",
                        title: 'Informacion Actualizada!',
                        confirmButtonClass: 'btn btn-success',
                    }
                )
                window.location.href = '/';

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    
    });



    $('#btnPersonal').click(function (e) {
        e.preventDefault();

        var input_name= document.getElementById('name').value;
        var input_fecha_nacimiento= document.getElementById('fecha_nacimiento').value;
        var input_region= document.getElementById('region').value;
        var input_comuna=document.getElementById('comuna').value
        var input_calle=document.getElementById('calle_avenida').value
        var input_numero=document.getElementById('numero').value
     
        if (input_name == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese Nombre y Apellido!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_fecha_nacimiento == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese su Fecha de Nacimiento!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        if (input_region == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese una Region!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        if (input_comuna == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese una Comuna!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }

        if (input_calle == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese una Calle o Avenida!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        if (input_numero == "") {
            
            Swal.fire({
                type: 'error',
                text: 'Por Favor Ingrese un Numero!',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
        }


        $.ajax({
            data: $('#formPersonal').serialize(),
            url: '/api/updateInfoUser',
            type: "POST",
            dataType: 'json',
            success: function (data) {
                console.log(data)
                Swal.fire(
                    {
                        type: "success",
                        title: 'Informacion Actualizada!',
                        confirmButtonClass: 'btn btn-success',
                    }
                )
                window.location.href = '/';

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
