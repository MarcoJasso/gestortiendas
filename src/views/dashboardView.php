<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    -->
    <link rel="stylesheet" href="../../assets/js/jquery-datatable/__cdn.datatables.net_1.12.1_css_jquery.dataTables.css">
    <link rel="stylesheet" href="../../assets/css/material-indigo-pink/http_code.getmdl.io_1.3.0_material.indigo-pink.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - CoreStore</title>
    <!-- Uses a header that contracts as the page scrolls down. -->
    <style>
        .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type {
            padding-right: 0;
        }

        .mdl-layout__header-row {
            /*background-color: #023a50 !important;*/
            background-color: #600b00 !important;
        }

        .mdl-layout__drawer {
            background-color: rgba(255, 255, 255, .15);
            backdrop-filter: blur(10px);
        }

        .mdl-navigation .a-link--active {
            background-color: whitesmoke;
            color: #023a50 !important;
            font-weight: bold;
            border-radius: 2px;
            margin: 5px 10px !important;
            padding: 10px 20px !important;
        }
    </style>
</head>
<body>

<div id="content__dialog"></div>

<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title" id="title--space__dash">Title</span>

            <div class="mdl-layout-spacer"></div>
            <!-- Number badge on icon -->

            <button id="demo-menu-lower-left"
                    class="mdl-button mdl-js-button mdl-button--icon mdl-badge mdl-badge--overlap"
                    style="overflow: inherit" data-badge="200">
                <i class="material-icons">message</i>
            </button>

            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                for="demo-menu-lower-left">
                <li class="mdl-menu__item">Todas las notificaciones</li>
                <li class="mdl-menu__item mdl-menu__item--full-bleed-divider">Another Action</li>
                <li disabled class="mdl-menu__item">Disabled Action</li>
                <li class="mdl-menu__item">Yet Another Action</li>
            </ul>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="waterfall-exp">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="sample"
                           id="waterfall-exp">
                </div>
            </div>

            <button class="mdl-button mdl-js-button mdl-button--icon"
                    style="overflow: inherit">
                <i class="material-icons">logout</i>
            </button>
        </div>
        <!-- Bottom row, not visible on scroll
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
            </nav>
        </div>
        -->
    </header>
    <div class="mdl-layout__drawer" id="div-layout__drawer">
        <div class="content__log_usr">
            <div class="circle-base mdl-shadow--4dp">
                <div class="circle__content_main">
                    <h4>MJ</h4>
                </div>
            </div>
        </div>
        <span class="mdl-layout-title mdl-color-text--white">Numbre de usuario</span>
        <p class="span-subtitle mdl-color--black mdl-color-text--white">Rol de usuario</p>
        <nav class="mdl-navigation" id="nav_sys">
            <a class="mdl-navigation__link mdl-color-text--white a-link--active" data-md="__md-0">Almacén</a>
            <a class="mdl-navigation__link mdl-color-text--white" data-md="__md-1">Caja</a>
            <a class="mdl-navigation__link mdl-color-text--white" data-md="__md-2">Personal</a>
            <a class="mdl-navigation__link mdl-color-text--white" data-md="__md-3">Reportes</a>
            <a class="mdl-navigation__link mdl-color-text--white" data-md="__md-4">Estadisticas</a>
            <a class="mdl-navigation__link mdl-color-text--white" data-md="__md-5">Configuración</a>
        </nav>
    </div>
    <main class="mdl-layout__content" id="main_content">
        <div class="page-content" id="page_content"><!-- Your content goes here --></div>
    </main>
</div>

<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar mdl-color-text--white" style="background-color: #023a50">
    <div class="mdl-snackbar__text"></div>
    <button class="mdl-snackbar__action" type="button"></button>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<!--
<script src="../../assets/js/jquery-3.6.0/http_code.jquery.com_jquery-3.6.0.js"></script>
<script src="../../assets/js/jquery-datatable/__cdn.datatables.net_1.12.1_js_jquery.dataTables.js"></script>
<script src="../../assets/js/material/http_code.getmdl.io_1.3.0_material.js"></script>
-->
<script src="../../assets/js/dashboard.js"></script>

</body>
</html>