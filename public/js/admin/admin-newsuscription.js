$(function () {
    $('#MASCO').hide()
    $( "#nperro" ).prop( "disabled", true );
    $( "#ngato" ).prop( "disabled", true );
    $( "#notro" ).prop( "disabled", true );
    $( "#tipo-masco" ).prop( "disabled", true );
    $('#inputUser').hide()
    $(".semanasx1").prop("disabled", true);

    

    $.get('/admin-new-suscripcion/create' , function (data) {
        
        var planes =data.planes
        var usuarios=data.usuarios
        var extension=data.extensiones

        $.each(planes,function(key,value){
            $("#plan").append('<option value="'+value.id+'">'+value.nombre_paquete+'</option>');
        });
    
        $.each(usuarios,function(key,value){
            $("#user").append('<option value="'+value.id+'">'+value.name+'   '+value.email+'</option>');
        });

        $.each(extension,function(key,value){
            $("#extensiones").append(`<li class="d-inline-block mr-2">
                                        <fieldset>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input extensiones" name="extensiones[]" value="${value.id}" id="customChecke${value.id}">
                                                <label class="custom-control-label" for="customChecke${value.id}">${value.nombre_kit}</label>
                                            </div>
                                        </fieldset>
                                      </li>`)
        }); 
    })


    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#mascota-si').click(function () {
        $('#MASCO').show()
    });

    $('#mascota-no').click(function () {
        $('#MASCO').hide()
    });

    //isSending = false;

    $('#crearbtn').click(function (e) {
        e.preventDefault();

        //if (!isSending) {


        var checkboxes= document.querySelectorAll('.semanas input[type="checkbox"]:checked');
        var plan=$('#plan').val()


        var user= document.getElementById('user').value;
        var tiempo= document.getElementById('tiempo').value;
        var telefono= document.getElementById('telefono').value;
        var comuna= document.getElementById('comuna').value;
        var calle= document.getElementById('calle').value;
        var numero= document.getElementById('numero').value;
        var dia_visita= document.getElementById('dia_visita').value;
        var email= document.getElementById('email').value;
        var names= document.getElementById('names').value;
        var valida =document.getElementById('identifica').value;



        var checkbox_mascotas= document.querySelectorAll('#MASCO input[type="checkbox"]:checked');

        if(((plan==1) && (checkboxes.length)!=2)){

            Swal.fire({
                type: 'error',
                text: 'Debe Seleccionar 2 Semanas',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
            
        }

        if(((plan==2) && (checkboxes.length)!=1)){

            Swal.fire({
                type: 'error',
                text: 'Debe Seleccionar 1 Semana',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            return false;
            
        }

        if ($(`#mascota-si`).is(':checked') == true){

            if(checkbox_mascotas.length==0){

                Swal.fire({
                    type: 'error',
                    text: 'Por Favor Ingrese alguna Mascota',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                return false;

            }

            $.each($("input[name='tmascotas[]']:checked"), function(){   
                
                var idcheck=$(this).attr("id")
                
                if((idcheck=='customCheckg') && ($('#ngato').val()=='')){
                    
                    Swal.fire({
                        type: 'error',
                        text: 'Por Favor Verifique la Informacion en las mascotas',
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                    return false;
                

                }

                if((idcheck=='customCheckp') && ($('#nperro').val()=='')){
                    
                    Swal.fire({
                        type: 'error',
                        text: 'Por Favor Verifique la Informacion en las mascotas',
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                    return false;
                
                }


                if((idcheck=='customChecko') && ($('#notro').val()=='')){
                    
                    Swal.fire({
                        type: 'error',
                        text: 'Por Favor Verifique la Informacion en las mascotas',
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                    return false;
                
                }

                if(idcheck.substring(12,13)!=''){

                    if((idcheck==`customChecko${idcheck.substring(12,13)}`) && ($(`#notro${idcheck.substring(12,13)}`).val()=='')){
                    
                        Swal.fire({
                            type: 'error',
                            text: 'Por Favor Verifique la Informacion en las mascotas',
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                        return false;
                    
                    }


                }

               
            });

             
        }


        if(valida==1){
        
            if((user=="") || (tiempo=="") || (telefono=="") || (comuna=="") || (calle=="") || (numero=="") || (dia_visita=="") || (checkboxes.length==0)){

                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos requeridos',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                return false;

            }
        }else{

            if((email=="") ||(names=="") || (tiempo=="") || (telefono=="") || (comuna=="") || (calle=="") || (numero=="") || (dia_visita=="") || (checkboxes.length==0)){

                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos requeridosx',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                return false;

            }


        }

        $("crearbtn").prop("disabled", true);


        $.ajax({
            data: $('#productForm').serialize(),
            url: "/admin-new-suscripcion",
            type: "POST",
            dataType: 'json',
            success: function (data) {
            
                if(data.success=='Este usuario ya esta registrado!'){

                    Swal.fire({
                        type: "error",
                        title: 'Error!',
                        text: 'Este usuario ya esta registrado!',
                        confirmButtonClass: 'btn btn-danger',
                    })
                    console.log(data)

                }else{

                    $('#productForm').trigger("reset");
                    $('#MASCO').hide()
                    $('.xotros').remove()

                    Swal.fire({
                        type: "success",
                        title: 'Cargado!',
                        text: 'La informacion se cargo exitosamente',
                        confirmButtonClass: 'btn btn-success',
                    })
                    console.log(data)

                    $("crearbtn").prop("disabled", false);
                    $( "#nperro" ).prop( "disabled", true );
                    $( "#ngato" ).prop( "disabled", true );
                    $( "#notro" ).prop( "disabled", true );
                    $( "#tipo-masco" ).prop( "disabled", true );
                    $('#inputUser').hide()

                }
                
                
                
            },
            error: function (data) {
                console.log('Error:', data);
                $("crearbtn").prop("disabled", false);

                Swal.fire({
                    type: 'error',
                    text: 'Error al Cargar la Informacion',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                
            }
        });

        /*isSending = true;
    
        } else {

            Swal.fire({
                type: 'info',
                text: 'La informacion se esta cargando...',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })

            
            return false;
        }*/
        
    });
    

});





function habilitar(tipo,mascota){

    var nu =mascota.substring(5,6)

    if ($(`#${tipo}`).is(':checked') == true){

        if(nu !='notro'){
            $( `#tipo-masco-${nu}` ).prop( "disabled", false );
            
        }


        if(mascota=='notro'){
            $( `#tipo-masco` ).prop( "disabled", false );
            
        }

        $( `#${mascota}` ).prop( "disabled", false );

    } else {

        if(nu !='notro'){
            $( `#tipo-masco-${nu}` ).prop( "disabled", true );
            $( `#tipo-masco-${nu}` ).val('')

        }


        if(mascota=='notro'){
            $( `#tipo-masco` ).prop( "disabled", true );
            $( `#tipo-masco` ).val('')

        }


        $( `#${mascota}` ).prop( "disabled", true );
        $( `#${mascota}` ).val('')

    }

}

var clicks=0

function mostrar(){

    clicks += 1;


    let html= `
    <ul class="list-unstyled mb-0 xotros ">
    <li class="d-inline-block mr-2" style="margin-left: 1mm">
        <fieldset>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input otx" name="tmascotas[]" value="Otro" id="customChecko${clicks}" onchange="habilitar('customChecko${clicks}','notro${clicks}')">
                <label class="custom-control-label" for="customChecko${clicks}">Otro </label>
            </div>
        </fieldset>
    </li>
    <li class="d-inline-block mr-2 mb-1" style="margin-left: 1mm">
        <input class="form-control" type="number" placeholder="Cantidad" name="nmascotas[]" id="notro${clicks}">
        <div>
            <label style="float:right; position: relative;"></label>
            <input class="form-control" type="text" placeholder="Tipo" name="tipodemascotas[]" id="tipo-masco-${clicks}">
        </div>
    </li>
    </ul>`

    $('#otros-group').append(html)

    
    $( `#notro${clicks}` ).prop( "disabled", true );
    $( `#tipo-masco-${clicks}` ).prop( "disabled", true );
    


}


var click=0
function seeUser(){
    click += 1;
    $('#inputUser').toggle()
    $('#user').val('')
    $('#user').prop( "disabled", false );
    $('.inputs-usuarios').val('')

    if(click % 2 == 0) {
        $('#identifica').val(1)
    }
    else {
        $('#identifica').val(0)
    }
    

}

function Ina(){
    $('#user').prop( "disabled", true );
}

function validateEmail(valor){
   
    re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
    
	if(!re.exec(valor)){
		Swal.fire({
            type: 'info',
            text: 'Por Favor Ingrese un Correo Correctamente',
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        })
	}
  
}

function habilite(val){

    if(val==""){
        $(".semanasx1").prop("disabled", true);

    }else{
        $(".semanasx1").prop("disabled", false);

    }
    
}


