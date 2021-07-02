@extends('Admin.layouts.template')

    @section('title', 'Admin Categorias de Productos')

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
                                <h2 class="content-header-title float-left mb-0">Categorias</h2>
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
                                        <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct"> Crear Categoria</a>
                                        <a class="btn btn-info" href="javascript:void(0)" id="createNewProduct2"> Crear Sub-Categoria</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th width="200px">Categoria</th>
                                                        <th width="380px">Sub-Categoria</th>
                                                        <th >Acciones</th>
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


                <!-- Modal -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Nueva Categoria</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <label>Categoria: </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nueva Categoria" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <input type="hidden" name="categoria_id" id="categoria_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Categoria</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoria" value="" required="">
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

        <!-- MODAL -->
        <div class="modal fade" id="ajaxModel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading2"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="productForm2" name="productForm2" class="form-horizontal">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Categoria</label>
                                <div class="col-sm-12">
                                    <select class="form-control mb-1" id="categoriax1" name="categoria_id" value="" required>
                                        <option value="">Seleccione Categoria</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Sub&nbsp;Categoria</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="sub_categoria" name="nombre_subcategoria" placeholder="SubCategoria" value="" required="">
                                </div>
                            </div>
              
                            <div class="col-sm-offset-2 col-sm-2">
                                <button type="submit" class="btn btn-primary" id="saveBtn2" value="create">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- MODAL -->
        <div class="modal fade" id="SubCategoriasModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sub-Categorias</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <ul class="list-group" id="subcatego2z">
                            </ul>
                        </div>
                        
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
            <script src="{{asset('js/admin/admin-categorias.js')}}"></script>
            

        @endsection

    @endsection