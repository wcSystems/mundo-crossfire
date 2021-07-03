<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('admin-index')}}">
                    <img class="rounded" style="background-color: whitesmoke" width="35px" src="{{asset('images/icon-Petcicla.png')}}" alt="">
                    <h2 class="brand-text mb-0">Petcicla</h2>
                </a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Tienda</span>
            </li>
            <li class="nav-item"><a href="{{route('productos.index')}}"><i class="fa fa-gift"></i><span class="menu-title" data-i18n="Productos">Productos</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('categorias.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Categorias</span></a>
                    </li>
                    <li><a href="{{route('productos.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Productos">Productos</span></a>
                    </li>
                </ul>
            </li>
            {{-- <li class=" nav-item"><a href="{{route('admin-envio.index')}}"><i class="fa fa-truck"></i><span class="menu-title" data-i18n="Form Layout">Precio Despacho</span></a> --}}
            <li class="nav-item" id="venta_noti"><a href="{{route('admin-ventas.index')}}" ><i class="fa fa-opencart"></i><span class="menu-title" data-i18n="Productos">Ventas</span>
                <span id="venta_n"></span>
            </a>
            </li>
            <li class="nav-item"><a ><i class="fa fa-tag"></i><span class="menu-title" data-i18n="Productos">Planes y Beneficios</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('admin-paquetes.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Planes</span></a>
                    </li>
                    <li><a href="{{route('admin-kits.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Productos">Extensiones</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a ><i class="fa fa-users"></i><span class="menu-title" data-i18n="Productos">Clientes<span id="cliente_n"></span></span>
            </a>
                <ul class="menu-content">
                    <li id="clienteN"><a href="{{route('admin-clientes.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Registrados</span><span id="cli_r_n"></span></a>
                    </li>
                    <li id="cliente_no_re"><a href="{{route('admin-clientes-no-registrados.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">No Registrados</span><span id="cli_n_n"></span></a>
                    </li>
                    <li><a href="{{route('admin-carga.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Carga Masiva</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" id="suscripcs"><a ><i class="fa fa-user-plus"></i><span class="menu-title" data-i18n="Productos">Suscripciones</span>
                <span id="sus_n"></span>
            </a>
                <ul class="menu-content">
                    <li><a href="{{route('admin-new-suscripcion.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Crear</span></a>
                    </li>
                    <li><a href="{{route('admin-suscripciones.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Activas</span></a>
                    </li>
                    <li><a href="{{route('admin-no-pagados.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Inactivas</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>Administracion</span>
            </li>
            <li class=" nav-item"><a href="{{route('admin-banner.index')}}"><i class="fa fa-file-image-o"></i><span class="menu-title" data-i18n="Form Layout">Banners</span></a>
            <li class=" nav-item"><a id="mens" href="{{route('admin-mensajes.index')}}"><i class="fa fa-envelope-o"></i><span class="menu-title" data-i18n="Form Layout">Mensajes</span><span id="mensaje_n"></span></a>
            
            <li class="nav-item"><a ><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Productos">Secciones</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('admin-seccion-home.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Seccion 1</span></a>
                    </li>
                    <li><a href="{{route('admin-comunas.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Comunas</span></a>
                    </li>
                    <li><a href="{{route('admin-cajas.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Cajas</span></a>
                    </li>
                    <li><a href="{{route('admin-cuotas.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Categorias">Texto Cuotas</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="{{route('admin-empleados.index')}}"><i class="fa fa-user-circle"></i><span class="menu-title" data-i18n="Form Layout">Empleados</span></a>
            <li class=" nav-item"><a href="{{route('admin-marcas.index')}}"><i class="fa fa-file-image-o"></i><span class="menu-title" data-i18n="Form Layout">Marcas</span></a>
        </ul>
    </div>
</div>