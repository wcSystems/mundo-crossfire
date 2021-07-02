@extends('Admin.layouts.template')

    @section('title', 'Admin Empleados')

    @section('styles')
    <!-- Para incluir estilo css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
   

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
                                <h2 class="content-header-title float-left mb-0">Administracion de Empleados</h2>
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
                                        <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct"> Agregar Empleado</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th width="300px">Nombre</th>
                                                        <th width="300px">E-Mail</th>
                                                        <th width="300px">Rol</th>
                                                        <th width="100px">Fecha</th>
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
                        <form id="productForm" name="productForm" class="form-horizontal">
                            <input type="hidden" name="empleado_id" id="empleado_id">
                            <input type="hidden" id="create_edit" name="create_edit" value="">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" value="" required="">
                                </div>

                                <div id="correo">
                                    <label for="name" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" name="email" value="" required="">
                                    </div>
                                </div>

                                <div id="clave">
                                    <label for="name" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password" name="password" value="" required="">
                                    </div>
                                </div>

                                <label for="name" class="col-sm-2 control-label">Rol</label>
                                <div class="col-sm-12">
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="2">Empleado</option>
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>
                            </div>
              
                            <div class="col-sm-offset-2 col-sm-2">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Añadir</button>
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

          
            <script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>  

        @endsection

        @section('script-page')
       
            <!-- Para incluir scripts de la pagina -->
            <script src="{{asset('js/admin/admin-empleados.js')}}"></script>
            

        @endsection

    @endsection