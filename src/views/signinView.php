<?php
session_start();
$page_title = 'Sign in';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    -->

    <link rel="stylesheet" href="../../assets/js/jquery-datatable/__cdn.datatables.net_1.12.1_css_jquery.dataTables.css">
    <link rel="stylesheet" href="../../assets/css/material-indigo-pink/http_code.getmdl.io_1.3.0_material.indigo-pink.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <title><?php echo $page_title ?> - CoreStore</title>
    <style>
        body {
            background-color: #023a50;
        }
        @media (max-width: 375px) {
            .material-icons {
                /*margin-top: 0 !important;
                font-size: 40px !important;*/
                display: none;
            }
        }
        .mdl-card {
            background-color: rgba(255, 255, 255, .15);
            backdrop-filter: blur(15px);
        }

    </style>
</head>
<body class="wallpaper-log">

<form action="#">
    <div class="mdl-card mdl-shadow--4dp" style="margin: 10% auto">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Sign in</h2>
        </div>

        <div class="mdl-card__supporting-text">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-phone mdl-typography--text-center">
                    <span class="material-icons" style="width: 100%; margin-top: 65%;">
                        account_circle
                    </span>
                </div>
                <div class="mdl-cell mdl-cell--10-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="usr">
                        <label class="mdl-textfield__label" for="usr">Usuario</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-phone mdl-typography--text-center">
                    <span class="material-icons" style="width: 100%; margin-top: 65%;">
                        key
                    </span>
                </div>
                <div class="mdl-cell mdl-cell--10-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="passwd">
                        <label class="mdl-textfield__label" for="passwd">Contraseña</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="../Dashboard/Home.php">
                iniciar sesión
            </a>
        </div>

    </div>
</form>

<footer style="border-top: 1px solid rgba(0, 0, 0, 0.5); text-align: center; bottom: 0; padding: 5px; position: absolute; width: 100%">
    <p>&#169 Copyright <?=date('Y')?> por RealCode, todos los derechos reservados.</p>
</footer>
<!--
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
-->


<script src="../../assets/js/jquery-3.6.0/http_code.jquery.com_jquery-3.6.0.js"></script>
<script src="../../assets/js/jquery-datatable/__cdn.datatables.net_1.12.1_js_jquery.dataTables.js"></script>
<script src="../../assets/js/material/http_code.getmdl.io_1.3.0_material.js"></script>
</body>
</html>