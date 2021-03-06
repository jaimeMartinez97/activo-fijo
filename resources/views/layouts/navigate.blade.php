<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{ url('/') }}">
                <img src="{{ asset('images/inea.png') }}" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">Activo Fijo</span>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="navigation-header">
            <a class="navigation-header-text">Bienvenido {{ Auth::user()->name }}</a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                <i class="material-icons">home</i>
                <span class="menu-title" data-i18n="">Inicio</span>
            </a>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan {{ Request::is('my_properties') ? 'active' : '' }}" href="{{ url('my_properties') }}">
                <i class="material-icons">desktop_mac</i>
                <span class="menu-title" data-i18n="">Mis Bienes</span>
            </a>
        </li>
        @if (Auth::user()->role_id == 1)
            <li class="navigation-header">
                <a class="navigation-header-text">Funciones de administrador</a>
                <i class="navigation-header-icon material-icons">more_horiz</i>
            </li>
            <li class="bold">
                <a class="waves-effect waves-cyan {{ Request::is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                    <i class="material-icons">assignment_ind</i>
                    <span class="menu-title" data-i18n="">Empleados</span>
                </a>
            </li>
            <li class="bold">
                <a class="waves-effect waves-cyan {{ Request::is('assignments') ? 'active' : '' }}" href="{{ url('assignments') }}">
                    <i class="material-icons">account_balance</i>
                    <span class="menu-title" data-i18n="">Adscripciones</span>
                </a>
            </li>
            <li class="bold">
                <a class="waves-effect waves-cyan {{ Request::is('properties') ? 'active' : '' }}" href="{{ url('properties') }}">
                    <i class="material-icons">work</i>
                    <span class="menu-title" data-i18n="">Bienes</span>
                </a>
            </li>
            <li class="bold">
                <a class="waves-effect waves-cyan {{ Request::is('property_type') ? 'active' : '' }}" href="{{ url('property_type') }}">
                    <i class="material-icons">business_center</i>
                    <span class="menu-title" data-i18n="">Tipo de Bien</span>
                </a>
            </li>
            <li class="bold">
                <a class="waves-effect waves-cyan {{ Request::is('zone_coordinator') ? 'active' : '' }}" href="{{ url('zone_coordinator') }}">
                    <i class="material-icons">person_pin_circle</i>
                    <span class="menu-title" data-i18n="">Coordinacion de Zona</span>
                </a>
            </li>
        @endif
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out">
        <i class="material-icons">menu</i>
    </a>
</aside>
