@extends('Admin.layouts.template')

    @section('title', 'Admin Clientes Registrados')

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
                                <h2 class="content-header-title float-left mb-0">Clientes Registrados</h2>
                            </div>
                        </div>
                    </div>
                </div>

            
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md-12 text-left">
                                        <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct"> Crear Cliente</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>E-mail</th>
                                                        <th>Fecha de Creacion</th>
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
                            <input type="hidden" name="cliente_id" id="cliente_id">
                            <input type="hidden" id="create_edit" name="create_edit" value="">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Cliente</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="" required="">
                                </div>

                                <label for="name" class="col-sm-2 control-label">E-Mail</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" value="" required="">
                                </div>

                                <div id="cont">
                                    <label for="name" class="col-sm-2 control-label">Clave</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Clave" value="" required="">
                                    </div>
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

        <!-- MODAL RECICLAJE -->
        <div class="modal fade text-left" id="reciclaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Reciclaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="reciclajeForm" name="reciclajeForm" class="form-horizontal">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="modal-body"> 
                                <div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(63, 63, 224);width:20px;float:left;"></div>
                                <label for="helperText">Azul:</label>
                                <input type="text" id="azul" name="azul" class="form-control">
                                <p><small class="text-muted">Papel y Cartón</small></p>
                            
                                <div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(109, 224, 63);width:20px;float:left;"></div>
                                <label for="helperText">Verde:</label>
                                <input type="text" id="verde" name="verde" class="form-control">
                                <p><small class="text-muted">Vidrio</small></p>
                            
                                <div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(216, 219, 42);width:20px;float:left;"></div>
                                <label for="helperText">Amarillo:</label>
                                <input type="text" id="amarillo" name="amarillo" class="form-control">
                                <p><small class="text-muted">Plásticos</small></p>
                            
                                <div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(224, 63, 63);width:20px;float:left;"></div>
                                <label for="helperText">Rojo:</label>
                                <input type="text" id="rojo" name="rojo" class="form-control">
                                <p><small class="text-muted">Latas y PET</small></p>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="reciclajebtn" data-dismiss="modal">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--MODAL DIRECCION-->
        <div class="modal fade text-left" id="direccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Direccion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                       <table class="table text-center">
                            <thead>
                                <th width="10%">Region</th>
                                <th width="10%">Comuna</th>
                                <th width="30%">Calle</th>
                                <th width="10%">Numero</th>         
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
            <script src="{{asset('js/admin/admin-clientes.js')}}"></script>
            

        @endsection

    @endsection