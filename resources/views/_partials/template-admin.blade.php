@extends('_partials.template')

@push('styles')
    {!! Html::style('js/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endpush

@section('content')
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li><h1 class="logo-wrapper"><a href="{{route('index')}}" class="brand-logo darken-1">{!! Html::image('images/materialize-logo.png','Project') !!}</a> <span class="logo-text">Materialize</span></h1></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown">{!! Html::image('images/flag-icons/United-States.png', 'Language') !!}</a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">15</small></i>

                            </a>
                        </li>
                    </ul>
                    <!-- translation-button -->
                    <ul id="translation-dropdown" class="dropdown-content">
                        <li>
                            <a href="#!">{!! Html::image('images/flag-icons/United-States.png', 'United States') !!}<span class="language-select">English</span></a>
                        </li>
                        <li>
                            <a href="#!">{!! Html::image('images/flag-icons/France.png', 'France') !!} <span class="language-select">French</span></a>
                        </li>
                        <li>
                            <a href="#!">{!! Html::image('images/flag-icons/China.png', 'China') !!}  <span class="language-select">Chinese</span></a>
                        </li>
                        <li>
                            <a href="#!">{!! Html::image('images/flag-icons/Germany.png', 'Germany') !!}  <span class="language-select">German</span></a>
                        </li>

                    </ul>
                    <!-- notifications-dropdown -->
                    <ul id="notifications-dropdown" class="dropdown-content">
                        <li>
                            <h5>NOTIFICATIONS <span class="new badge">10</span></h5>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48-04:00">2 hours ago</time>
                        </li>
                        <li>
                            <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48-04:00">3 days ago</time>
                        </li>
                        <li>
                            <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48-04:00">4 days ago</time>
                        </li>
                        <li>
                            <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48-04:00">6 days ago</time>
                        </li>
                        <li>
                            <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                            <time class="media-meta" datetime="2015-06-12T20:50:48-04:00">1 week ago</time>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan lighten-5">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                {!! Html::image('images/avatar.jpg', 'a picture', ['class' => 'circle responsive-img valign profile-image']) !!}
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Nombre <i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Tipo Usuario</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="{{route('index')}}"  class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-module"></i> Orders</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{{route('products.index')}}">Productos<i class="lighten-3 material-icons left">bookmark</i></a>
                                        </li>
                                        <li><a href="{{route('type-products.index')}}"><i class="lighten-3 material-icons left">collections_bookmark</i>Tipo Productos</a>
                                        </li>
                                        <li><a href="{{route('orders.index')}}"><i class="lighten-3 material-icons left">queue</i>Pedidos</a>
                                        </li>
                                        <li><a href="{{route('zones.index')}}"><i class="lighten-3 material-icons left">rounded_corner</i>Zonas</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--breadcrumbs start-->
                <div id="breadcrumbs-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5 class="breadcrumbs-title">@yield("sub-title","Título")</h5>
                                <!--ol class="breadcrumbs">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Blank Page</li>
                                </ol-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs end-->


                <!--start container-->
                <div class="container">
                    <div class="section">
                        @yield("admin-content","Contenido")
                    </div>

                    <!-- Floating Action Button -->
                    <!--div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                        <a class="btn-floating btn-large">
                            <i class="mdi-action-stars"></i>
                        </a>
                        <ul>
                            <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                            <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                            <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                            <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                        </ul>
                    </div-->
                    <!-- Floating Action Button -->
                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->
    <footer class="page-footer footer-fixed" style="z-index: 851;">
        <div class="footer-copyright">
            <div class="container">
          <span>Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-2" href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT</a> All rights reserved.</span>
                <span class="right hide-on-small-only"> Design and Developed by <a class="grey-text text-lighten-2" href="https://pixinvent.com/">PIXINVENT</a></span>
            </div>
        </div>
    </footer>
@endsection
@push('scripts')


    <script>
        function isValid(a){
            if(confirm("@yield('valid','¿Eliminar registro?')")){
                $(a.parentNode).submit();
            }
            return false;
        }
    </script>
    <!--scrollbar-->
    {!! Html::script('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
@endpush