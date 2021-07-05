@extends('Admin.layouts.template')

    @section('title', 'Admin Cajas')

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
                            <h2 class="content-header-title float-left mb-0">Cajas</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Caja 1</h3> 
                            <span><button class="btn btn-sm btn-primary add" data-id="1">Agregar</button></span>
                            <span><button class="btn btn-sm btn-success editar" data-id="1">Editar</button></span>
                        </div>
                        <div class="card-body">
                            @if($cajas1!=null)
                                Cargado Visualize su Pagina de Inicio
                            @else
                                No hay Informacion Mostrada
                            @endif
                        </div>
                        
                        <div class="card-footer" align="center">
                            <button class="btn btn-sm btn-danger clear" data-id="1">Limpiar Informacion</button>
                        </div>
                       
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Caja 2</h3> 
                            <span><button class="btn btn-sm btn-primary add" data-id="2">Agregar</button></span>
                            <span><button class="btn btn-sm btn-success editar" data-id="2">Editar</button></span>

                        </div>
                        <div class="card-body">
                            <div class="container">
                                @if($cajas2!=null)
                                    Cargado Visualize su Pagina de Inicio
                                @else
                                    No hay Informacion Mostrada
                                @endif
                            </div>
                        </div>
                        <div class="card-footer" align="center">
                            <button class="btn btn-sm btn-danger clear" data-id="2">Limpiar Informacion</button>
                        </div>
                    </div>
                </div>
               <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Caja 3</h3> 
                            <span><button class="btn btn-sm btn-primary add" data-id="3">Agregar</button></span>
                            <span><button class="btn btn-sm btn-success editar" data-id="3">Editar</button></span>

                        </div>
                        <div class="card-body">
                            @if($cajas3!=null)
                                Cargado Visualize su Pagina de Inicio
                            @else
                                No hay Informacion Mostrada
                            @endif
                        </div>
                        <div class="card-footer" align="center">
                            <button class="btn btn-sm btn-danger clear" data-id="3">Limpiar Informacion</button>
                        </div>
                    </div>
               </div>
             </div>      
        </div>
    </div>

    
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">

                    <form id="formFile" name="formFile" class="form-horizontal" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="file" style="display:none" name="file" id="file" value="">
                    </form>


                    <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="cajas_id" id="cajas_id" value="">
                        <div class="form-group">

                            <input name='descripcion_cajas' id="id_description" required="" type="hidden">
                            
                            <div class="ml-1 mr-2">
                                <div id="description_editor" style="height:250px; background-color: rgb(28 47 60)"></div>  
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
        <script src="{{asset('js/admin/admin-cajas.js')}}"></script>
        
        

    @endsection

@endsection