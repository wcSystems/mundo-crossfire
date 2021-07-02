@extends('Admin.layouts.template')

    @section('title', 'Admin Precio Envio')

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
                                <h2 class="content-header-title float-left mb-0">Precio Despacho</h2>
                            </div>
                        </div>
                    </div>
                </div>

                
               <div class="row">
                   <div class="col-sm-3"></div>
                <div class="card mb-3" style="max-width: 540px">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img
                          src="{{asset('images/camion.jpg')}}"
                          alt="..."
                          class="img-fluid"
                        />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          
                          <form id="productForm" name="productForm" class="form-horizontal">
                                <h5 class="card-title">Precio</h5>
                                <input type="number" name="precio" id="precio" class="form-control mb-2" placeholder="$">

                                <label class="card-title">Monto para Despacho Gratuito</label>
                                <input type="number" name="monto" id="monto" class="form-control mb-2" placeholder="">
                                <button type="submit" class="btn btn-primary" id="envioBtn">Guardar</button>        
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4"></div>

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
            <script src="{{asset('js/admin/admin-envio.js')}}"></script>
            

        @endsection

    @endsection