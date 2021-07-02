@extends('Admin.layouts.template')

    @section('title', 'Nueva Suscripcion')

    @section('styles')
    <!-- Para incluir estilo css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">

    <style>
        .astericos{
            font-size: 15px;
            font-weight: bold;
            color: #D94F4F;
        }

    </style>
    
    @endsection
    <!-- Fin Head -->

    <!-- Inicio Body -->
    @section('body')
        @include('Admin.layouts.barra-top')
        @include('Admin.layouts.barra-lateral')
        <!--- ACA VA EL CONTENIDO -->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Nueva Suscripcion</h2>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-body">
                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Ingrese Informacion</h5>
                                        <div class="text-right">
                                            <button class="btn btn-primary" onclick="seeUser()">Agregar Usuario</button>
                                            <input type="hidden" id="identifica" value="1">
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row" id="inputUser">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-icon">Nombres y Apellidos <i class="astericos">*</i></label>
                                                                <input type="text" id="names" class="form-control inputs-usuarios" name="name" placeholder="" onchange="Ina()">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-icon">E-Mail <i class="astericos">*</i></label>
                                                                <input type="email" id="email" class="form-control inputs-usuarios" name="email" placeholder="" onchange="validateEmail(this.value)">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-icon">Usuario <i class="astericos">*</i></label>
                                                                <select class="form-control mb-1" id="user" name="user" value="" required >
                                                                    <option value="">Seleccione Usuario</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Plan <i class="astericos">*</i></label>
                                                                <select class="form-control mb-1" id="plan" name="plan" value="" required onchange="habilite(this.value)">
                                                                    <option value="">Seleccione Plan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="city-column">Plazo Meses <i class="astericos">*</i></label>
                                                                <select class="form-control mb-1" id="tiempo" name="tiempo" value="" required>
                                                                    <option value="">Seleccione Meses</option>
                                                                    <option value="3">3 Meses</option>
                                                                    <option value="6">6 Meses</option>
                                                                    <option value="12">12 Meses</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="country-floating">Extensiones</label>

                                                                <ul class="list-unstyled mb-0" id="extensiones">
                                                                </ul>   
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="company-column">Telefono <i class="astericos">*</i></label>
                                                                <input type="number" id="telefono" class="form-control" name="telefono" placeholder="Numero de Telefono" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">Region</label>
                                                                <input type="text" id="region" class="form-control" name="region" placeholder="Region" value="Region Metropolitana" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">Comuna <i class="astericos">*</i></label>
                                                                <select class="form-control mb-1" id="comuna" name="comuna" value="" required>
                                                                    <option value="">Seleccione Comuna</option>
                                                                    <option value="La Reina">La Reina</option>
                                                                    <option value="Ñuñoa">Ñuñoa</option>
                                                                    <option value="Peñalolen">Peñalolen</option>
                                                                    <option value="San Bernardo">San Bernardo</option>
                                                                    <option value="San Miguel">San Miguel</option>
                                                                </select>          

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">Calle o Avenida <i class="astericos">*</i></label>
                                                                <input type="text" id="calle" class="form-control" name="calle" placeholder="Calle o Avenida" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">Numero <i class="astericos">*</i></label>
                                                                <input type="number" id="numero" class="form-control" name="numero" placeholder="Numero de Calle" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">N° Depto / Casa</label>
                                                                <input type="text" id="nrocasa" class="form-control" name="nrocasa" placeholder="N° Depto / Casa">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">Referencia</label>
                                                                <input type="text" id="referencia" class="form-control" name="referencia" placeholder="Referencia">
                                                            </div>
                                                        </div>
                                                        


                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">Tiene Mascotas?</label>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con">
                                                                                <input type="radio" name="vueradio" value="Si" id="mascota-si">
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                <span class="">Si</span>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con">
                                                                                <input type="radio" name="vueradio" value="No" checked="" id="mascota-no" >
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                <span class="">No</span>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                        </div>


                                                        <div class="col-md-6 col-12" id="MASCO">
                                                            <div class="form-group">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-inline-block mr-2" style="margin-left: 1mm" >
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" name="tmascotas[]" value="Perro" id="customCheckp" onchange="habilitar('customCheckp','nperro')">
                                                                                <label class="custom-control-label" for="customCheckp">Perro</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2">
                                                                        <input class="form-control" type="number" placeholder="Cantidad" name="nmascotas[]" id="nperro" >
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="form-group">
                                                                <ul class="list-unstyled mb-0 ">
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" name="tmascotas[]" value="Gato" id="customCheckg" onchange="habilitar('customCheckg','ngato')">
                                                                                <label class="custom-control-label" for="customCheckg">Gato </label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2" style="margin-left: 2mm">
                                                                        <input class="form-control" type="number" placeholder="Cantidad" name="nmascotas[]" id="ngato" >

                                                                    </li>
                                                                </ul>
                                                            </div>


                                                            <div class="form-group">
                                                                <ul class="list-unstyled mb-0" id="otros-group">
                                                                    <li class="d-inline-block mr-2" style="margin-left: 1mm">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" name="tmascotas[]" value="Otro" id="customChecko" onchange="habilitar('customChecko','notro')">
                                                                                <label class="custom-control-label" for="customChecko">Otro </label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2 mb-1" style="margin-left: 1mm">
                                                                        <input class="form-control" type="number" placeholder="Cantidad" name="nmascotas[]" id="notro">
                                                                        <div>
                                                                            <label style="float:right; position: relative;"></label>
                                                                            <input class="form-control" type="text" placeholder="Tipo" name="tipodemascotas[]" id="tipo-masco">
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                           

                                                            <div class="text-right">
                                                                <a class="btn btn-primary btn-sm" style="color:white" onclick="mostrar()">Agregar Otro</a>
                                                            </div>
                                                        </div>

                                                        


                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column">Dia de Visita <i class="astericos">*</i></label>
                                                                <select class="form-control mb-1" id="dia_visita" name="dia_visita" value="" required>
                                                                    <option value="">Seleccione Visita</option>
                                                                    <option value="Lunes">Lunes</option>
                                                                    <option value="Martes">Martes</option>
                                                                    <option value="Miercoles">Miercoles</option>
                                                                    <option value="Jueves">Jueves</option>
                                                                    <option value="Viernes">Viernes</option>
                                                                    <option value="Sabado">Sabado</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email-id-column" class="mb-1">Semana de Visita <i class="astericos">*</i></label>

                                                                <ul class="list-unstyled mb-0 semanas">
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input semanasx1" name="semana[]" value="Semana 1" id="customCheck1">
                                                                                <label class="custom-control-label" for="customCheck1">Semana 1</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input semanasx1" name="semana[]"  value="Semana 2"id="customCheck2">
                                                                                <label class="custom-control-label" for="customCheck2">Semana 2</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>

                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input semanasx1" name="semana[]" value="Semana 3" id="customCheck3">
                                                                                <label class="custom-control-label" for="customCheck3">Semana 3</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>

                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input semanasx1" name="semana[]" value="Semana 4" id="customCheck4">
                                                                                <label class="custom-control-label" for="customCheck4">Semana 4</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>

                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input semanasx1" name="semana[]" value="Ultima Semana" id="customCheck5">
                                                                                <label class="custom-control-label" for="customCheck5">Ultima Semana</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                   
                                                                </ul>

                                                               
                                                            
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="col-12 text-right">
                                                            <button type="submit" id="crearbtn" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Crear</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </div>


        



        @section('scripts-vendor')
        
        <!-- Para incluir scripts -->
            <script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
            <script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
            <script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
            <script src="{{asset('vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
            <script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
            <script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
            <script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
            <script src="{{asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

            <script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
            <script src="{{asset('vendors/js/extensions/polyfill.min.js')}}"></script>

            <script src="{{asset('vendors/js/extensions/dropzone.min.js')}}"></script>
            <script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>  

        @endsection

        @section('script-page')
       
            <!-- Para incluir scripts de la pagina -->
            <script src="{{asset('js/admin/admin-newsuscription.js')}}"></script>
            

        @endsection

    @endsection