@extends('Admin.layouts.template')

    @section('title', 'Admin Comunas')

    @section('styles')
    <!-- Para incluir estilo css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
   

    @endsection
    <!-- Fin Head -->
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
                            <h2 class="content-header-title float-left mb-0">Comunas</h2>
                        </div>
                    </div>
                </div>
            </div>

        
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if($count!=1)
                                    <div class="col-md-12 text-left" id="botoncrear">
                                        <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct">Agregar Texto</a>
                                    </div>
                                @endif
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table data-table">
                                            <thead>
                                                <tr>
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

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="comunas_id" id="comunas_id" value="">
                        <div class="form-group">

                            <label for="name" class="col-sm-2 control-label">Descripcion:</label>
                            <input name='descripcion_comuna' id="id_description" required="" type="hidden">
                            
                            <div class="ml-1 mr-2">
                                <div id="description_editor" style="height:250px"></div>  
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


    <div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="seccion">
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

      
        <script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>  
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
         

       
    @endsection

    @section('script-page')
   
        <!-- Para incluir scripts de la pagina -->
        <script src="{{asset('js/admin/admin-comunas.js')}}"></script>
        
        

    @endsection

@endsection