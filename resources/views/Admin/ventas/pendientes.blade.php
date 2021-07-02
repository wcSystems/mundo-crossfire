@extends('Admin.layouts.template')
@section('title', 'Admin - Ventas Pendientes')
@section('styles')
    <!-- Para incluir estilo css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href=""{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
    
@endsection
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
                            <h2 class="content-header-title float-left mb-0">Ventas Pendientes</h2>
                        </div>
                    </div>
                </div>
            </div>

        
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table data-table">
                                            <thead>
                                                <tr>
                                                    <th>Ticket</th>
                                                    <th>Cliente</th>
                                                    <th>Estado</th>
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
    
    <div class="modal fade text-left" id="ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel160">Ticket #<span id="modal-titulo"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="text-center">
                        <thead>
                            <th width="40%">Productos</th>
                            <th width="20%">Sub Total</th>
                            <th width="20%">Cantidad</th>
                            <th width="20%">Fecha de Compra</th>         
                        </thead>

                        <tbody id="lista-ventas">
                        </tbody>
                    </table>
                    <div class="mt-2" id="total_precio" align="center" style="font-size: 20px">
                        Precio Total: <span><b>$<span id="precio_prod"></span></b></span>
                    </div>
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
            <script src="{{asset('js/admin/admin-ventas-pendientes.js')}}"></script>
        @endsection


@endsection
