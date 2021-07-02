@extends('Admin.layouts.template')

    @section('title', 'Admin Carga Masiva')

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
                                <h2 class="content-header-title float-left mb-0">Carga Masiva</h2>
                            </div>
                        </div>
                    </div>
                </div>

            
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    {{--<div class="col-md-12 text-left">
                                        <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct"> Crear Cliente</a>
                                    </div>--}}
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>E-mail</th>
                                                        <th><div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(19, 101, 139);width:20px;float:left; margin-right:5px;border-radius: 25px;" ></div>Papel y Carton</th>
                                                        <th><div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(68, 224, 63);width:20px;float:left; margin-right:5px;border-radius: 25px;" ></div>Vidrio</th>
                                                        <th><div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(224, 208, 63);width:20px;float:left; margin-right:5px;border-radius: 25px;" ></div>Plasticos</th>
                                                        <th><div class="mb-1" style="padding-top:10px;padding-bottom:10px;background-color:rgb(224, 63, 63);width:20px;float:left; margin-right:5px;border-radius: 25px;" ></div>Latas y PET</th>      
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
            <script src="{{asset('js/admin/admin-carga.js')}}"></script>
            

        @endsection

    @endsection