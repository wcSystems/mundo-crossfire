@extends('Admin.layouts.template')

    @section('title', 'Admin Marcas')

    @section('styles')
    <!-- Para incluir estilo css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/file-uploaders/dropzone.css')}}">

    <style>
        .dropzone {
            min-height : 200px;
            border : 2px dashed #7367F0;
            background : #F8F8F8;
        }
    </style>

    
    @endsection
    <!-- Fin Head -->
    @section('body')
        @include('Admin.layouts.barra-top')
        @include('Admin.layouts.barra-lateral')

        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Marcas</h2>
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
                                        <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct"> Agregar Imagen de Marca</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th width="300px">Imagen</th>
                                                        <th width="100px">Fecha de Creacion</th>
                                                        <th>Img</th>
                                                        <th width="200px">Accion</th>
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
                        <label for="imagen" class="col-sm-2 control-label mb-3" style="font-size: 15px">Imagen:</label>

                       
                        <form method="post" action="{{url('admin-marcas')}}" enctype="multipart/form-data" class="dropzone mb-2" id="dropzone">
                            @csrf
                            <input type="hidden" id="create_edit" name="create_edit" value="">
                            <input type="hidden" id="marcas_id" name="marcas_id" value="">
                            <div class="dz-message">Subir Imagen</div>
                        </form>
                        <button type="submit" class="btn btn-primary" id="btnIMG" >Guardar</button>
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

            <script src="{{asset('vendors/js/extensions/dropzone.min.js')}}"></script>
            <script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>  

        @endsection

        @section('script-page')
       
            <!-- Para incluir scripts de la pagina -->
            <script src="{{asset('js/admin/admin-marcas.js')}}"></script>
            

        @endsection

    @endsection