@extends('Admin.layouts.template')

    @section('title', 'Admin Index')

    @section('styles')
    <!-- Para incluir estilo css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/shepherd-theme-default.css')}}">

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
                </div>
                <div class="content-body">
                    <!-- Dashboard Analytics Start -->
                    <section id="dashboard-analytics">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="card bg-analytics text-white">
                                    <div class="card-content">
                                        <div class="card-body text-center">
                                            <img src="{{asset('images/elements/decore-left.png')}}" class="img-left" alt="
                card-img-left">
                                            <img src="{{asset('images/elements/decore-right.png')}}" class="img-right" alt="
                card-img-right">
                                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                                <div class="avatar-content">
                                                    <i class="feather icon-award white font-large-1"></i>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h1 class="mb-2 text-white">Bienvenido {{Auth::user()->name}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-0">
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1 mb-25">{{$suscripciones}}</h2>
                                        <p class="mb-0">Suscripciones</p>
                                    </div>
                                    <div class="card-content">
                                        <div id="subscribe-gain-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex flex-column align-items-start pb-0">
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-package text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700 mt-1 mb-25">{{$ventas}}</h2>
                                        <p class="mb-0">Ventas</p>
                                    </div>
                                    <div class="card-content">
                                        <div id="orders-received-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    
                    </section>
                    <!-- Dashboard Analytics end -->
    
                </div>
            </div>
        </div>
    


        @section('scripts-vendor')
        <!-- Para incluir scripts -->
            <script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
            <script src="{{asset('vendors/js/extensions/tether.min.js')}}"></script>
            <script src="{{asset('vendors/js/extensions/shepherd.min.js')}}"></script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        @endsection

        @section('script-page')
        <!-- Para incluir scripts de la pagina -->
            <script src="{{asset('js/admin/admin-index.js')}}"></script>
        @endsection


    @endsection