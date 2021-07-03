@extends('Admin.layouts.template')

    @section('title', 'Admin Productos')

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
                                <h2 class="content-header-title float-left mb-0">Productos</h2>
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
                                        <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct"> Crear Producto</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Titulo</th>
                                                        <th>Categoria</th>
                                                        <th>Orden de Vista</th>
                                                        <th width="50px">Destacado</th>
                                                        <th width="50px">Cantidad</th>
                                                        <th width="50px">Precio No Socio</th>
                                                        <th width="50px">Precio Socio</th>
                                                        <th width="50px">Precio Promocion</th>
                                                        <th width="50px">Precio Envio</th>
                                                        <th width="50px">Promocion</th>
                                                        <th width="50px">Visible</th>
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


                <!-- Modal -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Nuevo Producto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <label>Titulo: </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nuevo titulo" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
                                </div>
                            </form>
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
                                <form action="{{route('productos-imagen')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label style="font-size: 15px">Imagenes: </label><br>
                                    <input type="hidden" id="create_edit" name="create_edit" value="">
                                    <input type="hidden" id="valor_producto" name="valor_producto" value="">
                                    <input class="form-control" type="file" name="imagen[]" id="imagen" multiple> <br>
                                    <p style="font-size: 11px">Su primera imagen sera la principal</p>
                                    <div align="right">
                                        <a class="btn btn-warning" style="color: white" id="clearButton">Limpiar</a>
                                        <button type="submit" class="btn btn-primary" id="submitImg">Subir</button>
                                    </div>
                                </form>
                                <form id="productForm" name="productForm" class="form-horizontal">
                                    <input type="hidden" name="producto_id" id="producto_id">
                                    <input type="hidden" id="create_edit2" name="create_edit2" value="">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <br>

                                            <label style="font-size: 15px">Titulo: </label>
                                            <input type="text" class="form-control mb-1" id="titulo" name="titulo" value="" required="">
                                            
                                            
                                            
                                            {{-- <select class="form-control mb-1" id="categoria" name="categoria" value="" required="">
                                                <option value="">Seleccione Categoria</option>
                                            </select> --}}
                                            <label style="font-size: 15px">Categoria: </label>
                                            <div class="mt-1">
                                                @foreach ($categories as $category)
                                                
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input categoria" name="categoria[]" value="{{$category->id}}" id="custom{{$category->id}}" onchange="MostrarSub(this.value)">
                                                                <label class="custom-control-label" for="custom{{$category->id}}">{{$category->nombre_categoria}}</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                            
                                                @endforeach
                                            </div>

                                            <label style="font-size: 15px" class="mb-1">Sub-Categorias: </label>
                                            <ul class="list-unstyled mb-1 subcategory" id="subcategory">
                                                
                                            </ul>


                                            <label style="font-size: 15px">Orden de Muestra: </label>
                                            <select class="form-control mb-1" id="ordenados" name="ordenados">
                                                <option value=""></option>
                                            </select>

                                            <label style="font-size: 15px">Descripcion: </label>
                                            <textarea class="form-control mb-1" id="descripcion" name="descripcion" rows="8" value="" required=""></textarea>

                                            <label style="font-size: 15px">Cantidad: </label>
                                            <input type="number" class="form-control mb-1" id="cantidad" name="cantidad" value="" required="">
                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label style="font-size: 15px">Precio No Socio: </label>
                                                    <input type="number" class="form-control mb-1" id="precio_no_afiliados" name="precio_no_afiliados" value="" required="">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label style="font-size: 15px">Precio Socio: </label>
                                                    <input type="number" class="form-control mb-1" id="precio_afiliados" name="precio_afiliados" value="" required="">
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label style="font-size: 15px">Precio Promocion: </label>
                                                    <input type="number" class="form-control mb-1" id="precio_promocion" name="precio_promocion" value="" required="">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label style="font-size: 15px">Promocion: </label>
                                                    <select class="form-control mb-1" id="indicador_promocion" name="indicador_promocion" value="" required="">
                                                        <option value="0">No</option>
                                                        <option value="1">Si</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="row">
                                                <div class="col-sm-6">
                                                    <label style="font-size: 15px">Destacado: </label>
                                                    <select class="form-control mb-1" id="destacado" name="destacado" value="" required="">
                                                        <option value="0">No</option>
                                                        <option value="1">Si</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <label style="font-size: 15px">Visible: </label>
                                                    <select class="form-control mb-1" id="visible" name="visible" value="" required="">
                                                        <option value="1">Si</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                             </div>
                                             
                                                <label style="font-size: 15px">Precio de Envio: </label>
                                                    <select class="form-control mb-1" id="precio_envio" name="precio_envio" value="" required="">
                                                        <option value="0">No</option>
                                                        <option value="1">Si</option>
                                                    </select>
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

                <!--MODEL VER-->
                <div class="modal fade text-left" id="ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary white">
                                <h5 class="modal-title" id="myModalLabel160"><span id="modal-titulo"></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                               <label class="subtitulos-modal">Categoria:</label> <span id="modal-categoria" class="contenido-span-modal"></span> <br>
                               <label class="subtitulos-modal">Descripcion:</label> <br>"<span id="modal-descripcion"></span>"<br>

                               <label class="subtitulos-modal">Cantidad:</label> <span id="modal-cantidad"></span><br>
                               <label class="subtitulos-modal">Precio No Socio:</label> <span id="modal-precio-no-afiliados"></span> <br>
                               <label class="subtitulos-modal">Precio Socio:</label> <span id="modal-precio-afiliados"></span> <br>
                               <label class="subtitulos-modal">Precio Promocion:</label> <span id="modal-precio-promocion"></span> <br>
                               <label class="subtitulos-modal">Promocion:</label> <span id="modal-promocion"></span><br>     
                                
                               {{--<label class="subtitulos-modal">Imagenes:</label>

                               <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active carousel-item-left">
                                        <img class="img-fluid" src="{{asset('')}}" alt="First slide">
                                    </div>
                                    <div class="carousel-item carousel-item-next carousel-item-left">
                                        <img class="img-fluid" src="" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid" src="" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Siguiente</span>
                                </a>
                            </div>--}}



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
            <script src="{{asset('js/admin/admin-productos.js')}}"></script>
            

        @endsection

    @endsection