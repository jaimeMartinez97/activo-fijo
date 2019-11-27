<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{ url('/') }}">
                <img src="{{ asset('app-assets/images/logo/materialize-logo-color.png') }}" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">Activo Fijo</span>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        {{-- <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span><span class="badge badge pill orange float-right mr-10">3</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="dashboard-modern.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Modern</span></a>
                    </li>
                    <li><a class="collapsible-body" href="dashboard-ecommerce.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>eCommerce</span></a>
                    </li>
                    <li><a class="collapsible-body" href="dashboard-analytics.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Analytics</span></a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="">Templates</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body collapsible-header waves-effect waves-cyan" href="#" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Vertical</span></a>
                        <div class="collapsible-body">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li><a class="collapsible-body" href="../vertical-modern-menu-template/" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Modern  Menu</span></a>
                                </li>
                                <li><a class="collapsible-body" href="../vertical-menu-nav-dark-template/" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Navbar Dark</span></a>
                                </li>
                                <li><a class="collapsible-body" href="../vertical-gradient-menu-template/" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Gradient Menu</span></a>
                                </li>
                                <li><a class="collapsible-body" href="../vertical-dark-menu-template/" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Dark Menu</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="bold"><a class="waves-effect waves-cyan " href="app-email.html"><i class="material-icons">mail_outline</i><span class="menu-title" data-i18n="">Mail</span><span class="badge new badge pill pink accent-2 float-right mr-10">5</span></a>
        </li> --}}
        {{-- <li class="bold">
            <a class="waves-effect waves-cyan {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                <i class="material-icons">home</i>
                <span class="menu-title" data-i18n="">Inicio</span>
            </a>
        </li> --}}
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out">
        <i class="material-icons">menu</i>
    </a>
</aside>
