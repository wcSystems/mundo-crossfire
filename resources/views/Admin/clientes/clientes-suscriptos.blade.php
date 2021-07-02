@extends('Admin.layouts.template')

    @section('title', 'Admin Suscripciones Activas')

    @section('styles')
    <!-- Para incluir estilo css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href=""{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
    
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
                                <h2 class="content-header-title float-left mb-0">Suscripciones Activas</h2>
                            </div>
                        </div>
                    </div>
                </div>

            
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th># Suscripcion</th>
                                                        {{-- <th>Estado</th> --}}
                                                        <th>Nombre</th>
                                                        <th>Paquete</th>
                                                        <th>Tiempo</th>
                                                        
                                                        {{--<th>Precio</th>--}}
                                                        <th>Dia Visita</th>
                                                        <th>Semana Visita</th>
                                                        <th>Mascotas</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>              
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>  
            </div>
        </div>


        <!-- MODAL -->
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="productForm" name="productForm" class="form-horizontal">
                            <input type="hidden" name="suscripto_id" id="suscripto_id">
                            <div class="form-group">
                                <span for="name" class="col-sm-2 control-label">Paquete:</span>
                                <div class="col-sm-12">
                                    <select class="form-control mb-1" id="paquete_id" name="paquete_id" value="" required="">
                                    </select>
                                </div>

                                {{--<span for="name" class="col-sm-2 control-label">Kit:</span>
                                <div class="col-sm-12">
                                    <select class="form-control mb-1" id="kit_id" name="kit_id" value="" required="">
                                    </select>
                                </div>--}}

                                <span for="name" class="col-sm-2 control-label">Dia de Visita</span>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="dia_visita" name="dia_visita" value="" required="">
                                </div>
                                        <br>
                                <span for="name" class="col-sm-2 control-label">Semana de Visita</span>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="semana_visita" name="semana_visita" value="" required="">
                                </div>
                                     
                            </div>
              
                            <div class="col-sm-offset-2 col-sm-2">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL VER-->
        <div class="modal fade text-left" id="ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160"><span id="modal-titulo"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                       <table class="table text-center">
                            <thead>
                                <th width="10%">Region</th>
                                <th width="10%">Comuna</th>
                                <th width="10%">Telefono</th>
                                <th width="30%">Calle</th>
                                <th width="10%">Numero</th>         
                                <th width="10%">Numero Depto/Casa</th>          
                                <th width="20%">Referencia</th>          

                            </thead>

                            <tbody id="lista-ventas">
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>


        <!--MODAL KITS-->
        <div class="modal fade text-left" id="ver-kits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Kits</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                       <table class="table text-center">
                            <thead>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>       
                            </thead>
                            <tbody id="lista-kits">
                            </tbody>


                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>


        <!--MODAL NASCOTAS-->
        <div class="modal fade text-left" id="mascotas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Mascotas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                       <table class="table text-center">
                            <thead>
                                <th scope="col">Mascotas</th>
                                <th scope="col">Cantidad</th>    
                                <th scope="col">Tipo</th>       
                            </thead>
                            <tbody id="lista-mascotas">
                            </tbody>


                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>


        <!--MODAL FECHAS -->
        <div class="modal fade" id="fechas" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading">Fechas</h4>
                    </div>
                    <div class="modal-body">
                        <form id="fechasForm" name="fechasForm" class="form-horizontal">
                            <input type="hidden" id="id_suscripcion" name="id_suscripcion">
                            <span id="paquetef"></span>
                            <div class="row mt-2">
                                <button style="margin-left:70%" type="submit" class="btn btn-primary" id="savefechas" value="create">Guardar</button>
                            </div>
                        </form>
                    </div>
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
        @endsection

        @section('script-page')
       
            <!-- Para incluir scripts de la pagina -->
            <script src="{{asset('js/admin/admin-clientes-suscriptos.js')}}"></script>
            

        @endsection

    @endsection
